<?php
$serverName = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "ecomphp";

$conn = mysqli_connect($serverName, $dbUser, $dbPass, empty($_SESSION["dbName"]) ? "" : $_SESSION["dbName"] );
