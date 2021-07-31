<?php
    session_start();
    if(isset($_SESSION['email'])) { 
                    
      include 'database.php';
      header("Location: index.php");
    }
?>


<?php
$err=false;
if(isset($_GET['err'])){
  $err=true;
}
?>

<html>
<head>
    <title>Rent A Bike Sign up</title>
    <link type="text/css" rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
</head>
<body>
<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>


    <div class="login-page">
    <div class="image">
        <img src="images/rblogo.png" alt="logo" width="400px" height="400px">
    </div>  
    <div class="form">
    
    <form class="login-form" action="signup.php" method="post" enctype="multipart/form-data" >
      
      <input type="text" name="username" placeholder="Username" required />
      <input type="text" name="emailid" placeholder="Email id" required/>
      <input type="text" name="phoneno" placeholder="Phone Number" maxlength="10" onkeypress="return onlyNumberKey(event)"  required/>
      <input type="text" name="aadhar" placeholder="Aadhar Number" maxlength="12" onkeypress="return onlyNumberKey(event)" required/>
      <input type="text" name="driving" placeholder="D.L Number" required/>
      <input type="password" name="password" placeholder="Password" required/>
      <lable for="user"> Upload your document(Aadhar/DL): </lable>
      <input type="file"  name="my_image" required/>
      <button type="submit" name="submit" >Signup</button>
      
      <?php if($err){?>
        <p style="font-color: red">Password does not match! Please re-enter your password</p>
      <?php } ?>
     
      <p class="message">Already have an account? <a href="log2.php">Login here</a></p>
    </form>
  </div>
</div>


<script src="login.js"></script>
<script>
    function onlyNumberKey(evt) {
       
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

    
</script>}
</body>
</html>