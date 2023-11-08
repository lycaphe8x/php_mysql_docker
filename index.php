<?php
// Thông tin kết nối CSDL
$host = 'localhost'; 
$user = 'root'; 
$pass = ''; 
$db = 'books'; 

// Tạo kết nối
$conn = new mysqli($host, $user, $pass, $db);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn lấy 10 cuốn sách đầu tiên
$sql = "SELECT * FROM items ORDER BY id ASC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Xuất dữ liệu của mỗi hàng
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Tên Sách: " . $row["title"]. " - Tác giả: " . $row["author"]. "<br>";
    }
} else {
    echo "0 kết quả";
}

// Đóng kết nối
$conn->close();
?>
