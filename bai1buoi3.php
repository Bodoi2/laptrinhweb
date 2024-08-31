<html>
  <header>
    <style>
      body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            margin: 0;
            background-color: #f4f4f4; 
        }
        .container {
            border: 1px solid #ccc; 
            padding: 20px; 
            background-color: #fff; 
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        

      }
    </style>
  </header>
<body>
    <?php
    $tensach = $tacgia = $nhaxb = $namxb = "";
    $tensachErr = $tacgiaErr = $nhaxbErr = $namxbErr = "";
    $formSubmitted = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $formSubmitted = true;
        if (empty($_POST["tensach"])) {
            $tensachErr = "Chưa nhập tên sách";
            $formSubmitted = false;
        } else {
            $tensach = test_input($_POST["tensach"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $tensach)) {
                $tensachErr = "Chỉ cho phép chữ cái và khoảng trắng";
                $formSubmitted = false;
            }
        }        
        if (empty($_POST["tacgia"])) {
            $tacgiaErr = "Chưa nhập tên tác giả";
            $formSubmitted = false;
        } else {
            $tacgia = test_input($_POST["tacgia"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $tacgia)) {
                $tacgiaErr = "Chỉ cho phép chữ cái và khoảng trắng";
                $formSubmitted = false;
            }
        }        
        if (empty($_POST["nhaxb"])) {
            $nhaxbErr = "Chưa nhập tên nhà xuất bản";
            $formSubmitted = false;
        } else {
            $nhaxb = test_input($_POST["nhaxb"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $nhaxb)) {
                $nhaxbErr = "Chỉ cho phép chữ cái và khoảng trắng";
                $formSubmitted = false;
            }
        }        
        if (empty($_POST["namxb"])) {
            $namxbErr = "Chưa nhập năm xuất bản";
            $formSubmitted = false;
        } else {
            $namxb = test_input($_POST["namxb"]);
            if (!preg_match("/^[0-9]{4}$/", $namxb)) {
                $namxbErr = "Chỉ cho phép số (có 4 chữ số)";
                $formSubmitted = false;
            }
        }
    }
    if ($formSubmitted) {
      ?>
      <div class="container">
      Tên sách: <?php echo $_POST["tensach"]; ?><br><br>
    Tác giả: <?php echo $_POST["tacgia"]; ?><br><br>
    Nhà xuất bản: <?php echo $_POST["nhaxb"]; ?><br><br>
    Năm xuất bản: <?php echo $_POST["namxb"]; ?><br><br>
       <?php echo '<br><button onclick="window.location.href=\'' . htmlspecialchars($_SERVER["PHP_SELF"]) . '\'">Trở lại</button>';?>
      </div>        
        <?php
    } else {        
    ?>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            Tên sách: <input type="text" name="tensach" value="<?php echo $tensach;?>" >
            <span style="color:red;font-size:14px;">* <?php echo $tensachErr;?></span><br><br>
            
            Tác giả: <input type="text" name="tacgia" value="<?php echo $tacgia;?>" >
            <span style="color:red;font-size:14px;">* <?php echo $tacgiaErr;?></span><br><br>
            
            Nhà xuất bản: <input type="text" name="nhaxb" value="<?php echo $nhaxb;?>" >
            <span style="color:red;font-size:14px;">* <?php echo $nhaxbErr;?></span><br><br>
            
            Năm xuất bản: <input type="text" name="namxb" value="<?php echo $namxb;?>" >
            <span style="color:red;font-size:14px;">* <?php echo $namxbErr;?></span><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </div>
    <?php
    }    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
</body>
</html>
