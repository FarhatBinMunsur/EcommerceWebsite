<?php
    session_start();
    require_once __DIR__.'/../Model/userModel.php';

    $profile=userDetails($_SESSION['userID']);

    if(isset($_POST['action']) &&$_POST['action']== 'update'){
        $userID=$_SESSION['userID'];
        updateProfile($userID,$_POST['name'],$_POST['email'],$_POST['address'],$_POST['phone']);
        header('Location:../View/viewProfile.php');
        exit();
    }

?>