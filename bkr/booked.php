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

$id = $_SESSION['id'];

$dbhost = "localhost:3307";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "dreambikes";
$conn1 = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die("Unable to connect to database");

$bid = $_POST['bikeid'];
$vname = $_POST['vehicle'];
$rentr = $_POST['rents'];
$pdate = $_POST['pdate'];
$ddate = $_POST['ddate'];

$datetime1 = strtotime($pdate);
$datetime2 = strtotime($ddate);
$secs = $datetime2 - $datetime1;// == return sec in difference
$days = $secs / 3600;

$rr = $rentr* $days;


$sql2 = "UPDATE bikes SET status='booked' WHERE id='$bid'";
$result2 = mysqli_query($conn1, $sql2) or die("Unable to fetch");

$sql  = "INSERT INTO booking(bikeid, userid, price, pdate, ddate) values ('$bid','$id','$rr','$pdate','$ddate')";
$res = mysqli_query($conn1,$sql) or die(mysqli_error($conn1));

$sql1 = "SELECT * FROM booking WHERE userid='$id'  order by id desc limit 1";
$result = mysqli_query($conn1, $sql1) or die(mysqli_error($conn1));

$sql3 = "SELECT * FROM users WHERE id='$id'";
$result3 = mysqli_query($conn1, $sql3) or die(mysqli_error($conn1));

?>
<html>
    <head>
        <title>Booking successful</title>
        <link type="text/css" rel="stylesheet" href="booked.css">
    </head>
    <body>
        <section class="sec">
        <h1 style="margin:center; color:white;">BOOKING SUCCESSFUL</h1>
        </br>
        <table border="2" cellspacing="0" cellpadding="20px" style="color:white">
            <tr>
                <th>BOOKING ID</th>
                <th>BIKE ID</th>
                <th>USER NAME</th>
                <th>RENT PRICE</th>
                <th>PICK UP DATE</th>
                <th>DROP DATE</th>
                </tr>
            <?php
            $det = mysqli_fetch_assoc($result);
                print "<tr></br><td>";
                echo $det["id"];
                print "</td><td>";
                echo $det["bikeid"];
                print "</td><td>";

            $det1 = mysqli_fetch_assoc($result3);
                echo $det1["username"];
                print "</td><td>";
                echo $det["price"];
                print "</td><td>";
                echo $det["pdate"];
                print "</td><td>";
                echo $det["ddate"];
                print "</td></tr>";

            ?>

        </table></br>
        <h1 style="margin:center; color:white;">CONTACT BRANCH TO VERIFY DOCUMENTS AND PICK UP VEHICLE</h1>
        <a href="bookvehicle.php" class="bookbutton">GO BACK TO PREVIOUS PAGE</a>
    </body>
    </section>
    
</html>
<?php
                }
else 
                // Redirect if not logged in
                header("Location: log.php");
            ?>