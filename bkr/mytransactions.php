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
  <link rel="stylesheet" href="mytransactions.css">
  <style>
    .bn49 {
  border: 0;
  text-align: center;
  display: inline-block;
  padding: 14px;
  width: 150px;
  margin: 7px;
  color: #ffffff;
  background-color: #36a2eb;
  border-radius: 8px;
  font-family: "proxima-nova-soft", sans-serif;
  font-weight: 600;
  text-decoration: none;
  transition: box-shadow 200ms ease-out;
}
  </style>
  
</head>

<body>
<a class="bn49" href="index.php">Go to Homepage</a>

  <table>
  
    <thead>
      <tr>
        <th>Bike Name</th>
        <th>Price</th>
        <th>Status</th>
        <th>Pickup Date</th>
        <th>Drop Date</th>
        <th>UTR Number</th>
        <th></th>
      </tr>
      <?php
                $dbhost = "localhost:3307";
                $dbuser = "root";
                $dbpass = "";
                $dbname = "dreambikes";
                $conn1 = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die("Unable to connect to database");
                $sql1 = "SELECT * FROM booking where userid= '$userid' ";
                $result1 = mysqli_query($conn1, $sql1) or die(mysqli_error($conn1));
               
                

                
            while($det = mysqli_fetch_assoc($result1)){
                if($det["bstatus"] === "pending"){
                    $reviewpending = true;
                    $success = false;
                    $class1 = "status-icon pending";
                }elseif($det["bstatus"] =="success"){
                    $success = true;
                    $reviewpending = false;
                    $class1 = "status-icon approved";
                }
                else{
                  $class1 = "status-icon review";
                }
            
                ?>
    </thead>
    <tbody>

    
                <?php
                ?>

        <tr class="table-row">
       
         <td><?php echo $det["vname"]?></td>
         
        <td><?php echo $det["price"]?></td>
        
       <td>
           <span class="<?php echo"$class1"?>">
         </span>
         <?php
         echo $det["bstatus"];
         ?>
       </td>
         <td><?php echo $det["pdate"]?></td>
         </td>
         <td><?php echo $det["ddate"]?></td>
         </td>
         <td><?php echo $det["utr"]?></td>
       </tr>
       <?php

   
    ?>
      </tr>

      
     
    </tbody>
    <?php }
      ?>
  </table>
 

</body>
<?php
                }
else 
                // Redirect if not logged in
                header("Location: log.php");
            ?>