<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Haarlem Festival</title>
    <link rel="icon" type="image/png" href="./public/images/logo.png"/>
    <link type="text/css" rel="stylesheet" href="./public/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link type="text/css" rel="stylesheet" href="./public/css/style.css"/>
    <script type="text/javascript" src="./public/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="./public/js/bootstrap.js"></script>
</head>
<body style="overflow-x:hidden;">
<div class="navbar-dark bg-dark">
    <nav class="navbar navbar-expand-md container navbar-dark bg-dark">
        <a href="?url=Home" class="navbar-brand">
            <img src="./public/images/logo.png" alt="Home" height="95">
            <div id="logo-title">
                <span>HAARLEM</span>
                <span style="color: rgba(255, 255, 255, 0.55)">FESTIVAL</span>
            </div>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav menu">
                <a href="?url=Home" class="nav-item nav-link active">Home</a>
                <a href="?url=jazz" class="nav-item nav-link">Jazz</a>
                <a href="?url=allAccess" class="nav-item nav-link">Dance</a>
                <a href="?url=food" class="nav-item nav-link">Food</a>
            </div>
            <div class="navbar-nav ml-auto">
                <?php if(!isset($_SESSION['id'])): ?>
                    <a href="?url=login" class="nav-item nav-link">
                        <img src="./public/images/user.png" alt="Login" height="30">
                    </a>
                <?php else: ?>
                    <a href="?url=customer/logout" class="nav-item nav-link">
                        Logout
                    </a>
                <?php endif; ?>
                <a href="?url=order" class="nav-item nav-link">
                    <img src="./public/images/cart.png" alt="Cart" height="30">
                    <span style="color: #fdee10; font-size: 20px"><?= isset($_SESSION['cart']) ?  count($_SESSION['cart']) : ''; ?></span>
                </a>
            </div>
        </div>
    </nav>
</div>

<?php require_once "./mvc/views/pages/" . $data["page"] . ".php" ?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-2">
                <span>© Haarlem Festival</span>
            </div>
            <div class="col-5">
                <ul>
                    <li>About Us</li>
                    <li>Policies</li>
                    <li>Contact Us</li>
                </ul>
            </div>
            <div class="col-5">

            </div>
        </div>
    </div>
</footer>
<!--Delete message-->
<?php unset($_SESSION['success']); ?>
<?php unset($_SESSION['error']); ?>
<script>
    // Delete message after 10 seconds.
    setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 10000);

</script>
<!-- Handle payment -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    Stripe.setPublishableKey('pk_test_51Ix8qKHcvrzMwowCVZXFP0wQ71fuLjPlqUwHKH9UCECDYHyhERjdogbaH71IhOCjxnIGJpJpjp74dEj7GxaqKa9700SlKezQqk');

    var $form = $('#checkout-form');


    $form.submit(function(event) {
    $form.find('button').prop('disabled', true);
    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name: $('#card-name').val()
    }, stripeResponseHandler);
    return false;
    });	

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $form.find('button').prop('disabled', false);
        } else {
            var token = response.id;
            $form.prepend($('<input type="hidden" name="stripeToken" />').val(token));

            // Submit the form:
            $form.get(0).submit();
        }
    }
</script>
</body>
</html>