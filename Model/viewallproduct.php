<?php
require_once __DIR__.'/../db/db.php';

class Product{
public function establishConnection(){
    $conn=new DbConnection();
    return $conn->connect();
}



public $products=[];
public function showProduct(){
    $sql="select * from product";
    $conn=$this->establishConnection();
    $result=$conn->query($sql);

    // var_dump($result);
    
    if($result->num_rows>0){
        while ($row=$result->fetch_assoc()) {
            
            $this->products[]=$row;
           
        }
        return $this->products;
    }

}

public function searchProductByName($name){
$conn=$this->establishConnection();
$sql= "select * from product where name like '%$name%'";
$result=$conn->query($sql);

$products=[];
while ($row=$result->fetch_assoc()) {
    $products[]=$row;

}
return $products;

}
}
?>