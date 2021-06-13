<?php
include_once '../../Includes/header.php';
include_once '../../Service/UserService.php';

$userService = UserService::getInstance();
if (isset($_POST["submit"])){

    $fullName = $_POST["firstName"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $loginName = $_POST["loginName"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];
    $role = 0;


    $userService->createUser($fullName, $email, $phoneNumber, $loginName, $password, $role);

}
else{
    header("location: Signup.php");
    exit();
}