<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Database Status</h1>
        <?php
        $servername = "sql110.infinityfree.com";
        $username = "if0_37127401";
        $password = "Tung12a52004";
        $dbname = "if0_37127401_b5_mydb";

        // Kết nối
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            echo "<p class='error'>Kết nối thất bại: " . mysqli_connect_error() . "</p>";
        } else {
            echo "<p class='success'>Kết nối thành công!</p>";

            // Tạo bảng
            $sql = "CREATE TABLE MyGuests (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
                lastname VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, 
                email VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, 
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NULL
            )";

            if (mysqli_query($conn, $sql)) {
                echo "<p class='success'>Bảng MyGuests tạo thành công!</p>";
            } else {
                echo "<p class='error'>Lỗi tạo bảng: " . mysqli_error($conn) . "</p>";
            }

            // Đóng kết nối
            mysqli_close($conn);
        }
        ?>
    </div>
</body>
</html>
