<?php
				session_start();
        
            // if(!isset($_SESSION["order"])){
            //   include 'database.php';
            //   header("Location: booknow.php");
            // }
            $check = $_POST['check'];
             if ($check == "yes") {
              $_SESSION["check"] = 1; //Session is now set
             }
            

                if(isset($_SESSION['aid'])) { 
                    
                    include 'database.php';
                    header("Location: admin.php");
                  }
                elseif(isset($_SESSION['check'])) { 
                    
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
if($rr <= 0){
  header("Location: negative.php");
}


?>
<!DOCTYPE html>



<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  <link rel="stylesheet" href="paystyle.css">
<meta name="robots" content="noindex,follow" />
</head>
<body>

  <div class="checkout-panel">
    <div class="panel-body">
      <h2 class="title">Your total booking amount is ₹<?php echo"$rr"?> </h2>
      <h2 class="title">Complete Payment and fill the required field</h2>

      <div class="payment-method">
        <label for="card" class="method card">
          <div class="card-logos">
            <img src="img/gpay_logo.jpg" width=100px/>
            
          </div>

          <div class="radio-input">
            <input id="card" type="radio" name="payment">
            I have Paid ₹<?php echo"$rr"?> using Google pay UPI
          </div>
        </label>

        <label for="paypal" class="method paypal">
          <img src="img/PhonePe_logo.png" width=130px/>
          <div class="radio-input">
            <input id="paypal" type="radio" name="payment">
            I have Paid ₹<?php echo"$rr"?> using Phonepe UPI
          </div>
        </label>
      </div>
      <form action="submitted.php" method="post">            
      <div class="input-fields">
       
        <div class="column-2">
          <h3 for="cardnumber">ENTER UTR NUMBER*</h3>
          <input type="text" id="utr" name="utr"  maxlength=12 required="required" />
          
          <span class="info">*Please enter your 12 digits unique transaction number(UTR).</span>

          
          <!--for confirmation-->
       
          <input type="hidden" value="yes" name="checkk" id="checkk">
          <input type="hidden" id="bid" name="bid" id="bid" value=<?php echo"$bid"?> placeholder=<?php echo"$bid"?> readonly/>

        
          
        
          <input type="hidden" id="vname" name="vname" id="vname" value=<?php echo"$vname"?> placeholder=<?php echo"$vname"?> readonly/>

          
          <input type="hidden" id="id" name="id" id="id" value=<?php echo"$id"?> placeholder=<?php echo"$id"?> readonly/>

          
          <input type="hidden" id="rr" name="rr" id="rr" value=<?php echo"$rr"?> placeholder=<?php echo"$rr"?> readonly/>

          
          <input type="hidden" id="pdate" name="pdate" id="pdate" value=<?php echo"$pdate"?> placeholder=<?php echo"$pdate"?> readonly/>

      
          <input type="hidden" id="ddate" name="ddate" id="ddate" value=<?php echo"$ddate"?> placeholder=<?php echo"$ddate"?> readonly/>

          <input type="hidden" id="vname" name="vname" id="vname" value=<?php echo"$vname"?> placeholder=<?php echo"$vname"?> readonly/>

        </div>
      </div>

    </div>

    
         
      
          <div class="panel-footer">
      
      <button type="submit" class="btn next-btn">Next Step</button>
    </div>
    
    </form>

    
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  
</body>
</html>

<?php
                }
else 
                // Redirect if not ordered yet 
                header("Location: payfalse.php");
            ?>