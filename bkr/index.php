<?php
				session_start();
                unset($_SESSION["check"]);
                unset($_SESSION["checkk"]);

                if(isset($_SESSION['aid'])) { 
                    
                    include 'database.php';
                    header("Location: admin.php");
                  }
                elseif(isset($_SESSION['email'])) { 
                    
				include 'database.php';
				$email= $_SESSION["email"];
                $username= $_SESSION["username"];


 $dbhost = "localhost:3307";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "dreambikes";
$conn1 = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die("Unable to connect to database");
$sql = "SELECT * from bikes";
$res = mysqli_query($conn1, $sql) or die("Unable to fetch");

?>
<html>
<head>
    <title>Rent A Bike</title>
    <link type="text/css" rel="stylesheet" href="./index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">    
</head>
<body>
    <header class="head">
        <h1><img src="images/home1.png" style="width:80px; height:80px; vertical-align:middle;"/>RENT A BIKE</h1>
        <a href="#about_us" class="bookbutton" style="width: 130px;"> EXPLORE </a>

        <a href="bookvehicle.php" class="bookbutton" style="width: 130px;">BOOK NOW</a>
    </header>
    <!-- hamburger menu -->
    <div id="sideNav">
            <nav>
            <div id="uli" >
                <ul >
                <br>
                <li id="btn" ><a href="#" >WELCOME <?php echo $_SESSION["username"] ?> ! </a></li>
                    <li id="btn" ><a href="#" >HOME</a></li>
                    <li id="btn1" ><a href="#about_us">ABOUT RENT A BIKE</a></li>
                    <li id="btn2" ><a href="bookvehicle.php">BOOK A VEHICLE</a></li> 
                    <li id="btn5" ><a href="mytransactions.php">MY TRANSACTIONS</a></li> 
                    <li id="btn3" ><a href="#about">CONTACT US</a></li>
                    <li id="btn3" ><a href="mydocuments.php">MY DOCUMENTS</a></li>
                    <li id="btn4" ><a href="logout.php">LOG OUT</a></li>
                </ul>
                </div>
            </nav>
        </div>
        <div id="menuBtn">
            <img src="images/menu.png" id="menu" onclick="function()">
        
        </div>
        <section id="home"class="home">
        



        
        </section>
        
        <!-- about website section -->
        <section id="about_us"class="aboutus">
            <h1 style="text-align: center; padding:5px;" >ABOUT RENT A BIKE</h1>
            <h3 style="text-align: center; padding:5px;" >WHY CHOOSE US</h3>
            <div class="block1">
                <div class="b1img">
                    <img style="width:200px; height:200px; border-radius:10px;" src="images/service.jpg" alt="cleanbike">
                </div>
                <div class="b1desc">
                    <h3>• The vehicles are in good condition and well maintained.</br></br>• They undergo regular service checks after every ride to ensure that there won't be any problem.</h3>
                </div> 
            </div>

             <div class="block1">
               
                <div class="b1desc">
                    <h3 > • We prefer safety over speed.</br></br> • We provide helmets to both rider and  pillion to ensure safety.</h3>
                </div> 
                 <div class="b1img">
                    <img style="width:200px; height:200px;  border-radius:10px;"src="images/helmet.jpg" alt="helmet">
                </div>
            </div>

             <div class="block1">
                <div class="b1img">
                    <img style="width:200px; height:200px; border-radius:10px;"src="images/sanitise.jpg" alt="cleanbike">
                </div>
                <div class="b1desc">
                    <h3>• We follow the COVID guidelines of the Government.</br></br>• After each ride, vehicles and helmets will be sanitised. </h3>
                </div> 
            </div>

        


        <div id="about" class="about">
        <h1 style="text-align: center; padding:5px;" >CONTACT US</h1>

        <div class="footer-container">
        <div class="footbox">
            <h4 style="text-align: center; text-decoration-line: underline ;">RENT A BIKE</h4>
            <h5 style="text-align: center;  padding:0px; color:#d6d6d6;">Privacy Policy</h5>
            <h5 style="text-align: center;  padding:0px; color:#d6d6d6;">Terms & Conditions</h5>
            <h5 style="text-align: center;  padding:0px; color:#d6d6d6;">Payment Methods</h5>
            
        </div>
            <div class="footbox" >
                    <h4 style="text-align: center; text-decoration-line: underline ;  ">FOLLOW US ON</h4>
                    <div class="social">
                    
                   <a href="https://www.facebook.com/" > <h5 style=" padding:0px; color:#d6d6d6;"><img style="width:auto;height:30px; vertical-align:middle;" src="./images/social/facebook.png"></img></a>    FACEBOOK</h5>
                    
                    
                   <a href="https://www.instagram.com/"  ><h5 style=" padding:0px; color:#d6d6d6;"><img style="width:auto;height:30px; vertical-align:middle;"src="./images/social/instagram.png"></img></a> INSTAGRAM</h5>

                   
                   <a href="https://twitter.com/?lang=en " ><h5 style=" padding:0px; color:#d6d6d6;"><img style="width:auto;height:30px; vertical-align:middle;"src="./images/social/twitter.png"></img></a> TWITTER</h5>

                  

                    
                    </div>
            </div>
            <div class="footbox" >
                    <h4 style="text-align: center; text-decoration-line: underline ;">FOR QUERIES</h4>
                   <h5 style=" padding:0px; color:#d6d6d6;"><img style="width:auto;height:30px; vertical-align:middle;"src="./images/social/gmail.png"></img></a> rentabike@gmail.com</h5>
                   <h5 style=" padding:0px; color:#d6d6d6;"><img style="width:auto;height:30px; vertical-align:middle;"src="./images/social/call.png"></img></a> 08172 - 30704</h5>
                   <h5 style=" padding:0px; color:#d6d6d6;"><img style="width:auto;height:30px; vertical-align:middle;"src="./images/social/whatsapp.png"></img></a> +91 9876543210</h5>

        </div>
                </div>
                <div class="footbox">
            <h4 style="text-align: center; text-decoration-line: underline ;">DEVELOPERS</h4>
            <h4 style="text-align: center;  padding-bottom:5px; margin-bottom:0px;">AKSHAY H A, SHASHANK C R & SURAJ GOWDA K T, 6th SEM, MCE HASSAN</h4>
            
        </div>



        </div>



</body>
<script type="text/javascript" src="index.js"></script>
</html>

<?php
                }
else 
                // Redirect if not logged in
                header("Location: log.php");
            ?>