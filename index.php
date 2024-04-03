<?php
    require_once('./src/controllers/homeController.php');
    $ingredients = [];
    $types = [];
    $disks = [];
    $homeController = new HomeController();
    $homeController->invoke($disks, $ingredients, $types);
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
            <section class="lg:col-span-2 lg:bg-white lg:p-4 lg:shadow-md">
                <h2 class="text-lg font-semibold mb-4">Recipes</h2>
                <ul>
                    <?php renderRecipce($disks); ?>
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