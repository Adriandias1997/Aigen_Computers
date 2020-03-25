<?php
include("includes/database.php");
if(isset($_GET['delete_brand'])){
	//delete the specific brand using its id
	$delete_id=$_GET['delete_brand'];
	
	//delete query
	$delete_brand="delete from brands where brand_id='$delete_id'";
	
	//run the query
	$run_delete=mysqli_query($connection,$delete_brand);
	
	if($run_delete){
		echo "<script>alert('Brand has been deleted!')</script>";
		echo "<script>window.open('index.php?view_all_brands','_self')</script>";
	}
}
?>