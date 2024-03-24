<?php

setcookie('jwt', null, time()-3600, '/');
header('Location: ../../login.php');

?>