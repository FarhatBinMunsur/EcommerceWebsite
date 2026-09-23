<?php
    require_once __DIR__."/../db/db.php";

    function userDetails($userID) {
       $connection = new DbConnection();
        $conn = $connection->connect();
        $sql= "select * from users where userID='$userID'";
        $result=$conn->query($sql);

        $row=$result->fetch_assoc();

        return $row;
    }

    function updateProfile($userID,$name,$email,$address,$phone){
        $connection = new DbConnection();
        $conn = $connection->connect();
        $sql= "update users set userName='$name', userEmail='$email', Address='$address' , Phone='$phone' where userID='$userID'";
        $result=$conn->query($sql);

    }

    function loginCheck($email,$password) {
        $connection = new DbConnection();
        $conn = $connection->connect();
        $sql= "select * from users where userEmail='$email' AND userPassword='$password'";
        $result=$conn->query($sql);
        $data=[];
        if($result->num_rows > 0) {
            $row=$result->fetch_assoc() ;
            $data[]=$row["userID"];
            $data[]=$row["role"];
            return $data;
        }

        return false;

        
    }
?>