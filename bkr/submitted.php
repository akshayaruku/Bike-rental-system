<?php
				session_start();
       
        $checkk = $_POST['checkk'];
        if ($check == "yes") {
         $_SESSION["checkk"] = 1; //Session is now set
        }

                if(isset($_SESSION['aid'])) { 
                    
                    include 'database.php';
                    header("Location: admin.php");
                  }
                
                
                  elseif(isset($_SESSION['check'])) { 
                    
				include 'database.php';
				$email= $_SESSION["check"];
                $username= $_SESSION["username"];

                $id = $_SESSION['id'];

                $dbhost = "localhost:3307";
                 $dbuser = "root";
                 $dbpass = "";
                 $dbname = "dreambikes";
                $conn1 = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die("Unable to connect to database");
                
                $bid = $_POST['bid'];
                $vname = $_POST['vname'];
                $rr = $_POST['rr'];
                $pdate = $_POST['pdate'];
                $ddate = $_POST['ddate'];
                $utr = $_POST['utr'];
                $vname = $_POST['vname'];


                $sql  = "INSERT INTO booking(bikeid, userid, price, pdate, ddate, utr, bstatus, vname) values ('$bid','$id','$rr','$pdate','$ddate', '$utr', 'pending' , '$vname')";
                $res = mysqli_query($conn1,$sql) or die(mysqli_error($conn1));

                unset($_SESSION["check"]);
                // unset($_SESSION["checkk"]);
                header("Location: mytransactions.php");
                }
                
                else{
                  include 'database.php';
                  header("Location: payfalse2.php");

                }
?>

