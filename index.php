<?php
    if (!isset($_COOKIE['access_token'])) {
        header("Location: login.php");
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TipRecipePhp</title>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <h1 class="text-3xl font-bold underline"> Hello world! </h1>
    <?php include('includes/footer.php'); ?>
</body>

</html>