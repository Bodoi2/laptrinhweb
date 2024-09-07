<head>
<link rel="stylesheet" href="bai2buoi3.css">
</head>
<body>
   <div class="container" >
            <?php
       if (isset($_COOKIE['firstname']) && isset($_COOKIE['email']) && isset($_COOKIE['lastname']) && isset($_COOKIE['id']) && isset($_COOKIE['pay'])) {
        echo '<h2>Thông tin người dùng từ Cookie:</h2>';
        echo 'Firstname: ' . $_COOKIE['firstname'] . '<br>';
        echo 'Lastname: ' . $_COOKIE['lastname'] . '<br>';
        echo 'Email: ' . $_COOKIE['email'] . '<br>';
        echo 'Invoice ID: ' . $_COOKIE['id'] . '<br>';
        echo 'Pay For: ' . $_COOKIE['pay'] . '<br>';
    } else {
        echo 'Chưa có thông tin người dùng nào được nhập!';
    }    
        ?>
      <br>
        <button onclick="window.location.href='bai2buoi4.php'">Trở lại</button> 
    </div> 
</body>