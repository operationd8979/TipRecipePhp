<?php
    require_once('./src/controllers/homeController.php');

    $dish = null;
    $homeController = new HomeController();
    $homeController->invokeDetail($dish);
    echo(json_encode($dish));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <h3>Detail</h3>
    <?php include 'includes/footer.php'; ?>
</body>

</html>