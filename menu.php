<?php
require_once './src/controllers/menuController.php';
$error = "";
$menuController = new MenuController();
// $menuController->invoke($error,$menu);
// if($user == null){
//     header('Location: logout.php');
//     exit;
// }
$menuID = $menu['menuID'];
$menuName = $menu['menuName'];
$totalMenuCalo = $menu['totalCalo'];
$userID = $menu['userID'];
$createdAt = $user['created_at'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Menu</title>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Create new menu</h1>



        <!-- Update Profile -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-10">
            <h2 class="text-xl font-semibold mb-4">Create menu</h2>
            <p class="text-red-500 text-sm mb-4"><?php echo $error; ?></p>
            <form action="" method="POST">
                <div class="mb-4">
                    <label for="username" class="block text-gray-600 mb-2">Tên thực đơn:</label>
                    <input type="text" id="username" name="username" placeholder="Menu name"
                        class="border border-gray-300 rounded px-4 py-2 w-full">
                </div>
                <div class="mb-4">
                    <label for="menuType" class="block text-gray-600 mb-2">Thể loại:</label>
                    <div class="relative">
                        <input type="text" id="menuTypeName" name="menuTypeName" placeholder="Menu type"
                            class="border border-gray-300 rounded px-4 py-2 w-full">
                        <button id="toggleButton" class="">
                            <img src="./assets/images/icons/unfold.png" alt="">
                        </button>
                        <ul>
                            <li class="border border-gray-300 rounded px-4 py-2 w-full">bffgfg</li>
                        </ul>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 mb-2">Buổi sáng:</label>
                    <label for="email" class="block text-gray-600 mb-2">Món 1:</label>
                    <label for="email" class="block text-gray-600 mb-2">Món 2:</label>
                    <label for="email" class="block text-gray-600 mb-2">Món 3:</label>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-600 mb-2">Buổi trưa:</label>
                    <input type="password" id="password" name="password"
                        class="border border-gray-300 rounded px-4 py-2 w-full">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-600 mb-2">Buổi tối:</label>
                    <input type="password" id="password" name="password"
                        class="border border-gray-300 rounded px-4 py-2 w-full">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Update</button>
            </form>
        </div>

        <!-- View Profile -->
        <div class="bg-white rounded-lg shadow-md mb-6 p-6">
            <h2 class="text-xl font-semibold mb-4">Xem trước</h2>
            <p class="text-gray-600 mb-2"><strong>Menu name:</strong> <?php echo($menuname) ?></p>
            <p class="text-gray-600 mb-2"><strong>Calo:</strong> <?php echo($menucalo) ?></p>
            <p class="text-gray-600 mb-2"><strong>Created At:</strong> <?php echo($createdAt) ?></p>
            <p class="text-gray-600 mb-2"><strong>Updated At:</strong> <?php echo($updatedAt) ?></p>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>

</html>