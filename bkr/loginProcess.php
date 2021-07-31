<?php
session_start();



if(isset($_POST['save']))
{
    extract($_POST);
    
    include 'database.php';

    $salt = "codeflix";
    $password_encrypted = sha1($pass.$salt);

    $sql=mysqli_query($conn,"SELECT * FROM users where email='$email' and password='$password_encrypted'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        
        $_SESSION["email"]=$row['email'];
        $_SESSION['id']=$row['id'];
        $_SESSION['username']=$row['username'];
        
        header("Location: index.php"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>