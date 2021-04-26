<?php
    require_once '../Service/EventService.php';

    $eventService = EventService::getInstance();

    $days = $eventService->getEventDays(); // getting the days from the database
    ?>
<form action="../UI/jazz_days.php" method="post">

    <?php
    for ($i = 0; $i < sizeof($days); $i++) // looping through the days to show them
    {
    ?>
<!--            for each day making a button containing the day as its id and content-->
        <button type="submit" name="<?php echo $days[$i]; ?>"><?php echo $days[$i]; ?>th</button>
<!--        that button takes the user to where the events of that day are shown-->

        <?php

    }

    ?>


</form>
