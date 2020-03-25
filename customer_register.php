
<!doctype html>
<?php
 	session_start();
include("functions/functions.php");
include("includes/database.php");

?>

<html>
<head>
<meta charset="utf-8">
<title>AIGEN COMPUTERS</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Thasadith" rel="stylesheet">
<link rel="icon" type="image/png" href="images/icon.png"/>
<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>

<body>
<font size="6" face="Thasadith" color="#FFFFFF">

<div class="main_wrapper">
	<div class="header_wrapper">
		<a href="index.php"><img id="logo" src="images/logosmall.jpeg"> </a>
		<img id="banner" src="images/banner.gif"> 
	</div>
	<div class="menubar">
		<ul id="menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="all_products.php">All Products</a></li>
			<li><a href="customer/my_account.php">My Account</a></li>
			<li><a href="customer_register.php">Sign Up</a></li>
			<li><a href="cart.php">Cart</a></li>
			<li><a href="contact_us.php">Contact Us</a></li>
		</ul>
		
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
}
		
		
#shopping_cart{
	width:auto;
	height: auto;
	background:#A93333;

}

	a {
  color:#E8FF00;
}
		
		#content_area{
	width: 1100px;
	height: auto;
	float:left;
	background: #FFFFFF;
margin-left: 20px;
			margin-top: 30px;
}
</style>
		
		<div id="form">
		<form method="get" action="search_results.php" enctype="multipart/form-data">
			<input type="text" name="user_query" placeholder="Search a product" / >
			<button class="button" type="submit" name="search" value="Search"/>Search</button>
			
		</form>
			
		</div>
	</div>
	
	<div class="content_wrapper">
		<div id="sidebar"> 
		
			<div id="sidebar_title">
			<font size="6" face="Thasadith">
			<b>Categories</b></font></div>
		
		<ul id="categories">  
	 <?php  getcategories(); ?>
				<ul>
			
			  <div id="sidebar_title">
			  <font size="6" face="Thasadith">
			  <b>Brands</b></font></div>
		
		<ul id="categories">	
	  <?php  getbrands(); ?>		
	
	  <ul>
		  
		  </div>
		<font size="4" face="Thasadith" color="#000000">

		<!--ALL PRODUCTS DISPLAYED HERE-->
		<div id="content_area">
	
			<?php cart(); ?>
		
				<!--SHOPPING CART DETAILS DISPLAYED HERE-->
		<div id="shopping_cart">
			<font size="6" face="Thasadith" color="#000000"><span><b>Welcome Guest!&nbsp;&nbsp;</b></font>
				<font size="6" face="Thasadith" color="#FFFFFF">Total Items: <b><i><?php total_items(); ?></i></b>	&nbsp;&nbsp;
				Total Price: <b><i><?php total_price(); ?></i></b> 
			
			<a href='cart.php' style="text-decoration:none">&nbsp;&nbsp;Go to Cart</a></font>
			</span>
		</div> 
		<center>
		<font size="6" face="Thasadith" color="#000000">
	<form action="customer_register.php" method="post" enctype="multipart/form-data">

	<table align="center" width="700px">
		<tr>
			<td align="center" colspan="8">Create an account.</td>
		</tr>
		<tr>
			<td align="center">Name:</td>
			<td><input class="textbox" type="text" name="customer_name" required/></td>
		</tr>
		<tr>
			<td align="center">Email:</td>
			<td><input class="textbox" type="text" name="customer_email"  required/></td>
		</tr>
		<tr>
			<td align="center">Password:</td>
			<td><input class="textbox" type="password" name="customer_password"  required/></td>
		</tr>
		<tr>
			<td align="center">Image:</td>
			<td><input class="textbox" type="file" name="customer_image"  required/></td>
		</tr>
		<tr>
			<td align="center">Country:</td>
			<td><select class="textbox" name="customer_country">
					<option>Afghanistan</option>
					<option>Albania</option>
					<option>Algeria</option>
					<option>Andorra</option>
					<option>Angola</option>
					<option>Anguilla</option>
					<option>Antigua & Barbuda</option>
					<option>Argentina</option>
					<option>Armenia</option>
					<option>Australia</option>
					<option>Austria</option>
					<option>Azerbaijan</option>
					<option>Bahamas</option>
					<option>Bahrain</option>
					<option>Bangladesh</option>
					<option>Barbados</option>
					<option>Belarus</option>
					<option>Belgium</option>
					<option>Belize</option>
					<option>Benin</option>
					<option>Bermuda</option>
					<option>Bhutan</option>
					<option>Bolivia</option>
					<option>Bosnia & Herzegovina</option>
					<option>Botswana</option>
					<option>Brazil</option>
					<option>Brunei Darussalam</option>
					<option>Bulgaria</option>
					<option>Burkina Faso</option>
					<option>Burundi</option>
					<option>Cambodia</option>
					<option>Cameroon</option>
					<option>Canada</option>
					<option>Cape Verde</option>
					<option>Cayman Islands</option>
					<option>Central African Republic</option>
					<option>Chad</option>
					<option>Chile</option>
					<option>China</option>
					<option>China - Hong Kong / Macau</option>
					<option>Colombia</option>
					<option>Comoros</option>
					<option>Congo</option>
					<option>Congo, Democratic Republic of (DRC)</option>
					<option>Costa Rica</option>
					<option>Croatia</option>
					<option>Cuba</option>
					<option>Cyprus</option>
					<option>Czech Republic</option>
					<option>Denmark</option>
					<option>Djibouti</option>
					<option>Dominica</option>
					<option>Dominican Republic</option>
					<option>Ecuador</option>
					<option>Egypt</option>
					<option>El Salvador</option>
					<option>Equatorial Guinea</option>
					<option>Eritrea</option>
					<option>Estonia</option>
					<option>Ethiopia</option>
					<option>Fiji</option>
					<option>Finland</option>
					<option>France</option>
					<option>French Guiana</option>
					<option>Gabon</option>
					<option>Gambia</option>
					<option>Georgia</option>
					<option>Germany</option>
					<option>Ghana</option>
					<option>Great Britain</option>
					<option>Greece</option>
					<option>Grenada</option>
					<option>Guadeloupe</option>
					<option>Guatemala</option>
					<option>Guinea</option>
					<option>Guinea-Bissau</option>
					<option>Guyana</option>
					<option>Haiti</option>
					<option>Honduras</option>
					<option>Hungary</option>
					<option>Iceland</option>
					<option>India</option>
					<option>Indonesia</option>
					<option>Iran</option>
					<option>Iraq</option>
					<option>Israel</option>
					<option>Italy</option>
					<option>Ivory Coast (Cote d'Ivoire)</option>
					<option>Jamaica</option>
					<option>Japan</option>
					<option>Jordan</option>
					<option>Kazakhstan</option>
					<option>Kenya</option>
					<option>Korea, Democratic Republic of (North Korea)</option>
					<option>Korea, Republic of (South Korea)</option>
					<option>Kosovo</option>
					<option>Kuwait</option>
					<option>Kyrgyz Republic (Kyrgyzstan)</option>
					<option>Laos</option>
					<option>Latvia</option>
					<option>Lebanon</option>
					<option>Lesotho</option>
					<option>Liberia</option>
					<option>Libya</option>
					<option>Liechtenstein</option>
					<option>Lithuania</option>
					<option>Luxembourg</option>
					<option>Madagascar</option>
					<option>Malawi</option>
					<option>Malaysia</option>
					<option>Maldives</option>
					<option>Mali</option>
					<option>Malta</option>
					<option>Martinique</option>
					<option>Mauritania</option>
					<option>Mauritius</option>
					<option>Mayotte</option>
					<option>Mexico</option>
					<option>Moldova</option>
					<option>Monaco</option>
					<option>Mongolia</option>
					<option>Montenegro</option>
					<option>Montserrat</option>
					<option>Morocco</option>
					<option>Mozambique</option>
					<option>Myanmar/Burma</option>
					<option>Namibia</option>
					<option>Nepal</option>
					<option>New Zealand</option>
					<option>Nicaragua</option>
					<option>Niger</option>
					<option>Nigeria</option>
					<option>North Macedonia</option>
					<option>Norway</option>
					<option>Oman</option>
					<option>Pacific Islands</option>
					<option>Pakistan</option>
					<option>Panama</option>
					<option>Papua New Guinea</option>
					<option>Paraguay</option>
					<option>Peru</option>
					<option>Philippines</option>
					<option>Poland</option>
					<option>Portugal</option>
					<option>Puerto Rico</option>
					<option>Qatar</option>
					<option>Reunion</option>
					<option>Romania</option>
					<option>Russian Federation</option>
					<option>Rwanda</option>
					<option>Saint Kitts and Nevis</option>
					<option>Saint Lucia</option>
					<option>Saint Vincent and the Grenadines</option>
					<option>Samoa</option>
					<option>Sao Tome and Principe</option>
					<option>Saudi Arabia</option>
					<option>Senegal</option>
					<option>Serbia</option>
					<option>Seychelles</option>
					<option>Sierra Leone</option>
					<option>Singapore</option>
					<option>Slovak Republic (Slovakia)</option>
					<option>Slovenia</option>
					<option>Solomon Islands</option>
					<option>Somalia</option>
					<option>South Africa</option>
					<option>South Sudan</option>
					<option>Spain</option>
					<option>Sri Lanka</option>
					<option>Sudan</option>
					<option>Suriname</option>
					<option>Swaziland</option>
					<option>Sweden</option>
					<option>Switzerland</option>
					<option>Syria</option>
					<option>Tajikistan</option>
					<option>Tanzania</option>
					<option>Thailand</option>
					<option>Netherlands</option>
					<option>Timor Leste</option>
					<option>Togo</option>
					<option>Trinidad & Tobago</option>
					<option>Tunisia</option>
					<option>Turkey</option>
					<option>Turkmenistan</option>
					<option>Turks & Caicos Islands</option>
					<option>Uganda</option>
					<option>Ukraine</option>
					<option>United Arab Emirates</option>
					<option>United States of America (USA)</option>
					<option>Uruguay</option>
					<option>Uzbekist<option>an</option>
					<option>Venezuela</option>
					<option>Vietnam</option>
					<option>Virgin Islands (UK)</option>
					<option>Virgin Islands (US)</option>
					<option>Yemen</option>
					<option>Zambia</option>
					<option>Zimbabwe</option>
			</select></td>
		</tr>
	<tr>
			<td align="center">City:</td>
			<td><input class="textbox" type="text" name="customer_city"  required/></td>
		</tr>
		<tr>
			<td align="center">Contact:</td>
			<td><input class="textbox" type="text" name="customer_contact"  required/></td>
		</tr>
		<tr>
			<td align="center">Address:</td>
			<td><input class="textbox" type="text" name="customer_address"  required/></textarea></td>
		</tr>
			<tr align="center">	
			<td  colspan="8"><input class="button" type="submit" name="register" value="Register"/></td>
		</tr>
	</table>
	</form>
			</font>
	</center>
			
		</div></font>	
		</div>
		<!--content wrapper ends here-->  
		</div>
	<div id="footer">
		<h4 style="text-align: center; padding-top: 30px;">&copy; 2019 by AIGEN COMPUTERS</h4>
	</div>

</div>
	</font>
</body>
</html>
<?php
if(isset($_POST['register'])){
	//create local variables
	$ip=getIp();
	$customer_name=$_POST['customer_name'];
	$customer_email=$_POST['customer_email'];
	$customer_password=$_POST['customer_password'];
	$customer_country=$_POST['customer_country'];
	$customer_city=$_POST['customer_city'];
	$customer_contact=$_POST['customer_contact'];
	$customer_address=$_POST['customer_address'];
	
	//length validation
	$passwordlength= strlen($customer_password);
	$contactlength= strlen($customer_contact);
	
	//getting the image
	$customer_image=$_FILES['customer_image']['name'];
	$customer_image_tmp=$_FILES['customer_image']['tmp_name'];
	move_uploaded_file($customer_image_tmp,"customer/customer_images/$customer_image");
	
	$insert_customer = "insert into customers (customer_ip,customer_name,customer_email,customer_password,customer_country,
	customer_city,customer_contact,customer_address,customer_image) values ('$ip','$customer_name','$customer_email','$customer_password','$customer_country','$customer_city','$customer_contact','$customer_address','$customer_image')";

	$run_customer=mysqli_query($connection, $insert_customer);
	
	//select from specific customer
	$select_cart = "select * from cart where ip_address='$ip'";
	$run_cart=mysqli_query($connection,$select_cart);
	//check whether cart has item or not
	$check_cart=mysqli_num_rows($run_cart);
	
	//passwords should be 6 characters or more
	if ($passwordlength < 6){
		echo "<script>alert('Your Password should be 6 characters or more!')</script>";
		exit();
	}
	//passwords should be 6 characters or more
	if ($contactlength != 10){
		echo "<script>alert('Your contact details should be equal to 10 characters!')</script>";
	exit();
	}
	if($check_cart==0){
		//create session for the customer
		$_SESSION['customer_email']=$customer_email;
		echo "<script>alert('Your account has been created!')</script>";
		//if the customer has zero products in cart then direct customer to my account page
		echo "<script>window.open('customer/my_account.php','_self')</script>";
	}else{
	$_SESSION['customer_email']=$customer_email;
		echo "<script>alert('Your account has been created!')</script>";
		//if customer has products in cart direct to checkout page
		echo "<script>window.open('checkout.php','_self')</script>";
}
}
?>



































