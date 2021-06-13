<?php

$eventID =isset($_GET["id"]);
$event= null;

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

        <button type="submit" name="submit">Sign Up </button>


</section>

</body>
</html>