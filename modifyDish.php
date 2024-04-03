<?php
// Lấy dữ liệu từ phần thân của request
$data = json_decode(file_get_contents("php://input"), true);

// Kiểm tra xem dữ liệu đã được gửi đi chưa
if (!empty($data)) {
    // Xử lý dữ liệu ở đây
    // Ví dụ: in ra dữ liệu để kiểm tra
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    
    // Ví dụ khác: Lưu dữ liệu vào cơ sở dữ liệu
    // $ingredients = $data['ingredients'];
    // foreach ($ingredients as $ingredient) {
    //     $name = $ingredient['name'];
    //     $amount = $ingredient['amount'];
    //     $unit = $ingredient['unit'];
    //     // Thực hiện các thao tác lưu dữ liệu vào cơ sở dữ liệu ở đây
    // }
} else {
    // Trường hợp không có dữ liệu được gửi đi
    echo "No data received.";
}
?>