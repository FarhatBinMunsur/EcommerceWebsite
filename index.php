<?php

session_start();
 var_dump($_SESSION["role"]); 

if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] == "customer") {
        header("Location:View/customerHome.php");
        exit();
    }

    if ($_SESSION["role"] =="manager") {
        header("Location:View/managerHome.php");
        exit();
    }
}

else{
    header("Location: View/signin.php");
}
