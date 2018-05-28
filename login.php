<?php

$con = mysqli_connect("localhost","root","","ecommerce");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>


<div>

  <form method="post" action="">
  <table align="center" width="500" bgcolor="skyblue">
  <tr>
  <td>Email:</td>
  <td align ="left"><td><input type="text" name="email" placeholder="Enter your email" required/></tr>
  <tr>
  <td >Password:</td>
    <td align="left "><td><input type="pass" name="password" placeholder="Enter password" required/><td></tr>
	<td colspan="3"><input type="submit" name="login" value="Login"/></td>
	<td colspan="3"><a href="checkout.php?forgot_pass">Forgot Password</a></td>
	<td align="right"><h2 style="float:right"><a href="register.php">Register</h2></a>
	</tr>
	</tab
  <?php
  if(isset($_POST['login'])){
  
  $c_email=$_POST['email'];
  $c_pass = $_POST['password'];
  
  $ins_c = "select * from customers where customer_email='$c_email' AND customer_pass='$c_pass'";
  $run_c = mysqli_query($con,$ins_c);
  
  $check_c=mysqli_num_rows($run_c);
  if($check_c==0)
  {
   echo "<script>alert('Try Again!')</script>";
   exit();
    
  }
    $ip= getIp();
	$sel_ch= "select * from cart where ip_add = '$ip'";
	$run_ch= mysqli_query($con, $sel_ch);
	$check_cart = mysqli_num_rows($run_ch);
	
	if($check_c>0 AND $check_cart==0)
	{
	  $_SESSION['customer_email']=$c_email;
	   
	  echo "<script>alert('Successfully logged in!!')</script>";
	  echo "<script>window.open('my_account.php','_self')</script>";
	
	}
	 else
	 {
	   $_SESSION['customer_email']=$c_email;
	   
	  echo "<script>alert('Successfully logged in!!')</script>";
	  echo "<script>window.open('checkout.php','_self')</script>";
	 
	 }
  
  
  }	
  
  
  
	
  
  
 ?>
  

</div>