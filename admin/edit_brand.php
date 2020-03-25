<?php
if(!isset($_SESSION['email'])){
echo "<script>window.open('admin_login.php?not_admin=SORRY ADMINISTRATORS ONLY!','_self')</script>";
}else{
	?>
		<?php
include("includes/database.php");

if(isset($_GET['edit_brand'])){
	//create local variable
	$brand_id=$_GET['edit_brand'];
	
	//the query to delete the brand
	$get_brand="select * from brands where brand_id='$brand_id'";
	//run the query
	$run_brand=mysqli_query($connection,$get_brand);
	$row_brand=mysqli_fetch_array($run_brand);
	
	$brand_id=$row_brand['brand_id'];
		$brand_title=$row_brand['brand_title'];
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
	<b>Insert New Brand</b>
	<input class="textbox" type="text" name="new_brand" value="<?php echo $brand_title ?>"/><br>
	<input class="button" type="submit" name="update_brand" value="Update Brand"/>
</form>
</center>
<br>
<?php

if(isset($_POST['update_brand'])){
//create local variable
$update_id=$brand_id;
	$new_brand=$_POST['new_brand'];
//the query to insert new brand to the table
$update_brand="update brands set brand_title ='$new_brand' where brand_id ='$update_id'";
//run the query
$run_brand=mysqli_query($connection,$update_brand);
if($run_brand){
	echo "<script>alert('The brand has been updated successfully!')</script>";
	echo "<script>window.open('index.php?view_all_brands','_self')</script>";
}
}
?>


<?php } ?>





















