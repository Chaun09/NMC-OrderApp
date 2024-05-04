<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPass = "";
$dbName = "salesmanagement";
$link = mysqli_connect($serverName,$dbUsername,$dbPass,$dbName );
if (!$link) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>