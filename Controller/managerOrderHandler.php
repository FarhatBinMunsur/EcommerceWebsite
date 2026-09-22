<?php
session_start();
require_once __DIR__.'/../Model/manageOrder.php';

$orders=viewOrders();

if(isset($_GET['orderid'])){
     $orderid=$_GET['orderid'];

    if($_GET['status']=='on delivery' || $_GET['status']=='completed'){

        $_SESSION['noCancel']="Sorry!! The Order [Order ID: " .$orderid. "] is ".$_GET['status'].
                                ". You Can't cancel the order.";
   
        $_SESSION['noCancelID']=$orderid;
        header('Location:../View/managerOrderView.php');
        exit();

    }
    else{
        cancelOrder($orderid);
        $_SESSION['noCancel']="Canceled Successfully!";
        header('Location:../View/managerOrderView.php');
        exit();

        
    }
    }

    

require_once __DIR__ . '/../View/managerOrderView.php';

