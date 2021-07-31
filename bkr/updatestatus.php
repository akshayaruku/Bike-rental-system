<?php
 $dbhost = "localhost:3307";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "dreambikes";
$conn1 = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die("Unable to connect to database");

$bstatus = $_POST['bstatus'];
$id = $_POST['id'];
$bikeid = $_POST['bikeid'];
print_r($_POST);

$sql2 = "UPDATE booking SET bstatus = '$bstatus' WHERE `id` = '$id'";
print_r($sql2);
$result2 = mysqli_query($conn1,$sql2) or die("Unable to fetch");

if($bstatus === "success"){
$sql2 = "UPDATE bikes SET status='booked' WHERE id='$bikeid'";
$result2 = mysqli_query($conn1, $sql2) or die("Unable to fetch");
}

if($result2){
    header("location:admin.php");
}
?>