<?php
require_once './src/database/database.php';
require_once './src/services/cachingService.php';
require_once './src/models/Dish.php';

class DishService{
    private $db;
    private $dishModel;
    private $cachingService;
    public static $instance = null;

    private function __construct(){
        $this->db = Database::getInstance()->getConnection();
        $this->cachingService = CachingService::getInstance();
        $this->dishModel = new Dish($this->db);
    }

    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new DishService();
        }
        return self::$instance;
    }

    public function getCount($search){
        return $this->dishModel->getCount($search);
    }

    public function getDishs($search, $ingredients, $types, $itemsPerPage, $offset){
        return $this->dishModel->getDishs($search, $ingredients, $types, $itemsPerPage, $offset);
    } 

    public function getDishsAdmin($search, $offset, $itemsPerPage){
        return $this->dishModel->getDishsAdmin($search, $offset, $itemsPerPage);
    }

    public function implementRating(&$dishs, $userId){
        //get dishIDs
        $dishIDs = array_column($dishs, 'dishID');
        //get rate of user for each dish
        $ratingUserOfDishs = $this->getRatingUserOfDishs($dishIDs, $userId);
        //check if user has rated any dish older than 7 days or preRating = 0
        $isNeedCollaborativeFilter = count($ratingUserOfDishs) != count($dishs);
        if(!$isNeedCollaborativeFilter){
            $currentDate = strtotime(date('Y-m-d'));
            foreach ($ratingUserOfDishs as $rating) {
                if($rating['preRating'] == 0) {
                    $isNeedCollaborativeFilter = true;
                    break; 
                }
                if($rating['preRatingTime'] == null) continue;
                $daysDifference = floor(($currentDate - strtotime($rating['preRatingTime'])) / (60 * 60 * 24));
                if ($daysDifference >= 7) {
                    $isNeedCollaborativeFilter = true;
                    break; 
                }
            }
        }
        //if need, prepare for implementing rating with collaborative filter
        if($isNeedCollaborativeFilter){
            $isNeedPreRating = true;
            $averageRating = $this->getAverageRating();
            $ratingMT = $this->cachingService->checkExistedCache('ratingMT')??[];
            $userIDs = [];
            $dishIDs = [];
            $indexUser = -1;
            $simmilarUser = [];
            if(count($ratingMT)!=0){
                $isNeedPreRating = false;
                $userIDs = array_keys($ratingMT);
                $dishIDs = array_keys($ratingMT[$userIDs[0]]);
                $indexUser = array_search($userId, $userIDs);
                if($indexUser == false){
                    $isNeedPreRating = true;
                }
            }
            if($isNeedPreRating){
                $totalRatings = $this->getRating();
                $countDish = count($averageRating);
                $countUser = count($totalRatings)/$countDish;
                for($i = 0; $i < $countUser; $i++){
                    if($totalRatings[$i]['userID'] == $userId){
                        $indexUser = $i;
                    }
                    $userIDs[$i] = $totalRatings[$i]['userID'];
                }
                for($i = 0; $i < $countDish; $i++){
                    $dishIDs[$i] = $averageRating[$i]['dishID'];
                }
                for($i = 0; $i < $countUser; $i++){
                    for($j = 0; $j < $countDish; $j++){
                        $ratingMT[$userIDs[$i]][$dishIDs[$j]] = $totalRatings[$i+$j*$countUser]['rating']-$averageRating[$j]['avgRating'];
                    }
                }
                $isDoneWriteCache = $this->cachingService->addCache('ratingMT', $ratingMT);
                // if(!$isDoneWriteCache){
                //     echo('Error when writing cache!');
                // }
                // else{
                //     echo('Write cache successfully!');
                // }
            }
            for($i = 0; $i < count($userIDs); $i++){
                $simmilarUser[$i]['userID'] = $userIDs[$i];
                $simmilarUser[$i]['value'] = $this->cosineSimilarity($ratingMT[$userIDs[$i]], $ratingMT[$userIDs[$indexUser]]);
                $simmilarUser[$i]['different'] = 0;
                $countDif = 0;
                for($j = 0; $j < count($dishIDs); $j++){
                    if($ratingMT[$userIDs[$indexUser]][$dishIDs[$j]]!=0 && $ratingMT[$userIDs[$i]][$dishIDs[$j]]!=0){
                        $simmilarUser[$i]['different'] += $ratingMT[$userIDs[$i]][$dishIDs[$j]] / $ratingMT[$userIDs[$indexUser]][$dishIDs[$j]];
                        $countDif++;
                    }
                }
                if($countDif != 0){
                    $simmilarUser[$i]['different'] = $simmilarUser[$i]['different']/$countDif;
                }
            }
            array_multisort(array_column($simmilarUser, 'value'), SORT_DESC, $simmilarUser);
        }
        //implement rating
        $countUpdateQueryy = 0;
        $updateQuery = [[]];
        for($i = 0; $i < count($dishs); $i++){
            $dishs[$i]['rating'] = 0;
            $dishs[$i]['preRating'] = 0;
            $dishs[$i]['preRatingTime'] = '';
            $dishs[$i]['isRated'] = false;
            for($j = 0; $j < count($ratingUserOfDishs); $j++){
                if($dishs[$i]['dishID'] == $ratingUserOfDishs[$j]['dishID']){
                    $dishs[$i]['rating'] = $ratingUserOfDishs[$j]['rating'];
                    $dishs[$i]['preRating'] = $ratingUserOfDishs[$j]['preRating'];
                    $dishs[$i]['preRatingTime'] = $ratingUserOfDishs[$j]['preRatingTime'];
                    if($dishs[$i]['rating'] != null)
                        $dishs[$i]['isRated'] = true;
                    break;
                }
            }
            if(!$dishs[$i]['isRated']&&$isNeedCollaborativeFilter){
                for($j = 0; $j < count($simmilarUser); $j++){
                    $preRating = $ratingMT[$simmilarUser[$j]['userID']][$dishs[$i]['dishID']]??0;
                    if($preRating != 0 && $simmilarUser[$j]['different'] != 0){
                        $dishs[$i]['preRating'] = ($preRating + $averageRating[array_search($dishs[$i]['dishID'], array_column($averageRating, 'dishID'))]['avgRating'])/$simmilarUser[$j]['different'];
                        $updateQuery[$countUpdateQueryy++] = ['dishID' => $dishs[$i]['dishID'], 'userID' => $userId, 'predictedRating' => $dishs[$i]['preRating']];
                        break;
                    }
                }
            }
        }
        if($countUpdateQueryy > 0){
            // $this->dishModel->updatePredictedRating($updateQuery);
        }
    }

    private function getRating(){
        return $this->dishModel->getRating();
    }

    private function getAverageRating(){
        return $this->dishModel->getAverageRating();
    }

    public function getRatingUserOfDish($dishID, $userId){
        return $this->dishModel->getRatingUserOfDish($dishID, $userId);
    }

    private function getRatingUserOfDishs($dishIDs, $userId){
        return $this->dishModel->getRatingUserOfDishs($dishIDs, $userId);
    }

    public function getDishById($dishId){
        return $this->dishModel->getDishById($dishId);
    }

    public function getDetailDishById($dishId){
        return $this->dishModel->getDetailDishById($dishId);
    }

    public function addDish($dishName, $summary, $recipe, $ingredients, $types){
        return $this->dishModel->addDish($dishName, $summary, $recipe, $ingredients, $types);
    }

    public function updateDishUrl($id, $url){
        return $this->dishModel->updateDishUrl($id, $url);
    }

    public function modifyDish($id, $dishName, $summary, $recipe, $ingredients, $types){
        return $this->dishModel->modifyDish($id, $dishName, $summary, $recipe, $ingredients, $types);
    }

    public function deleteDish($id){
        return $this->dishModel->deleteDish($id);
    }

    public function rateDish($dishID, $rating, $userID){
        return $this->dishModel->rateDish($dishID, $rating, $userID);
    }

    public function getRecommendDishsByUser($userID){
        return $this->dishModel->getRecommendDishsByUser($userID);
    }


    private function cosineSimilarity($vectorA, $vectorB) {
        $dotProduct = 0;
        foreach ($vectorA as $key => $value) {
            if (isset($vectorB[$key])) {
                $dotProduct += $value * $vectorB[$key];
            }
        }
        $magnitudeA = sqrt(array_sum(array_map(function ($value) {
            return $value * $value;
        }, $vectorA)));
        $magnitudeB = sqrt(array_sum(array_map(function ($value) {
            return $value * $value;
        }, $vectorB)));
        if ($magnitudeA && $magnitudeB) {
            return $dotProduct / ($magnitudeA * $magnitudeB);
        } else {
            return 0;
        }
    }

}




?>