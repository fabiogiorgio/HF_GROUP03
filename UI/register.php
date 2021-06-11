<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <link rel="icon" type="image/png" href="./public/images/logo.png"/>-->
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="./public/bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./public/css/admin.css">
</head>
<body>

<div class="container">
    <?php require_once "./mvc/views/pages/alert_message.php" ?>
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" method="POST" action="?url=register/post">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
            <input type="text" name="fullname" class="form-control" placeholder="Full name" required maxlength="255">
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <input type="password" name="repassword" class="form-control" placeholder="Re Password" required>
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Register</button>
        </form>
        <a href="?url=login">Login</a>
    </div>
</div>

<!--Delete message after load page-->
<?php unset($_SESSION['success']); ?>
<?php unset($_SESSION['error']); ?>

<script>
    // Delete message after 3 minutes
    setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 10000);

</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="./public/bower_components/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>
