<?php
require_once('src/helpers/jwtFilter.php');
require_once('src/controllers/useAdmin.php');
doFilterInternal();

$recipes = [];
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $search = $_GET['search'] ?? '';
    getDisks($recipes, $search);
}

function renderDisksToDom($recipes){
    foreach($recipes as $recipe){
        echo '<tr>';
        echo '<td class="border border-gray-200 px-4 py-2">'.$recipe['diskID'].'</td>';
        echo '<td class="border border-gray-200 px-4 py-2">'.$recipe['diskName'].'</td>';
        echo '<td class="border border-gray-200 px-4 py-2 flex justify-center"><img class="w-24 h-24 object-cover object-center" src="'.$recipe['url'].'" /></td>';
        echo '<td class="border border-gray-200 px-4 py-2">';
        echo '<p>'.$recipe['summary'].'</p>';
        echo '<p>Nguyên liệu: '.$recipe['ingredients'].'</p>';
        echo '<p>Loại: '.$recipe['types'].'</p>';
        echo '</td>';
        echo '<td class="border border-gray-200 px-4 py-2">';
        echo '<button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 ml-1 rounded">Edit</button>';
        echo '<button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 ml-1 rounded">Delete</button>';
        echo '</td>';
        echo '</tr>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disk Manage</title>
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
                    <li><a href="diskManage.php" class="block p-4 hover:bg-gray-700">Diskes manage</a></li>
                    <li><a href="userManage.php" class="block p-4 hover:bg-gray-700">User manage</a></li>
                </ul>
            </nav>
        </aside>
        <main class="flex-1 bg-white p-8">
            <h1 class="text-3xl font-bold mb-8">Disk Management</h1>
            <div class="mb-4">
                <a href="editDisk.php"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded">Add
                    Dish</a>
            </div>
            <div class="flex justify-center mb-4">
                <div class="">
                    <input type="text" id="search"
                        onKeyDown="if(event.key === 'Enter') {event.preventDefault(); callApiSearch();}"
                        class="border border-gray-300 rounded-md px-4 py-2 pr-10 focus:outline-none focus:border-blue-500"
                        placeholder="Search...">
                    <button onClick="callApiSearch()"
                        class="px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">Search</button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="border border-gray-200 px-4 py-2">ID</th>
                            <th class="border border-gray-200 px-4 py-2">Name</th>
                            <th class="border border-gray-200 px-4 py-2">Picture</th>
                            <th class="border border-gray-200 px-4 py-2">Summary</th>
                            <th class="border border-gray-200 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td class="border border-gray-200 px-4 py-2">1</td>
                            <td class="border border-gray-200 px-4 py-2">Dish 1</td>
                            <td class="border border-gray-200 px-4 py-2"><img
                                    class="w-24 h-24 object-cover object-center"
                                    src="https://cdn.eva.vn/upload/3-2021/images/2021-08-16/anh-da-den-chua-he-tren-tiktok-vuot-moc-100-trieu-theo-doi-thu-nhap-khung-moi-cang-nguong-mo-2-1629114343-107-width640height581.jpg" />
                            </td>
                            <td class="border border-gray-200 px-4 py-2">
                                <p>Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit.</p>
                                <p>Nguyên liệu:.</p>
                                <p>Loại:.</p>
                            </td>
                            <td class="border border-gray-200 px-4 py-2">
                                <button
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded">Edit</button>
                                <button
                                    class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded">Delete</button>
                            </td>
                        </tr> -->
                        <?php renderDisksToDom($recipes); ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-8 flex justify-center">
                <button class="bg-gray-200 text-gray-800 font-semibold px-4 py-2 rounded-l">Previous</button>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2">1</button>
                <button class="bg-gray-200 text-gray-800 font-semibold px-4 py-2">2</button>
                <button class="bg-gray-200 text-gray-800 font-semibold px-4 py-2">3</button>
                <button class="bg-gray-200 text-gray-800 font-semibold px-4 py-2 rounded-r">Next</button>
            </div>
        </main>
    </div>
    <?php require_once('includes/footer.php'); ?>
</body>

</html>