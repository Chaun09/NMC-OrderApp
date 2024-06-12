<?php
session_start();
include('config.php');
$productid = $_GET['order_edit'];
$userid = $_SESSION['id'];
if(!isset($userid))
{
    echo '<script>alert("You must log in to your account first.")</script>';
    echo '<script>location.href="index.php"</script>';
}

$sql = "SELECT * FROM cart WHERE product_id = '$productid' ";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
include("backbtn.php");
if(mysqli_affected_rows($link) == 1){
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
<th>ProductName</th>
<th>Quantity</th>
<th>Price</th>
<th>Total</th>

</thead>
<tbody>
<td>$row[product_name]</td>
<td>
<input name='quantity' placeholder='Quantity' value='.$row[quantity].'>


</td>
<td>$row[price]</td>
<td>$row[total_amount]</td>
</tbody>

";
    


}




mysqli_close($link);
?>