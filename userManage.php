<?php
require_once('src/helpers/jwtFilter.php');
doFilterInternal();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Manage</title>
</head>

<body>
    <?php require_once('includes/header.php'); ?>
    <div class="flex h-screen bg-gray-100 font-sans">
        <aside class="bg-gray-800 text-gray-400 w-64">
            <div class="flex items-center justify-center h-16 border-b border-gray-700">
                <span class="text-2xl font-bold uppercase">Admin</span>
            </div>
            <nav class="mt-4">
                <ul>
                    <li><a href="admin.php" class="block p-4 hover:bg-gray-700">Dashboard</a></li>
                    <li><a href="dishManage.php" class="block p-4 hover:bg-gray-700">Dishes manage</a></li>
                    <li><a href="userManage.php" class="block p-4 hover:bg-gray-700">User manage</a></li>
                </ul>
            </nav>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 bg-white p-8">
            <h1 class="text-3xl font-bold mb-8">User</h1>
            <!-- Content goes here -->
        </main>
    </div>
    <?php require_once('includes/footer.php'); ?>
</body>

</html>