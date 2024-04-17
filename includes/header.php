<?php
require_once('src/helpers/jwtFilter.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}    
$role = $_SESSION['role']??null;
if(!$role){
    $user = doFilterInternal();
    if($user){
        $role = $user['role'];
        $_SESSION['role'] = $role;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <script src="./assets/css/3.4.3"></script>
    <link rel="stylesheet" href="./assets/css/main.css">
</head>

<body>

    <header class="bg-gray-800 py-4 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="index.php" class="text-white text-lg font-semibold flex ml-4">
                <img class="h-8 w-8 mr-2" src="./assets/images/logo.png" />TipRecipePhp</a>
            <nav class="mr-4">
                <ul class="flex space-x-4">
                    <?php if ($role) : ?>
                    <?php if ($role == "ADMIN") : ?>
                    <li><a href="admin.php" class="text-white hover:text-gray-300">Admin</a></li>
                    <?php endif; ?>
                    <li><a href="menu.php" class="text-white hover:text-gray-300">Menu</a></li>
                    <li><a href="profile.php" class="text-white hover:text-gray-300">Profile</a></li>
                    <li><a href="logout.php" class="text-white hover:text-gray-300">Logout</a></li>
                    <?php else : ?>
                    <li><a href="register.php" class="text-white hover:text-gray-300">Register</a></li>
                    <li><a href="login.php" class="text-white hover:text-gray-300">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

</body>

</html>