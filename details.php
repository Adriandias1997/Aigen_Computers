<!doctype html>
<?php

include("functions/functions.php");

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
		<img id="logo" src="images/logosmall.jpeg"> 
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
}
		#products_box{
	width:1100px;
	text-align: center;
	margin-left: 0px;
	margin-bottom: 10px;

}
		#single_product{
	float: left;
	margin-left: 30px;
	padding: 10px;
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
				<!--SHOPPING CART DETAILS DISPLAYED HERE-->
		<div id="shopping_cart">
			<font size="6" face="Thasadith" color="#FFFFFF"><span>Welcome Guest!
			Total Items: 	Total Price:  
			
			<a href='cart.php' style="text-decoration:none">Go to Cart</a></font>
			</span>
		</div>
		<!--FOR A SINGLE PRODUCT TO BE DISPLAYED-->
			<div id="products_box">
			<?php
				if(isset($_GET['product_id'])){
					$product_id=$_GET['product_id'];
				}
				$get_products="select * from products where product_id='$product_id'";
	$run_products=mysqli_query($connection,$get_products);
	while($row_products=mysqli_fetch_array($run_products)){
		$product_id	=$row_products['product_id'];
		$product_category=$row_products['product_category'];
		$product_brand=$row_products['product_brand'];
		$product_title=$row_products['product_title'];
		$product_price=$row_products['product_price'];
		$product_image=$row_products['product_image'];
		$product_description=$row_products['product_description'];
	echo "
	<div id='single_product'>
	<h3>$product_title</h3>
	<img src='admin/product_images/$product_image'/>
	<p><b>LKR. $product_price</b></p>
	<p>$product_description</p>
	<a href='index.php' style='float:left;' class='button'>Go Back</a>
	
	<a href='index.php??product_id=$product_id' style='float:right;' class='button'>Add to Cart</a>
	</div>
	";
		
		 
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