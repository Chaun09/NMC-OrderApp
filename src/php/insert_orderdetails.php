
<?php
session_start();
$userid = $_SESSION["id"];

include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $sql = "SELECT SUM(total_amount) as total_price FROM orders WHERE user_id = '$userid'";
    $result = $link->query($sql);
    $row = $result->fetch_assoc();
    $total_price =  $row['total_price'];
    $sql1 = "SELECT SUM(quantity) as total_items FROM orders WHERE user_id ='".$_SESSION['id']."'";
    $result = $link->query($sql1);
    $row = $result->fetch_assoc();
    $total_item = $row['total_items'];
    $server = "INSERT INTO orderdetails(subtotal, quantity, user_id) VALUES ('$total_price', '$total_item', '$userid')";
    $sql1 = "DELETE  FROM cart";
   
   if (mysqli_query($link, $server) == 1 && mysqli_query($link, $sql1) == 1) 
   {
    header("Location: ../menu.php");
    exit();
}    
else {
    echo "Unsuccessful";
}
       
  
  

}

?>
