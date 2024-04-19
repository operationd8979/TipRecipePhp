<?php
require_once './src/services/dishService.php';
use PHPUnit\Framework\TestCase;

class testBanner extends TestCase
{

    public function testGetBannerDishsRandom()
    {
        //given
        $userID = 'abcxyz';

        //when
        $dishService = DishService::getInstance();
        $bannerDishs = [];
        $bannerDishs = $dishService->getRecommendDishsByUser($userID);

        $result = empty(array_filter($bannerDishs, function($dish){
            return isset($dish['rating']);
        }));
        
        //then
        $this->assertEquals(true, $result);
        $this->assertEquals(true, count($bannerDishs) == 10);

    }

    public function testGetBannerDishsOfUser()
    {
        //given
        $userID = '66115ee270603588242';

        //when
        $dishService = DishService::getInstance();
        $bannerDishs = [];
        $bannerDishs = $dishService->getRecommendDishsByUser($userID);
        $result = empty(array_filter($bannerDishs, function($dish){
            return isset($dish['rating']);
        }));
        
        //then
        $this->assertEquals(false, $result);
        $this->assertEquals(true, count($bannerDishs) == 10);
    }


}

?>