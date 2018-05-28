
		<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>" ;
					}
					else {
					echo "<b>Welcome Guest:</b>";
					}
					?>
		Total items :<?php total_items();?> Total Price :<?php total_price();?><span  style="float:right; font size:18px;">
		<a href ="index.php" style="color:yellow;margin-right:10px" >Back To Shop</a>
		<?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='checkout.php' style='color:orange;'>Login</a>";
					
					}
					else {
					echo "<a href='logout.php' style='color:orange;'>Logout</a>";
					}
					
			?>
		</div>
	      <?php getIp();?>
	   <div id="products_box">
	     <form action="" method="post" enctype="multipart/form-data">
		 
		 <table align="center" width="700" bgcolor="skyblue">
		 <tr align="center">
		    
			</tr>
			<tr align="center">
               <th>Remove</th>
               <th>Product(s)</th>
			   <th>Quantity</th>
			   <th>Total Price</th>			   
		   </tr>
		   <?php
		  
		   
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
			
			$product_title = $pp_price['product_title'];
			
			$product_image = $pp_price['product_image']; 
			
			$single_price = $pp_price['product_price'];
			
			$values = array_sum($product_price); 
			
			$total+=$values;
			
		   ?>
		   <tr align="center">
		    <td><input type="checkbox" name="remove[]" value=<?php echo $pro_id ?>/></td>
			<td><?php echo $product_title;?><br>
			  <img src="admin_area/product_img/<?php $product_image ?>" width="60" height="60"/>
			  </td>
			<td><input type="text" name="qty" ></input></td>
			<?php
			 $total=0;
		      if(isset($_POST['update_cart'])){
			       
			  		  $qty=$_POST['qty'];	
                      $update_quantity="update cart set qty='$qty'";
                      $run_update=mysqli_query($con,$update_quantity);
					  $_SESSION['qty']=$qty;
                      $total=$total*$qty;					
			  
			      
			  
			  
			 }
			?>
			<td><?php echo $single_price ."/-"?></td>
			
			<?php }} ?>
			<tr align="right">
			   <td colspan="4" >Sub Total:</td>
			  <td> <?php echo $total?></td>
			 
			
			
			</tr>
			<tr align="center">
			  <td><input type="submit" name="update_cart" value="Update Your Cart"/></td>
			  <td><input type="submit" name="continue" value="Continue Shopping"/></td>
			  <td> <button><a href="checkout.php" style="text-decoration:none">Checkout</button></td>
			  <?php 
			   function updatecart(){			   
			   global $con; 
			   $ip = getIp();
			    if(isset($_POST['update_cart'])){
			  		
					foreach($_POST['remove']as $remove_id){
					
                     	
                      $delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip'";
                      $run_delete=mysqli_query($con,$delete_product	);
                    if($run_delete){
                    echo "<script>window.open('cart.php','_self')</script>";					
			  }
			      
			  
			  }
			 }
			 if(isset($_POST['continue']))
			   {
			 
			    echo "<script>window.open('index.php','_self')</script>";
			   }
			 
			 }
			 echo @$up_cart=updatecart();
			 
			  ?>
			  
		   </tr>
		   </table>
		   </form>
		   
		   
	   </div>
	 </div>
	 
  </div>