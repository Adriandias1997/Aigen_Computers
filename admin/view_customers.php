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
		<td colspan="6"><b>View All Customers Here</b></td>
	</tr>	
	<tr align="center">
		<th>ID</th>
		<th>Name</th>
		<th>Image</th>
		<th>Email</th>
		<th>Country</th>
		<th>Contact</th>
		<th>Address</th>
		<th>Delete</th>
	</tr>
	<?php
		//get data from table
		$get_customer = "select * from customers";
		//run query
		$run_customer = mysqli_query($connection, $get_customer);
		
		$i=0;
		//fetching data and displaying 
		while($row_customer=mysqli_fetch_array($run_customer)){
			$customer_id = $row_customer['customer_id'];
			$customer_name = $row_customer['customer_name'];
			$customer_image = $row_customer['customer_image'];
			$customer_email = $row_customer['customer_email'];
			$customer_country = $row_customer['customer_country'];
			$customer_contact = $row_customer['customer_contact'];
			$customer_address = $row_customer['customer_address'];
			$i++;
		
		?>
	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $customer_name; ?></td>
		<td><img src="../customer/customer_images/<?php echo $customer_image;?>" width="60px" height="60px"/></td>
		<td><?php echo $customer_email; ?></td>
		<td><?php echo $customer_country; ?></td>
		<td><?php echo $customer_contact; ?></td>
		<td><?php echo $customer_address; ?></td>
		<td><b><a href="delete_customer.php?delete_customer=<?php echo $customer_id; ?>" style="text-decoration: none">Delete</a></b></td>
	</tr>
	<?php
		}
		?>
</table>


<?php } ?>