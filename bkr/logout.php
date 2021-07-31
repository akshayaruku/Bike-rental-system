<?php
    session_start();
    
    unset($_SESSION["email"]);
    unset($_SESSION["check"]);
    unset($_SESSION["checkk"]);
    unset($_SESSION["id"]);
    unset($_SESSION["username"]);
    header("Location:log.php");
?>