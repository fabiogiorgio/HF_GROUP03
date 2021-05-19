<?php
    include_once '../../Includes/header.php';
    include_once '../../Service/EventService.php';


    $eventService = EventService::getInstance();
?>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
<table>
<tr>
    <th>
        Artist
    </th>
    <th>
        Location
    </th>
    <th>
        Time
    </th>
    <th>
        Price
    </th>
</tr>
    <form action="../../Includes/add_to_cart.php" method="post">
<?php
    $id = $_POST; // taking the button id from the post method
    if(isset($_POST[$id])) // if they pushed a button to get to the code:
    {
        $events = $eventService->getEventsByDay(26, "Jazz"); // getting that specific day's events
        for($i=0;$i<sizeof($events);$i++) // looping through the events to show them
        {
            $btnID = $events[$i]["eventID"]; // getting the event id to set it to button to be able to catch it to add in cart
            ?>
        <tr>
<!--            showing the event details-->
             <td><?php echo $events[$i]["hostName"];?></td>
             <td><?php echo $events[$i]["eventLocation"]; ?></td>
             <td><?php echo $events[$i]["eventDateTime"]; ?></td>
<!--            adding the id we got from event to the specific button of that event with the price shown on the event-->
             <td><button type="submit" name="<?php echo $btnID;?>"><?php echo $events[$i]["eventPrice"]; ?></button></td>
         </tr>
<?php

        }
        ?>
        </form>
</table>
<?php
    }
// if the user tries to get to this page using url, they will be redirected to the main page
    else
    {
        header('location: ../UI/jazz_index.php?error=cheater');
        exit();
    }















/*
>>>>>>> b762da7603ee7d73e665e7a944174c55eaaf991c:UI/Jazz/jazz_index.php
*/