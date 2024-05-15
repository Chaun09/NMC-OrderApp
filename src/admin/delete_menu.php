<?php
include("../php/config.php");
error_reporting(0);
session_start();

mysqli_query($link,"DELETE FROM products WHERE product_id = '".$_GET['menu_del']."'");
header("location:all_menu.php");  

?>
