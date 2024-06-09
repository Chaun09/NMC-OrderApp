<?php 
include "config.php";

$prdid = $_GET['res_id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icon copy.png">
    
    <title>Food Item</title>
    <style>
        .food-item {
            border: 1px solid #ccc;
            padding: 16px;
            width: 300px;
            margin: 0 auto;
        }
        .food-item h2 {
            margin: 0;
            font-size: 24px;
        }
        .food-item p {
            margin: 8px 0;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
        }
        .quantity-controls button {
            padding: 8px;
        }
        .quantity-controls span {
            margin: 0 8px;
        }
        .confirm-button {
            margin-top: 16px;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php include("backbtn.php");?> 
<?php
$sql = "select * from products where product_id = '$prdid '";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);

?>
<div style="border-radius:20px; border-color: #4CAF50; box-shadow: black; " class="food-item">
    <h2 style="text-align:center;"><?php echo $row['product_name']; ?></h2>
   <img style="border-radius: 20px;" height="300px" width="300px" src="../images/<?php echo $row['Image'];?>">

<?php
if($row['country'] == 'vietnam')
{


?>

    <?php echo "<p style='font-size: 25px; text-align:center;'>Giá: <span  id='price'>$row[price]VNĐ</span></p> "; ?>
    
    <?php }
    
    else {
        
        echo "<p  style='font-size: 25px; text-align:center;'>Giá: <span id='price'>$row[price]$</span></p> ";

    
    }?>

    <p style='font-size: 20px; text-align:center;'  id="description"><?php echo $row['description'] ; ?></p>
    
    <div style="transform:translate(38%,0%);" class="quantity-controls">
        <button style="border-radius: 25px; height: 25px; width: 25px; text-align:center;" class="decrease"  onclick="decreaseQuantity()">-</button>
        <span id="quantity" name="quantity">1</span>
        <button style="border-radius: 25px; height: 25px; width: 25px; text-align:center;" class="increase" onclick="increaseQuantity()">+</button>
    </div>
    
    <form style="transform:translate(36%,0%);"  action="cart_process.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $prdid; ?>">
        <input type="hidden" id="quantity_input" name="quantity" value="1">
        <button class="confirm-button" type="submit">Xác nhận</button>
    </form>
</div>
<style>
    .decrease:hover {
background-color: #4CAF50;
    }
    .increase:hover{
        background-color: #4CAF50;
    }

</style>
<script>
    let quantity = 1;

    function increaseQuantity() {
        quantity++;
        document.getElementById('quantity').textContent = quantity;
        document.getElementById('quantity_input').value = quantity;
    }

    function decreaseQuantity() {
        if (quantity > 1) {
            quantity--;
            document.getElementById('quantity').textContent = quantity;
            document.getElementById('quantity_input').value = quantity;
        }
    }

</script>

</body>
</html>