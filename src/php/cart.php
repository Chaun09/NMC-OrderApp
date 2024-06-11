<!DOCTYPE html>
<html lang="en">
<?php

include("config.php");
error_reporting(0);
session_start();

$userid = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
    echo '<script>alert("You must log in to your account first.")</script>';
    echo '<script>location.href="index.php"</script>';
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/icon copy.png">
    <link rel="shortcut icon" href="../images/icon copy.png">
    <title>NMC Restaurant | Orders</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css" rel="stylesheet">
        .indent-small {
            margin-left: 5px;
        }
        .form-group.internal {
            margin-bottom: 0;
        }
        .dialog-panel {
            margin: 10px;
        }
        .datepicker-dropdown {
            z-index: 200 !important;
        }
        .panel-body {
            background: #e5e5e5;
            background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
            background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
            background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
            font: 600 15px "Open Sans", Arial, sans-serif;
        }
        label.control-label {
            font-weight: 600;
            color: #777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1em;
            font-family: Arial, sans-serif;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        thead tr {
            background-color: #404040;
            color: white;
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
        th {
            background-color: #5fa022;
        }
        .btn {
            padding: 5px 10px;
            font-size: 14px;
            font-weight: bold;
        }
        .confirm-button {
            background-color: #5fa022;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .confirm-button:hover {
            background-color: #4a8a19;
        }
    </style>
</head>
<body>
    <?php include("backbtn.php");?>
    <div class="page-wrapper">
        <div class="result-show">
            <div class="container">
                <div class="row"></div>
            </div>
        </div>
        <section class="restaurants-page">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12"></div>
                    <div class="col-xs-12">
                        <div class="bg-gray">
                            <div class="row">
                                <table class="table table-bordered table-hover">
                                    <thead style="background: #404040; color:white;">
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query_res = mysqli_query($link, "select * from cart where user_id ='" . $_SESSION['id'] . "'");
                                        if (!mysqli_num_rows($query_res) > 0) {
                                            echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
                                            
                                        } else {
                                            echo '  <form action="insert_orderdetails.php" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $prdid; ?>">
                                    <input type="hidden" id="quantity_input" name="quantity" value="1">
                                    <button class="confirm-button" type="submit">Xác nhận</button>
                                </form>';
                                            while ($row = mysqli_fetch_array($query_res)) {
                                        ?>
                                                <tr>
                                                    <td data-column="Item"> <?php echo $row['product_name']; ?></td>
                                                    <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
                                                    <td data-column="price">$<?php echo $row['total_amount']; ?></td>
                                                    <td data-column="status">
                                                        <?php
                                                        $status = $row['status'];
                                                        if ($status == "" or $status == "NULL") {
                                                        ?>
                                                            <button type="button" class="btn btn-info"><span class="fa fa-bars" aria-hidden="true"></span> Dispatch</button>
                                                    <td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['product_id']; ?>" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
                                                        <?php
                                                        }
                                                        if ($status == "Process") { ?>
                                                            <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> On The Way!</button>
                                                        <?php
                                                        }
                                                        if ($status == "Closed") {
                                                        ?>
                                                            <button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button>
                                                        <?php
                                                        }
                                                        if ($status == "Rejected") {
                                                        ?>
                                                            <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td data-column="Date"> <?php echo $row['order_date']; ?></td>
                                                </tr>
                                        <?php }
                                        } ?>
                                        <?php
                                        function countItemsInCart()
                                        {
                                            global $link;

                                            $sql = "SELECT SUM(quantity) as total_items FROM cart WHERE user_id ='" . $_SESSION['id'] . "'";
                                            $result = $link->query($sql);

                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                return $row['total_items'];
                                            } else {
                                                return 0;
                                            }
                                        }
                                        ?>
                                        <br>
                                        <br>
                                        <tr>Số Lượng sản phẩm có trong giỏ hàng: <?php echo countItemsInCart(); ?></tr>
                                        <br>
                                        <?php
                                        function countPriceInCart()
                                        {
                                            global $link;

                                            $sql = "SELECT SUM(total_amount) as total_price FROM cart WHERE user_id ='" . $_SESSION['id'] . "'";
                                            $result = $link->query($sql);

                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                return $row['total_price'];
                                            } else {
                                                return 0;
                                            }
                                        }
                                        ?>
                                        <tr>Tổng số tiền: <?php echo countPriceInCart(); ?></tr>
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
  
    <script src="https://kit.fontawesome.com/8e94eefdff.js" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>
