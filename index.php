<?php
    require_once('src/ultis/checkState.php');
    if(!checkAlreadyLoggedIn()){
        header('Location: login.php');
        exit;
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

        <div class="flex justify-center">
            <div class="">
                <input type="text"
                    class="border border-gray-300 rounded-md px-4 py-2 pr-10 focus:outline-none focus:border-blue-500"
                    placeholder="Search...">
                <button
                    class="px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">Search</button>
            </div>
        </div>

        <div class="lg:grid lg:grid-cols-3 lg:gap-8 mr-4 ml-4">
            <!-- Sidebar -->
            <aside class="lg:col-span-1 lg:bg-white lg:p-4 lg:shadow-md">
                <h2 class="text-lg font-semibold mt-10 mb-4">Ingredients/Type tag</h2>
                <!-- Search by Ingredient & type -->
                <p class="font-thin text-blue-600/100" id="hintTag"></p>
                <div class="flex flex-wrap">
                    <textarea id="tagInput"
                        class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500 w-full"
                        placeholder="Enter tags..."></textarea>
                </div>

                <!-- <h2 class="text-lg font-semibold mt-10 mb-4">Ingredients</h2>
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
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add</button>
                        </div>
                    </div>
                </form> -->
            </aside>

            <!-- Main Content Area -->
            <section class="lg:col-span-2 lg:bg-white lg:p-4 lg:shadow-md">
                <h2 class="text-lg font-semibold mb-4">Recipes</h2>
                <!-- Recipe List -->
                <ul>
                    <li class="mb-4">
                        <h3 class="text-xl font-semibold">Sườn xào chua ngọt</h3>
                        <div class="flex">
                            <img src="https://via.placeholder.com/150" alt="Recipe 1"
                                class="w-32 h-32 object-cover rounded-lg">
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

    <script>
    // const tagInput = document.getElementById('tagInput');
    // tagInput.addEventListener('keyup', function (event) {
    //     if (event.key === 'Enter') {
    //         const tag = tagInput.value;
    //         console.log(tag);
    //         tagInput.value = '';
    //     }
    // });

    const suggestions = ["HTML", "HTT", "CSS", "JavaScript", "Python", "PHP", "Java", "React", "Angular", "Vue.js"];

    const tagInput = document.getElementById('tagInput');
    tagInput.addEventListener('input', function() {
        if (this.value.trim() === '') {
            document.getElementById('hintTag').textContent = '';
            return;
        }
        const tags = this.value.split(',').map(tag => tag.trim());
        const lastTag = tags[tags.length - 1];
        const suggestedTags = suggestions.filter(suggestion => suggestion.toLowerCase()
            .includes(lastTag.toLowerCase()));
        let stringHint = '';
        suggestedTags.forEach(suggestedTag => {
            stringHint += `${suggestedTag}, `;
        });
        document.getElementById('hintTag').textContent = stringHint;
    });
    tagInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' && this.value.trim() !== '') {
            event.preventDefault();
            let tags = this.value.split(',').map(tag => tag.trim());
            const lastTag = tags[tags.length - 1];
            const suggestedTags = suggestions.filter(suggestion => suggestion.toLowerCase()
                .includes(lastTag.toLowerCase()));
            const index = this.value.lastIndexOf(lastTag);
            if (suggestedTags.length == 1 && !tags.includes(suggestedTags[0])) {
                this.value = this.value.substring(0, index) + suggestedTags[0] + ", ";
            }
        }
        if (event.key === ',' && this.value.trim() !== '') {
            event.preventDefault();
            let tags = this.value.split(',').map(tag => tag.trim());
            const lastTag = tags[tags.length - 1];
            const suggestedTags = suggestions.filter(suggestion => suggestion.toLowerCase()
                .includes(lastTag.toLowerCase()));
            if (suggestedTags.length === 1) {
                this.value = this.value + ', ';
            }
        }
        if (event.key === 'Backspace' && this.value.trim() !== '') {
            const tags = this.value.split(',').map(tag => tag.trim());
            const lastTag = tags[tags.length - 1];
            if (suggestions.includes(lastTag)) {
                event.preventDefault();
                tags.pop();
                let stringValue = "";
                tags.forEach(tag => {
                    stringValue += tag + ', ';
                });
                this.value = stringValue;
            }
        }
    });
    </script>
</body>

</html>