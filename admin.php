<?php
require_once('src/ultis/checkState.php');
require_once('src/controllers/useIndex.php');
require_once('src/helpers/jwtFilter.php');
if(!checkAlreadyLoggedIn()){
    header('Location: login.php');
    exit;
}
if(doFilterInternal()["role"] != "ADMIN"){
    header('Location: logout.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <?php require_once('includes/header.php'); ?>
    <h1>Welcome to admin page</h1>
    <?php require_once('includes/footer.php'); ?>
</body>

</html>