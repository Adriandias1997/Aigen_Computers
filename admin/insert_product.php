<br><!doctype html>

<?php
include("includes/database.php");
if(!isset($_SESSION['email'])){
echo "<script>window.open('admin_login.php?not_admin=SORRY ADMINISTRATORS ONLY!','_self')</script>";
}else{
?>


<!--JAVASCRIPT FOR THE TEXT EDITOR FOR PRODUCT DESCRIPTION-->
<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<!--STYLE FOR THE TEXTBOXES AND BUTTON-->
	<style>
		.textbox  {
  width: 700px;
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
  font-size: 20px;
  margin: 2px 2px;
  cursor: pointer;
}
</style>


	<center>
<form action="insert_product.php" method="post" enctype="multipart/form-data">
	<table align="center">
		<tr>
			<td colspan="8"><h3>Insert New Product</h3></td>
		</tr>
		<tr>
			<td>Product Title</td>
			<td><input class="textbox" type="text" name="product_title" required/></td>
		</tr>
		<tr>
			<td>Product Category</td>
			<td>
				<select class="textbox" name="product_category" required>
					<option>Select a category.</option>
<!--SELECTING CATEGORIES THROUGH DROPDOWN MENU USING A QUERY-->
<?php	
	$get_categories = "select * from categories";
	$run_categories = mysqli_query($connection, $get_categories);
	while ($row_categories = mysqli_fetch_array($run_categories)){
		$categories_id = $row_categories['categories_id'];
		$categories_title = $row_categories['categories_title'];
		
	echo "<option value='$categories_id'>$categories_title</option>";
		
	}
?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Product Brand</td>
			<td>
			<select class="textbox" name="product_brand" required>
					<option>Select a brand.</option>
<!--SELECTING BRANDS THROUGH DROPDOWN MENU USING A QUERY-->
<?php
				$get_brands = "select * from brands";
	$run_brands = mysqli_query($connection, $get_brands);
	while ($row_brands = mysqli_fetch_array($run_brands)){
		$brands_id = $row_brands['brand_id'];
		$brands_title = $row_brands['brand_title'];
		
	echo "<option value='$brands_id'>$brands_title</option>";
		
	}
	?>
			</td>
		</tr>
		<tr>
			<td>Product Image</td>
			<td><input class="textbox" type="file" name="product_image" required/></td>
		</tr>
		<tr>
			<td>Product Price</td>
			<td><input class="textbox" type="text" name="product_price" required/></td>
		</tr>
		<tr>
			<td>Product Description</td>
			<td><textarea class="textbox" name="product_description" cols="97" rows="5" ></textarea></td>
		</tr>
		<tr>
			<td>Product Keywords</td>
			<td><input class="textbox" type="text" name="product_keyword" required/></td>
		</tr>
		<tr align="center">
			<td colspan="8"><input class="button" type="submit" name="insert_product" value="Insert Product"</td>
		</tr>
	</table>
</form>
</center>
	</font>
</body>
</html>

<!--ADDING THE DATA TO THE DATABASE-->

<?php
if(isset($_POST['insert_product'])){
	
	//GETTING TEXT DATA FROM THE FIELDS
	$product_title = $_POST['product_title'];
	$product_category = $_POST['product_category'];
	$product_brand = $_POST['product_brand'];
	$product_price = $_POST['product_price'];
	$product_description = $_POST['product_description'];
	$product_keyword = $_POST['product_keyword'];
	
	//GETTING THE IMAGE
	$product_image = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image']['tmp_name'];
	move_uploaded_file($product_image_tmp, "product_images/$product_image");
	
	$insert_product = "insert into products 
	(product_category,product_brand,product_title,product_price,product_description,product_image,product_keyword) values
	('$product_category','$product_brand','$product_title','$product_price','$product_description','$product_image','$product_keyword')";
	
	$insert_pro = mysqli_query($connection, $insert_product);
	if($insert_pro){
		echo"<script>alert('Product has been added successfully!')</script>";
		echo"<script>window.open('index.php?insert_product','_self')</script>";
	}
}
?>
<?php } ?>































