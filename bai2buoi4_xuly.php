<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    setcookie('firstname', $_POST['firstname'], time() + 1800, "/");
    setcookie('lastname', $_POST['lastname'], time() + 1800, "/");
    setcookie('email', $_POST['email'], time() + 1800, "/");
    setcookie('id', $_POST['id'], time() + 1800, "/");
    if (isset($_POST['pay'])) {
        $pay = implode(",", $_POST['pay']);
        setcookie('pay', $pay, time() + 1800, "/");
    } 
     header("Location: bai2buoi4_hienthi.php");
    exit();
}
?>