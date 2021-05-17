<?php
include_once '../../Includes/header.php';
include_once '../../Service/UserService.php.php';

$userService = UserService::getInstance();

if (isset($_POST["submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $userService->userLogin($this->conn, $email, $password);
}
//if you forgot your password and want to reset it
else if(isset($_POST["resetPassword"])){
    header("location: ../resetPassword.php");
    exit();
}
else{
    header("location: ../Login.php");
    exit();
}

