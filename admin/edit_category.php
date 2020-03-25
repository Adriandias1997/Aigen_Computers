	<?php
if(!isset($_SESSION['email'])){
echo "<script>window.open('admin_login.php?not_admin=SORRY ADMINISTRATORS ONLY!','_self')</script>";
}else{
	?>
	
	<?php
include("includes/database.php");

if(isset($_GET['edit_category'])){
	//create local variable
	$category_id=$_GET['edit_category'];
	
	//the query to delete the category
	$get_category="select * from categories where categories_id='$category_id'";
	//run the query
	$run_category=mysqli_query($connection,$get_category);
	$row_category=mysqli_fetch_array($run_category);
	
	$category_id=$row_category['categories_id'];
		$category_title=$row_category['categories_title'];
}
?>
	<style>
		.textbox {
  width: auto;
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
  font-size: 14px;
  margin: 2px 2px;
  cursor: pointer;
}
		
</style>
<br>
<center>
<form action="" method="post">
	<b>Insert New Category</b>
	<input class="textbox" type="text" name="new_category" value="<?php echo $category_title ?>"/><br>
	<input class="button" type="submit" name="update_category" value="Update Category"/>
</form>
</center>
<br>
<?php

if(isset($_POST['update_category'])){
//create local variable
$update_id=$category_id;
	$new_category=$_POST['new_category'];
//the query to insert new category to the table
$update_category="update categories set categories_title ='$new_category' where categories_id ='$update_id'";
//run the query
$run_category=mysqli_query($connection,$update_category);
if($run_category){
	echo "<script>alert('The category has been updated successfully!')</script>";
	echo "<script>window.open('index.php?view_all_categories','_self')</script>";
}
}
?>
<?php } ?>























