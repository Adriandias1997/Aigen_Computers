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
		<td colspan="6"><b>View All Brands Here</b></td>
	</tr>	
	<tr  align="center">
		<th>Brand ID</th>
		<th>Brand Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
		//get data from table
		$get_brand = "select * from brands";
		//run query
		$run_brand = mysqli_query($connection, $get_brand);
		
		$i=0;
		//fetching data and displaying 
		while($row_brand=mysqli_fetch_array($run_brand)){
			$brand_id = $row_brand['brand_id'];
			$brand_title = $row_brand['brand_title'];
			$i++;
		
		?>
	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $brand_title; ?></td>
		<td><b><a href="index.php?edit_brand=<?php echo $brand_id; ?>" style="text-decoration: none">Edit</a></b></td>
		<td><b><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>" style="text-decoration: none">Delete</a></b></td>
	</tr>
	<?php
		}
		?>
</table>


<?php } ?>