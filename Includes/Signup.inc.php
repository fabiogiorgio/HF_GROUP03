<?php
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

    require_once 'UserDAL.php';
    //check if all the fields are filled
    if (emptuInputSingup($email, $password, $repeatPassword) !== false){
        header("location: ../Signup.php?error=emptyinput");
        exit();
    }
    //check if the email is valid
    if (invalidEmail($email) !== false){
        header("location: ../Signup.php?error=invalidemail");
        exit();
    }
    //check if password and the repeat password match
    if (passwordMatch($password, $repeatPassword) !== false){
        header("location: ../Signup.php?error=passwordsdontmatch");
        exit();
    }
    //check if this email already exists in the database
    if (emailExists($conn, $email) !== false){
        header("location: ../Signup.php?error=emailalreadyexists");
        exit();
    }
    //check this very hard captcha :))))))
    if ($_POST["captcha"] == 'Y8KV'){
        createUser($conn, $email, $password);
        header("location: ../Login.php");
    }

}
else{
    header("location: ../signup.php");
    exit();
}