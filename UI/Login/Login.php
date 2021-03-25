<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
<h1> Log In </h1>
<form action = "includes/login.inc.php" method= "post">
<input type="text" name="email" placeholder="Enter your email...">
<br>
<input type="password" name="password" placeholder="Enter your password...">
<br>
<button type="submit" name="submit">Log in </button>
<button type="submit" name="resetPassword">Reset Password </button>
<br> <br>
</form>
<?php

if (isset($_GET["error"])){
    if ($_GET["error"] == "emptyinput"){
        echo "Fill in all fields.";
    }
    else if($_GET["error"] == "wronglogin"){
        echo "Incorrect login information.";
    }
}

?>
</section>
</body>
</html>
