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

if(isset($_POST['submit'])){
$sql = "SELECT * FROM orderdetails WHERE user_id = '$log_userid'";
$result = mysqli_query($link, $sql);


echo "
<table>
<thead>
<th>Quantity</th>
<th>Subtotal</th>
<th>Status</th>
<th>Payment</th>
<th>Address</th>
<th>Note</th>
<th>Date</th>
</thead>
<tbody>
";

while($row = mysqli_fetch_array($result)){
    $quantity = $row['quantity'];
    $price = $row['subtotal'];
    $status = $row['status'];
    $payment = $row['payment'];
    $address = $row['address'];
    $note = $row['note'];
    $date = $row['date'];

    echo "
    <tr>
    <td> $quantity  </td>
    <td> $price  </td>
    <td> $status  </td>
    <td> $payment  </td>
    <td> $note  </td>
    <td> $address  </td>
    <td>$date</td>
      
    </tr>";
}

echo "
</tbody>
</table>";
}


?>