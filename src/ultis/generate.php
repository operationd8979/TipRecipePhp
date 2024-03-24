<?php
    function generateCaptcha() {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $captchaLength = 6;
        $captcha = "";
        for ($i = 0; $i < $captchaLength; $i++) {
            $captcha .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $captcha;
    }
?>