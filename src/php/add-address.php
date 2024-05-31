<?php 
session_start();
$userid = $_SESSION["id"];
include "config.php";

if(isset($_POST['submit']))
{
 $address = $_POST['address'];
 $note = $_POST['note'];
 $cash = $_POST['cash'];
 
 $sql = "UPDATE orderdetails
 SET address = '$address', note = '$note', payment = '$cash'
 WHERE user_id = '$userid' "; 
 $result = mysqli_query($link, $sql);

 if($result == 1 )
 {
    echo '<script>alert("Order Success !")</script>';
    echo '<script>location.href="../menu.php"</script>';
 }


}

?>