<?php
require_once('./src/helpers/jwtFilter.php');
doFilterInternal();
?>
<?php
require_once './src/models/user.php';
require_once './src/database/database.php';
require_once './src/helpers/jwtHelper.php';
require_once './src/controllers/useProfile.php';

$user = getUserInfo();
if($user == null){
    header('Location: logout.php');
    exit;
}
$userID = $user['userID'];
$email = $user['email'];
$username = $user['username'];
$createdAt = $user['created_at'];
$updatedAt = $user['updated_at'];
$role = $user['role'];

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($_POST['username'] != "" ){
        $username = htmlspecialchars(strip_tags($_POST['username']));
    }
    if($_POST['email'] != "" ){
        $email = htmlspecialchars(strip_tags($_POST['email']));
    }
    $password = htmlspecialchars(strip_tags($_POST['password']));
    updateUser($username, $email, $password, $error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">User Profile</h1>

        <!-- View Profile -->
        <div class="bg-white rounded-lg shadow-md mb-6 p-6">
            <h2 class="text-xl font-semibold mb-4">Your Card</h2>
            <p class="text-gray-600 mb-2"><strong>Name:</strong> <?php echo($username) ?></p>
            <p class="text-gray-600 mb-2"><strong>Email:</strong> <?php echo($email) ?></p>
            <!-- <p class="text-gray-600 mb-2"><strong>Phone:</strong> 123-456-7890</p> -->
            <p class="text-gray-600 mb-2"><strong>Created At:</strong> <?php echo($createdAt) ?></p>
            <p class="text-gray-600 mb-2"><strong>Updated At:</strong> <?php echo($updatedAt) ?></p>
            <p class="text-gray-600 mb-2"><strong>Role:</strong> <?php echo($role) ?></p>
        </div>

        <!-- Update Profile -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-10">
            <h2 class="text-xl font-semibold mb-4">Update Profile</h2>
            <p class="text-red-500 text-sm mb-4"><?php echo $error; ?></p>
            <form action="" method="POST">
                <div class="mb-4">
                    <label for="username" class="block text-gray-600 mb-2">Username:</label>
                    <input type="text" id="username" name="username"
                        class="border border-gray-300 rounded px-4 py-2 w-full" value=<?php echo($username) ?>>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 mb-2">Email:</label>
                    <input type="email" id="email" name="email" class="border border-gray-300 rounded px-4 py-2 w-full"
                        value=<?php echo($email) ?>>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-600 mb-2">password:</label>
                    <input type="password" id="password" name="password"
                        class="border border-gray-300 rounded px-4 py-2 w-full">
                </div>
                <!-- <div class="mb-4">
                    <label for="phone" class="block text-gray-600 mb-2">Phone:</label>
                    <input type="text" id="phone" name="phone" class="border border-gray-300 rounded px-4 py-2 w-full"
                        value="123-456-7890">
                </div> -->
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Update</button>
            </form>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>

</html>