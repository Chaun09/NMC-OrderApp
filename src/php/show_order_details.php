<?php
session_start();
include('config.php');
//Find the name of the logged user
$log_userid = $_SESSION['id'];
$finduser_sql = "SELECT * FROM users WHERE user_id = '$log_userid'";
$result = mysqli_query($link, $finduser_sql);
$row = mysqli_fetch_array($result);
$sid = $row['user_id'];

if(!isset($_SESSION['id']))
{
  echo '<script>alert("You must log in to your account first.")</script>';
  echo '<script>location.href="index.php"</script>';
}

if(isset($_POST['submit1'])){
$sql = "SELECT * FROM orders WHERE user_id = '$log_userid'";
$result = mysqli_query($link, $sql);


echo "
<table>
<thead>
<th>Quantity</th>
<th>Subtotal</th>


<th>Description</th>
<th>Name</th>
<th>Date</th>
</thead>
<tbody>
";

while($row = mysqli_fetch_array($result)){
    $quantity = $row['quantity'];
    $price = $row['price'];
   
   
    $address = $row['description'];
    $note = $row['product_name'];
    $date = $row['order_date'];

    echo "
    <tr>
    <td> $quantity  </td>
    <td> $price  </td>


    <td> $address </td>
    <td> $note  </td>
    <td>$date</td>
      
    </tr>";
}

echo "
</tbody>
</table>";
}


?>