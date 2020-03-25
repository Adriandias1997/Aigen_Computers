	<?php
include("includes/database.php");
if(!isset($_SESSION['email'])){
echo "<script>window.open('admin_login.php?not_admin=SORRY ADMINISTRATORS ONLY!','_self')</script>";
}else{
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
	<input class="textbox" type="text" name="new_category" required/><br>
	<input class="button" type="submit" name="add_new_category" value="Add Category"/>
</form>
</center>
<br>
<?php

if(isset($_POST['add_new_category'])){
//create local variable
$new_category=$_POST['new_category'];
//the query to insert new category to the table
$insert_category="insert into categories (categories_title) values ('$new_category')";
//run the query
$run_category=mysqli_query($connection,$insert_category);
if($run_category){
	echo "<script>alert('The New category has been added successfully!')</script>";
	echo "<script>window.open('index.php?view_all_categories','_self')</script>";
}
}
?>
<?php } ?>























