<?php
    include_once '../Includes/header.php';
    include_once '../Service/EventService.php';

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
    <form action="../Includes/add_to_cart.php" method="post">
<?php

            $events = $eventService->getEventsByType("Jazz"); // getting that specific type events
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
