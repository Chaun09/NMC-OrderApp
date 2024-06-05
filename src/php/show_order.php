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
include("backbtn.php");
echo "
<style>
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 1em;
    font-family: Arial, sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
}
th, td {
    padding: 12px 15px;
    border: 1px solid #dddddd;
}
tbody tr {
    border-bottom: 1px solid #dddddd;
}
tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}
tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
</style>

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
