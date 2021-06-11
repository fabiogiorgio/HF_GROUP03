<?php
    require_once '../../Service/EventService.php';
    $service = EventService::getInstance();
    $events = $service->getAllEvents(); // getting all of the events from db to be able to show their details in cart page, since session array contains only id

?>

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
    <form action="../Includes/remove_from_cart" method="post">

        <?php
            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) // looping through the session array
            {
                ?>
                <tr>
                    <?php
                        for ($j = 0;$j < sizeof($events);$j++) //looping thro all events to find the id
                        {
                            if($_SESSION['cart'][$i] == $events[$j]['eventID']) // if the id of event is same as the one in session array
                            {
                                ?>
                                <td> <?php echo $events[$j]['hostName']; ?> </td>
                                <td> <?php echo $events[$j]['eventLocation']; ?> </td>
                                <td> <?php echo $events[$j]['eventDateTime'] ?> </td>
                                <td> <?php echo $events[$j]['eventPrice']; ?> </td>
<!--                                giving the event id to button to delete later-->
                                <button type="submit" name="<?php echo $events[$j]['eventID'];?>">Delete Event</button>

                    <?php
                            break;
                            }
                        }

                    ?>

                </tr>

                <?php
            }

        ?>


    </form>


</table>
