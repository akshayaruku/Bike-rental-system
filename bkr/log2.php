<?php
    session_start();
    if(isset($_SESSION['email'])) { 
                    
      include 'database.php';
      header("Location: index.php");
    }

    elseif(isset($_SESSION['aid'])) { 
                    
      include 'database.php';
      header("Location: adminlogin.php");
    }
?>

<?php
$err=false;
if(isset($_GET['error'])){
  $err=true;
}
$erro=false;
if(isset($_GET['okay'])){
  $erro=true;
}
?>

<html>
<head>
    <title>Rent A Bike Login</title>
    <link type="text/css" rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="login-page">
      <div class="image">
          <img src="images/rblogo.png" alt="logo" width="400px" height="400px">
      </div>

      
          <div class="form">

          

            <form class="login-form" action="loginProcess.php" method="post">

            <?php if($erro){?>
                <p style="font-color: red">Signed up successfully! Login here</p>
              <?php }?>

            <div >
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div>
            <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
        </div>
        <div >
            <button type="submit" name="save" >Login</button>
        </div>
        
    </form>

    
              
              <?php if($err){?>
                <p style="font-color: red">Invalid username or password</p>
              <?php } ?>
              
              <p class="message">Not registered? <a href="sign.php">Create an account</a></p>
            </form>
          </div>
  </div>



</body>
</html>