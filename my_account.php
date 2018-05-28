<!DOCTYPE >
<?php 
session_start();
include("functions/function.php")?>
  
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
	 
	   <div id="sidebar_title">>>My Account</div>
	    <ul id="catg">
	   <?php 
	   if(isset($_SESSION['customer_email']))
	   {
	    $user=$_SESSION['customer_email'];
	    // $_SESSION['customer_email']=$user;

	   $sel= "select * from customers where customer_email='$user'";
	   $run = mysqli_query($con,$sel);
	   $img= mysqli_fetch_array($run);
	   $c_image= $img['customer_image'];
	   echo "<img src='customer/customer_image/$c_image' width='150' height='150'/>";
	    
	   
	   }
	   else echo "<h2>You are not logged in!!</h2>"
	   
	   ?>
	  
	    <li><a href ="my_account.php?my_orders">My Orders</a></li>
		<li><a href ="my_account.php?edit_account">Edit Account</a></li>
		<li><a href ="my_account.php?change_pass">Change Account</a></li>
		<li><a href ="my_account.php?delete_account">Delete Account</a></li>
	   
	     <!-- <li><a href="#">Laptops</a></li>
		  <li><a href="#">Compters</a></li>
		  <li><a href="#">Mobiles</a></li>
		  <li><a href="#">Cameras</a></li>
		  <li><a href="#">iPads</a></li>
		  <li><a href="#">Tablets</a></li> -->
	 
	    </ul>
		</div>
		
     <div id="content" border="2">
	       <span style="float:right; font size:20px; ">
		   
		  
	      
	   <div id="products_box">
	   <?php 
	   if(isset($_SESSION['customer_email']))
	   {
	     $c_name=$_SESSION['customer_email'];
	     //$_SESSION['customer_email']=$c_name;
				if(!isset($_GET['my_orders'])){
					if(!isset($_GET['edit_account'])){
						if(!isset($_GET['change_pass'])){
							if(!isset($_GET['delete_account'])){
							
				echo "
				<h2 style='padding:20px;'>Welcome:$c_name</h2>
				<b>You can see your orders progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
				}
				}
				}
				}
		}
		else echo "<h2>You are not logged in!!</h2>"
				?>
				
	            <?php
				 if(isset($_GET['edit_account']))
				 {
				  
				  include("edit_account.php");
				 }
				 if(isset($_GET['my_orders']))
				 {
				 
				  include("my_orders.php");
				 }
				 if(isset($_GET['change_pass']))
				 {
				   include("change_pass.php");
				 }
				 ?>
				 
	   
	    
		
		</div>
	    
	   
	   </div>
	 </div>
	 
  </div>
  <!--Content wrapper ends-->
  <div id="footer">
  <h2 style="text-align:center;padding-top:10px;color:white">
  &copy; Copyright 2017-2018 Allahabad Mart
  </div>