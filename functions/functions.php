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
<html>
<style>
	.button {
  background-color: #A93333;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 2px 2px;
  cursor: pointer;
}
	</style>
<html>
<?php
	
	//get customers ip address for cart purposes
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
	
	//add to cart function
function cart(){
	if(isset($_GET['add_cart'])){
		global $connection;
		$ip=getIp();
		$product_id	= $_GET['add_cart'];
			 $quantity = 0;
		$check_product = "select * from cart where ip_address='$ip' AND product_id='$product_id'";
		$run_check = mysqli_query($connection,$check_product);
		
		if(mysqli_num_rows($run_check)>0){
			echo "";
			
		}else{
			$insert_product = "insert into cart (product_id,ip_address,quantity) values ('$product_id','$ip','$quantity')";
			$run_product = mysqli_query($connection,$insert_product);
			echo"<script>window.open('index.php','_self')</script>";
		}
	}
}
	
	
	
	
	//getting the total added items
	function total_items(){
		if(isset($_GET['add_cart'])){
			global $connection;
			$ip=getIp();
			$get_items="select * from cart where ip_address='$ip'";
			$run_items=mysqli_query($connection,$get_items);
			$count_items=mysqli_num_rows($run_items); 
		}else{
			global $connection;
				$ip=getIp();
			$get_items="select * from cart where ip_address='$ip'";
			$run_items=mysqli_query($connection, $get_items);
			$count_items=mysqli_num_rows($run_items); 
			}
			echo $count_items;
		}
	
	//getting total price to cart
	function total_price(){
		//total price starts from 0
		$total=0;
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
				$values=array_sum($product_price);
				//total price  
				$total +=$values;
			}
			
		}
		echo "LKR. " . $total;
	}
	
	//getting categories from the database
function getcategories(){
	
	global $connection;
	
	$get_categories = "select * from categories";
	$run_categories = mysqli_query($connection, $get_categories);
	while ($row_categories = mysqli_fetch_array($run_categories)){
		$categories_id = $row_categories['categories_id'];
		$categories_title = $row_categories['categories_title'];
		
	echo "<li><a href='index.php?categories=$categories_id'>$categories_title</a></li>";
		
	}
}

//Getting Brands from the database

function getbrands(){
	
	global $connection;
	
	$get_brands = "select * from brands";
	$run_brands = mysqli_query($connection, $get_brands);
	while ($row_brands = mysqli_fetch_array($run_brands)){
		$brands_id = $row_brands['brand_id'];
		$brands_title = $row_brands['brand_title'];
		
	echo "<li><a href='index.php?brands=$brands_id'>$brands_title</a></li>";
		
	}
}

//getting the products from the database and displaying in the main page
function getProducts(){
	if(!isset($_GET['categories'])){
		if(!isset($_GET['brands'])){
	global $connection;
	//selecting 6 products at random and displaying
	$get_products="select * from products order by RAND() LIMIT 0,6";
	$run_products=mysqli_query($connection,$get_products);
	while($row_products=mysqli_fetch_array($run_products)){
		$product_id	=$row_products['product_id'];
		$product_category=$row_products['product_category'];
		$product_brand=$row_products['product_brand'];
		$product_title=$row_products['product_title'];
		$product_price=$row_products['product_price'];
		$product_image=$row_products['product_image'];
		
	echo "
	<div id='single_product'>
	<h3>$product_title</h3>
	<img src='admin/product_images/$product_image' width='180' height='180'/>
	<p><b>LKR. $product_price</b></p>
	<a href='details.php?product_id=$product_id' style='float:left;' class='button'>Details</a>
	
	<a href='index.php?add_cart=$product_id' style='float:right;' class='button'>Add to Cart</a>
	</div>
	";
		
		 
	}
}
}
}
	
function getCategoryProducts(){
	if(isset($_GET['categories'])){
		$categories_id=$_GET['categories'];
	
	global $connection;
	//getting products under the specific category and displaying
	$get_category_products="select * from products where product_category='$categories_id'";
	$run_category_products=mysqli_query($connection,$get_category_products);
		
	//if no products are available
		$count_category = mysqli_num_rows($run_category_products);
		if($count_category==0){
			echo"<h2 style='margin-top:20px'>Sorry! Out of Stock!</h2>";
	
		}
	while($row_category_products=mysqli_fetch_array($run_category_products)){
		$product_id	=$row_category_products['product_id'];
		$product_category=$row_category_products['product_category'];
		$product_brand=$row_category_products['product_brand'];
		$product_title=$row_category_products['product_title'];
		$product_price=$row_category_products['product_price'];
		$product_image=$row_category_products['product_image'];
		
	
	echo "
	<div id='single_product'>
	<h3>$product_title</h3>
	<img src='admin/product_images/$product_image' width='180' height='180'/>
	<p><b>LKR. $product_price</b></p>
	<a href='details.php?product_id=$product_id' style='float:left;' class='button'>Details</a>
	
	<a href='index.php?add_cart=$product_id' style='float:right;' class='button'>Add to Cart</a>
	</div>
	";
		
		}
	}
}

function getBrandProducts(){
	if(isset($_GET['brands'])){
		$brands_id=$_GET['brands'];
	
	global $connection;
	//getting products under the specific brand and displaying
	$get_brand_products="select * from products where product_brand='$brands_id'";
	$run_brand_products=mysqli_query($connection,$get_brand_products);
		
	//if no products are available
		$count_brand = mysqli_num_rows($run_brand_products);
		if($count_brand==0){
			echo"<h2 style='margin-top:20px'>Sorry! Out of Stock!</h2>";
	
		}
	while($row_brand_products=mysqli_fetch_array($run_brand_products)){
		$product_id	=$row_brand_products['product_id'];
		$product_category=$row_brand_products['product_category'];
		$product_brand=$row_brand_products['product_brand'];
		$product_title=$row_brand_products['product_title'];
		$product_price=$row_brand_products['product_price'];
		$product_image=$row_brand_products['product_image'];
		
		echo "
	<div id='single_product'>
	<h3>$product_title</h3>
	<img src='admin/product_images/$product_image' width='180' height='180'/>
	<p><b>LKR. $product_price</b></p>
	<a href='details.php?product_id=$product_id' style='float:left;' class='button'>Details</a>
	
	<a href='index.php?add_cart=$product_id' style='float:right;' class='button'>Add to Cart</a>
	</div>
	";
		
		}
	}
}

?>