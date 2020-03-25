<?php

include("includes/database.php");

?>
	<style>
		
	
	.textbox{
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
	
		a {
  color:#A93333;
}
	
</style>

<div>
<center>
<font size="6" face="Thasadith" color="#000000">

	<form method="post" action="">
	<table width="500" align="center">
	<br>
		<tr align="center">
			<td colspan="2">Login or Register to Purchase!</td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input class="textbox" type="text" name="email" placeholder="Please enter email." required/></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input class="textbox" type="password" name="password" placeholder="Please enter password." required/></td>
		</tr>
		<tr align="center">
			<td colspan="2"><a href="checkout.php?forgot_password" style="text-decoration:none">Forgot Password?</a></td>
		</tr>
		<tr align="center">	
			<td colspan="2"><input class="button" type="submit" name="login" value="Login"/></td>
		</tr>
		<tr align="center">	
			<td colspan="2"><a href="customer_register.php" style="text-decoration:none">Register Here</a></td>
		</tr>
	</table>
	
		</form>
	</font>
	</center>
	
	<?php
	if(isset($_POST['login'])){
		$customer_email=$_POST['email'];
		$customer_password=$_POST['password'];
		
		//select specific email and pass from customer
		$select_customer="select * from customers where customer_email='$customer_email' AND customer_password='$customer_password'";
		$run_customer=mysqli_query($connection, $select_customer);
		$check_customer=mysqli_num_rows($run_customer);
		
		//if customer details are incorrect display error
		if($check_customer==0){
			echo "<script>alert('Email or Password is incorrect. Please try again!')</script>";
		exit();
			}
		$ip=getIp();
		//select from specific customer
	$select_cart = "select * from cart where ip_address='$ip'";
	$run_cart=mysqli_query($connection,$select_cart);
	//check whether cart has item or not
	$check_cart=mysqli_num_rows($run_cart); 
		
		if($check_customer>0 AND $check_cart==0){
			//create session for the customer and if customer has no products in cart then will be directed to customer account
		$_SESSION['customer_email']=$customer_email;
		echo "<script>alert('Login successful!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		}else{
			//create session for the customer and if customer has products in cart then will be directed to checkout page
			$_SESSION['customer_email']=$customer_email;
		echo "<script>alert('Login successful!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		}
	}
	?>
</div>






















