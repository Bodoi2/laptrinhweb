<?php

require 'functionsbai4.php';




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mangStr = isset($_POST['mang']) ? $_POST['mang'] : '';
    $mang = array_map('floatval', explode(',', $mangStr));
    echo "Mảng ban đầu: ";
    inmang($mang);
    echo "<br>";
    $maxValue = timMax($mang);
    echo "Giá trị lớn nhất trong mảng: " . $maxValue;
    echo "<br>";
    $minValue = timMin($mang);
    echo "Giá trị nhỏ nhất trong mảng: " .$minValue;
    echo "<br>";
    $tong = tinhtong($mang);
    echo "Tổng của mảng: " . $tong;
    echo "<br>";
    $mang = sapxep($mang);
    echo "Mảng sau khi sắp xếp: ";
    inmang($mang);
    echo "<br>";
    $phanTuCanKiemTra = isset($_POST['phanTu']) ? floatval($_POST['phanTu']) : null;
    if ($phanTuCanKiemTra !== null) {
        if (kiemTraPhanTu($mang, $phanTuCanKiemTra)) {
            echo "Phần tử $phanTuCanKiemTra có trong mảng.";
        } else {
            echo "Phần tử $phanTuCanKiemTra không có trong mảng.";
        }
    }
    echo "<br>";
    echo '<br><form method="get" action=""><button type="submit">Quay lại</button></form>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
</head>
<body>

<?php if ($_SERVER['REQUEST_METHOD'] !== 'POST'): ?>
    <form method="post" action="">
        <label>Nhập các giá trị của mảng (cách nhau bằng dấu phẩy):</label>
        <input type="text" name="mang" required>
        <br><br>
        <label>Nhập phần tử cần kiểm tra:</label>
            <input type="number" name="phanTu" step="any" required>
            <br><br>
        <input type="submit" value="Tính toán">
    </form>
    
<?php endif; ?>
</body>
</html>