<?php 
@session_start();
include("includes/db.php"); 


 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Sn Soft | Online Shop Registration</title>
</head>
<body>

<div>
	
<form action="checkout.php" method="post">
	
<table width="700"  align="center">

<tr align="center">
<td colspan="4"><h2>Login</h2></td>	<br><br>

</tr>

<tr>	
<td align="right"><b>Email ID</b></td>
<td><input type="text" name="c_email" value=""/></td><br>
</tr>
<br><br>
<tr>
<td align="right"><b>Password</b></td>
<td><input type="password" name="c_pass" value=""/></td><br><br>
</tr>
</tr>


<tr align="center">
<td colspan="5"><a href="checkout.php?forgot_pass">Forgot Password</a></td>	
</tr>

<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr align="center">
<td colspan="2"><input type="submit" name="c_login" value="Login"/></td>

</table>



</form>
<?php  

if(isset($_GET['forgot_pass']))
{

echo "

<div align='center'>

<br>
<b>Enter Your Email Below We Will Send Your Password To Your Email </b><br><br>

<form method='post' action=''>
<input type='text' name='c_email' placeholder='Enter Your Email' style='padding:5px;' required/>
<input type='submit' name='forgot_pass' value='Send Password' style='padding:5px;'/>
</form>
</div>

";

 if(isset($_POST['forgot_pass']))
 {

  $c_email = $_POST['c_email'];

  $sel_customer = "select * from customers where customer_email='$c_email'";

  $run_c = mysqli_query($con, $sel_customer);

  $check_c = mysqli_num_rows($run_c);

  $row_c = mysqli_fetch_array($run_c);

  $c_name = $row_c['customer_name'];

  $c_pass = $row_c['customer_pass'];

    if($check_c==0)
    {

    echo "<script>alert('This Email Dose Not Exist IN Our Database')</script>";
    exit();

    }

    else
    {
      
     $from = 'admin@mysite.com';

     $subject = 'Your Password';

     $message = "

       <html>
        
        <h3>Dear  $c_name</h3>
        <p>You request for Your Password at www.mysite.com</p>
        <h4>Your Password Is <span style='color:red;'>$c_pass</span></h4>
         
         <h4>Thank You For Using Your Website</h4>

       </html>

     "; 

       mail($c_email, $subject, $message, $from);

     echo "<script>alert('Password Was Send To Your Email, Please Check Your Inbox')</script>";


     echo "<script>window.open('checkout.php','_self')</script>";

    }





 }







}





?>


</div>
<a href="customer_register.php" style="float: right; margin-right: 50px;">New Register Here</a>
</body>
</html>


<?php    

if(isset($_POST['c_login']))
{
  $customer_email = $_POST['c_email'];
  $customer_pass = $_POST['c_pass'];

$sel_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

$run_customer = mysqli_query($con, $sel_customer);

 $check_customer = mysqli_num_rows($run_customer);

  $get_ip = getRealIpAddr();

 $sel_cart = "select * from cart where ip_add='$get_ip'";

 $run_cart = mysqli_query($con, $sel_cart);

 $check_cart = mysqli_num_rows($run_cart);

  if($check_customer == 0)
  {

  	echo "<script>alert('Email Or Password Not Correct !')</script>";
  	exit();
  }

   if($check_customer==1 AND $check_cart==0)
   {

   	$_SESSION['customer_email'] = $customer_email;

   	echo "<script>window.open('customer/my_account.php','_self')</script>";
   }

    else
    {
        $_SESSION['customer_email'] = $customer_email;
          
        echo "<script>alert('You Successfully Logged In, YOu Can Order Now')</script>";
    
       include("payment_options.php");
   
    }


}







?>