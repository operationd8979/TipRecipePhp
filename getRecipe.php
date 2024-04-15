<?php
require_once "./src/controllers/homeController.php";
$homeController = new HomeController();
$homeController->invokeGetRecipe();
?>