<?php
session_start();
include('config.php');
$product_id = $_GET['cart_ed'];

$userid = $_SESSION['id'];
if(!isset($userid))
{
    echo '<script>alert("You must log in to your account first.")</script>';
    echo '<script>location.href="index.php"</script>';
}

if(isset($_POST['submit'])){
    $quantity = $_POST['quantity'];
    $sql = "UPDATE cart SET quantity = $quantity WHERE   ";


}


mysqli_close($link);
?>