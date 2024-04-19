<?php
require_once('./src/helpers/jwtFilter.php');
require_once('./src/controllers/adminController.php');

$itemsPerPage = 6;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentPage - 1) * $itemsPerPage;
$totalDishs = 0;

$dishs = [];
$adminController = new AdminController();
$adminController->invokeDishManage($dishs, $totalDishs, $offset, $itemsPerPage);

$numberPages = ceil($totalDishs / $itemsPerPage);


function renderDishsToDom($dishs){
    foreach($dishs as $dish){
        echo '<tr>';
        echo '<td class="border border-gray-200 px-4 py-2">'.$dish['dishID'].'</td>';
        echo '<td class="border border-gray-200 px-4 py-2">'.$dish['dishName'].'</td>';
        echo '<td class="border border-gray-200 px-4 py-2 flex justify-center"><img class="w-24 h-24 object-cover object-center" src="'.$dish['url'].'" /></td>';
        echo '<td class="border border-gray-200 px-4 py-2">';
        echo '<p>'.$dish['summary'].'</p>';
        echo '<p>Nguyên liệu: '.$dish['ingredients'].'</p>';
        echo '<p>Loại: '.$dish['types'].'</p>';
        echo '</td>';
        echo '<td class="border border-gray-200 px-4 py-2">';
        echo '<a href="./editDish.php?id='.$dish['dishID'].'" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 ml-1 rounded">Edit</a>';
        // echo '<a href="./dishManage.php?delete='.$dish['dishID'].'" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 ml-1 rounded">Delete</a>';
        echo '<a href="#" onclick="confirmDelete(\'' . $dish['dishID'] . '\'); return false;"  class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 ml-1 rounded">Delete</a>';
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
    <title>Dish Manage</title>

</head>

<body>
    <?php require_once('includes/header.php'); ?>
    <div class="flex bg-gray-100 font-sans mb-10">
        <?php require_once('includes/sideAdmin.php'); ?>

        <main class="flex-1 bg-white p-8 h-screen">
            <h1 class="text-3xl font-bold mb-8">Dish Management</h1>
            <div class="mb-4">
                <a href="editDish.php"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded">Add
                    Dish</a>
            </div>
            <div class="flex justify-center mb-4">
                <div class="">
                    <input type="text" id="search"
                        onKeyDown="if(event.key === 'Enter') {event.preventDefault(); callApiSearch();}"
                        class="border border-gray-300 rounded-md px-4 py-2 pr-10 focus:outline-none focus:border-blue-500"
                        placeholder="Search..by ID hoặc Name">
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
                        <?php renderDishsToDom($dishs); ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-8 flex justify-center">
                <?php if($currentPage > 1){ ?>
                <a href="./dishManage.php?page=<?php echo $currentPage - 1; ?>"
                    class="bg-gray-200 text-gray-800 font-semibold px-4 py-2 rounded-l">Previous</a>
                <?php } ?>
                <?php
                for($i = 1; $i <= $numberPages; $i++){
                    if($i == $currentPage){
                        echo '<button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 ml-1">'.$i.'</button>';
                    }else{
                        echo '<a href="./dishManage.php?page='.$i.'" class="bg-gray-200 text-gray-800 font-semibold px-4 py-2 ml-1">'.$i.'</a>';
                    }
                }
                ?>
                <?php if($currentPage < $numberPages){ ?>
                <a href="./dishManage.php?page=<?php echo $currentPage + 1; ?>"
                    class="bg-gray-200 text-gray-800 font-semibold px-4 py-2 rounded-r ml-1">Next</a>
                <?php } ?>
                <!-- <button class="bg-gray-200 text-gray-800 font-semibold px-4 py-2 rounded-l">Previous</button>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2">1</button>
                <button class="bg-gray-200 text-gray-800 font-semibold px-4 py-2">2</button>
                <button class="bg-gray-200 text-gray-800 font-semibold px-4 py-2">3</button>
                <button class="bg-gray-200 text-gray-800 font-semibold px-4 py-2 rounded-r">Next</button> -->
            </div>
        </main>
    </div>
    <?php require_once('includes/footer.php'); ?>

    <script>
    function callApiSearch() {
        const search = document.getElementById('search').value;
        window.location.href = `./dishManage.php?search=${search}`;
    }

    function confirmDelete(id) {
        if (confirm("Are you sure to delete this dish?")) {
            window.location.href = `./dishManage.php?delete=${id}`;
        }
    }
    </script>
</body>

</html>