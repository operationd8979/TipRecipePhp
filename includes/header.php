<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/main.css">
</head>

<body>

    <header class="bg-gray-800 py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.php" class="text-white text-lg font-semibold flex">
                <img class="h-8 w-8 mr-2" src="./assets/images/logo.png" />TipRecipePhp</a>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="index.php" class="text-white hover:text-gray-300">Home</a></li>
                    <li><a href="register.php" class="text-white hover:text-gray-300">Register</a></li>
                    <li><a href="login.php" class="text-white hover:text-gray-300">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

</body>

</html>