<?php

    $id = $_POST; // getting the id from post

    if (isset($_POST[$id]))
    {
        // checking to find the id in cart
        if (($key= array_search($id, $_SESSION['cart'])) !==false)
        {
            unset($_SESSION['cart'][$key]); // removing the id thus the whole event from cart (aka session array) based on the button's id which was given by the event id
        }
    }

    else
    {
        header("location: ../UI/jazz_index.php");
    }
