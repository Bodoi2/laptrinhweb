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
            font-family:Arial;
        }
        .container {
            border: 1px solid #ccc; 
            padding: 20px; 
            background-color: #fff; 
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
      }
      .hang1,.hang2,.chebox{
        display:flex;       
      }
      .hang3{
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
      }
      .hang1,.hang2{
        gap:20px;
      } 
      .cot1,.cot2{
        display: flex;
        flex-direction: column;
        margin-right:30px;
      }
      .cot1 label, .cot2 label {
            display: flex;
            align-items: center; 
            margin-bottom: 8px;
        }
        input[type="checkbox"] {
            margin-right: 10px;            
        }
        input[type="text"]{
            width: 280px; 
            padding: 7px; 
            font-size: 16px;
        }
        .o1,.o2,.o3,.o4{
            display: flex;
            align-items: center;
            flex-direction:column; 
            gap:3px;
            align-items: flex-start;           
        }
        .tieude{
            text-align:center;
        }
        .truong{
            font-size:18px;
            font-weight:550;
        }
        .chuthich{
            font-size:12px;
        }
        input[type="submit"]{
            width: 100px;
            padding: 8px;
        }
        .submit{
            display: flex;
            justify-content: center;
        }
        
    </style>
  </header>
<body> 
    <?php
    $firstname = $lastname = $email = $id = $pay = "";
    $firstnameErr = $lastnameErr = $emailErr = $idErr = $payErr = "";
    $formSubmitted = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $formSubmitted = true;
        if (empty($_POST["firstname"])) {
            $firstnameErr = "Chưa nhập firstname";
            $formSubmitted = false;
        } else {
            $firstname = test_input($_POST["firstname"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
                $firstnameErr = "Chỉ cho phép chữ cái và khoảng trắng";
                $formSubmitted = false;
            }
        }        
        if (empty($_POST["lastname"])) {
            $lastnameErr = "Chưa nhập lastname";
            $formSubmitted = false;
        } else {
            $lastname = test_input($_POST["lastname"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $lastname)) {
                $lastnameErr = "Chỉ cho phép chữ cái và khoảng trắng";
                $formSubmitted = false;
            }
        }        
        if (empty($_POST["email"])) {
            $emailErr = "Chưa nhập email";
            $formSubmitted = false;
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email sai rồi nhập lại đi";
                $formSubmitted = false;
            }
        }        
        if (empty($_POST["id"])) {
            $idErr = "Chưa nhập invoice id";
            $formSubmitted = false;
        } else {
            $id = test_input($_POST["id"]);
            if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $id)) {
                $idErr = "ID chỉ chứa chữ cái và số, từ 6 đến 12 ký tự";
                $formSubmitted = false;
            }
        }
        if (empty($_POST["pay"])) {
            $payErr = "Bạn thanh toán cho cái gì";
            $formSubmitted = false;
            } else {
                $pay = $_POST["pay"];
            }
    }
    if ($formSubmitted) {
      ?>
      <div class="container">
      Firstname: <?php echo $_POST["firstname"]; ?><br><br>
      Lastname: <?php echo $_POST["lastname"]; ?><br><br>
      Email: <?php echo $_POST["email"]; ?><br><br>
      Invoice ID: <?php echo $_POST["id"]; ?><br><br>
      Pay For: <?php echo implode(", ", $pay);; ?><br><br>
      <?php echo '<br><button onclick="window.location.href=\'' . htmlspecialchars($_SERVER["PHP_SELF"]) . '\'">Trở lại</button>';?>
      </div>        
        <?php
    } else {        
    ?>
    <div class="container">
    <h1 class="tieude">Payment Receipt Upload Form</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
        <p class="truong">Name</p> 
            <div class="hang1">
            <div>
            <div class="o1">
            <input type="text" name="firstname" value="<?php echo $firstname;?>" >
            <span style="color:red;font-size:12px;">* <?php echo $firstnameErr;?></span>
            </div>
            <p class="chuthich">First Name</p>
            </div>
            <div>
            <div class="o2">
            <input type="text" name="lastname" value="<?php echo $lastname;?>" >
            <span style="color:red;font-size:12px;">* <?php echo $lastnameErr;?></span>
            </div>
            <p class="chuthich">Last Name</p>
            </div>  
            </div>
            <br><br>
            <div class="hang2">
            <div>
            <p class="truong">Email</p>
            <div class="o3">
            <input type="text" name="email" value="<?php echo $email;?>" >
            <span style="color:red;font-size:12px;">* <?php echo $emailErr;?></span>
            </div>
            <p class="chuthich">example@example.com</p>
            </div>
            <div>
            <p class="truong">Invoice ID</p>
            <div class="o4">
           <input type="text" name="id" value="<?php echo $id;?>" >
           <span style="color:red;font-size:12px;">* <?php echo $idErr;?></span>
            </div>
            </div>
           </div>
           <br><br>
           <p class="truong">Pay For</p>
           <div class="hang3">
            <div class="chebox">
              <div class="cot1">
            <label><input type="checkbox" name="pay[]" value="15K Category"> 15K Category</label>
            <label><input type="checkbox" name="pay[]" value="55K Category"> 55K Category</label>
            <label><input type="checkbox" name="pay[]" value="116K Category"> 116K Category</label>
            <label><input type="checkbox" name="pay[]" value="Shuttle Two Ways"> Shuttle Two Ways</label>
            <label><input type="checkbox" name="pay[]" value="Compressport T-Shirt Merchandise"> Compressport T-Shirt Merchandise</label>
            <label><input type="checkbox" name="pay[]" value="Other"> Other</label>
            </div>
            <div class="cot2">
            <label><input type="checkbox" name="pay[]" value="35K Category"> 35K Category</label>
            <label><input type="checkbox" name="pay[]" value="75K Category"> 75K Category</label>
            <label><input type="checkbox" name="pay[]" value="Shuttle One Way"> Shuttle One Way</label>
            <label><input type="checkbox" name="pay[]" value="Training Cap Merchandise"> Training Cap Merchandise</label>
            <label><input type="checkbox" name="pay[]" value="Buf Merchandise"> Buf Merchandise</label>
            </div>  
            </div>
            
            <span style="color:red;font-size:12px;">* <?php echo $payErr;?></span>
           </div>
            <br>
            <div class="submit">
            <input type="submit" value="Submit">
            </div>
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
