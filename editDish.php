<?php
require_once './src/controllers/adminController.php';
$ingredients = [];
$types = [];
$dish=null;
$adminController = new AdminController();
$adminController->invokeModifyDish($ingredients, $types, $dish);
$id=$dish?$dish['dishID']:"";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disk</title>
    <script src="https://cdn.tiny.cloud/1/1u5byklg9tall9ayqltrxvbcyie41qqc4ft9dknoji08i743/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
            "See docs to implement AI Assistant")),
    });
    </script>
</head>

<body>
    <?php require_once('includes/header.php'); ?>
    <div class="flex h-screen bg-gray-100 font-sans mb-8">
        <aside class="bg-gray-800 text-gray-400 w-64">
            <div class="flex items-center justify-center h-16 border-b border-gray-700">
                <span class="text-2xl font-bold uppercase">Admin</span>
            </div>
            <nav class="mt-4">
                <ul>
                    <li><a href="admin.php" class="block p-4 hover:bg-gray-700">Dashboard</a></li>
                    <li><a href="diskManage.php" class="block p-4 hover:bg-gray-700">Diskes manage</a></li>
                    <li><a href="userManage.php" class="block p-4 hover:bg-gray-700">User manage</a></li>
                </ul>
            </nav>
        </aside>
        <main class="flex-1 bg-white p-8">
            <h1 class="text-3xl font-bold mb-8">
                <?php echo $id==""?"Add Disk":"Edit Disk"; ?>
            </h1>
            <div class="lg:grid lg:grid-cols-2">
                <div class="max-w-xl lg:col-span-1 mr-8">
                    <div class="mb-4">
                        <label for="dishName" class="block text-gray-700 font-semibold mb-2">Dish Name</label>
                        <input type="text" id="dishName" name="dishName"
                            class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500"
                            value="<?php echo($dish?$dish["dishName"]:""); ?>">
                    </div>
                    <div class="mb-4">
                        <label for="summary" class="block text-gray-700 font-semibold mb-2">Summary</label>
                        <input id="summary" name="summary" rows="4"
                            class="border border-gray-300 rounded-md px-4 py-2 w-full resize-none focus:outline-none focus:border-blue-500"
                            value="<?php echo($dish?$dish["summary"]:""); ?>" />
                    </div>
                    <div class="mb-4">
                        <aside class="lg:col-span-1 lg:bg-white lg:p-4 lg:shadow-md min-h-72">
                            <h2 class="text-lg font-semibold">Ingredients/Type tag</h2>
                            <div class="h-6">
                                <p class="font-thin text-blue-600/100 truncate line-clamp-1" id="hintTag"></p>
                            </div>
                            <div class="flex flex-wrap">
                                <input id="tagInput"
                                    class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500 w-full"
                                    placeholder="Enter tags..." />
                            </div>
                            <h2 class="text-lg font-semibold mt-4">Ingredients filter</h2>
                            <div class="flex flex-wrap gap-2" id="ingredients"></div>
                            <h2 class="text-lg font-semibold mt-4">Type filter</h2>
                            <div class="flex flex-wrap gap-2" id="types"></div>
                        </aside>
                    </div>
                </div>
                <div class="max-w-xl lg:col-span-1">
                    <div class="mb-4">
                        <label for="dishUrl" class="block text-gray-700 font-semibold mb-2">Photo</label>
                        <input type="file" id="dishUrl" name="dishUrl"
                            class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="recipe" class="block text-gray-700 font-semibold mb-2">Recipe</label>
                        <textarea type="text" id="recipeBlog" name="recipeBlog"
                            class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:border-blue-500 h-96"
                            required>
                        </textarea>
                    </div>
                    <div class="mb-4">
                        <button type="submit" onClick="callUpdateFromDom()"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded">
                            <?php echo $id==""?"Add Disk":"Edit Disk"; ?>
                        </button>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <?php require_once('includes/footer.php'); ?>
    <script>
    const id = <?php echo json_encode($id); ?>;
    const ingredients = <?php echo json_encode($ingredients); ?>.map(ingredient => ingredient.ingredientName);
    const types = <?php echo json_encode($types); ?>.map(type => type.typeName);
    let filterIngredients = [];
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
            document.getElementById('ingredients').innerHTML += `<div id="${value}"><input type="text" name="ingredientName" id="ingredientName"
                                        class="border rounded px-2 py-1 cursor-not-allowed" disabled value="${value}">
                                    <input type="number" name="amount" id="${value}-amount" value="100"
                                        class="border rounded px-2 py-1 w-20">
                                    <input type="text" name="unit" id="${value}-unit" value="gram"
                                        class="border rounded px-2 py-1">
                                </div>`;
            filterIngredients.push(value);
        } else {
            document.getElementById('types').innerHTML +=
                `<span class="inline-block bg-red-200 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold">${value}</span>`;
            filterTypes.push(value);
        }
    }

    function deleteTag(value) {
        if (ingredients.includes(value) && filterIngredients.includes(value)) {
            document.getElementById(value).remove();
            filterIngredients.splice(filterIngredients.indexOf(value), 1);
        } else if (types.includes(value) && filterTypes.includes(value)) {
            document.getElementById('types').innerHTML = document.getElementById('types').innerHTML
                .replace(
                    `<span class="inline-block bg-red-200 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold">${value}</span>`,
                    '');
            filterTypes.splice(filterTypes.indexOf(value), 1);
        }
    }

    function callUpdateFromDom() {
        const summary = document.getElementById("summary").value;
        const diskName = document.getElementById("dishName").value;
        const dishUrl = document.getElementById("dishUrl").value.split('\\').pop();
        var editorFrame = document.getElementById('recipeBlog_ifr');
        var editorBody = editorFrame.contentDocument.body;
        const recipe = editorBody.innerHTML.trim();
        // if (filterIngredients.length === 0 || filterTypes.length === 0 || summary === "" || diskName === "" ||
        //     recipe === `<p><br data-mce-bogus="1"></p>`) {
        //     alert("Please fill all the fields");
        //     return;
        // }
        filterIngredients = filterIngredients.map(ingredient => {
            return {
                name: ingredient,
                amount: document.getElementById(`${ingredient}-amount`).value,
                unit: document.getElementById(`${ingredient}-unit`).value
            };
        });
        var data = {
            id: id,
            diskName: diskName,
            summary: summary,
            dishUrl: dishUrl,
            recipe: recipe,
            ingredients: filterIngredients,
            types: filterTypes
        };

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "modifyDish.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };

        xhr.send(JSON.stringify(data));
    }
    </script>
</body>

</html>