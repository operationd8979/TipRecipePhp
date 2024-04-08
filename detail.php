<?php
    require_once('./src/controllers/homeController.php');
    $dish = null;
    $homeController = new HomeController();
    $homeController->invokeDetail($dish);
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
    <div class="lg:col-span-1 lg:bg-white lg:p-4 lg:shadow-md">
        <h2 class="text-lg font-semibold mb-4">Recipe</h2>
        <hr>
        <div class="flex justify-center">
            <div class="mr-40">
                <h3 id="dish-name" class="text-xl font-semibold"><?php echo($dish['dishName']) ?></h3>
                <div class="flex">
                    <img id="dish-url" src="<?php echo($dish['url']) ?>" alt=""
                        class="w-64 h-64 object-cover rounded-lg">
                </div>
                <p id="dish-description" class="text-gray-600 font-semibold"><?php echo($dish['summary']) ?></p>
                <p id="dish-types" class="text-gray-600">
                    <?php
                    $arry = explode(',', $dish['types']);
                    for($i = 0; $i < count($arry); $i++){
                        echo('<span class="inline-block bg-red-200 text-gray-700 rounded-full px-2 py-0.3 mr-1 text-sm font-semibold">'.$arry[$i].'</span>');
                    }
                    ?>
                </p>
                <p class="text-gray-600">Ingredients: </p>
                <ul id="dish-ingredients" class="list-disc ml-4">
                    <?php
                        $arry = explode(',', $dish['ingredients']);
                        for($i = 0; $i < count($arry); $i++){
                            $arr = explode('@', $arry[$i]);
                            echo('<li>'.$arr[0].': '.$arr[1].' '.$arr[2].'</li>');
                        }
                        ?>
                </ul>
            </div>
            <div>
                <div id="dish-content" class="mt-4">
                    <h1 class="text-2xl font-bold mb-4">Step by step</h1>
                    <?php echo($dish['content']) ?>
                </div>
                <div class="mt-4">
                    <h1 class="text-2xl font-bold mb-4">Rating this recipe</h1>
                    <form id="ratingForm" class="space-y-4" method="get">
                        <p>Your rating before: <span id="ratingValue"><?php echo($dish['rating']) ?></span></p>
                        <input type="hidden" id="id" name="id" value="<?php echo($dish['dishID']) ?>">
                        <div class="flex items-center">
                            <label for="rating" class="mr-2">Rating score:</label>
                            <input type="number" id="rating" name="rating" min="0" max="10" step="0.1"
                                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
                        </div>
                        <!-- <div class="flex items-center">
                            <label for="comment" class="mr-2">Nhận xét:</label>
                            <textarea id="comment" name="comment"
                                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500"></textarea>
                        </div> -->
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Send
                            Rating</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>