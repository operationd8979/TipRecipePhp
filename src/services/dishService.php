<?php
require_once './src/database/database.php';
require_once './src/models/Dish.php';

class DishService{
    private $db;
    private $dishModel;
    public static $instance = null;

    private function __construct(){
        $this->db = Database::getInstance()->getConnection();
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
        $dishIDs = array_column($dishs, 'dishID');
        $ratingUserOfDishs = $this->getRatingUserOfDishs($dishIDs, $userId);
        $hasRatingOlderThan7Days = false;
        $currentDate = strtotime(date('Y-m-d'));
        $totalRatings = [];
        $averageRating = [];
        $simmilarUser = [];
        foreach ($ratingUserOfDishs as $rating) {
            if($rating['preRatingTime'] == null) continue;
            $daysDifference = floor(($currentDate - strtotime($rating['preRatingTime'])) / (60 * 60 * 24));
            if ($daysDifference >= 7) {
                $hasRatingOlderThan7Days = true;
                break; 
            }
        }
        if(count($ratingUserOfDishs) < count($dishs) || $hasRatingOlderThan7Days){
            $totalRatings = $this->getRating();
            $averageRating = $this->getAverageRating();
            $simmilarUser = [[]];
            $countDish = count($averageRating);
            $countUser = count($totalRatings)/$countDish;
            $ratingMT = [[]];
            $indexUser = -1;
            $userIDs = [];
            $dishIDs = [];
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
            for($i = 0; $i < $countUser; $i++){
                $simmilarUser[$i]['userID'] = $userIDs[$i];
                $simmilarUser[$i]['value'] = $this->cosineSimilarity($ratingMT[$userIDs[$i]], $ratingMT[$userIDs[$indexUser]]);
                $simmilarUser[$i]['different'] = 0;
                $countDif = 0;
                for($j = 0; $j < $countDish; $j++){
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
            if(!$dishs[$i]['isRated']&&count($simmilarUser) > 0){
                for($j = 0; $j < count($simmilarUser); $j++){
                    $preRating = $ratingMT[$simmilarUser[$j]['userID']][$dishs[$i]['dishID']];
                    if($preRating != 0 && $simmilarUser[$j]['different'] != 0){
                        $dishs[$i]['preRating'] = ($preRating+$averageRating[array_search($dishs[$i]['dishID'], array_column($averageRating, 'dishID'))]['avgRating'])/$simmilarUser[$j]['different'];
                        $updateQuery[$countUpdateQueryy++] = ['dishID' => $dishs[$i]['dishID'], 'userID' => $userId, 'predictedRating' => $dishs[$i]['preRating']];
                        break;
                    }
                }
            }
        }
        if($countUpdateQueryy > 0){
            $this->dishModel->updatePredictedRating($updateQuery);
        }
    }

    private function getRating(){
        return $this->dishModel->getRating();
    }

    private function getAverageRating(){
        return $this->dishModel->getAverageRating();
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