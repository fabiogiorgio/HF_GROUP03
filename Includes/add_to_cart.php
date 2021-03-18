<?php
    session_start();
    require_once '../DAL/HostDAL.php';

    if (isset($_POST["gareDuNoordAdd"]))
    {
//        $host = new Host();
//        $host->setHostName("");
//        $event = new Event();
//        $event->setEventDate("28-06-2020");
//        $event->setEventHost("");
        $HostDAL = HostDAL::getInstance();
//        $array = $HostDAL->getALlHosts();
//        for ($i = 0; $i < sizeof($array); $i++)
//        {
//            echo $array[$i]["hostName"] . "<br>";
//        }


    } else if (isset($_POST["rillanAndBombardiesAdd"]))
    {

    } else if (isset($_POST["soulSixAdd"]))
    {

    } else if (isset($_POST["hannBennickAdd"]))
    {

    } else if (isset($_POST["theNordaniansAdd"]))
    {

    } else if (isset($_POST["lilithAdd"]))
    {

    }


