<?php
require_once "../../includes/header.php";
require_once "../../Service/EventService.php";
require_once "../../Service/UserService.php";
$eventDal = EventDAL::getInstance();
$allEvents = $eventDal->getAllEvents();
$userService = UserService::getInstance();
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

<header xmlns="http://www.w3.org/1999/html">
    <h1>Content management Dance</h1>
</header>
<body>

<section>
    <form action="CMSDance_inc.php" method="post">

        <table>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    Location
                </th>
                <th>
                    Time
                </th>
                <th>
                    Capacity
                </th>
                <th>
                    Price
                </th>
                <th>
                    Nobody likes change!!!
                </th>
            </tr>
            <?php
            $events = $eventService->getEventsByType("Dance");
            for($i=0;$i<sizeof($events);$i++)
            {
                ?>
                <tr>
                    <td><?php echo $events[$i]["hostName"];?></td>
                    <td><?php echo $events[$i]["eventLocation"]; ?></td>
                    <td><?php echo $events[$i]["eventDateTime"]; ?></td>
                    <td><?php echo $events[$i]["maxCapacity"];?></td>
                    <td><?php echo $events[$i]["eventPrice"]; ?> </td>
                    <td><button type="button" name="editEvent"> Edit </button> </td>
                    <td><button type="button" name="deleteEvent"> Delete </button> </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <br>
        <button type="button" name="AddEvent"> Add Event </button>

    </form>
</section>


</body>

