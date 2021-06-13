<?php

include_once '../../Includes/header.php';
include_once '../../Service/HostService.php';

    $hostService = HostService::getInstance();
    $hosts = $hostService->getAllHosts();
    //$restaurants = $hostService->getHostsByType( "Food"); // getting that specific day's events
    echo "<table border = '3'>";
    echo "<table padding = '3'>";

    /*echo "<tr><td>Restaurant Name</td><td>Restaurant Description</td>";
    while ($row = mysqli_fetch_assoc($hosts) ) {
        echo "<tr><td>{$row['hostName']}}</td><td>{$row['description']}</td>";
    }*/
?>
<?php

for($i=0;$i<sizeof($hosts);$i++) // looping through the events to show them
{
    if ($hosts[$i]["hostType"] == "Food")
    {
?>
        <tr>
            <!--showing the event details-->
            <td><?php $image = $hosts[$i]['img'];?></td>
            <td><?php echo $hosts[$i]["hostName"];?>
            <?php echo $hosts[$i]["description"];?></td>
            <!--adding the id we got from event to the specific button of that event with the price shown on the event-->
        </tr>
    <?php
    }
}
?>