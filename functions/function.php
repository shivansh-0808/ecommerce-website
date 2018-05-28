<?php

$con=mysqli_connect("localhost","root","","ecommerce");


function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
 //getting items in cart
function cart(){

  if(isset($_GET['add_cart'])){
  global $con;
  
  $ip=getIp();
  $pro_id=$_GET['add_cart'];
  
  $check_pro="select * from cart where ip_add='$ip' AND p_id='$pro_id'";
  
  $run_check=mysqli_query($con,$check_pro);
  
  if(mysqli_num_rows($run_check)>0){
  echo "";
  }
  
  
  else{
   
   $insert_pro="insert into cart (p_id,ip_add) values ('$pro_id','$ip')";
   
   $run_pro=mysqli_query($con, $insert_pro);
   
   echo "<script>window.open('index.php','_self')</script>";
  

}
}
}
//getting total items in cart
function total_items(){
  if(isset($_GET['add_cart'])){
    
    global $con;
	$ip=getIp();
	$get_items="select * from cart where ip_add='$ip'";
	$run_items=mysqli_query($con,$get_items);
	$count_items=mysqli_num_rows($run_items);
	echo $count_items;
    }
	else
	{
	 global $con;
	$ip=getIp();
	$get_items="select * from cart where ip_add='$ip'";
	$run_items=mysqli_query($con,$get_items);
	$count_items=mysqli_num_rows($run_items);
	echo $count_items;
    }
	}
	
	
	//getting total price
	function total_price(){
	
	$total = 0;
		
		global $con; 
		
		$ip = getIp(); 
		
		$sel_price = "select * from cart where ip_add='$ip'";
		
		$run_price = mysqli_query($con, $sel_price); 
		
		while($p_price=mysqli_fetch_array($run_price)){
			
			$pro_id = $p_price['p_id']; 
			
			$pro_price = "select * from products where product_id='$pro_id'";
			
			$run_pro_price = mysqli_query($con,$pro_price); 
			
			while ($pp_price = mysqli_fetch_array($run_pro_price)){
			
			$product_price = array($pp_price['product_price']);
			
			$values = array_sum($product_price); 
			
			$total += $values; 
			}
			}
			echo $total;
}
  
  
  
  


//getting the categories

function getcat(){
   global $con;
   $get_catg="select * from categories";
   $run_catg=mysqli_query($con,$get_catg);
   while($row_catg=mysqli_fetch_array($run_catg)){
   
     $cat_id=$row_catg['cat_id'];
	 $cat_title=$row_catg['cat_title'];
	 
    echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
   }
   }
   //getting brands
   function getbrand(){
   global $con;
   $get_brands="select * from brands";
   $run_brands=mysqli_query($con,$get_brands);
   while($row_brands=mysqli_fetch_array($run_brands)){
   
     $brand_id=$row_brands['brand_id'];
	 $brand_title=$row_brands['brand_title'];
	 
    echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
   }
   }
   //getting products to website
   function getPro(){
   if(!isset($_GET['cat'])){
     if(!isset($_GET['brand'])){
	  
      global $con;	  
	  $get_pro="select * from products ";
	  $run_pro=mysqli_query($con,$get_pro);
	  while($row_pro=mysqli_fetch_array($run_pro)){
	 
	  $pro_id=$row_pro['product_id'];
	  $pro_cat=$row_pro['product_cat'];
	  $pro_brand=$row_pro['product_brand'];
	  $pro_title=$row_pro['product_title'];
	  $pro_price=$row_pro['product_price'];
	  $pro_image=$row_pro['product_image'];
	  
	  echo "
	         <div id='single_product'>
			  
			   <h3>$pro_title</h3>
			   <img src='admin_area/product_img/$pro_image' width='180' height='180' />
			   <p><b>Price: $pro_price</b></p>
			   <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
			   <a href='index.php?add_cart=$pro_id' style='float:right;'>Add To Cart</a>
			   
			   </div>
			   
			   ";
			   }
			   }
			   }
			   }
      function getcatPro(){
	  if(isset($_GET['cat'])){
         $cat_id=$_GET['cat'];
		 
      global $con;
	  
	  $get_cat_pro="select * from products where product_cat=$cat_id";
	  $run_cat_pro=mysqli_query($con,$get_cat_pro);
	  $count_cats=mysqli_num_rows($run_cat_pro);
	  
	  if($count_cats==0){
	  
	  echo "<h2>No products in this category</h2>";
	  }
	  while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
	 
	  $pro_id=$row_cat_pro['product_id'];
	  $pro_cat=$row_cat_pro['product_cat'];
	  $pro_brand=$row_cat_pro['product_brand'];
	  $pro_title=$row_cat_pro['product_title'];
	  $pro_price=$row_cat_pro['product_price'];
	  $pro_image=$row_cat_pro['product_image'];
	  
	  echo "
	         <div id='single_product'>
			  
			   <h3>$pro_title</h3>
			   <img src='admin_area/product_img/$pro_image' width='180' height='180' />
			   <p><b>Price: $pro_price</b></p>
			   <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
			   <a href='index.php?pro_id=$pro_id' style='float:right;'>Add To Cart</a>
			   
			   </div>
			   
			   ";
			   }
			   }
			   
			   }
			   function getbrandPro(){
  
     if(isset($_GET['brand'])){
	    $product_brand=$_GET['brand'];
	  
      global $con;
	 
	  $get_brand_pro="select * from products where product_brand=$product_brand";
	  $run_brand_pro=mysqli_query($con,$get_brand_pro);
	  while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
	 
	  $pro_id=$row_brand_pro['product_id'];
	  $pro_cat=$row_brand_pro['product_cat'];
	  $pro_brand=$row_brand_pro['product_brand'];
	  $pro_title=$row_brand_pro['product_title'];
	  $pro_price=$row_brand_pro['product_price'];
	  $pro_image=$row_brand_pro['product_image'];
	  
	  echo "
	         <div id='single_product'>
			  
			   <h3>$pro_title</h3>
			   <img src='admin_area/product_img/$pro_image' width='180' height='180' />
			   <p><b>Price: $pro_price</b></p>
			   <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
			   <a href='index.php?pro_id=$pro_id' style='float:right;'>Add To Cart</a>
			   
			   </div>
			   
			   ";
			   
			   }
			   }
			   }
			   function welc(){
	    if(isset($_SESSION['customer_name'])){
		$c_name=$_POST['customer_name'];
		echo $c_name;
		}
	   
	   
	   }
	   function login(){
	        if(!isset($_SESSION['customer_email'])){
		   	 
			echo "<a href='checkout.php' style='color:orange;'>Login</a>";
		
		    }
			else
			{
			
			 echo "<a href='logout.php' style='color:orange;'>Logout</a>";
			
			}
			
		}

			   
   ?>