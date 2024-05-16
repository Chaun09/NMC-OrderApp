<?php
include("../php/config.php");
error_reporting(0);
session_start();

mysqli_query($link,"DELETE FROM users WHERE user_id = '".$_GET['user_del']."'");
header("location:all_users.php");  

?>
