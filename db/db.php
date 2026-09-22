<?php

class DbConnection{
    
public function connect(){
    $connection = new mysqli('localhost','root','','ecommerce');
    return $connection;
}
}