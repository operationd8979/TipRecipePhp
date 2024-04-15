<?php
require_once './src/services/dishService.php';
use PHPUnit\Framework\TestCase;

class testQuickView extends TestCase
{

    public function testUnvalidDishID()
    {
        //given
        $dishID = 'abcxyz';

        //when
        $dishService = DishService::getInstance();
        $dish = null;
        $dish = $dishService->getDetailDishById($dishID);
        
        //then
        $this->assertEquals(true, $dish == null);
    }
    
    public function testValidDishID()
    {
        //given
        $dishID = '32df3g4df6df3gdf34';

        //when
        $dishService = DishService::getInstance();
        $dish = null;
        $dish = $dishService->getDetailDishById($dishID);
        
        //then
        $this->assertEquals(true, $dish['dishID'] == $dishID);
    }



}

?>