<?php
 $dbhost = "localhost:3307";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "dreambikes";
$conn1 = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die("Unable to connect to database");

$status = $_POST['status'];
$id = $_POST['id'];
print_r($_POST);

$sql2 = "UPDATE bikes SET status = '$status' WHERE `bikes`.`id` = '$id'";
print_r($sql2);
$result2 = mysqli_query($conn1,$sql2) or die("Unable to fetch");

if($result2){
    header("location:admin.php");
}
?>