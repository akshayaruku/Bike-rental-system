<?php
    $url='localhost:3307';
    $username='root';
    $password='';
    $conn=mysqli_connect($url,$username,$password,"dreambikes");
    if(!$conn){
        die('Could not Connect My Sql:' .mysql_error());
    }
?>