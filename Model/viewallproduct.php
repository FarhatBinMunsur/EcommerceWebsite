<?php
require_once __DIR__.'/../db/db.php';
function establishConnection(){
    $conn=new DbConnection();
    return $conn->connect();
}

$products=[];
function showProduct(){
    $sql="select * from product";
    $conn=establishConnection();
    $result=$conn->query($sql);

    // var_dump($result);
    
    if($result->num_rows>0){
        while ($row=$result->fetch_assoc()) {
            
            $products[]=$row;
           
        }
        return $products;
    }

}
?>