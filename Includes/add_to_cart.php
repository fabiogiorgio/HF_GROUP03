<?php

    require_once '../Service/EventService.php';
    session_start();

    $id = $_POST; // getting the button id from the post method
    $service = EventService::getInstance();
    $events = $service->getAllEvents();

    if (isset($_POST[$id])) // checking if the user came here using the post method and clicking on the button
    {

        array_push($_SESSION['cart'], $id); // adding the id of the event which was given to the button to the cart


        header("location: ../UI/jazz_days.php");  // redirecting the user back to the index

    }
    else // if the user tried to get to this code by url, redirect them back to index
    {
        header("location: ../UI/jazz_days.php");
    }





