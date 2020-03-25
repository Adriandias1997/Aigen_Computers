<?php
session_start();
include("includes/database.php");

?>


<html>
<head>
<meta charset="utf-8">
<title>AIGEN COMPUTERS</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Thasadith" rel="stylesheet">
<link rel="icon" type="image/png" href="images/icon.png"/>

</head>

<body>
<font size="6" face="Thasadith" color="#FFFFFF">

<div class="main_wrapper">
	<div class="header_wrapper">
		<a href="index.php"><img id="logo" src="images/logosmall.jpeg"> </a>
		<img id="banner" src="images/banner.gif"> 
	</div>
	
	
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

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}

body{
	background-color: black;
}

@font-face { 
	font-family: Thasadith; 
	src: url('font/Thasadith-Regular.ttf');
	} 

.header_wrapper{
	width: auto;
	height: 100px;
	margin-left: 20px;
}

#logo{
	float: left;
	margin-top: 10px;
}
#banner{
	float: left;
	margin-top: 10px;
	margin-left:300px;
}

#footer{
	width: auto;
	height: 100px;
	background: #000000;
	clear: both;
	margin-left: 20px;
}

</style>

<center>

<br><br>
	<form method="post" action="">
	<table width="500" align="center">
	<font size="6" face="Thasadith" color="#FFFFFF">
	<br>
		<tr align="center">
					<td colspan="2" style="color: white; font-size: 27">Administrators Login!</td>
		</tr>
		<tr>
			<td style="color: white; font-size: 27">Email:</td>
			<td><input class="textbox" type="text" name="email" placeholder="Please enter email." required/></td>
		</tr>
		<tr>
			<td style="color: white; font-size: 27">Password:</td>
			<td><input class="textbox" type="password" name="password" placeholder="Please enter password." required/></td>
		</tr>
		
		<tr align="center">	
			<td colspan="2"><input class="button" type="submit" name="login" value="Login"/></td>
		</tr>
		
		</table>
	
		</form>
	</font>
	</center>
	
	<?php
	//if login button is clicked
	if(isset($_POST['login'])){
	
		//create local variables
		$user_email=$_POST['email'];
		$user_password=$_POST['password'];	
		
		//query to get specific admin
		$select_user="select * from administrators where user_email='$user_email' AND user_password='$user_password'";
		
		//run the query
		$run_user = mysqli_query($connection, $select_user);
		//check if user exists
		$check_user = mysqli_num_rows($run_user);
		
		if($check_user==0){
				//If details entered wrong display error message
			echo "<script>alert('Email or Password is incorrect! Try again!')</script>";
			
		}else{
		
			//if details entered correct create a session and log the admin in
			$_SESSION['email']=$user_email;
			echo "<script>alert('Login Successful!')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
	}
	?>
	<br><br><br>
<div id="footer">
		<h4 style="text-align: center; padding-top: 30px;">&copy; 2019 by AIGEN COMPUTERS</h4>
	</div>
	
	</body>
	</html>