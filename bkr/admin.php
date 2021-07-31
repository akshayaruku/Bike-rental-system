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
                    <li id="btn" ><a href="#" >HOME</a></li>
                    <li id="btn1" ><a href="#booking">BOOKINGS</a></li>
                    <li id="btn2" ><a href="#vehicle">UPDATE VEHICLE</a></li>
                    <li id="btn3" ><a href="#booked">PREVIOUS BOOKING</a></li> 
                    <li id="btn3" ><a href="userslog.php">REGISTERED USERS</a></li>
                    <li id="btn3" ><a href="logoutadmin.php">LOG OUT</a></li> 
                    
                </ul>
                </div>
            </nav>
        </div>
        <div id="menuBtn">
            <img src="images/menu.png" id="menu" onclick="function()">
        
        </div>

        <section id="booking"class="booking">
        <h1 style="text-align: center; padding:5px;" >Pending BOOKINGS</h1>
       
        <table border="2" cellspacing="0" cellpadding="20px" style="color:white ">
            <tr>
                <th>BOOKING ID</th>
                <th>BIKE ID</th>
                <th>USER NAME</th>
                <th>RENT PRICE</th>
                <th>PICK UP DATE</th>
                <th>DROP DATE</th>
                <th>UTR Number </th>
                <th>Status </th>
                <th>Action </th>
                
                
                </tr>
            <?php
            $dbhost = "localhost:3307";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "dreambikes";
           $conn1 = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die("Unable to connect to database");
           $sql1 = "SELECT * FROM booking ";
           $result1 = mysqli_query($conn1, $sql1) or die(mysqli_error($conn1));
           
           
           
          
           
           
            while($det = mysqli_fetch_assoc($result1)){
                if($det["bstatus"] === "pending"){
                    $booked = false;
                    $avail = true;
                }else{
                    $booked = true;
                    $avail = false;
                }

                ?>
                <?php
                 if($booked == false) {

                print "<tr><td>";
                echo $det["id"];
                print "</td><td>";
                echo $det["bikeid"];
                print "</td><td>";
                $id = $det["userid"];
                $sql3 = "SELECT * FROM users where id='$id' ";
                $result3 = mysqli_query($conn1, $sql3) or die(mysqli_error($conn1));

                $det1 = mysqli_fetch_assoc($result3);
              
                echo $det1["username"];
                print "</td><td>";
                echo $det["price"];
                print "</td><td>";
                echo $det["pdate"];
                print "</td><td>";
                echo $det["ddate"];
                print "</td><td>";
                echo $det["utr"];
                print "</td><td>";
                

               
                
                ?>
                 <form action="updatestatus.php" method="post">
                  
                 <lable>Pending
                 <input type="radio" value="pending" name="bstatus" <?php  if($avail){echo("checked");}  ?>/></lable>

                
                 <lable>Approve

                 <input type="radio" value="success" name="bstatus"   ?></lable>

                 <lable>Rejected

                 <input type="radio" value="rejected" name="bstatus"   ?></lable>
                 
            <!-- <input type="text" name="status" value="<?php echo $det["status"]; ?> "></input> -->
                <input type="hidden" value="<?php echo $det["id"]?>" name="id"></input>
                <input type="hidden" value="<?php echo $det["bikeid"]?>" name="bikeid"></input>
                <?php print "</td><td>";?> 
                <button type="submit">UPDATE</button>
               
                

                </form>
                <?php } ?>
                 <?php print "</td></tr>";

            ?>
                
                 

            <?php }?>

        </table>
        
        </section>
        <section id="vehicle" class="vehicle">
        <h1 style="text-align: center; padding:5px;" >UPDATE VEHICLE STATUS</h1>
       
        <table border="2" cellspacing="0" cellpadding="20px" style="color:white">
            <tr>
                <th>VEHICLE ID</th>
                <th>VEHICLE NAME</th>
                <th>UPDATE STATUS</th>
                <th></th>
                
                </tr>
            <?php
            while($det2 = mysqli_fetch_assoc($result2)){
                print "<tr><td>";
                echo $det2["id"];
                print "</td><td>";
                echo $det2["name"];
                print "</td><td>";
                if($det2["status"] === "available"){
                    $booked = false;
                    $avail = true;
                }else{
                    $booked = true;
                    $avail = false;
                }
                
                ?>
                 <form action="update.php" method="post">
                 <lable>available
                 <input type="radio" value="available" name="status" <?php  if($avail){echo("checked");}  ?>/></lable>
                 <lable>booked

                 <input type="radio" value="booked" name="status" <?php if($booked){echo("checked");}  ?>/></lable>
            <!-- <input type="text" name="status" value="<?php echo $det2["status"]; ?> "></input> -->
                <input type="hidden" value="<?php echo $det2["id"]?>" name="id"></input>
                <?php print "</td><td>";?> 
                <button type="submit">UPDATE</button>
     
                

                </form>
                 <?php print "</td></tr>";

            ?>
            <?php } ?> 
            </table>
        </section>
        <section id="booked"class="booking">
        <h1 style="text-align: center; padding:5px;" >PREVIOUS BOOKINGS</h1>
       
        <table border="2" cellspacing="0" cellpadding="20px" style="color:white ">
            <tr>
                <th>BOOKING ID</th>
                <th>BIKE ID</th>
                <th>USER NAME</th>
                <th>RENT PRICE</th>
                <th>PICK UP DATE</th>
                <th>DROP DATE</th>
                <th>UTR Number </th>
                <th>ACTION </th>
                
                
                
                </tr>
                <?php
                $dbhost = "localhost:3307";
                $dbuser = "root";
                $dbpass = "";
                 $dbname = "dreambikes";
                $conn1 = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die("Unable to connect to database");
                $sql1 = "SELECT * FROM booking ";
                $result1 = mysqli_query($conn1, $sql1) or die(mysqli_error($conn1));



                $sql2 = "SELECT * FROM bikes ";
                $result2 = mysqli_query($conn1, $sql2) or die(mysqli_error($conn1));


            
            while($det = mysqli_fetch_assoc($result1)){
            

                print "<tr><td>";
                echo $det["id"];
                print "</td><td>";
                echo $det["bikeid"];
                print "</td><td>";
                $id = $det["userid"];
                $sql3 = "SELECT * FROM users where id='$id' ";
                $result3 = mysqli_query($conn1, $sql3) or die(mysqli_error($conn1));

                $det1 = mysqli_fetch_assoc($result3);
              
                echo $det1["username"];
                print "</td><td>";
                echo $det["price"];
                print "</td><td>";
                echo $det["pdate"];
                print "</td><td>";
                echo $det["ddate"];
                print "</td><td>";
                echo $det["utr"];
                print "</td><td>";
                echo $det["bstatus"];?>
               
                <?php print "</td></tr>";

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