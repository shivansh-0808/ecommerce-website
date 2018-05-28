
     
		
		 <form action="register.php?c_id" method="post" enctype="multipart/form-data">
					
					<table align="center" width="750" height="400">
						
						<tr align="center">
							<td colspan="6"><h2>Update Your Account</h2></td>
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
						<td colspan="6"><input type="submit" name="update" value="Update Account" /></td>
					</tr>
					
					
					
					</table>
				
				</form>
	  
 
 
 <?php  
	if(isset($_POST['update']))
	{
	
	  $ip=getIp();
	  $c_id=$_GET['c_id'];
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
	  
	  $update_c= "update customers set customer_name='$c_name' customer_email='$c_email' customer_pass='$c_pass' customer_country='$c_country' customer_city='$c_city' customer_contact='$c_contact' customer_image='$c_image' customer_address='$c_address' where customer_id='$c_id'";
	   
	   $run_c=mysqli_query($con,$update_c);
	
	   
	   if($run_c)
	   {
	    
	     echo "<script>alert('Account successfully updated!!!')</script>";
		 echo "<script>window.open('my_account.php','_self')</script>";
	   
	   }
	  
	       
	 }

	   
	   
	   
	   
	    
 ?>