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
    <title>TipRecipePhp</title>
</head>

<body>
    <?php include('includes/header.php'); ?>
 
    <main class="container mx-auto py-8">
        <div class="lg:grid lg:grid-cols-3 lg:gap-8">
            <!-- Sidebar -->
            <aside class="lg:col-span-1 lg:bg-white lg:p-4 lg:shadow-md">
                <h2 class="text-lg font-semibold mb-4">Ingredients</h2>
                <!-- Search by Ingredient -->
                <form action="" method="GET">
                    <div class="mb-4">
                        <label for="ingredient" class="block text-gray-600 py-1">Filter by Ingredients:</label>
                        <div>
                            <select name="ingredient" id="ingredient" class="border border-gray-300 rounded px-4 py-2">
                                <option value="">Select Ingredient</option>
                                <option value="ingredient1"> Trứng</option>
                                <option value="ingredient2"> Hành</option>
                                <option value="ingredient3"> Tỏi</option>
                            </select>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add</button>
                        </div>
                    </div>
                </form>
            </aside>

            <!-- Main Content Area -->
            <section class="lg:col-span-2 lg:bg-white lg:p-4 lg:shadow-md">
                <h2 class="text-lg font-semibold mb-4">Recipes</h2>
                <!-- Recipe List -->
                <ul>
                    <li class="mb-4">
                        <h3 class="text-xl font-semibold">Sườn xào chua ngọt</h3>
                        <div class="flex">
                            <img src="https://via.placeholder.com/150" alt="Recipe 1" class="w-32 h-32 object-cover rounded-lg">
                            <div class="ml-2">
                                <p class="text-gray-600">Description: Món ăn siêu ngon cho đại gia đình.</p>
                                <p class="text-gray-600">Ingredients: sườn, cải chua,...</p>
                                <a href="recipe.php?id=1" class="text-blue-500 hover:underline">View Recipe</a>
                            </div>
                        </div>
                    </li>
                    <!-- Repeat for other recipes -->
                </ul>
            </section>
        </div>
    </main>
    <?php include('includes/footer.php'); ?>
</body>

</html>