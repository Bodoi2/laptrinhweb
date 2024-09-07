<?php 
session_start();
$payString = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['firstname'] = $_POST['firstname'];
   $_SESSION['lastname'] = $_POST['lastname'];
   $_SESSION['email'] = $_POST['email'];
   $_SESSION['id'] = $_POST['id'];
   if (isset($_POST['pay']) && is_array($_POST['pay'])) {
    $_SESSION['pay'] = $_POST['pay'];
    $payString = implode(", ", $_SESSION['pay']);
}
}
?>
<head>
<link rel="stylesheet" href="bai2buoi3.css">
</head>
<body>
   <div class="container" >
            <?php
       if (isset($_SESSION['firstname']) && isset($_SESSION['email']) && isset($_SESSION['lastname']) && isset($_SESSION['id']) && isset($_SESSION['pay'])) {
        echo '<h2>Thông tin người dùng từ Session:</h2>';
        echo 'Firstname: ' . htmlspecialchars($_SESSION['firstname']) . '<br>';
        echo 'Lastname: ' . htmlspecialchars($_SESSION['lastname']) . '<br>';
        echo 'Email: ' . htmlspecialchars($_SESSION['email']) . '<br>';
        echo 'Invoice ID: ' . htmlspecialchars($_SESSION['id']) . '<br>';
        echo 'Trả tiền cho: ' . htmlspecialchars(implode(", ", $_SESSION['pay'])) . '<br>';
    } else {
        echo 'Chưa có thông tin người dùng nào được nhập!';}
        ?>
      <br>
        <button onclick="window.location.href='bai1buoi4.php'">Trở lại</button> 
    </div> 
</body>
