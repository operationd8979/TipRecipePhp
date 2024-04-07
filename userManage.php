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
    <div class="flex bg-gray-100 font-sans">
        <?php require_once('includes/sideAdmin.php'); ?>
        <!-- Main Content -->
        <main class="flex-1 bg-white p-8">
            <h1 class="text-3xl font-bold mb-8">User</h1>
            <!-- Content goes here -->
        </main>
    </div>
    <?php require_once('includes/footer.php'); ?>
</body>

</html>