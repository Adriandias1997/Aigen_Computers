<?php

include("includes/database.php");
?>
  <style>
.textbox {
  width: 500px;
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
	
</style> 
<br>
<h2 align="left">Change Your Password.</h2>
 <form action="" method="post">
		<table align="center">
 		<tr>
			<td>Enter Current Password:</td>
			<td> <input class="textbox" type="password" name="current_password" required/></td>
		</tr>
		<tr>
			<td>Enter New Password:</td>
			<td><input class="textbox" type="password" name="new_password" required/></td>
		</tr>
		<tr>
			<td>Re-enter New Password:</td>
			<td><input class="textbox" type="password" name="retype_new_password" required/></td>
		</tr>
		<tr align="right">
			<td colspan="4"><input type="submit" name="change_password" value=" Change Password" class="button"></td>
		</tr>
</table>
</form>


<?php
//if change password button is clicked
if(isset($_POST['change_password'])){
	
	$user=$_SESSION['customer_email'];
	//create local variables first
	$current_password=$_POST['current_password'];
	$new_password=$_POST['new_password'];
	$retype_new_password=$_POST['retype_new_password'];
	
	//password length validation
	 $passwordlength= strlen($new_password);
	
	//query to get the password from specific user
	$select_password = 	"select * from customers where customer_password='$current_password' AND customer_email='$user'";
	//run the query
	$run_password=mysqli_query($connection,$select_password);
	$check_password=mysqli_num_rows($run_password);
	
	//if current password entered is wrong
	if($check_password==0){
		echo "<script>alert('Your current password is incorrect!')</script>";
		exit();
	}
	//passwords should be 6 characters or more
	if ($passwordlength < 6){
		echo "<script>alert('Your Password should be 6 characters or more!')</script>";
		exit();
	}
	//if new password and reneter password is wrong
	if($new_password!=$retype_new_password){
		echo "<script>alert('Your Passwords do not match! Please try again!')</script>";
		exit();
	}
	
	
	else{
		//update new password
		$update_password = "update customers set customer_password='$new_password' where customer_email='$user'";
		
		//run update query
		$run_update=mysqli_query($connection, $update_password);
		echo "<script>alert('Your Password has been updated!')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
	}
}
?>




























