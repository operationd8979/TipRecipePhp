<?php

    function checkAlreadyLoggedIn(){
        if (!isset($_COOKIE['jwt'])) {
            return false;
        }
        return true;
    }

?>