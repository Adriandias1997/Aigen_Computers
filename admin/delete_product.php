<?php
include("includes/database.php");
if(isset($_GET['delete_product'])){
	//delete the specific product using its id
	$delete_id=$_GET['delete_product'];
	
	//delete query
	$delete_product="delete from products where product_id='$delete_id'";
	
	//run the query
	$run_delete=mysqli_query($connection,$delete_product);
	
	if($run_delete){
		echo "<script>alert('Product has been deleted!')</script>";
		echo "<script>window.open('index.php?view_all_products','_self')</script>";
	}
}
?>