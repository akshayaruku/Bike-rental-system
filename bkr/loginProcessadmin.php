<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'database.php';
    $sql=mysqli_query($conn,"SELECT * FROM admin where aemail='$email' and password='$pass'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        
        $_SESSION["aemail"]=$row['aemail'];
        $_SESSION['aid']=$row['aid'];
        $_SESSION['username']=$row['username'];
        
        header("Location: admin.php"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>