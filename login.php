<?php
require_once("./src/controllers/loginController.php");
$error = "";
$loginController = new LoginController();
$loginController->invoke($error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body class="bg-gray-200">

    <?php include('includes/header.php'); ?>

    <div class="container mx-auto mt-8 max-w-md">
        <div class="bg-white shadow-md rounded px-8 py-8">
            <h2 class="text-2xl mb-6 font-semibold">Login</h2>
            <p class="text-red-500 text-sm mb-4"><?php echo $error; ?></p>
            <form action="" method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="operationddd@gmail.com"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" value="12345678"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4 flex items-center justify-between">
                    <div class="captcha">
                        <img src="captcha.php" alt="Captcha" onclick="this.src='captcha.php?refresh=1'">
                    </div>
                    <input type="text" id="captcha" name="captcha" value=<?php  if (session_status() == PHP_SESSION_NONE) session_start(); echo $_SESSION['captcha']??"abc"; ?>
                        class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Enter Captcha">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sign
                        In</button>
                    <a href="register.php" class="text-blue-500 hover:text-blue-800 text-sm">Sign up?</a>
                </div>
            </form>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

</body>

</html>