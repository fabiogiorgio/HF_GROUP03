<?php
session_start();
    $_SESSION['cart'] = [];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>firstPage – 7</title>

<!--    <script id="applicationScript" type="text/javascript" src="script.js"></script>-->

    <link rel="stylesheet" type="text/css" href="../UI/Jazz/jazzstyle.css"/>

</head>
<body>
<style>
    nav {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 500%;
        background-color: bisque;
        margin: fill;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
        width: max-content;
    }
</style>
<nav>
    <th>
        <a href="">
            Home
        </a>
    </th>
    <th>
        <a href="">
            Jazz
        </a>
    </th>
    <th>
        <a href="">
            Dance
        </a>
    </th>
    <th>
        <a href="">
            Food
        </a>
    </th>
    <th>
        <a href="">
            Cart
        </a>
    </th>
    <th>
        <a href="">
            Log out
        </a>
    </th>
</nav>