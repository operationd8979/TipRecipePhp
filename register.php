<?php
require_once("./src/controllers/registerController.php");
$error = "";
$registerController = new RegisterController();
$registerController->invoke($error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">

    <?php include('includes/header.php'); ?>

    <div class="container mx-auto mt-8 max-w-md">
        <div class="bg-white shadow-md rounded px-8 py-8">
            <h2 class="text-2xl mb-6 font-semibold">Register</h2>
            <p class="text-red-500 text-sm mb-4"><?php echo $error; ?></p>
            <form action="" method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="operationddd@gmail.com"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="username"
                        class="block text-gray-700 text-sm font-bold mb-2">Username(Displayname)</label>
                    <input type="text" id="username" name="username" value="operationddd"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" value="12345678"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="confirmPassword"
                        class="block text-gray-700 text-sm font-bold mb-2">Retype_Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" value="12345678"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4 flex items-center">
                    <input type="text" id="captcha" name="captcha"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Enter Captcha">
                    <img src="captcha.php" alt="CAPTCHA" class="ml-4" onclick="this.src='captcha.php?refresh=1'">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Register</button>
                    <a href="login.php" class="text-blue-500 hover:text-blue-800 text-sm">Login in?</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include('includes/footer.php'); ?>

</body>

</html>