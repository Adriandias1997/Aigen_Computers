<?php
include("includes/database.php");
if(isset($_GET['delete_customer'])){
	//delete the specific brand using its id
	$delete_id=$_GET['delete_customer'];
	
	//delete query
	$delete_customer="delete from customers where customer_id='$delete_id'";
	
	//run the query
	$run_delete=mysqli_query($connection,$delete_customer);
	
	if($run_delete){
		echo "<script>alert('Customer has been deleted!')</script>";
		echo "<script>window.open('index.php?view_customers','_self')</script>";
	}
}
?>