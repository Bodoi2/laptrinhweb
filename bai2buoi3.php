<?php
$firstname = $lastname = $email = $id = $pay= $additionalInfo = "";
$firstnameErr = $lastnameErr = $emailErr = $idErr = $payErr = $uploadErr = "";
$formSubmitted = false;
$image_path = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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
        if (!preg_match('/^[0-9]*$/', $id)) {
            $idErr = "ID chỉ chứa chữ số thôi";
            $formSubmitted = false;
        }
    }
    if (empty($_POST["pay"])) {
        $payErr = "Bạn thanh toán cho cái gì";
        $formSubmitted = false;
    } else {
        $pay = $_POST["pay"];
    }

    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {  
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true); 
        }
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOK = 1;

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check === false) {
            $uploadErr = "Tệp không phải là hình ảnh.";
            $uploadOK = 0;
        }

        if (file_exists($target_file)) {
            $uploadErr = "Xin lỗi, ảnh đã tồn tại.";
            $uploadOK = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            $uploadErr = "Xin lỗi, ảnh của bạn kích cỡ quá lớn.";
            $uploadOK = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadErr = "Xin lỗi, chỉ chấp nhận các tệp JPG, JPEG, PNG & GIF.";
            $uploadOK = 0;
        }

        if ($uploadOK !== 0) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $image_path = $target_file; 
            } else {
                $uploadErr = "Xin lỗi, đã xảy ra lỗi khi tải ảnh của bạn.";
                
            }
        }
    } 
    $additionalInfo = isset($_POST['additionalInfo']) ? $_POST['additionalInfo'] : '';
    
}
?>

<html>
<head>
  <link rel="stylesheet" href="bai2buoi3.css">
</head>
<body> 
    <?php if ($formSubmitted) { ?>
      <div class="container">
        <p>Firstname: <?php echo htmlspecialchars($firstname); ?></p>
        <p>Lastname: <?php echo htmlspecialchars($lastname); ?></p>
        <p>Email: <?php echo htmlspecialchars($email); ?></p>
        <p>Invoice ID: <?php echo htmlspecialchars($id); ?></p>
        <p>Pay For: <?php echo implode(", ", $pay); ?></p>
        <?php if ($image_path != ""): ?>
            <p>Ảnh đã tải lên:</p>
            <img src="<?php echo htmlspecialchars($image_path); ?>" alt="Ảnh đã tải lên" style="width: 300px; height: auto;">
        <?php else: ?>
            <?php
            if ($uploadErr) {
                echo '<p style="color:red;">' . $uploadErr . '</p>';}?>
                <p style="color:red;">Không có ảnh nào được tải lên.</p>
        <?php endif; ?>
            <p style="width: 300px; word-wrap: break-word;">Additional Information: <?php echo nl2br(htmlspecialchars($additionalInfo)); ?></p>
        <br><br>
        <button onclick="window.location.href='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'">Trở lại</button>
      </div>        
    <?php } else { ?>        
    <div class="container">
      <h1 class="tieude">Payment Receipt Upload Form</h1>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data"> 
        <p class="truong">Name</p> 
        <div class="hang1">
            <div>
                <div class="o1">
                    <input type="text" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>" >
                    <span style="color:red;font-size:12px;">* <?php echo $firstnameErr;?></span>
                </div>
                <p class="chuthich">First Name</p>
            </div>
            <div>
                <div class="o2">
                    <input type="text" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>" >
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
                    <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" >
                    <span style="color:red;font-size:12px;">* <?php echo $emailErr;?></span>
                </div>
                <p class="chuthich">example@example.com</p>
            </div>
            <div>
                <p class="truong">Invoice ID</p>
                <div class="o4">
                    <input type="text" name="id" value="<?php echo htmlspecialchars($id); ?>" >
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
                    <label><input type="checkbox" name="pay[]" value="Waste Free Merchandise"> Waste Free Merchandise</label>
                    <label><input type="checkbox" name="pay[]" value="Donation"> Donation</label>
                </div>
            </div>
            <span style="color:red;font-size:12px;">* <?php echo $payErr;?></span>
        </div>
        <br><br>            
        <p class="truong">Please upload your payment receipt.</p>
        <input type="file" name="fileToUpload">
        <br><br>
        <div class="hang4">
        <p class="truong">Additional Information</p>
        <textarea id="additionalInfo" name="additionalInfo"  placeholder="Type here..."></textarea>
        </div>
        <br><br>           
        <div class="submit">
            <input type="submit" value="Submit">
        </div>      
      </form> 
    </div>
    <?php } ?>  
</body>
</html>
