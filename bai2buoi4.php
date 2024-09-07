
<html>
<head>
  <link rel="stylesheet" href="bai2buoi3.css">
</head>
<body>     
    <div class="container">
      <h1 class="tieude">Payment Receipt Upload Form</h1>
      <form action="bai2buoi4_xuly.php" method="post" enctype="multipart/form-data"> 
        <p class="truong">Name</p> 
        <div class="hang1">
            <div>
             <input type="text" name="firstname" required>
             <p class="chuthich">First Name</p>
            </div>
            <div>
             <input type="text" name="lastname" required>
             <p class="chuthich">Last Name</p>
            </div>  
        </div>
        <br><br>
        <div class="hang2">
            <div>
             <p class="truong">Email</p>
             <input type="text" name="email" required>
             <p class="chuthich">example@example.com</p>
            </div>
            <div>
             <p class="truong">Invoice ID</p>
             <input type="text" name="id" required>
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
        </div>
        <br><br>                 
        <div class="submit">
            <input type="submit" value="Submit">
        </div>      
      </form> 
    </div>
</body>
</html>
