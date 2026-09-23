<?php
session_start();
require_once __DIR__.'/../Model/manageProduct.php';

$catagory=fetchCatagory();

if(isset($_POST['pname'])){
    $pname=$_POST['pname'];
    $catagory=$_POST['ctg'];
    $price=$_POST['pprice'];
    $stock=$_POST['stock'];
    $details=$_POST['details'];


    //Image Operation
    
    $imgName=$_FILES['image']['name'];
    $imgtmpPath=$_FILES['image']['tmp_name'];

    $imgPath=__DIR__. "/../View/images/" .$imgName;

    $dbImagePath = "images/" . $imgName;
    move_uploaded_file($imgtmpPath,$imgPath);
    

    $successmsg=addProduct($pname,$catagory,$price,$stock,$details,$dbImagePath);
    header('Location: ../View/manageProduct.php');
    exit();

}

if(isset($_GET['action']) && $_GET['action']== 'edit'){
    $productID=$_GET['productID'];
    $product=getOneProduct($productID);
    
    
}


if(isset($_GET['action']) && $_GET['action']== 'delete'){
    deleteProduct($_GET['productID']);
    header('Location: ../View/manageProduct.php');
    exit();
}



require_once __DIR__.'/../Model/viewallproduct.php';
$products=showProduct();

require_once __DIR__.'/../View/manageProduct.php';
