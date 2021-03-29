<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<section>
<h1> Sign Up </h1>
    <br>
    <h2>It's quick and easy</h2>

<form action = "includes/signup.inc.php" method= "post">

    <input type="text" name="firstName" placeholder="First name...">
    <br>
    <input type="text" name="lastName" placeholder="Last name ...">
    <br>
<input type="text" name="email" placeholder="Enter your email...">
<br>
    <input type="text" name="loginName" placeholder="Enter your login name...">
<br>
    <input type="password" name="password" placeholder="Enter your password...">
<br>
<input type="password" name="repeatPassword" placeholder="Repeat password...">
<br><br>

<button type="submit" name="submit">Sign Up </button>
</form>

<?php 
if (isset($_POST["email"])){
    echo $_POST["email"];
}
?>
</section>


<?php
if (isset($_GET["error"])){
    if ($_GET["error"] == "emptyinput"){
        echo "Fill in all fields.";
    }
    else if($_GET["error"] == "invalidEmail"){
        echo "Enter a valid email.";
    }
    else if($_GET["error"] == "passwordMatch"){
        echo "Passwords dont match.";
    }
    else if($_GET["error"] == "stmtFailed"){
        echo "Something went wrong.";
    }
    else if($_GET["error"] == "emailExists"){
        echo "This email already exists, please choose another one.";
    }
    else if($_GET["error"] == "none"){
        echo "User has been registered succesfully.";
    }
}

?>



</body>
</html>



