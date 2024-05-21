<!DOCTYPE html>
<html lang="en">
<?php

include("config.php");
error_reporting(0);
session_start();

$userid = $_SESSION['id'];
if(!isset($_SESSION['id']))
{
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
  /* Old browsers */
  background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* FF3.6+ */
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
  /* Chrome,Safari4+ */
  background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Chrome10+,Safari5.1+ */
  background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Opera 12+ */
  background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* IE10+ */
  background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
  /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
  font: 600 15px "Open Sans", Arial, sans-serif;
}
label.control-label {
  font-weight: 600;
  color: #777;
}

/* 
table { 
	width: 750px; 
	border-collapse: collapse; 
	margin: auto;
	
	}

/* Zebra striping */
/* tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #404040; 
	color: white; 
	font-weight: bold; 
	
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	
	} */ */



th {
	background-color: #5fa022;
}




	</style>

	</head>

<body>
<?php include("backbtn.php");?>
    
      
        
        <div class="page-wrapper">
       
           
    
       
            <div class="result-show">
                <div class="container">
                    <div class="row">
                       
                       
                    </div>
                </div>
            </div>
    
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                          </div>
                        <div class="col-xs-12">
                            <div class="bg-gray">
                                <div class="row">
								
							<table class="table table-bordered table-hover">
						  <thead style = "background: #404040; color:white;">
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
				
						$query_res= mysqli_query($link,"select * from cart where user_id ='".$_SESSION['id']."'");
												if(!mysqli_num_rows($query_res) > 0 )
														{
															echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
														}
													else
														{			      
										  
										  while($row=mysqli_fetch_array($query_res))
										  {
						
							?>
												<tr>	
														 <td data-column="Item"> <?php echo $row['product_name']; ?></td>
														  <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
														  <td data-column="price">$<?php echo $row['total_amount']; ?></td>
														   <td data-column="status"> 
														   <?php 
																			$status=$row['status'];
																			if($status=="" or $status=="NULL")
																			{
																			?>
																			<button type="button" class="btn btn-info"><span class="fa fa-bars"  aria-hidden="true" ></span> Dispatch</button>
																			<td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['product_id'];?>" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 

																		   <?php 
																			  }
																			   if($status=="Process")
																			 { ?>
																				<button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span> On The Way!</button>
																			<?php
																				}
																			if($status=="Closed")
																				{
																			?>
																			 <button type="button" class="btn btn-success" ><span  class="fa fa-check-circle" aria-hidden="true"></span> Delivered</button> 
																			<?php 
																			} 
																			?>
																			<?php
																			if($status=="Rejected")
																				{
																			?>
																			 <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button>
																			<?php 
																			} 
																			?>
														   
														   
														   
														   
														   
														   
														   </td>
														  <td data-column="Date"> <?php echo $row['order_date']; ?></td>
														  
															</td>
														 
												</tr>
												
											
														<?php }} ?>		
												<?php 
												function countItemsInCart() {
													global $link;
												
													$sql = "SELECT SUM(quantity) as total_items FROM cart WHERE user_id ='".$_SESSION['id']."'";
													$result = $link->query($sql);
												
													if ($result->num_rows > 0) {
														$row = $result->fetch_assoc();
														return $row['total_items'];
													} else {
														return 0;
													}
												}
												
												
												?>	
												<tr>Số Lượng sản phẩm có trong giỏ hàng: <?php echo countItemsInCart();?></tr>		
												<br>
												<?php 
														function countPriceInCart() {
															global $link;
														
															$sql = "SELECT SUM(total_amount) as total_price FROM cart WHERE user_id ='".$_SESSION['id']."'";
															$result = $link->query($sql);
														
															if ($result->num_rows > 0) {
																$row = $result->fetch_assoc();
																return $row['total_price'];
															} else {
																return 0;
															}
														}
														
												?>
												<tr>Tổng số tiền: <?php echo countPriceInCart();?></tr>		
	
							
							
										
						
						  </tbody>

					</table>
					<form action="insert_orderdetails.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $prdid; ?>">
        <input type="hidden" id="quantity_input" name="quantity" value="1">
        <button class="confirm-button" type="submit">Xác nhận</button>
    </form>
						
					
                                    
                                </div>
                           
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
