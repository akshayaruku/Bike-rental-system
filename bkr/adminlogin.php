<?php
    session_start();
    if(isset($_SESSION['email'])) { 
                    
      include 'database.php';
      header("Location: index.php");
    }
    elseif(isset($_SESSION['aid'])) { 
                    
        include 'database.php';
        header("Location: admin.php");
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
          <img src="images/admin.jpg" alt="logo" width="400px" height="400px">
      </div>
          <div class="form">


            <form class="login-form" action="loginProcessadmin.php" method="post">

            <div >
        	<input type="email" class="form-control" name="email" placeholder="email" required="required">
        </div>
		<div>
            <input type="password" class="form-control" name="pass" placeholder="password" required="required">
        </div>
        <div >
            <button type="submit" name="save" >Login</button>
        </div>
        
    </form>

    
              
             
              
              
            </form>
          </div>
  </div>


<script src="login.js"></script>
</body>
</html>