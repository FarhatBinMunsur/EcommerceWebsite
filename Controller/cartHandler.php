<?php
session_start();
require_once __DIR__. '/../Model/MyCart.php';

$cart=viewCart($_SESSION['userID']);

$_SESSION['cart']=$cart;

// var_dump($_SESSION);

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['cforder'])){
    
        confirmOrder($_POST['confirm'],$_POST['dl'],$_POST['phone'],$_POST['pmt']);
        // require_once __DIR__. '/../Model/MyCart.php';
        header('Location:../View/customerHome.php');
        exit();
    
}

header('Location:../View/myCart.php');