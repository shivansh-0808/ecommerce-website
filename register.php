<!DOCTYPE >
<?php 
session_start();
include("functions/function.php");
   $con = mysqli_connect("localhost","root","","ecommerce");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  ?>
<html>
  <head>
    <title>Allahabad Mart</title>
	<link rel="stylesheet" href="styles/style.css" media="all"/>
  </head>
  <body>
  <div class="main_layout">  
  <div class="header_wrapper">
    
	<img id="bgimg" width="500" height="150"src="alld.jpg"/>
	<img id="c" width="500" height="150"src="alld2.jpg"/> </div>
	
	<!--Navigation bar starts here-->
    <div class="menubar">
       <ul id="menu">
	       <li><a href="index.php">Home</a></li>
		   <li><a href="all_products.php">All Products</a></li>
		   <li><a href="my_account.php">My Account</a></li>
		   <li><a href="#">Sign Up</a></li>
		   <li><a href="cart.php">Shopping Cart</a></li>
		   <li><a href="#">Contact Us</a></li> 
      </ul>
  
       <div id="form">
	   <form method="get" action="results.php" enctype="multipart/form-data">
	    <input type="text" name="query" placeholder="Search a product"/>
		<input type="submit" name="search" value="Search"/>
	   
	   </form>
	   </div>
  
  
  </div>
  <!--Navigation bar ends here-->
  
  
  <!--Content Wrapper starts-->
  <div class="content_wrapper">
  
     <div id="sidebar">
	 
	   <div id="sidebar_title">>>Categories</div>
	   
	   <ul id="catg">
	   <?php getcat();?>
	   
	     <!-- <li><a href="#">Laptops</a></li>
		  <li><a href="#">Compters</a></li>
		  <li><a href="#">Mobiles</a></li>
		  <li><a href="#">Cameras</a></li>
		  <li><a href="#">iPads</a></li>
		  <li><a href="#">Tablets</a></li> -->
	 
	    </ul>
		
		<div id="sidebar_title">>>Brands</div>
	   
	   <ul id="catg">
	   <?php getbrand();?> 
	   
	   
	     <!-- <li><a href="#">HP</a></li>
		  <li><a href="#">DELL</a></li>
		  <li><a href="#">Motorola</a></li>
		  <li><a href="#">Nikon</a></li>
		  <li><a href="#">Apple</a></li>
		  <li><a href="#">Samsung</a></li>
	 -->
	    </ul>
	 
	 </div>
     <div id="content" border="2">
	       <span style="float:right; font size:20px; ">
		   
		   <?php cart();?>
	    <div id="shopping_bar"><marquee>Welcome Guest!!</marquee>
		Total items :<?php total_items();?> Total Price :<?php total_price();?><span  style="float:right; font size:18px;">
		<a href ="cart.php" style="color:yellow;margin-right:10px" >Go To Cart</a>
		</div>
	      <?php getIp();?>
	    <div id="products_box">
		
		<form action="register.php" method="post" enctype="multipart/form-data">
					
					<table align="center" width="750" height="400">
						
						<tr align="center">
							<td colspan="6"><h2>Create an Account</h2></td>
						</tr>
						
						<tr>
							<td align="right">Customer Name:</td>
							<td><input type="text" name="c_name" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Email:</td>
							<td><input type="text" name="c_email" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Password:</td>
							<td><input type="password" name="c_pass" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Image:</td>
							<td><input type="file" name="c_image" required/></td>
						</tr>
						
						
						
						<tr>
							<td align="right">Customer Country:</td>
							<td>
							<select name="c_country">
								<option>Select a Country</option>
								<option>Afghanistan</option>
								<option>India</option>
								<option>Japan</option>
								<option>Pakistan</option>
								<option>Israel</option>
								<option>Nepal</option>
								<option>United Arab Emirates</option>
								<option>United States</option>
								<option>United Kingdom</option>
							</select>
							
							</td>
						</tr>
						
						<tr>
							<td align="right">Customer City:</td>
							<td><input type="text" name="c_city" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Contact:</td>
							<td><input type="text" name="c_contact" required/></td>
						</tr>
						
						<tr>
							<td align="right">Customer Address</td>
							<td><input type="text" name="c_address" required/></td>
						</tr>
						
						
					<tr align="center">
						<td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
					</tr>
					
					
					
					</table>
				
				</form>
	   </div>
	 </div>
	 
  </div>
  <!--Content wrapper ends-->
  <div id="footer">
  <h2 style="text-align:center;padding-top:10px;color:white">
  &copy; Copyright 2017-2018 Allahabad Mart
  </div>
  </html>
  <?php
    
	if(isset($_POST['register']))
	{
	
	  $ip=getIp();
	  $c_name=$_POST['c_name'];
	  $c_email=$_POST['c_email'];
	  $c_pass=$_POST['c_pass'];
	  $c_country=$_POST['c_country'];
	  $c_city=$_POST['c_city'];
	  $c_contact=$_POST['c_contact'];
	  $c_image=$_FILES['c_image']['name'];
	  $c_image_tmp=$_FILES['c_image']['tmp_name'];
	  $c_address=$_POST['c_address'];
	  
	  move_uploaded_file($c_image_tmp,"customer/customer_image/$c_image");
	  
	  $insert_c= "insert into customers(customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address)
	   values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_image','$c_address')";
	   $run_c=mysqli_query($con,$insert_c);
	   $select="select * from cart where ip_add='$ip'";
	   $run_c=mysqli_query($con,$select);
	   $check =mysqli_num_rows($run_c);
	   if($check==0)
	   {
	     $_session['customer_email']=$c_email;
	     echo "<script>alert('Account created successfully!!!!')</script>";
		 echo "<script>window.open('my_account.php','_self')</script>";
	   
	   }
	   else
	   {
	       
		 $_session['customer_email']=$c_email;  
	     echo "<script>alert('Account created successfully!!!!')</script>";
		 echo "<script>window.open('checkout.php','_self')</script>";
	   
	   }
	       
	}
	   
	   
	   
	   
	    
 ?>