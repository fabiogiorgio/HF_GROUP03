<?php
require_once '../../DAL/UserDAL.php';

if (isset($_POST["submit"])){
    $DbServername = "server.infhaarlem.nl";
    $DbUsername = "s644748_HfDB";
    $DbPassword = "Roflmao000";
    $DbName = "s644748_HfDB";

    $conn = mysqli_connect($DbServername, $DbUsername, $DbPassword, $DbName);

    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }


    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $loginName = $_POST["loginName"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];
    $role = $_POST["role"];


    createUser($conn, $firstName, $lastName, $email, $loginName, $password, $repeatPassword, $role);
    echo("Success!!!!");


}
else{
    header("location: ../signup.php");
    exit();
}