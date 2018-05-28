<html>
  <h2 style="text-align:center">Change Your Password</h2>
<form action ="" method="post" >
<table align="center">
<tr>
<td align="right">Enter Old Password:<input type ="password" name ="old_pass"/></td>
</tr>
<tr> 
<td align="right">Enter New Password:<input type ="password" name ="new_pass" /></td>
</tr>
<tr>
<td align="right">Re-Enter New Password:<input type ="password" name ="reenter_pass" /></td>
</tr>
<tr>
<td align="center"><input type="submit" name="change_pass" value="Change Password"/></td>
</tr>
</table>
</form>
<?php
$con = mysqli_connect("localhost","root","","ecommerce");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if(isset($_POST['change_pass']))
{
  $user=$_SESSION['customer_email'];
  $old_pass= $_POST['old_pass'];
  $new_pass=$_POST['new_pass'];
  $reenter_pass=$_POST['reenter_pass'];
  $sel = "select * from customers where customer_pass='$old_pass' AND customer_email='$user'";
  $run = mysqli_query($con,$sel);
  $check= mysqli_num_rows($run);
  if($check==0)
  {
  echo "<script>alert('Wrong Password Entered!!')</script>";
  exit();
  }
  if($new_pass!=$reenter_pass)
  {
     echo "<script>alert('Password do not match !!!')</script>";
     exit();
  }
  else 
  {
    $change_pass= "update customers set customer_pass='$new_pass' where customer_email='$user'";
	 $run_update= mysqli_query($con,$change_pass);
	 echo "<script>alert('Password successfully updated')</script>";
	 echo "<script>window.open('my_account.php','_self')</script>";
     
  }
}
?>
</html>