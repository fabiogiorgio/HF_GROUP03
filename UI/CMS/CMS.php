<?php
session_start();
require_once "../../includes/header.php";
require_once "../../DAL/EventDAL.php";
$eventDal = EventDAL::getInstance(); //singleton, can't use new
$allEvents = $eventDal->getAllEvents();
$userService = UserService::getInstance();
for($i=0; $i<sizeof($allEvents); $i++)
{
    ?>

    <!--        <button type="button">--><?php //echo($allEvents[$i]["eventDateTime"])?><!--</button>Thursday button-->

    <?php
}

?>
<header xmlns="http://www.w3.org/1999/html">
    <h1>Content management</h1>
</header>

<body>

<section>
<form action="CMS.inc.php" method="post">


<h2>Pages of this website.</h2>
<button type="submit" name="Jazz"Jazz </button>
<button type="submit" name="Food"Food </button>
<button type="submit" name="Jazz"Dance </button>

<h2> All the users in the system </h2>
<?php
    $usersArray = array();
    $usersArray = $userService->getAllUsers();
    for ($i = 0; $i < sizeof($usersArray); $i++) {
    echo($usersArray[$i]["Usersemail"] . "<br>");
    }
    ?>

</form>
</section>


</body>

