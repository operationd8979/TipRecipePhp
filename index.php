<?php
    require_once('src/controllers/useIndex.php');
    require_once('src/helpers/jwtFilter.php');
    doFilterInternal();
    
    $ingredients = [];
    getDataIngredient($ingredients);
    $types = [];
    getDataType($types);
    $disks = [];

    $recipes = [];
    //http://localhost/tipRecipesPhp/index.php?search=la&ingredients=h%C3%A0nh+l%C3%A1%2Cg%E1%BA%A1o%2Cg%E1%BA%A1o+n%E1%BA%BFp&types=m%C3%B3n+H%C3%A0n%2Cm%C3%B3n+Trung
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $search = $_GET['search'] ?? '';
        $filterIngredientsByName = [];
        $filterTypesByName = [];
        $filterIngredients = [];
        $filterTypes = [];
        if(isset($_GET['ingredients'])){
            $filterIngredientsByName = explode(',', $_GET['ingredients']);
            for($i = 0; $i < count($filterIngredientsByName); $i++){
                $filterIngredients[$i] = $ingredients[array_search($filterIngredientsByName[$i], array_column($ingredients, 'ingredientName'))]['ingredientID'];
            }
        }
        if(isset($_GET['types'])){
            $filterTypesByName = explode(',', $_GET['types']);
            for($i = 0; $i < count($filterTypesByName); $i++){
                $filterTypes[$i] = $types[array_search($filterTypesByName[$i], array_column($types, 'typeName'))]['typeID'];
            }
        }
        getDisks($recipes, $search, $filterIngredients, $filterTypes);
        // echo(count($recipes));
        // print_r($recipes);
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
                <input type="text" id="search"
                    onKeyDown="if(event.key === 'Enter') {event.preventDefault(); callApiSearch();}"
                    class="border border-gray-300 rounded-md px-4 py-2 pr-10 focus:outline-none focus:border-blue-500"
                    placeholder="Search...">
                <button onClick="callApiSearch()"
                    class="px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">Search</button>
            </div>
        </div>

        <div class="lg:grid lg:grid-cols-3 lg:gap-8 mr-4 ml-4">
            <!-- Sidebar -->
            <aside class="lg:col-span-1 lg:bg-white lg:p-4 lg:shadow-md">
                <h2 class="text-lg font-semibold">Ingredients/Type tag</h2>
                <!-- Search by Ingredient & type -->
                <div class="h-6">
                    <p class="font-thin text-blue-600/100 truncate line-clamp-1" id="hintTag"></p>
                </div>
                <div class="flex flex-wrap">
                    <textarea id="tagInput"
                        class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500 w-full"
                        placeholder="Enter tags..."></textarea>
                </div>
                <!-- tags  -->
                <h2 class="text-lg font-semibold mt-4">Ingredients filter</h2>
                <div class="flex flex-wrap gap-2" id="ingredients"></div>
                <h2 class="text-lg font-semibold mt-4">Type filter</h2>
                <div class="flex flex-wrap gap-2" id="types"></div>
            </aside>

            <!-- Main Content Area -->
            <section class="lg:col-span-2 lg:bg-white lg:p-4 lg:shadow-md">
                <h2 class="text-lg font-semibold mb-4">Recipes</h2>
                <!-- Recipe List -->
                <ul>
                    <!-- <li class="mb-4">
                        <h3 class="text-xl font-semibold">Sườn xào chua ngọt</h3>
                        <div class="flex">
                            <img src="https://via.placeholder.com/150" alt="Recipe 1"
                                class="w-32 h-32 object-cover rounded-lg">
                            <div class="ml-2">
                                <p class="text-gray-600">Description: Món ăn siêu ngon cho đại gia đình.</p>
                                <p class="text-gray-600">Ingredients:
                                    <span
                                        class="inline-block bg-gray-200 text-gray-700 rounded-full px-3 py-0.5 text-sm font-semibold">hành
                                        lá</span>
                                    <span
                                        class="inline-block bg-gray-200 text-gray-700 rounded-full px-3 py-0.5 text-sm font-semibold">gà</span>
                                </p>
                                <p class="text-gray-600">Types:
                                    <span
                                        class="inline-block bg-red-200 text-gray-700 rounded-full px-3 py-0.5 text-sm font-semibold">món
                                        hàn</span>
                                    <span
                                        class="inline-block bg-red-200 text-gray-700 rounded-full px-3 py-0.5 text-sm font-semibold">ăn
                                        kiêng</span>
                                </p>
                                <a href="recipe.php?id=1" class="text-blue-500 hover:underline">View Recipe</a>
                            </div>
                        </div>
                    </li> -->
                    <!-- Repeat for other recipes -->
                    <?php renderRecipce($recipes); ?>
                </ul>
            </section>
        </div>
    </main>
    <?php include('includes/footer.php'); ?>

    <script>
    const ingredients = <?php echo json_encode($ingredients); ?>.map(ingredient => ingredient.ingredientName);
    const types = <?php echo json_encode($types); ?>.map(type => type.typeName);
    const filterIngredients = [];
    const filterTypes = [];
    let currentCursorPosition = 0;

    const tagInput = document.getElementById('tagInput');
    tagInput.addEventListener('input', function() {
        if (this.value.trim() === '') {
            document.getElementById('hintTag').textContent = '';
            return;
        }
        const tags = this.value.split(',').map(tag => tag.trim());
        const lastTag = tags[tags.length - 1];
        const suggestedTags = [
            ...ingredients.filter(ingredient => ingredient.toLowerCase()
                .includes(lastTag.toLowerCase())),
            ...types.filter(type => type.toLowerCase()
                .includes(lastTag.toLowerCase()))
        ];
        let stringHint = '';
        suggestedTags.forEach(suggestedTag => {
            stringHint += `${suggestedTag}, `;
        });
        document.getElementById('hintTag').textContent = stringHint;
    });
    tagInput.addEventListener('mousedown', function(event) {
        if (event.button === 0) {
            currentCursorPosition = tagInput.selectionStart;
        }
    });
    tagInput.addEventListener('click', function(event) {
        tagInput.selectionStart = currentCursorPosition;
    });
    tagInput.addEventListener('keydown', function(event) {
        if (event.key === 'ArrowUp' || event.key === 'ArrowDown' || event.key === 'ArrowLeft' || event
            .key ===
            'ArrowRight' || event.key === 'a' && (event.ctrlKey || event.metaKey)) {
            event.preventDefault();
        }
        if (event.key === 'Enter') {
            event.preventDefault();
            if (this.value.trim() !== '') {
                let tags = this.value.split(',').map(tag => tag.trim());
                const lastTag = tags[tags.length - 1];
                const suggestedTags = [
                    ...ingredients.filter(ingredient => ingredient.toLowerCase()
                        .includes(lastTag.toLowerCase())),
                    ...types.filter(type => type.toLowerCase()
                        .includes(lastTag.toLowerCase()))
                ];
                if (suggestedTags.length === 1 && !tags.slice(0, tags.length - 1).includes(suggestedTags[0])) {
                    const index = this.value.lastIndexOf(lastTag);
                    this.value = this.value.substring(0, index) + suggestedTags[0] + ", ";
                    document.getElementById('hintTag').textContent = "";
                    renderTag(suggestedTags[0]);
                }
            }
        }
        if (event.key === ',' && this.value.trim() !== '') {
            event.preventDefault();
            let tags = this.value.split(',').map(tag => tag.trim());
            const lastTag = tags[tags.length - 1];
            const suggestedTags = [
                ...ingredients.filter(ingredient => ingredient.toLowerCase() ===
                    (lastTag.toLowerCase())),
                ...types.filter(type => type.toLowerCase() ===
                    (lastTag.toLowerCase()))
            ];
            if (suggestedTags.length !== 0 && !tags.slice(0, tags.length - 1).includes(suggestedTags[0])) {
                this.value = this.value.trim() + ', ';
                renderTag(suggestedTags[0]);
            }
        }
        if (event.key === 'Backspace' && this.value.trim() !== '') {
            const tags = this.value.split(',').map(tag => tag.trim());
            const lastTag = tags[tags.length - 1];
            const suggestions = [...ingredients, ...types];
            if (suggestions.includes(lastTag)) {
                if (tags.slice(0, tags.length - 1).includes(lastTag)) {
                    return;
                }
                event.preventDefault();
                const aimGuy = tags.pop();
                this.value = this.value.substring(0, this.value.length - aimGuy.length);
                deleteTag(aimGuy);
            }
        }
    });

    function renderTag(value) {
        if (ingredients.includes(value)) {
            document.getElementById('ingredients').innerHTML +=
                `<span class="inline-block bg-gray-200 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold">${value}</span>`;
            filterIngredients.push(value);
        } else {
            document.getElementById('types').innerHTML +=
                `<span class="inline-block bg-red-200 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold">${value}</span>`;
            filterTypes.push(value);
        }
    }

    function deleteTag(value) {
        if (ingredients.includes(value) && filterIngredients.includes(value)) {
            document.getElementById('ingredients').innerHTML = document.getElementById('ingredients')
                .innerHTML.replace(
                    `<span class="inline-block bg-gray-200 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold">${value}</span>`,
                    '');
            filterIngredients.splice(filterIngredients.indexOf(value), 1);
        } else if (types.includes(value) && filterTypes.includes(value)) {
            document.getElementById('types').innerHTML = document.getElementById('types').innerHTML
                .replace(
                    `<span class="inline-block bg-red-200 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold">${value}</span>`,
                    '');
            filterTypes.splice(filterTypes.indexOf(value), 1);
        }
    }

    function callApiSearch() {
        const search = document.getElementById('search').value;
        const url = new URL(window.location.href.split('?')[0]);
        url.searchParams.set('search', search);
        if (filterIngredients.length !== 0) {
            url.searchParams.set('ingredients', filterIngredients);
        }
        if (filterTypes.length !== 0) {
            url.searchParams.set('types', filterTypes);
        }
        window.location.href = url.href;
    }
    </script>
</body>

</html>