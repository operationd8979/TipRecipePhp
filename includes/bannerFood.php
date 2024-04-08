<?php
require_once 'src/controllers/homeController.php';
$homeController = new HomeController();
$bannerDishs = [];
$homeController->invokeBanner($bannerDishs);
function renderBannerDishs($bannerDishs){
    foreach($bannerDishs as $dish){
        echo '<div class="slide mr-2">';
        echo '<a href="detail.php?id='.$dish['dishID'].'" class="flex-row-reverse">';
        echo '<img src="'.$dish['url'].'" alt="Slide 1" class="rounded-xl" onload="imageLoaded()">';
        echo '</a>';
        echo '</div>';
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sliding banner</title>
    <style>
    .content {
        opacity: 0;
    }

    .slide {
        animation: slide 10s infinite;
        opacity: 0;
        transition: opacity 1s;
    }

    @keyframes slide {
        0% {
            opacity: 0;
            transform: translateX(-100%);
        }

        10% {
            opacity: 1;
        }

        90% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            transform: translateX(100%);
        }
    }
    </style>
</head>

<body>
    <div class="relative overflow-hidden bg-white-100 p-2 content" style="content: 0">
        <div class="flex">
            <?php renderBannerDishs($bannerDishs); ?>
        </div>
    </div>
    <script>
    function imageLoaded() {
        var images = document.querySelectorAll('img');
        var allLoaded = true;
        for (var i = 0; i < images.length; i++) {
            if (!images[i].complete) {
                allLoaded = false;
                break;
            }
        }
        if (allLoaded) {
            document.querySelector('.content').style.opacity = '1';
        }
    }
    imageLoaded();
    </script>
</body>

</html>