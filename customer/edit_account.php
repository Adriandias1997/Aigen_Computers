<?php
include("includes/database.php");
			$user = $_SESSION['customer_email'];
			//getting the customer details
			$get_customer = "select * from customers where customer_email='$user'";
			//running the query
			$run_customer = mysqli_query($connection, $get_customer);
			$row_customer = mysqli_fetch_array($run_customer);

//retreiving data already in database so user can see old data that needs to be replaced with new data
			$id=$row_customer['customer_id'];
			$name = $row_customer['customer_name'];
			$email = $row_customer['customer_email'];
			
			
			$city = $row_customer['customer_city'];
			$image = $row_customer['customer_image'];
			$contact = $row_customer['customer_contact'];
			$address = $row_customer['customer_address'];
			
?>
					
	<style>
		input[type=text] {
  width: auto;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: #A93333;
  color: white;
		font-size: 16px;
	}
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
	
</style>
<br>
		<center>
		<font size="5" face="Thasadith" color="#000000">
		<!--the $id local variable is equal to the customer id in the database-->
	<form action="" method="post" enctype="multipart/form-data">

	<table align="left" width="700">
		<tr>
			<td align="left" colspan="8">Edit your account.</td>
		</tr>
		<tr>
			<td align="center">Name:</td>
			<td><input type="text" name="customer_name" value="<?php echo $name; ?>"/></td>
		</tr>
		<tr>
			<td align="center">Email:</td>
			<td><input type="text" name="customer_email"  value="<?php echo $email; ?>" /></td>
		</tr>
		
		<tr>
			<td align="center">Image:</td>
			<td><input class="textbox" type="file" name="customer_image" required/><br><img src="customer_images/<?php echo $image; ?>"
			width="100px" height="100px"/></td>
		</tr>
		
	<tr>
			<td align="center">City:</td>
			<td><input type="text" name="customer_city"  value="<?php echo $city;?>"  /></td>
		</tr>
		<tr>
			<td align="center">Contact:</td>
			<td><input type="text" name="customer_contact"  value="<?php echo $contact; ?>" /></td>
		</tr>
		<tr>
			<td align="center">Address:</td>
			<td><input type="text" name="customer_address"  value="<?php echo $address; ?>" /></textarea></td>
		</tr>
			<tr align="center">	
			<td  colspan="8"><input class="button" type="submit" name="update" value="Update"/></td>
		</tr>
	</table>
	</form>
			</font>
	</center>


<?php
if(isset($_POST['update'])){
	//create local variables,, no need country variable as updating it is disabled
	$ip=getIp();
	$customer_id=$id;
	$customer_name=$_POST['customer_name'];
	$customer_email=$_POST['customer_email'];

	$customer_city=$_POST['customer_city'];
	$customer_contact=$_POST['customer_contact'];
	$customer_address=$_POST['customer_address'];
	
	//getting the image
	$customer_image=$_FILES['customer_image']['name'];
	$customer_image_tmp=$_FILES['customer_image']['tmp_name'];
	move_uploaded_file($customer_image_tmp,"customer_images/$customer_image");
	
	//updating the fields for a specific customer using the customers id
	$update_customer = "update customers set customer_name='$customer_name', customer_email='$customer_email',  customer_city='$customer_city', customer_contact='$customer_contact', customer_address='$customer_address', customer_image='$customer_image'
    where customer_id='$customer_id'";

	$run_update=mysqli_query($connection, $update_customer);
	
	if($run_update){
		echo "<script>alert('Your account has been updated successfully!')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
	}else{
		echo "<script>alert('Failed to update your account!')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
	}
}
?>



































