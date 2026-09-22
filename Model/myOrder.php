<?php
require_once __DIR__. '/../db/db.php';

function establishConnection(){
    $connection = new DbConnection();
    $conn = $connection->connect();
    return $conn;
}
function viewOrders($userID){
    $conn=establishConnection();
    $orders=[];
    $sql="select orderID,status from orders where userID= '$userID'";
    $result=$conn->query($sql);

    while($row=$result->fetch_assoc()){
    $orderID=$row['orderID'];
    $status=$row['status'];   
    
    $sql2="select product.name,product.price,order_items.quantity,order_items.price as total  from order_items join product on order_items.productID=product.productID where orderID='$orderID'";
    $result2=$conn->query($sql2);
    while($row2=$result2->fetch_assoc()){
        $orders[$orderID][]=$row2;
        $orders[$orderID]['status']=$status;
    }
    }

    return $orders;

}

function cancelOrder($orderid){
    $conn=establishConnection();


    $sql="delete from order_items where orderID=$orderid";
    $conn->query($sql);
    
    $sql="delete from orders where orderID=$orderid";
    $conn->query($sql);

    

}