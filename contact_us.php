
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
		.textbox{
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
			<input class="textbox" type="text" name="user_query" placeholder="Search a product" / >
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
		
<font size="6" face="Thasadith" color="#000000">
<br>
<center>
<p><b>Contact Us</b></p>
	<table width="1000">
		<tr><td><b>Address</b></td>
		<td>No. 36, De Kretser Place, Bambalapitiya Colombo 04</td>
		</tr>
			<tr><td><b>Phone</b></td>
		<td>011 5857265</td>
		</tr>
		</tr>
			<tr><td><b>Fax</b></td>
		<td> 011 4203170</td>
		</tr>
		</tr>
			<tr><td><b>Email</b></td>
		<td>info@aigen.com</td>
		</tr>
		
	</table>
	<br>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.041717630193!2d79.85818011472034!3d6.885606595024401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bc4fc2ecf6b%3A0x522a5c36c6a70b02!2sICBT+Auditorium!5e0!3m2!1sen!2slk!4v1556621674880!5m2!1sen!2slk" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	<br>
	<form action="" method="post">
<table>
	<br>
		
			<p><b>Customer Feedback</b></p>
		<tr>
			<td><b>Name:</b></td>
			<td><input class="textbox" type="text" name="customer_name" placeholder="Please enter your name." required/></td>
		</tr>
		<tr>
			<td><b>Comments:</b></td>
			<td><textarea class="textbox" type="text" name="customer_feedback" placeholder="Please enter your feedback." required
                  rows = "5"
                  cols = "50"></textarea></td>
		</tr>
			<tr><td align="right" colspan="2"><input class="button" type="submit" name="add_feedback" value="Add Feedback"/></td></tr>
		
			
			</table>
	</form>	
			<br>
			<br>
			<?php

if(isset($_POST['add_feedback'])){
//create local variable
$customer_name=$_POST['customer_name'];
	$customer_feedback=$_POST['customer_feedback'];
//the query to insert new feedback to the table
$insert_feedback="insert into feedback (customer_name,customer_feedback) values ('$customer_name','$customer_feedback')";
//run the query
$run_feedback=mysqli_query($connection,$insert_feedback);
if($run_feedback){
	echo "<script>alert('Thank You for your feedback!')</script>";
	echo "<script>window.open('contact_us.php','_self')</script>";
}
}
?>
<p>-------------------------------------------------------------------------------------------------</p>
		<table width="800" align="left">
	
	<tr>
		<th>Name</th>
		<th>Feedback</th>
		
	</tr>
	<?php
		//get data from table
		$get_feedback = "select * from feedback";
		//run query
		$run_feedback = mysqli_query($connection, $get_feedback);
		
		$i=0;
		//fetching data and displaying 
		while($row_feedback=mysqli_fetch_array($run_feedback)){
			$customer_name = $row_feedback['customer_name'];
			$customer_feedback = $row_feedback['customer_feedback'];
			$i++;
		
		?>
	<tr align="center">
		<td><?php echo $customer_name; ?></td>
		<td><?php echo $customer_feedback; ?></td>
		
	</tr>
	<?php
		}
		?>
</table>
		
			</center>
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