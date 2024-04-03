<?php
session_start();
setcookie('jwt', null, time()-3600, '/');
session_destroy();
header('Location: login.php');
?>