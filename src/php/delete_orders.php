<?php
session_start();
include('config.php');
$productid = $_GET['order_del'];
$userid = $_SESSION['id'];

$sql = "DELETE FROM cart WHERE product_id = $productid";
$server = "DELETE FROM orders WHERE product_id = $productid";
	
	if(mysqli_query($link, $sql) == 1 && mysqli_query($link, $server) == 1  ){


    echo '<script>alert("Product Has Been Deleted.")</script>';
	echo '<script>window.location.href="cart.php"</script>';
}

mysqli_close($link);
?>