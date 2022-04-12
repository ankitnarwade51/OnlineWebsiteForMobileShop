<!DOCTYPE html>
<html>
<head>
	<title>Shop Payment Option</title>
</head>
<body>
<?php  
 
include("includes/db.php");





?>

<div>
<br><br>
<br>

<h2 align="center">Payment Option For You </h2>	

<?php

$ip = getRealIpAddr();

$get_customer = "select * from customers where customer_ip='$ip'";

$run_customer = mysqli_query($con, $get_customer);

$customer = mysqli_fetch_array($run_customer);

$customer_id = $customer['customer_id'];

?>


<b>Pay With<b> <a href="http://www.paypal.com"><img src="images/pay.png"></a> <b>Or</b> <b><a href="order.php?c_id=<?php echo $customer_id; ?>"> Pay Offline</a></b><br><br>
<br>
<br>
<p align="justify" style="font-size: 14px;">If You Selected "pay Offline" Option Then Check Your Email And Account To Find The Invoice No For Your Order</p>

</div>


</body>
</html>