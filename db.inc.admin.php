<?php

$dbServername = "xxx";
$dbUsername = "xxx";
$dbPassword = "xxx";
$dbName = "xxx";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: ".mysql_connect_error());
}
?>
