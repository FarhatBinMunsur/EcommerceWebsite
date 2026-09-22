<?php
if (!isset($_SESSION)) session_start();

// if($_SERVER['REQUEST_METHOD']=="POST" && $_POST['name']=="Cart"){
//     require_once __DIR__.'/../Model/MyCart.php';
//     $products=viewCart($_SESSION['userID']);
// }
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['action']) && $_POST['action'] == "addtocart") {

        require_once __DIR__ . '/../Model/MyCart.php';
        $value = insertToCart($_POST['productID'],$_POST['quantity']);



    }
}

header('Location:../View/customerHome.php');
exit;

?>