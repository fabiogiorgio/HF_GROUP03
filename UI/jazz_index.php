<?php
    include_once '../Includes/header.php';

    //    include_once APPROOT . "/Includes/header.php/";
    require_once '../Service/EventService.php';
    require_once '../Service/HostService.php';

    $hostService = HostService::getInstance();
    $eventService = EventService::getInstance();
    $daysArray = $eventService->getEventDays('Jazz');
?>
<div class="container">
<form action="jazz_days.php" method="get">
    <?php
        foreach ($daysArray as $item)
        {
            ?>
            <button class="btn btn-info" type="submit" name="eventDay" value="<?php echo $item ?>"><?php echo $item ?>th of July</button>

            <?php
        }

    ?>
</form>
</div>


<div class="container">
    <div class="row">
<?php
    $hosts = $hostService->getHostsByType('Jazz');

    foreach ($hosts as $host)
    {
        ?>

    <div class="col-sm-4">
    <h3><?php echo $host['hostName']; ?></h3>
    <p><?php echo $host['description'] ?></p>
    <form action="host_performance_days.php" method="get">
        <button class="btn btn-primary" type="submit" name="performance" value="<?php echo $host['HostID'] ?>">see performance dates</button>
    </form>
    </div>


<?php

    }
    ?>
    </div>

</div>
