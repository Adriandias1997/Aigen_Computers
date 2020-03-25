
<!doctype html>
<?php
session_start();
$connection = mysqli_connect("localhost","root","","aigen");
	if(mysqli_connect_errno()){
	echo "Failed to connect to the database: " . mysqli_connect_error();
}

include("functions/functions.php");

ini_set('display_errors', 1); 
ini_set('log_errors',1); 
error_reporting(E_ALL); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>

<html>
<head>
<meta charset="utf-8">
<title>AIGEN COMPUTERS</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Thasadith" rel="stylesheet">
<link rel="icon" type="image/png" href="images/icon.png"/>
<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>

<body>
<font size="6" face="Thasadith" color="#FFFFFF">

<div class="main_wrapper">
	<div class="header_wrapper">
		<a href="index.php"><img id="logo" src="images/logosmall.jpeg"> </a>
		<img id="banner" src="images/banner.gif"> 
	</div>
	<div class="menubar">
		<ul id="menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="all_products.php">All Products</a></li>
			<li><a href="customer/my_account.php">My Account</a></li>
			<li><a href="customer_register.php">Sign Up</a></li>
			<li><a href="cart.php">Cart</a></li>
			<li><a href="contact_us.php">Contact Us</a></li>
		</ul>
		
	<style>
		input[type=text] {
  width: auto;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: #A93333;
  color: white;
		font-size: 16px;
	}
	
		.button {
  background-color: #A93333;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 2px 2px;
  cursor: pointer;
}
		
		
#shopping_cart{
	width:auto;
	height: auto;
	background:#A93333;

}

	a {
  color:#E8FF00;
}
		
		#content_area{
	width: 1100px;
	height: auto;
	float:left;
	background: #FFFFFF;
