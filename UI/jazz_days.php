<?php
    include_once '../Includes/header.php';
    include_once '../Service/EventService.php';

    $eventService = EventService::getInstance();

    if (isset($_GET["eventDay"]))
    {

<<<<<<< Updated upstream
        }
        ?>
        </form>
</table>
=======

        $selecteDay = $_GET["eventDay"];
        $eventsOnSelectedDay = $eventService->getEventsForDay($selecteDay);


        ?>
<!--        <style>-->
<!--            table {-->
<!--                font-family: arial, sans-serif;-->
<!--                border-collapse: collapse;-->
<!--                width: 100%;-->
<!--            }-->
<!---->
<!--            td, th {-->
<!--                border: 1px solid #dddddd;-->
<!--                text-align: left;-->
<!--                padding: 8px;-->
<!--            }-->
<!---->
<!--            tr:nth-child(even) {-->
<!--                background-color: #dddddd;-->
<!--            }-->
<!--        </style>-->
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

            <?php
                foreach ($eventsOnSelectedDay

                as $event)
                {
            ?>
            <form action="../Includes/add_to_cart.php" method="post">
                <tr>
                    <td><?php echo $event["hostName"] ?></td>
                    <td><?php echo $event["eventLocation"] ?></td>
                    <td><?php echo $event["eventDateTime"] ?></td>
                    <td>
                        <textarea name="note" id="" cols="1" rows="1" style="visibility: hidden"></textarea>
                        <button  class="btn btn-primary" type="submit" name="addEvent"
                                value="<?php echo $event["eventID"] . "~" . $selecteDay ?>"><?php echo $event["eventPrice"] ?></button>
                    </td>

                </tr>

                <?php
                    }
                ?>

            </form>


        </table>
        </div>

        <br>
        <a href="jazz_index.php" style="font-size: 2rem">Back</a>
        <?php
    } else
    {
        header("location: ../UI/jazz_index.php");
    }















>>>>>>> Stashed changes
