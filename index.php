
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
			
			<a href='cart.php' style="text-decoration:none">&nbsp;&nbsp;&nbsp;&nbsp;Go to Cart</a>&nbsp;&nbsp;&nbsp;&nbsp;
			
			<?php
				if(!isset($_SESSION['customer_email'])){
					echo "<a href ='checkout.php' style='text-decoration:none'>Login</a>";
				}else{
					echo  "<a href ='logout.php' style='text-decoration:none'>Logout</a>";
				}
				?>
				</font>
			</span>
		</div> 
		
		<!--FOR A SINGLE PRODUCT TO BE DISPLAYED-->
			<div id="products_box">
				<?php getProducts();?>
				  <?php  getCategoryProducts(); ?>	
				  <?php getBrandProducts();?>
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