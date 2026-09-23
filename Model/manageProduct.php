<?php
require_once __DIR__ ."/../db/db.php";



function fetchCatagory(){
    $connection = new DbConnection();
    $conn = $connection->connect();

    $sql="select catagoryName from catagory";

    $catagory =[];
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $catagory[] = $row['catagoryName'];
       
    }
     return $catagory;
}
function addProduct($name,$catagory,$price,$stock,$details,$imgPath){
    $connection = new DbConnection();
    $conn = $connection->connect();

    //existing product?? -update 
    $sql= "select count(*) as total from product where name='$name'";
    $result= $conn->query($sql)->fetch_assoc();

    if($result['total']>0){
        $sql= "update product SET name = '$name' , catagory = '$catagory', price = '$price', stock = '$stock', details = '$details' , image='$imgPath' WHERE name = '$name'";

        $conn->query($sql);
        $result=$conn->query($sql);
        

    }

    //else add new product 
    else{
    $sql= "insert into product(name,catagory,price,stock,details,images) values('$name','$catagory','$price','$stock','$details')";
    $result=$conn->query($sql);
    return $conn->insert_id;
    }
}

function deleteProduct($productID){
    $connection = new DbConnection();
    $conn = $connection->connect();
    $sql= "delete from product where productID='$productID'";
    $result=$conn->query($sql);
}

function getOneProduct($productID){
    $connection = new DbConnection();
    $conn = $connection->connect();
    $sql= "select * from product where productID='$productID'";
    $result=$conn->query($sql);
    return $result->fetch_assoc();
}