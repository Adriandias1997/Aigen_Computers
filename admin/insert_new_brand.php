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
	<b>Insert New Brand</b>
	<input class="textbox" type="text" name="new_brand" required/><br>
	<input class="button" type="submit" name="add_new_brand" value="Add Brand"/>
</form>
</center>
<br>
<?php

if(isset($_POST['add_new_brand'])){
//create local variable
$new_brand=$_POST['new_brand'];
//the query to insert new brand to the table
$insert_brand="insert into brands (brand_title) values ('$new_brand')";
//run the query
$run_brand=mysqli_query($connection,$insert_brand);
if($run_brand){
	echo "<script>alert('The New brand has been added successfully!')</script>";
	echo "<script>window.open('index.php?view_all_brands','_self')</script>";
}
}
?>

<?php } ?>






















