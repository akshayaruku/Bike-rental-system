<?php


        session_start();
    
            if(isset($_SESSION['email'])) { 
                    
        include 'database.php';
        header("Location: index.php");
    }
        elseif(isset($_SESSION['aid'])) { 
            $username= $_SESSION["username"];
        include 'database.php';
        
        
        
    
 $dbhost = "localhost:3307";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "dreambikes";
$conn1 = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die("Unable to connect to database");
$sql1 = "SELECT * FROM booking ";
$result1 = mysqli_query($conn1, $sql1) or die(mysqli_error($conn1));



$sql2 = "SELECT * FROM bikes ";
$result2 = mysqli_query($conn1, $sql2) or die(mysqli_error($conn1));

?>
<html>
<head>
    <title>Rent A Bike</title>
    <link type="text/css" rel="stylesheet" href="./admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">    
</head>
<body>
<header class="head">
        <h1><img src="images/home1.png" style="width:80px; height:80px; vertical-align:middle;"/>RENT A BIKE -Handling Admin name (<?php echo $_SESSION["username"] ?> )</h1>
        
    </header>
    <!-- hamburger menu -->
    <div id="sideNav">
            <nav>
            <div id="uli" >
                <ul >
                    <li id="btn" ><a href="admin.php" >HOME</a></li>
                    
                    
                </ul>
                </div>
            </nav>
        </div>
        <div id="menuBtn">
            <img src="images/menu.png" id="menu" onclick="function()">
        
        </div>

       
        <section id="booked"class="booking">
        <h1 style="text-align: center; padding:5px;" >USERS LIST</h1>
       
        <table border="2" cellspacing="0" cellpadding="20px" style="color:white ">
            <tr>
                <th>USER ID</th>
                <th>EMAIL ID</th>
                <th>USER NAME</th>
                <th>PHONE NO</th>
                <th>AADHAAR ID</th>
                <th>DRIVING ID</th>
                <th> ID PHOTO</th>
                
                
                
                
                </tr>
                <?php
                $dbhost = "localhost:3307";
                $dbuser = "root";
                $dbpass = "";
                 $dbname = "dreambikes";
                $conn1 = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die("Unable to connect to database");
                $sql1 = "SELECT * FROM users order by id asc ";
                $result1 = mysqli_query($conn1, $sql1) or die(mysqli_error($conn1));




            
            while($det = mysqli_fetch_assoc($result1)){
            

                print "<tr><td>";
                echo $det["id"];
                print "</td><td>";
                echo $det["email"];
                print "</td><td>";
                print $det["username"];
                print "</td><td>";
                echo $det["phoneno"];
                print "</td><td>";
                echo $det["aadhar"];
                print "</td><td>";
                echo $det["driving"];
                print "</td><td>";?>
                <div class="alb">
                 <img src="uploads/<?=$det['image_url']?>">
                 </div>
                 <?php
                 print "</td></tr>";

            ?>
                
                 

            <?php }?>

        </table>
                


        <div id="about" class="about">
        <h1 style="text-align: center; padding:5px;" >CONTACT US</h1>
        <div class="footer-container">
        <div class="footbox">
            <h4 style="text-align: center; text-decoration-line: underline ;">RENT A BIKE</h4>
            <h5 style="text-align: center;  padding:0px; color:#d6d6d6;">Privacy Policy</h5>
            <h5 style="text-align: center;  padding:0px; color:#d6d6d6;">Terms & Conditions</h5>
            <h5 style="text-align: center;  padding:0px; color:#d6d6d6;">Payment Methods</h5>
            <h5 style="text-align: center;  padding:0px; color:#d6d6d6;">Earn with us</h5>
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
            <h4 style="text-align: center;  padding-bottom:5px; margin-bottom:0px;color:#d6d6d6;">SHASHANK C R & SHASHIKUMAR S U, 5th SEM, MCE HASSAN</h4>
            
        </div>


</div>
        </div>
</body>
<script type="text/javascript" src="index.js">
 
</script>
</html>
<?php
                }
else 
                // Redirect if not logged in
                header("Location: log.php");
            ?>