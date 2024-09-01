<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $bookTitle = htmlspecialchars($_POST['bookTitle']);
    $author = htmlspecialchars($_POST['author']);
    $publisher = htmlspecialchars($_POST['publisher']);
    $publishYear = htmlspecialchars($_POST['publishYear']);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả gửi form</title>
    <style>
        .result-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h2>Kết quả gửi form</h2>
        <div class="result">
            <p><strong>Tên sách:</strong> <?php echo $bookTitle; ?></p>
            <p><strong>Tác giả:</strong> <?php echo $author; ?></p>
            <p><strong>Nhà xuất bản:</strong> <?php echo $publisher; ?></p>
            <p><strong>Năm xuất bản:</strong> <?php echo $publishYear; ?></p>
        </div>
        <a href="javascript:history.back()">Quay lại</a>
    </div>
</body>
</html>
