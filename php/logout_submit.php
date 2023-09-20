<?php
    session_start();
    // include 'config.php';
    if(isset($_SESSION["email"])){
        // echo $_SESSION["email"];
        unset($_SESSION['email']);
        header('location: http://127.0.0.1:3000/main/trac_nghiem.html');
    }
    else{
        echo "ko có session";
    }
?>