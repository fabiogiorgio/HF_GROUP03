<?php
require_once "../../includes/header.php";
require_once "../../Service/EventService.php";
require_once "../../Service/UserService.php";
include_once '../../Service/HostService.php';

$eventDal = EventDAL::getInstance();
$allEvents = $eventDal->getAllEvents();
$userService = UserService::getInstance();
$eventService = EventService::getInstance();
$hostService = HostService::getInstance();
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
    <h1>Content management JAZZ</h1>
</header>
<body>

<section>
    <form action="CMSJazz_inc.php" method="post">

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
                <th>
                    Nobody likes change!!!
                </th>
                <th>
                    Delete
                </th>
            </tr>
            <?php
            $events = $eventService->getEventsByType("Jazz");
            for($i=0;$i<sizeof($events);$i++)
            {
                ?>
                <tr>
                    <td><?php echo $events[$i]["hostName"];?></td>
                    <td><?php echo $events[$i]["eventLocation"]; ?></td>
                    <td><?php echo $events[$i]["eventDateTime"]; ?></td>
                    <td><?php echo $events[$i]["eventPrice"]; ?> </td>
                    <td><button type="button" name="editEvent" href="hostDetails.php?event=4&id=<?php $events[i]?>> Edit </button> </td>
                    <td><button type="button" name="deleteEvent"> Delete </button> </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <br>
        <button type="button" name="AddEvent"> Add Event </button>


        <table>

            <tr>
                <th>
                    Image
                </th>

                <th>
                    Name
                </th>

                <th>
                    Description
                </th>
                <th>
                    Nobody likes change
                </th>
                <th>
                    Delete
                </th>
            </tr>
            <h2>All artists details</h2>
            <?php
            $hosts = $hostService->getHostsByType("Jazz");
            for($i=0;$i<sizeof($hosts);$i++)
            {
                if ($hosts[$i]["hostType"] == "Food")
                {
                    ?>
                    <tr>

                        <td><?php $image = $hosts[$i]['img'];?></td>
                        <td><?php echo $hosts[$i]["hostName"];?>
                        <td><?php echo $hosts[$i]["description"];?></td>
                        <td><button type="button" name="editHost" href="hostDetails.php?event=4&id=<?php $hosts[i]?>"> Edit </button> </td>
                        <td><button type="button" name="deleteHost"> Delete </button> </td>
                    </tr>
                    <?php
                }
            }
            ?>

        </table>
    </form>
</section>


</body>

