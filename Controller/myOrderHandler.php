<?php
session_start();
require_once __DIR__.'/../Model/myOrder.php';

$orders=viewOrders('1');

if(isset($_GET['orderid'])){
     $orderid=$_GET['orderid'];

    if($_GET['status']=='pending'){
    cancelOrder($orderid);
    $_SESSION['noCancel']="Canceled Successfully!";
    header('Location:../View/myOrders.php');
}else{
    $_SESSION['noCancel']="Sorry!! Your Order [Order ID: " .$orderid. "] is Accepted.You Can't cancel the order.
                            \nPlease Contact the Customer care Service.";
   
    $_SESSION['noCancelID']=$orderid;
    header('Location:../View/myOrders.php');

}
}
// var_dump($orders);

