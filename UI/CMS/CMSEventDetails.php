<?php
require_once "../../Service/EventService.php";

$eventServise = EventService::getInstance();

$eventID = isset($_GET["eventID"]);
$events = $eventServise->getEventsByType("Jazz");
$event = null;

for ($i = 0; i < sizeof($events); $i++){
    if ($events[i]["eventID"] == $eventID){
        $event = $events[i];
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<section>


    <input type="text" name="hostName" placeholder="Enter your host name..." value="<?php echo $event->hostName ?? ''; ?>">
    <br>
    <input type="text" name="location" placeholder="Enter location..." value="<?php echo $event->eventLocation ?? ''; ?>">
    <br>
    <input type="text" name="phoneNumber" placeholder="Enter time of event..." value="<?php echo $event->dateTime ?? ''; ?>">
    <br>
    <input type="text" name="eventPrice" placeholder="Enter event price..." value="<?php echo $event->dateTime ?? ''; ?>">
    <br><br>

    <button type="submit" name="editEvent">Save </button>


</section>

</body>
</html>