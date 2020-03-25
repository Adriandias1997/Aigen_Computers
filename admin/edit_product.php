<br><!doctype html>
<?php
if(!isset($_SESSION['email'])){
echo "<script>window.open('admin_login.php?not_admin=SORRY ADMINISTRATORS ONLY!','_self')</script>";
}else{
	?>
<?php
include("../includes/database.php");

if(isset($_GET['edit_product'])){
		$get_id=$_GET['edit_product'];
		//get data from table
		$get_products = "select * from products where product_id='$get_id'";
		//run query
		$run_products = mysqli_query($connection, $get_products);
		
		$i=0;
		//fetching data and displaying 
		$row_product=mysqli_fetch_array($run_products);
			$product_category = $row_product['product_category'];
			$product_brand = $row_product['product_brand'];
			$product_id = $row_product['product_id'];
			$product_title = $row_product['product_title'];
			$product_image = $row_product['product_image'];
			$product_price = $row_product['product_price'];
			$product_description = $row_product['product_description'];
			$product_keyword = $row_product['product_keyword'];
			
			//getting the category name instead of the number
	$get_categories="select * from categories where categories_id='$product_category'";
	$run_categories=mysqli_query($connection,$get_categories);
	$row_categories=mysqli_fetch_array($run_categories);
	$categories_title =$row_categories['categories_title'];
	
	//getting the brand name instead of the number
	$get_brands="select * from brands where brand_id='$product_brand'";
	$run_brands=mysqli_query($connection,$get_brands);
	$row_brands=mysqli_fetch_array($run_brands);
	$brand_title=$row_brands['brand_title'];

}
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
<form action="" method="post" enctype="multipart/form-data">
	<table align="center">
		<tr align="center">
			<td colspan="8"><h3>Edit Product</h3></td>
		</tr>
		<tr>
			<td>Product Title</td>
			<td><input class="textbox" type="text" name="product_title" value="	<?php echo $product_title; ?>"/></td>
		</tr>
		<tr>
			<td>Product Category</td>
			<td>
				<select class="textbox" name="product_category" required>
					<option><?php echo $categories_title ; ?></option>
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
					<option><?php echo $brand_title; ?></option>
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
			<td><input class="textbox" type="file" name="product_image"/><br><img src="product_images/<?php echo $product_image; ?>" width="60px" height="60px"/></td>
		</tr>
		<tr>
			<td>Product Price</td>
			<td><input class="textbox" type="text" name="product_price" value="<?php echo $product_price; ?>"/></td>
		</tr>
		<tr>
			<td>Product Description</td>
			<td><textarea class="textbox" name="product_description" cols="97" rows="5" ><?php echo $product_description; ?></textarea></td>
		</tr>
		<tr>
			<td>Product Keywords</td>
			<td><input class="textbox" type="text" name="product_keyword" value="<?php echo $product_keyword; ?>"/></td>
		</tr>
		<tr align="center">
			<td colspan="8"><input class="button" type="submit" name="update_product" value="Update Product"</td>
		</tr>
	</table>
</form>
</center>
	</font>
</body>
</html>

<!--ADDING THE DATA TO THE DATABASE-->

<?php
if(isset($_POST['update_product'])){
	
	$update_id=$product_id;
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
	
	$update_product = "update products set 
	product_category='$product_category',
	product_brand='$product_brand',
	product_title='$product_title',
	product_price='$product_price',
	product_description='$product_description',
	product_image='$product_image',
	product_keyword='$product_keyword' where product_id='$update_id'";
	
	$run_product = mysqli_query($connection, $update_product);
	if($run_product){
		echo"<script>alert('Product has been updated successfully!')</script>";
		echo"<script>window.open('index.php?edit_product','_self')</script>";
	}
}
?>

<?php } ?>






























