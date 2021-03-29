<?php
include_once 'UserDAL.php';

function userLogin($conn, $email, $password){
    $emailExists = emailExists($conn, $email);

    if ($emailExists === false){
        header("location: ../Login.php?error=wronglogin");
        exit();
    }

    $passwordhashed = $emailExists["Userspassword"];
    $checkPassword = password_verify($password, $passwordhashed);

    if ($checkPassword === false){
        header("location: ../Login.php?error=wronglogin");
        exit();
    }
    else if($checkPassword === true){
        session_start();
        $_SESSION["Usersemail"] = $emailExists["Usersemail"];
        $_SESSION["Userspassword"] = $emailExists["Userspassword"];
        header("location: ../profile.php");
    }
    exit();
}






if (isset($_POST["submit"])){

    $DbServername = "server.infhaarlem.nl";
    $DbUsername = "s644748_HfDB";
    $DbPassword = "Roflmao000";
    $DbName = "s644748_HfDB";

    $conn = mysqli_connect($DbServername, $DbUsername, $DbPassword, $DbName);

    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }




    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'db.inc.php';
    require_once  'functions.inc.php';


    //check if all field are filled in
    if (emptuInputLogin($email, $password) !== false){
        header("location: ../Login.php?error=emptyinput");
        exit();
    }

    userLogin($conn, $email, $password);
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