<?php
include_once '../../Includes/header.php';
include_once '../../Service/UserService.php';

$eventService = UserService::getInstance();

if (isset($_POST["submit"])){

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $loginName = $_POST["loginName"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];
    $role = 1;


    $eventService->createUser($this->conn, $firstName, $lastName, $email, $loginName, $password, $repeatPassword, $role);
    echo("Success!!!!");


}
else{
    header("location: ../signup.php");
    exit();
}