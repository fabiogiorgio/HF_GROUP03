<?php
    include_once '../Includes/header.php';
    require_once '../Service/EventService.php';

    $service = EventService::getInstance();
    //    $events = $service->getAllEvents(); // getting all of the events from db to be able to show their details in cart page, since session array contains only id

?>

<div class="container">
    <table class="table table-condensed">
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
        <form action="../Includes/remove_from_cart.php" method="post">

            <?php
                $events = $_SESSION['cart'];


                foreach ($events as $item)
                {
                    $event = $service->getEventByEventID($item['ID']);
                    //                var_dump($event);
                    foreach ($event as $i)
                    {
                        ?>
                        <tr>
                            <td><?php echo $i['hostName']; ?></td>
                            <td><?php echo $i['eventLocation']; ?></td>
                            <td><?php echo $i['eventDateTime']; ?></td>
                            <td><?php echo $i['eventPrice']; ?></td>
                            <td>
                                <button class="btn btn-danger" type="submit" name="deleteEvent" value="<?php echo $item['ID']; ?>">delete
                                </button>
                            </td>
                        </tr>


                        <?php
                    }

                    ?>

                    <?php
                }
            ?>


    </table>
</div>

<!--        to be done by PHAT -->
<div class="container">
</form>
<form action="../Includes/confirm_order.php" method="post">
    <button class="btn btn-success" type="submit" name="confirm">Place order</button>
</form>
</div>
