<head>

    <link rel="stylesheet" href="style.css">
</head>
<?php
    session_start();
//    include_once "../../Includes/header.php";
//    include_once "../../Includes/footer.php";
//    //require_once "../../Includes/credentials.php";
    //    require_once "../../DAL/EventDAL.php";
    require_once "../../DAL/EventDAL.php";
    $eventDal = EventDAL::getInstance(); //singleton, can't use new
    $allEvents = $eventDal->getAllEvents();
    for($i=0; $i<sizeof($allEvents); $i++)
    {
        ?>

<!--        <button type="button">--><?php //echo($allEvents[$i]["eventDateTime"])?><!--</button>Thursday button-->

        <?php
    }

?>
<nav>
<ul>
    <li><a href="#maincontent">Home</a></li>
    <li><a href="#secondcontent">Jazz</a></li>
    <li><a href="#sportcontent">Dance</a></li>
    <li><a href="#referralcontent">Food</a></li>
    <li><a href="#contactcontent">CMS</a></li>
</ul>
</nav>

<p>
    Haarlem Festival <br>
    Enjoy the Jazz Shows<br>
    <button type="button">Get Full Access</button>

</p>

<!--buttons responsible for displaying different artists-->
<button type="button">26th | Thursday</button> <!--Thursday button-->
<button type="button">27th | Friday</button>
<button type="button">28th | Saturday</button>
<button type="button">29th | Sunday</button>

<nav>
    <ul>
        <li><a href="">Enjoy Any Show!</a></li>
        <li><a href="">To Any Venue!</a></li>
        <li><a href="">Huge Savings!</a></li>
        <li><a href="">Deal of the Day!</a></li>
        <p>Don't miss out!</p>
        <button type="button">All access pass</button>
    </ul>
</nav>

<!--date, artist name, event location and price goes here according to which button is clicked above    -->




<p>
    Don't miss out! <br>
    All access for the day! <button type="button">Get it now!</button>
</p>









<footer>
    About us | Policies | Contact us


</footer>
