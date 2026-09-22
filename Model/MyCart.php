<?php
if(!isset($_SESSION))session_start();
$userID=$_SESSION['userID'];

require_once __DIR__.'/../db/db.php';

function establishConnection(){
    $connection = new DbConnection();
    $conn = $connection->connect();
    return $conn;
}

function insertToCart($productID,$quantity){

    $conn=establishConnection();
    $sql="select * from cart where userID=1 and productID='$productID'";
    $result=$conn->query($sql);

    //check if user have product in the cart
    if($result->num_rows>0){

        $sql="select price from product where productID='$productID'";
        $result=$conn->query($sql)->fetch_assoc();
        $price=$result['price']*$quantity;

        $sql="update cart set Quantity=Quantity+$quantity , price=price+$price where productID='$productID'";
        $conn->query($sql);

        $sql="update product set stock=(stock-$quantity) where productID='$productID' ";
        $conn->query($sql);

    }

  
    else{
    $sql="select price from product where productID='$productID'";
    $result=$conn->query($sql)->fetch_assoc();
    $price=$result['price']*$quantity;

    $sql = "INSERT INTO cart (userID, ProductID, Quantity,price)
            VALUES (1, $productID, $quantity,$price)";
    $result = $conn->query($sql);

    $sql="update product set stock=(stock-$quantity) where productID='$productID' ";
    $conn->query($sql);
    return $result;
    }
}


function viewCart($userID)
{
    $conn = establishConnection();

    $sql = "SELECT * FROM cart join product on cart.productID = product.productID WHERE userID = '$userID';";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Query failed: " . $conn->error);
    }

    $cart = [];
    while ($row = $result->fetch_assoc()) {
        $cart[] = $row;
    }

    return $cart;
}


if(isset($_GET['cartID'])){

    $cartID=$_GET['cartID'];
    $conn=establishConnection();
    $sql="select productID,Quantity from cart where CartID='$cartID'";
    $result=$conn->query($sql);

    while($row=$result->fetch_assoc()){
        $productID=$row['productID'];
        $quantity=$row['Quantity'];
    }

    //put back to product
    $sql1="update product set stock=stock+$quantity where productID='$productID';";
    $sql1 .= "delete from cart where CartID='$cartID';";
    $conn->multi_query($sql1);

    header('Location:../Controller/cartHandler.php');


}

function confirmOrder($userID,$deliveryLocation,$phone,$paymentType){
    
    $conn=establishConnection();

    $orderDate=date('Y-m-d');
    $status="pending";
    //order insert
    $sql="insert into orders(userID,deliveryLocation,phone,paymentType,orderDate,status) values('2','$deliveryLocation','$phone','$paymentType','$orderDate','$status')";
    $result=$conn->query($sql);
    $orderID=$conn->insert_id;

    $sql="select * from cart where userID='$userID'";
    $result=$conn->query($sql);

    while($row=$result->fetch_assoc()){

        $productID=$row['ProductID'];
        $quantity=$row['Quantity'];
        $price=$row['price'];
        
        $sql="insert into order_items(orderID,productID,quantity,price) values('$orderID','$productID','$quantity','$price')";
        $conn->query($sql);
    }

    //delete from cart
    $sql = "delete from cart where userID='$userID'";
    $conn->query($sql);

    
}

