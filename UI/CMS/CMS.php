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
    <h1>Content management</h1>
</header>
<body>

<section>
    <form action="CMS.inc.php" method="post">

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
                <td><button type="button" name="editEvent"> Edit </button> </td>
            </tr>
 <?php
            }
 ?>
</table>



<h2> All the users in the system </h2>

<table>
    <tr>
        <th>
            Full Name
        </th>
        <th>
            Email
        </th>
        <th>
            Login
        </th>
        <th>
            Password
        </th>
        <th>
            Role
        </th>
        <th>
            Nobody likes change!!!
        </th>
    </tr>
<?php
    $usersArray = array();
    $usersArray = $userService->getAllUsers();
    for ($i = 0; $i < sizeof($usersArray); $i++) {
    ?>

        <tr>
            <td><?php echo $usersArray[$i]["fullName"];?></td>
            <td><?php echo $usersArray[$i]["email"]; ?></td>
            <td><?php echo $usersArray[$i]["phoneNumber"]; ?></td>
            <td><?php echo $usersArray[$i]["login"]; ?></td>
            <td><?php echo $usersArray[$i]["password"]; ?></td>
            <td><?php echo $usersArray[$i]["role"]; ?></td>
            <td> <button type="submit" name="editUser"> Edit </button> </td>
        </tr>



        <?php
    }
    ?>
</table>
</form>
</section>


</body>

