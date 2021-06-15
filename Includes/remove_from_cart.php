<?php
session_start();


    if (isset($_POST['deleteEvent']))
    {
        $eventId = $_POST['deleteEvent'];

        // checking to find the id in cart
        // thank you stackoverflow!!
//        foreach($data as $key=>$row){
//            if($row['store_id'] == 2){
//                unset($data[$key]);
//            }
//        }
        foreach ($_SESSION['cart'] as $key=>$row)
        {
            if($row['ID'] == $eventId)
            {
                unset($_SESSION['cart'][$key]);
                header("location: ../UI/cart.php");
            }
        }
    }

    else
    {
        header("location: ../UI/jazz_index.php");
    }
