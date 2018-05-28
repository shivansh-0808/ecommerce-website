<!DOCTYPE>
<?php

 $con=mysqli_connect("localhost","root","","ecommerce");

?>
<html>
  <head>
    <title>Inserting Products</title>
	</head>
	
<body bgcolor="cyan">
   
     <form action="insert_product.php" method="post" enctype="multipart/form-data">
	   <table align="center" width="600" border="2" bgcolor="orange">
	     
	      <tr align="center">
		     <td colspan="7"><h2>Insert Post Here</h2></td>
	      </tr>
		  
		  <tr>
		    <td>Product Title:</td>
		    <td><input type="text" name="product_title" required/></td>
			</tr>
			<tr>
		    <td>Product Category:</td>
		    <td>
			   <select name="product_cat" required>
			   <option>Select a category</option>
			   <?php 
			    global $con;
               $get_catg="select * from categories";
				$run_catg=mysqli_query($con,$get_catg);
				while($row_catg=mysqli_fetch_array($run_catg)){
   
				$cat_id=$row_catg['cat_id'];
				$cat_title=$row_catg['cat_title'];
	 
				echo "<option value='$cat_id'>$cat_title</option>";
   }
			   
			   ?>
			</td>
			</tr>
			<tr>
		    <td>Product Brand:</td>
		    <td>
			    <select name="product_brand" required>
				<option>Select a brand</option>
				<?php
				$get_brands="select * from brands";
				$run_brands=mysqli_query($con,$get_brands);
				while($row_brands=mysqli_fetch_array($run_brands)){
   
				$brand_id=$row_brands['brand_id'];
				$brand_title=$row_brands['brand_title'];
	 
				echo "<option value='$brand_id'>$brand_title</option>";
					}
				?>
				</select>
			</td>
			</tr>
			<tr>
		    <td>Product Image:</td>
		    <td><input type="file" name="product_image" required/></td>
			</tr>
			<tr>
		    <td>Product Price:</td>
		    <td><input type="text" name="product_price" required/></td>
			</tr>
			<tr>
		    <td>Product Description</td>
		    <td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
			</tr>
			<tr>
		    <td>Product Keywords:</td>
		    <td><input type="text" name="product_keywords" required/></td>
			</tr>
			<tr align="center">
		    <td colspan="8"><input type="submit" name="insert_post" value="Insert"/></td>
		    
			</tr>
	   </table>

  
  </body>
</html>
<?php

   if(isset($_POST['insert_post'])){
   
    $product_title = $_POST['product_title'];
	$product_cat = $_POST['product_cat'];
	$product_brand = $_POST['product_brand'];
	$product_price = $_POST['product_price'];
	$product_desc = $_POST['product_desc'];
	$product_keywords = $_POST['product_keywords'];
	
	//getting image from the field
	$product_image = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image']['tmp_name'];
	
      move_uploaded_file($product_image_tmp,"product_img/$product_image");
	
	  $insert_product="insert into products
	 (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords)
	  values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
	  
	  $insert_pro=mysqli_query($con,$insert_product);
	  if($insert_pro){
	  
	  echo"<script>alert('Product Inserted!!!')</script>";
	  echo "<script>window.open('insert_product.php','_self')</script>";
	} 
	}
	?>
	
	