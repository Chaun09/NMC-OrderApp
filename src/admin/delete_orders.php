<?php
include("../php/config.php");
error_reporting(0);
session_start();

mysqli_query($link,"DELETE FROM users_orders WHERE o_id = '".$_GET['order_del']."'");
header("location:all_orders.php");  

?>
