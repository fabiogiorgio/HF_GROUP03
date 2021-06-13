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
    <h1>Content management Food</h1>
</header>
<body>

<section>
    <form action="CMSFood_inc.php" method="post">

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
            <h2>All food events</h2>
            <?php
            $events = $eventService->getEventsByType("Food");

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
                    <td><button type="button" name="<?php echo $events[$i]['eventID'];?>"> Delete </button> </td>
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
            <h2>All restaurant details</h2>
            <?php
            $hosts = $hostService->getHostsByType("Food");
            for($i=0;$i<sizeof($hosts);$i++)
            {
            if ($hosts[$i]["hostType"] == "Food")
            {
            ?>
            <tr>

                <td><?php $image = $hosts[$i]['img'];?></td>
                <td><?php echo $hosts[$i]["hostName"];?>
                <td><?php echo $hosts[$i]["description"];?></td>
                <td><button type="button" name="editHost"> Edit </button> </td>
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

