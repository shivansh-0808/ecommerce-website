<!DOCTYPE >
<?php 
session_start();
//$_SESSION['customer_email']='shivansh';
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
	    <div id="shopping_bar">
		<?php 
		if(isset($_SESSION['customer_email'])){
		
		echo "Welcome ".$_SESSION['customer_email'];
		}
		else
		{
		   echo "Welcome Guest";
		}
		
		
		?>
		Total items :<?php total_items();?> Total Price :<?php total_price();?><span  style="float:right; font size:18px;">
		<a href ="cart.php" style="color:yellow;margin-right:10px" >Go To Cart</a>
		</div>
	      <?php getIp();?>
	    <div id="products_box">
		<?php
		if(!isset($_SESSION['customer_email'])){
		  include("login.php");
		  }
		  else
		 { 
		 include("payment.php");
		 }
	     
	   ?>
	   </div>
	 </div>
	 
  </div>
  <!--Content wrapper ends-->
  <div id="footer">
  <h2 style="text-align:center;padding-top:10px;color:white">
  &copy; Copyright 2017-2018 Allahabad Mart
  </div>