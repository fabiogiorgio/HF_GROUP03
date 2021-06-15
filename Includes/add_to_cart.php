<?php
    session_start();

    require_once '../Service/EventService.php';
//    session_start();



    $cart = array();
    if(!empty($_SESSION['cart'])) // if the session array is empty then cart will stay empty, otherwise it will be assigned to cart
    {
        $cart = $_SESSION['cart'];
    }


    if(isset($_POST['addEvent']))
    {
        $eventDetails = explode('~', $_POST['addEvent']); // the details consists of the day and the event id
        $notes = $_POST['notes'];
        $eventId = $eventDetails[0]; // taking the event id from the post super global
        $eventDay = $eventDetails[1];
        $cart[] = ['ID' => $eventId, 'notes' => $notes];


//        array_push($cart, $eventId); // adding the value of eventId to the cart array
        $_SESSION['cart'] = $cart; // reassigning the cart to the session array
        header("location: ../UI/jazz_days.php?eventDay=". $eventDay);
    }




    else // if the user tried to get to this code by url, redirect them back to index
    {
        header("location: ../UI/jazz_index.php");
    }