margin-left: 20px;
			margin-top: 30px;
}
</style>
		
		<div id="form">
		<form method="get" action="search_results.php" enctype="multipart/form-data">
			<input type="text" name="user_query" placeholder="Search a product" / >
			<button class="button" type="submit" name="search" value="Search"/>Search</button>
			
		</form>
			
		</div>
	</div>
	
	<div class="content_wrapper">
		<div id="sidebar"> 
		
			<div id="sidebar_title">
			<font size="6" face="Thasadith">
			<b>Categories</b></font></div>
		
		<ul id="categories">  
	 <?php  getcategories(); ?>
				<ul>
			
			  <div id="sidebar_title">
			  <font size="6" face="Thasadith">
			  <b>Brands</b></font></div>
		
		<ul id="categories">	
	  <?php  getbrands(); ?>		
	
	  <ul>
		  
		  </div>
		<font size="4" face="Thasadith" color="#000000">

		<!--ALL PRODUCTS DISPLAYED HERE-->
		<div id="content_area">
	
			<?php cart(); ?>
		
				<!--SHOPPING CART DETAILS DISPLAYED HERE-->
		<div id="shopping_cart">
			<font size="6" face="Thasadith" color="#000000"><span><b>
			<?php
				if(isset($_SESSION['customer_email'])){
					echo "Welcome: " . $_SESSION['customer_email'];
				}else{
					echo "Welcome Guest!";
				}
				?>
				&nbsp;&nbsp;</b></font>
				<font size="6" face="Thasadith" color="#FFFFFF">Total Items: <b><i><?php total_items(); ?></i></b>	&nbsp;&nbsp;
				Total Price: <b><i><?php total_price(); ?></i></b> 
			
			<a href='index.php' style="text-decoration:none">&nbsp;&nbsp;&nbsp;&nbsp;Back to Shop</a>&nbsp;&nbsp;&nbsp;&nbsp;
			<?php
				if(!isset($_SESSION['customer_email'])){
					echo "<a href ='checkout.php' style='text-decoration:none'>Login</a>";
				}else{
					echo  "<a href ='logout.php' style='text-decoration:none'>Logout</a>";
				}
				?>
			</span>
			</font>
		</div> 
		
		<!--FOR A SINGLE PRODUCT TO BE DISPLAYED-->
			<div id="products_box">
				<font size="5" face="Thasadith" color="#000000">
			<form action="" method="post" enctype="multipart/form-data">
				<br>
				<table width="900" align="center">
					
					<tr align="center">
						<th>Remove</th>
						<th>Product(s)</th>
						<th>Quantity</th>
						<th>Total Price</th>
						
					</tr>
					<?php

								//total price starts from 0
						$total=0;
								$quantity=0;
						global $connection;
					 $ip=getIp();
					//taken data from cart table using the customers ip address
					$select_price = "select * from cart where ip_address='$ip'";
					$run_price = mysqli_query($connection,$select_price);
					//this while loop takes data from product table according to the product id 
					while($product_price=mysqli_fetch_array($run_price)){
						$product_id=$product_price['product_id'];
						$product_price="select * from products where product_id='$product_id'";
						$run_product_price=mysqli_query($connection, $product_price);
						//used an array to get all data into a single variable 
						while($pp_price=mysqli_fetch_array($run_product_price)){
							//product prices set in the array to add up
							$product_price=array($pp_price['product_price']);
							$product_title=$pp_price['product_title'];
							$product_image=$pp_price['product_image'];
							$single_product_price=$pp_price['product_price'];
							$values=array_sum($product_price);
							//total price  
							$total +=$values;

								?>
					
					<tr align="center">
						<td><input type="checkbox" name="remove[]" value="<?php echo $product_id; ?>"/></td>
						<td><?php echo $product_title; ?><BR>
						<img src="admin/product_images/<?php echo $product_image; ?>" width="100px" height="100px"/>
						</td>
						<td><input type="text" size="3" name="qtytextbox" value="<?php echo $_SESSION['qty']; ?>"/></td>
						
						<?php	
				
						//updating product quantity
					
						if(isset($_POST['update_cart'])){
					
						
							$quantity = $_POST['qty'];
							$update_quantity ="UPDATE cart SET quantity='$quantity'";
							$run_quantity=mysqli_query($connection, $update_quantity);
							
							//keep the quantity value in the text field,  a session will be used
							$_SESSION['qty']=$quantity;
							
							//calculating new total
							$total = $total*$quantity;
						}
						?>
						<td><?php echo "LKR. " . $single_product_price; ?> </td>
					</tr>
					
					<?php 
			}
		}
					?>
					
					<tr align="right">
						<td colspan="4"><b>Sub Total:</b></td>
						<td><?php echo "LKR. " . $total;  ?></td>
					</tr>
					<tr align="right">
						<td colspan="1"><input class="button" type="submit" name="update_cart" value="Update Cart"/></td>
						<td colspan="2"><input class="button" type="submit" name="continue" value="Continue Shopping"/></td>
						<td colspan="3"><button class="button"><a href="customer_register.php" style="text-decoration: none; color: white">Checkout</a></button></td>
					</tr>
				</table>
			</form> 
			
			
			<?php
				function update_cart(){

							//update cart function
							if(isset($_POST['update_cart'])){
									global $connection;
								$ip=getIp();
								$quantity=0;
								//remove product function
								foreach($_POST['remove[]'] as $product_id){
									//delete products from specific customer 
									$delete_product = "delete from cart where product_id='$product_id' AND ip_address='$ip'"; 
								$run_delete=mysqli_query($connection,$delete_product);
								if($run_delete){
									echo"<script>window.open('cart.php','_self')</script>";
								}
						echo @$update_cart=update_cart(); 
							}

							}

							//if customer wants to continue shopping
							else if(isset($_POST['continue'])){
							echo "<script>window.open('index.php','_self')</script>";
							} 
						
						}
	
		
							?>
				 
			</div>
			
		</div></font>	
		</div>
		<!--content wrapper ends here-->  
		</div>
	<div id="footer">
		<h4 style="text-align: center; padding-top: 30px;">&copy; 2019 by AIGEN COMPUTERS</h4>
	</div>

</div>
	</font>
</body>
</html>