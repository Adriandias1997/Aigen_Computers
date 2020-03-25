	<?php
include("includes/database.php");
?>
		<style>
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
<font size="5" face="Thasadith" color="#000000">
<p>Do you really want to delete your account?</p></font>
<br>

<form action="" method="post">
<input class="button" type="submit" name="yes" value="Yes, I'm Sure!" />
	<input class="button" type="submit" name="no" value="No, Dont Delete!"/>

</form>
	<br>
<?php
$user=$_SESSION['customer_email'];
if(isset($_POST['yes'])){
	$delete_customer = "delete from customers where customer_email='$user'";
	//running the query
	$run_customer = mysqli_query($connection,$delete_customer);
	
	echo"<script>alert('Your account has been deleted!')</script>";
	echo"<script>window.open('../index.php','_self')</script>";
}
if(isset($_POST['no'])){
		echo"<script>window.open('my_account.php','_self')</script>";
}
?>