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
		<td colspan="6"><b>View All Categories Here</b></td>
	</tr>	
	<tr  align="center">
		<th>Category ID</th>
		<th>Category Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
		//get data from table
		$get_category = "select * from categories";
		//run query
		$run_category = mysqli_query($connection, $get_category);
		
		$i=0;
		//fetching data and displaying 
		while($row_category=mysqli_fetch_array($run_category)){
			$categories_id = $row_category['categories_id'];
			$categories_title = $row_category['categories_title'];
			$i++;
		
		?>
	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $categories_title; ?></td>
		<td><b><a href="index.php?edit_category=<?php echo $categories_id; ?>" style="text-decoration: none">Edit</a></b></td>
		<td><b><a href="delete_category.php?delete_category=<?php echo $categories_id; ?>" style="text-decoration: none">Delete</a></b></td>
	</tr>
	<?php
		}
		?>
</table>


<?php } ?>