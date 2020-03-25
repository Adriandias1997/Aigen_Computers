<?php
include("includes/database.php");
if(isset($_GET['delete_category'])){
	//delete the specific product using its id
	$delete_id=$_GET['delete_category'];
	
	//delete query
	$delete_category="delete from categories where categories_id='$delete_id'";
	
	//run the query
	$run_delete=mysqli_query($connection,$delete_category);
	
	if($run_delete){
		echo "<script>alert('Category has been deleted!')</script>";
		echo "<script>window.open('index.php?view_all_categories','_self')</script>";
	}
}
?>