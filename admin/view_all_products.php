<?php
include("includes/database.php");
if(!isset($_SESSION['email'])){
echo "<script>window.open('admin_login.php?not_admin=SORRY ADMINISTRATORS ONLY!','_self')</script>";
}else{
?>

<style>
	a {
  color:#A93333;
}
</style>

	<table align="center" width="1000">

	<tr>
		<td colspan="6"><b>View All Products Here</b></td>
	</tr>	
	<tr  align="center">
		<th>SN</th>
		<th>Title</th>
		<th>Image</th>
		<th>Price</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
		//get data from table
		$get_products = "select * from products";
		//run query
		$run_products = mysqli_query($connection, $get_products);
		
		$i=0;
		//fetching data and displaying 
		while($row_product=mysqli_fetch_array($run_products)){
			$product_id = $row_product['product_id'];
			$product_title = $row_product['product_title'];
			$product_image = $row_product['product_image'];
			$product_price = $row_product['product_price'];
			$i++;
		
		?>
	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $product_title; ?></td>
		<td><img src="product_images/<?php echo $product_image;?>" width="60px" height="60px"/></td>
		<td><?php echo $product_price; ?></td>
		<td><b><a href="index.php?edit_product=<?php echo $product_id; ?>" style="text-decoration: none">Edit</a></b></td>
		<td><b><a href="delete_product.php?delete_product=<?php echo $product_id; ?>" style="text-decoration: none">Delete</a></b></td>
	</tr>
	<?php
		}
		?>
</table>


<?php } ?>