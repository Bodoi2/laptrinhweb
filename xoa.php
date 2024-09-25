<?php
$servername = "sql110.infinityfree.com";
$username = "if0_37127401";
$password = "Tung12a52004";
$dbname = "if0_37127401_b5_mydb";

// Kết nối cơ sở dữ liệu
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("<p style='color: red;'>Kết nối thất bại: " . mysqli_connect_error() . "</p>");
} else {
    echo "<p style='color: green;'>Kết nối thành công!</p>";
}

$sql = "DELETE FROM MyGuests WHERE id=3";
if (mysqli_query($conn, $sql)) {
    echo "<p style='color: green;'>Record deleted successfully</p>";
} else {
    echo "<p style='color: red;'>Error deleting record: " . mysqli_error($conn) . "</p>";
}

// Đóng kết nối
mysqli_close($conn);

// Chuyển đến trang hiển thị
require 'hienthi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa MyGuests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 70%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        
    </div>
</body>
</html>


