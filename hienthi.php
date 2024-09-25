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

$sql = "SELECT id, firstname, lastname, reg_date FROM MyGuests";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách MyGuests</title>
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
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #7a1f5c; 
            padding: 8px; 
            text-align: left; 
        }
        th {
            background-color: #7a1f5c; 
            color: white; 
            text-align: center;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Danh sách MyGuests</h1>
        <?php
        // Hiển thị dữ liệu
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Id</th><th>Firstname</th><th>Lastname</th><th>Reg_Date</th></tr>";

            // Hiển thị từng dòng dữ liệu
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["reg_date"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>0 results</p>";
        }

        // Đóng kết nối
        $conn->close();
        ?>
    </div>
</body>
</html>

