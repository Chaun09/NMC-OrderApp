<?php 
include "php/config.php";

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
<?php
$sql = "select * from products where product_id = '$prdid '";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);

?>
<div class="food-item">
    <h2><?php echo $row['product_name']; ?></h2>

<?php
if($row['country'] == 'vietnam')
{


?>

    <?php echo "<p>Giá: <span id='price'>$row[price]VNĐ</span></p> "; ?>
    
    <?php }
    
    else {
        
        echo "<p>Giá: <span id='price'>$row[price]$</span></p> ";

    
    }?>

    <p id="description"><?php echo $row['description'] ; ?></p>
    
    <div class="quantity-controls">
        <button onclick="decreaseQuantity()">-</button>
        <span id="quantity" name="quantity">1</span>
        <button onclick="increaseQuantity()">+</button>
    </div>
    
    <form action="php/cart_process.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $prdid; ?>">
        <input type="hidden" id="quantity_input" name="quantity" value="1">
        <button class="confirm-button" type="submit">Xác nhận</button>
    </form>
</div>

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
