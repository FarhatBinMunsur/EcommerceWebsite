<?php
require_once __DIR__ . "/../Model/userModel.php";
session_start();

if (isset($_POST["email"]) && isset($_POST["pass"])) {
    //return an array
    $result = loginCheck($_POST["email"], $_POST["pass"]);
    // var_dump($_POST);
    // var_dump($result);
    if ($result) {
    var_dump($result);
    
    $_SESSION["userID"] = $result[0];
    $_SESSION["role"] = $result[1];

    // var_dump($_SESSION["role"]);

     header("Location:../index.php");
    
    }

    else{
        $_SESSION["loginerror"] = "Invalid Username or password";

    }
    
}

    header("Location:../index.php");
