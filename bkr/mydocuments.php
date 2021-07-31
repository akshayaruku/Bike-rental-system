<?php
				session_start();

                if(isset($_SESSION['aid'])) { 
                    
                    include 'database.php';
                    header("Location: admin.php");
                  }
                elseif(isset($_SESSION['email'])) { 
                    
				include 'database.php';
				$email= $_SESSION["email"];
                $username= $_SESSION["username"];
                $userid= $_SESSION["id"];


 
?>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="index.css">
  <style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			min-height: 100vh;
		}
		.alb {
			width: 600px;
			height: 400px;
			padding: 5px;
		}
		.alb img {
			width: 100%;
			height: 100%;
		}
		a {
			text-decoration: none;
			color: black;
		}
	</style>
</head>
<body>
<h1>Hey! You can find your documents here .</h1>
<div id="sideNav">
            <nav>
            <div id="uli" >
                <ul >
                <br>
                <li id="btn" ><a href="#" >WELCOME <?php echo $_SESSION["username"] ?> ! </a></li>
                    <li id="btn" ><a href="index.php" >HOME</a></li>
                    <li id="btn2" ><a href="bookvehicle.php">BOOK A VEHICLE</a></li> 
                    <li id="btn5" ><a href="mytransactions.php">MY TRANSACTIONS</a></li> 
                    <li id="btn4" ><a href="logout.php">LOG OUT</a></li>
                </ul>
                </div>
            </nav>
        </div>
        <div id="menuBtn">
            <img src="images/menu.png" id="menu" onclick="function()">
        
        </div>
<link type="text/css" rel="stylesheet" href="./index.css">
     <a href="index.php">&#8592;</a>
     
     <?php 
          $sql = "SELECT * FROM users where id= '$userid' ";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="alb">
             	<img src="uploads/<?=$images['image_url']?>">
             </div>
          		
    <?php } }?>
    <script type="text/javascript" src="index.js"></script>



</body>
<?php
                }
else 
                // Redirect if not logged in
                header("Location: log.php");
            ?>