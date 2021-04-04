<?php
include_once '../../UserDAL.php';

function userLogin($conn, $email, $password){
    $emailExists = emailExists($conn, $email);

    if ($emailExists == false){
        header("location: Login.php?error=wronglogin");
        exit();
    }

    $passwordhashed = $emailExists["Userspassword"];
    $checkPassword = password_verify($password, $passwordhashed);

    if ($checkPassword == false){
        header("location: Login.php?error=wronglogin");
        exit();
    }
    else if($checkPassword == true){
        session_start();
        $_SESSION["Usersemail"] = $emailExists["Usersemail"];
        $_SESSION["Userspassword"] = $emailExists["Userspassword"];
        //header("location: ../profile.php");
        echo "Welcome...";
    }
    exit();
}
