<?php
session_start();
if(!isset($_SESSION['email'])){
echo "<script>window.open('admin_login.php?not_admin=SORRY ADMINISTRATORS ONLY!','_self')</script>";
}else{
?>

<?php
$connection = mysqli_connect("localhost","root","","aigen");

if(mysqli_connect_errno()){
	echo "Failed to connect to the database: " . mysqli_connect_error();
}
ini_set('display_errors', 1); 
ini_set('log_errors',1); 
error_reporting(E_ALL); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>


<!doctype html>
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
		<a href="../index.php"><img id="logo" src="images/logosmall.jpeg"> </a>
		<img id="banner" src="images/banner.gif"> 
	</div>
	<div class="menubar">

		
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
		
		


	a {
  color:#000000;
}
		
		#content_area{
	width: 1030px;
	height: auto;
	float:left;
	background: #FFFFFF;
margin-left: 20px;
			margin-top: 30px;
}
</style>
		
		
	</div>
	
	<div class="content_wrapper">
		<div id="sidebar"> 
		
			<div id="sidebar_title">
			<font size="6" face="Thasadith">
			<a href="index.php" style="text-decoration: none"><b>ADMINISTRATOR</b></a></font></div>
		
			<ul id="categories">  
			<a href="index.php?insert_product" style="text-decoration: none">Insert New Product</a><br>
			<a href="index.php?view_all_products" style="text-decoration: none">View All Products</a><br>
			<a href="index.php?insert_new_category" style="text-decoration: none">Insert New Category</a><br>
			<a href="index.php?view_all_categories" style="text-decoration: none">View All Categories</a><br>
			<a href="index.php?insert_new_brand" style="text-decoration: none">Insert New Brand</a><br>
			<a href="index.php?view_all_brands" style="text-decoration: none">View All Brands</a><br>
			<a href="index.php?view_customers" style="text-decoration: none">View Customers</a><br>
			<a href="index.php?view_orders" style="text-decoration: none">View Orders</a><br>
			<a href="index.php?view_payments" style="text-decoration: none">View Payments</a><br>
			<a href="admin_logout.php" style="text-decoration: none">Log Out</a><br>
			
				</ul>
			
	
		  </div>
		<font size="5" face="Thasadith" color="#000000">


		<div id="content_area">
			<p><b>Welcome Admin! Have a nice day!</b></p>
			<?php
			if(isset($_GET['insert_product'])){
				include("insert_product.php");
			}
		
			if(isset($_GET['view_all_products'])){
				include("view_all_products.php");
			}
			if(isset($_GET['edit_product'])){
				include("edit_product.php");
			}
			if(isset($_GET['insert_new_category'])){
				include("insert_new_category.php");
			}
			if(isset($_GET['view_all_categories'])){
				include("view_all_categories.php");
			}
			if(isset($_GET['edit_category'])){
				include("edit_category.php");
			}
				
			if(isset($_GET['insert_new_brand'])){
				include("insert_new_brand.php");
			}
			if(isset($_GET['view_all_brands'])){
				include("view_all_brands.php");
			}
			if(isset($_GET['edit_brand'])){
				include("edit_brand.php");
			}
			if(isset($_GET['view_customers'])){
				include("view_customers.php");
			}

			?>
			
				</font>
	
			
		</div>
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
<?php } ?>
