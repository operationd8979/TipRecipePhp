<?php

require_once('src/ultis/autoRoute.php');
if(!checkAlreadyLoggedIn()){
    header('Location: login.php');
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
            <p class="text-gray-600 mb-2"><strong>Name:</strong> John Doe</p>
            <p class="text-gray-600 mb-2"><strong>Email:</strong> john@example.com</p>
            <p class="text-gray-600 mb-2"><strong>Phone:</strong> 123-456-7890</p>
        </div>
        
        <!-- Update Profile -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Update Profile</h2>
            <form action="update_profile.php" method="POST">
                <div class="mb-4">
                    <label for="name" class="block text-gray-600 mb-2">Name:</label>
                    <input type="text" id="name" name="name" class="border border-gray-300 rounded px-4 py-2 w-full" value="John Doe">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 mb-2">Email:</label>
                    <input type="email" id="email" name="email" class="border border-gray-300 rounded px-4 py-2 w-full" value="john@example.com">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-gray-600 mb-2">Phone:</label>
                    <input type="text" id="phone" name="phone" class="border border-gray-300 rounded px-4 py-2 w-full" value="123-456-7890">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Update</button>
            </form>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>