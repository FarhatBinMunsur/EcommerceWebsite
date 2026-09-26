<?php

require_once __DIR__ . "/../Model/viewallproduct.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $name = $_GET['name'];

    $product = new Product();

    $products = $product->searchProductByName($name);

    echo json_encode($products);
}
?>