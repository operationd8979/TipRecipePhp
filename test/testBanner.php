<?php
require_once './src/services/dishService.php';
use PHPUnit\Framework\TestCase;

class testBanner extends TestCase
{

    public function testGetBannerDishs()
    {
        //given
        $userID = '66115ee270603588242';

        //when
        $dishService = DishService::getInstance();
        $bannerDishs = [];
        $bannerDishs = $dishService->getRecommendDishsByUser($userID);
        
        //then
        $this->assertEquals(true, count($bannerDishs) == 10);
    }


}

?>