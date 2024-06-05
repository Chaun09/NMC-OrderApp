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


    $sql1 = "DELETE FROM cart";
  
    if (mysqli_query($link, $server) == 1 && mysqli_query($link, $sql1) == 1) 
    {
        echo '
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            form {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 300px;
                display: flex;
                flex-direction: column;
            }
            form label {
                margin-bottom: 8px;
                font-weight: bold;
            }
            form input[type="text"],
            form input[type="radio"] {
                margin-bottom: 15px;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
                width: calc(100% - 18px);
            
            }
            form input[type="radio"] {
              transform:translate(-50%,0%);
            
            }
            form button {
                padding: 10px 20px;
                background-color: #5fa022;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            form button:hover {
                background-color: #4a8a19;
            }
        </style>
        <form method="POST" action="add-address.php">
            <label for="address">Address:</label>
            <input type="text" name="address" placeholder="Address" required>
            <label for="note">Note:</label>
            <input type="text" name="note" placeholder="Note" required>
            <label for="cash">Payment:</label>
            <label>Cash:</label>
            <input type="radio" name="cash" value="Cash" required>
            <label>Banking:</label>
            <input type="radio" name="cash" value="Banking" required>
            <button type="submit" name="submit">Submit</button>
        </form>';
    }    
    else 
    {
        echo "Unsuccessful";
    }
}
?>
