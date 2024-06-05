
<?php
session_start();
$userid = $_SESSION["id"];


include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if(!isset($_SESSION['id']))
    {
      echo '<script>alert("You must log in to your account first.")</script>';
      echo '<script>location.href="index.php"</script>';
    }
    else {
    

    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $sql = "SELECT * FROM products WHERE product_id = '$product_id'";

    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    $name = $row['product_name'];
    $description = $row['description'];
    $price = $row['price'];
    $total = $price * $quantity;

    
    $server = "INSERT INTO orders(user_id, total_amount, description, price, product_id, quantity, product_name) VALUES ('$userid', '$total', '$description', '$price', '$product_id', '$quantity', '$name')";
    $server1 = "INSERT INTO cart(user_id, total_amount, description, price, product_id, quantity, product_name) VALUES ('$userid', '$total', '$description', '$price', '$product_id', '$quantity', '$name')";
   if (mysqli_query($link, $server) == 1 && mysqli_query($link, $server1) == 1) {
    header("Location: cart.php");
    exit();
}    
}
}
else {
    echo "Unsuccessful";
}
?>
