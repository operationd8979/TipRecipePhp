<?php
    require_once('./src/controllers/homeController.php');
    $itemsPerPage = 4;
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($currentPage - 1) * $itemsPerPage;
    $ingredients = [];
    $types = [];
    $dishs = [];
    $tempDish = null;
    $homeController = new HomeController();
    $homeController->invoke($dishs, $ingredients, $types, $itemsPerPage, $offset, $tempDish);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TipRecipePhp</title>
</head>


<body class="">
    <?php include('includes/header.php'); ?>
    <div class="mb-8">
        <div class="flex justify-center">
            <img src="./assets/images/banner.png" alt="banner" class="w-full h-auto">
        </div>
        <?php include('includes/bannerFood.php'); ?>
        <main class="container mx-auto pb-8">
            <div class="lg:grid lg:grid-cols-3 lg:gap-8 mr-4 ml-4">
                <aside class="lg:col-span-1 lg:bg-white lg:p-4 lg:shadow-md">
                    <h2 class="text-lg font-semibold mb-4">Filter</h2>
                    <hr>
                    <div class="flex justify-center mt-4 mb-8">
                        <div>
                            <input type="text" id="search"
                                onKeyDown="if(event.key === 'Enter') {event.preventDefault(); callApiSearch();}"
                                class="border border-gray-300 rounded-md px-4 py-2 pr-10 focus:outline-none focus:border-blue-500"
                                placeholder="Search... by dish's name">
                            <button onClick="callApiSearch()"
                                class="px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">Search</button>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold">Ingredients/Type tag</h2>
                        <div class="h-6">
                            <p class="font-thin text-blue-600/100 truncate line-clamp-1" id="hintTag"></p>
                        </div>
                        <div class="flex flex-wrap">
                            <textarea id="tagInput"
                                class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500 w-full"
                                placeholder="Enter tags..."></textarea>
                        </div>
                        <h2 class="text-lg font-semibold mt-4">Ingredients filter</h2>
                        <div class="flex flex-wrap gap-2" id="ingredients"></div>
                        <h2 class="text-lg font-semibold mt-4">Type filter</h2>
                        <div class="flex flex-wrap gap-2 mb-4" id="types"></div>
                    </div>
                </aside>
                <section class="lg:col-span-1 lg:bg-white lg:p-4 lg:shadow-md">
                    <div class="flex justify-between">
                        <h2 class="text-lg font-semibold mb-4">Dishs</h2>
                        <div class="flex">
                            <?php if($currentPage > 1) { ?>
                            <a href="javascript:void(0)" onClick="changePage('back')"
                                class="mr-2 text-blue-500 hover:text-blue-800">back</a>
                            <?php } ?>
                            <?php if(count($dishs) === $itemsPerPage) { ?>
                            <a href="javascript:void(0)" onClick="changePage('next')"
                                class="mr-2 text-blue-500 hover:text-blue-800">next</a>
                            <?php } ?>
                        </div>
                    </div>
                    <hr>
                    <ul>
                        <?php renderRecipce($dishs); ?>
                    </ul>
                </section>
                <aside class="lg:col-span-1 lg:bg-white lg:p-4 lg:shadow-md">
                    <h2 class="text-lg font-semibold mb-4">Quick view</h2>
                    <hr>
                    <ul>
                        <li class="mb-4">
                            <h3 id="dish-name" class="text-xl font-semibold"></h3>
                            <div class="flex">
                                <img id="dish-url"
                                    src="https://firebasestorage.googleapis.com/v0/b/fir-a3ee6.appspot.com/o/tipRecipe%2Fdishs%2Fdefault.png?alt=media&token=e7ccf739-5851-4a21-82a0-5769ef953c1e"
                                    alt="" class="w-32 h-32 object-cover rounded-lg">
                                <div class="ml-2">
                                    <p class="text-gray-600">Ingredients: </p>
                                    <ul id="dish-ingredients" class="list-disc ml-4"></ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <p id="dish-description" class="text-gray-600"></p>
                    <p id="dish-types" class="text-gray-600"></p>
                    <div id="dish-content" class="mt-4"></div>
                </aside>
            </div>
        </main>
    </div>

    <?php include('includes/footer.php'); ?>

    <script>
    const tempDish = <?php echo json_encode($tempDish); ?>;
    const currentPage = <?php echo $currentPage; ?>;
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

    function changePage(option) {
        const url = new URL(window.location.href);
        if (option === 'next') {
            url.searchParams.set('page', parseInt(currentPage + 1));
        } else {
            url.searchParams.set('page', parseInt(currentPage > 1 ? currentPage - 1 : 1));
        }
        window.location.href = url;
    }

    function renderQuickView(dish) {
        if (dish === null) {
            return;
        }
        document.getElementById('dish-name').textContent = dish.dishName;
        document.getElementById('dish-url').src = dish.url;
        document.getElementById('dish-description').textContent = `Description: ${dish.summary}`;
        document.getElementById('dish-ingredients').innerHTML = '';
        dish.ingredients.split(',').forEach(ingredient => {
            const arr = ingredient.split('@');
            document.getElementById('dish-ingredients').innerHTML +=
                `<li>${arr[0]}: ${arr[1]} ${arr[2]}</li>`;
        });
        document.getElementById('dish-types').textContent = `Types: `;
        dish.types.split(',').forEach(type => {
            document.getElementById('dish-types').innerHTML +=
                `<span class="inline-block bg-red-200 text-gray-700 rounded-full px-2 py-0.3 mr-1 text-sm font-semibold">${type}</span>`;
        });
        document.getElementById('dish-content').innerHTML = '<hr>' + dish.content;
    }

    function quickView(dishID) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", `getRecipe.php?id=${dishID}`, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const dish = JSON.parse(xhr.responseText);
                renderQuickView(dish);
            }
        }
        xhr.send();
    }

    renderQuickView(tempDish);
    </script>
</body>

</html>