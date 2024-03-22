<?php
session_start();

function generateCaptcha() {
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $captchaLength = 6;
    $captcha = "";
    for ($i = 0; $i < $captchaLength; $i++) {
        $captcha .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    $_SESSION['captcha'] = $captcha; // Lưu giá trị CAPTCHA vào session
    return $captcha;
}

if (!isset($_SESSION['captcha']) || isset($_GET['refresh'])) {
    $captcha = generateCaptcha();
} else {
    $captcha = $_SESSION['captcha'];
}

$font = 5;
$width = ImageFontWidth($font) * strlen($captcha);
$height = ImageFontHeight($font);
$image = imagecreate($width, $height);
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
imagestring($image, $font, 0, 0, $captcha, $black);
imagejpeg($image);
imagedestroy($image);
header('Content-type: image/jpeg');
?>