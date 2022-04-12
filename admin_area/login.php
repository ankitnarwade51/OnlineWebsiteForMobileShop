<?php 

session_start();
include("includes/db.php"); 

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="login.css" media="all">	
</head>
<body>

<div class="login">
	<h2> Admin Login</h2>

<form method="post">
	
<input type="text" name="admin_email" placeholder="Email" required /><br><br>
<input type="password" name="admin_pass" placeholder="Password" required /><br><br>
<input type="submit" name="login" id="a_button" value=" Admin Login">

</form>

</div>

<h3 style="text-align: center;padding:10px; color:white;"><?php echo @$_GET['logout'];  ?></h3>
</body>
</html>

<?php

if(isset($_POST['login']))
{
	$user_email = $_POST['admin_email'];
	$user_pass = $_POST['admin_pass'];

	$sel_admin = "select * from admins where admin_email='$user_email' AND admin_pass='$user_pass'";

	$run_admin = mysqli_query($con, $sel_admin);
  
    $check_admin = mysqli_num_rows($run_admin);

    if($check_admin==1)
    {
    	$_SESSION['admin_email']=$user_email;

    	echo "<script>window.open('index.php?logged_in=You Successfully Logged In','_self')</script>";
    }

    else
    {
    	echo "<script>alert('Admin Email And Password Is Incorrect, try again')</script>";
    }
    	 
    
    	


}




?>
