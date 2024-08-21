<?php

require 'functions.php';


$result = '';
$operation = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $soThuNhat = isset($_POST['soThuNhat']) ? floatval($_POST['soThuNhat']) : 0;
    $soThuHai = isset($_POST['soThuHai']) ? floatval($_POST['soThuHai']) : 0;
    $Socankiemtra = isset($_POST['Socankiemtra']) ? floatval($_POST['Socankiemtra']) : 0;
    $operation = isset($_POST['operation']) ? $_POST['operation'] : '';

   
    switch ($operation) {
        case 'cong':
            $result = tinhTong($soThuNhat, $soThuHai);
            break;
        case 'tru':
            $result = tinhHieu($soThuNhat, $soThuHai);
            break;
        case 'nhan':
            $result = tinhTich($soThuNhat, $soThuHai);
            break;
        case 'chia':
            $result = tinhThuong($soThuNhat, $soThuHai);
            break;
        case 'nguyento':
            $result = (kiemTraNguyenTo($Socankiemtra) ? "$Socankiemtra là số nguyên tố" : "$Socankiemtra không phải là số nguyên tố") ;
                      
            break;
        case 'chanle':
            $result = (kiemTraChan($Socankiemtra) ? "$Socankiemtra là số chẵn" : "$Socankiemtra là số lẻ") ;
                     
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Phép tính trên hai số</title>
</head>
<body>
    
    <?php if ($result === ''): ?>
        <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
        <form method="post" action="">
            <label>Chọn phép tính:</label>
            <input type="radio" name="operation" value="cong" required> Cộng
            <input type="radio" name="operation" value="tru" required> Trừ
            <input type="radio" name="operation" value="nhan" required> Nhân
            <input type="radio" name="operation" value="chia" required> Chia
            <br><br>
            
            
            <label>Số thứ nhất:</label>
            <input type="number" name="soThuNhat" required>
            <br><br>

            <label>Số thứ hai:</label>
            <input type="number" name="soThuHai" required>
            <br><br>

            <input type="submit" value="Tính">
        </form>
        <h3>KIỂM TRA SỐ</h3>
        <form method="post" action="">
            <input type="radio" name="operation" value="nguyento" require> Kiểm tra số nguyên tố
            <input type="radio" name="operation" value="chanle" require> Kiểm tra chẵn lẻ
            <br><br>
            <label>Số cần kiểm tra:</label>
            <input type="number" name="Socankiemtra" require>
            <br><br>

            <input type="submit" value="Kiểm tra">
        </form>
    <?php else: ?>
        <h3>Kết quả:</h3>
        <p><?php echo $result; ?></p>
        <form method="get" action="">
            <button type="submit">Quay lại trang trước</button>
        </form>
    <?php endif; ?>
   
    
    
</body>
</html>
