<?php   
session_start();
error_reporting(0);
include("includes/db.php"); 

if(isset($_GET['order_id']))
{
	$order_id = $_GET['order_id'];

 
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body bgcolor="#000000" style="margin:150 auto;">
<
<form method="post" action="confirm.php?update_id=<?php echo $order_id; ?>">
	
<table width="500" align="center" border="2" bgcolor="#CCCCCC">
	
<tr align="center">
<td colspan="5">Please Confirm Your Payment</td>
</tr>

<tr>
	<td>Invoice No</td>
    <td><input type="text" name="invoice_no"></td>
</tr>

<tr>
	<td>Amount Send</td>
    <td><input type="text" name="amount"></td>
</tr>

<tr>
	<td>Select Payment Mode</td>
	<td>
    <select name="payment_method">
    <option>Select Payment</option>
    <option>Bank Transfer</option>
    <option>EasyPaisa/UBL Omni</option>
    <option>Wastern Union</option>	
    <option>Paypal</option>
    </select>	 
 </td>
</tr>

<tr>
	<td>Transaction/Reference ID</td>
    <td><input type="text" name="tr"></td>
</tr>

<tr>
	<td>EasyPaisa/UBLOMNI Code</td>
    <td><input type="text" name="code"></td>
</tr>

<tr>
	<td>Payment Date</td>
    <td><input type="text" name="date"></td>
</tr>


<tr align="center">

    <td colspan="5"><input type="submit" name="confirm" value="Confirm Payment"></td>
</tr>



</table>

</form>

</body>
</html>

<?php  

if(isset($_POST['confirm']))
{

  $update_id = $_GET['update_id'];

  $invoice = $_POST['invoice_no'];

  $amount = $_POST['amount'];

  $payment_method = $_POST['payment_method'];

  $ref_no = $_POST['tr'];

  $code = $_POST['code'];

  $date = $_POST['date'];

  $complete = 'Complete';

  $insert_payment = "insert into payments(invoice_no,amount,payment_mode,ref_no,code,payment_date) values('$invoice','$amount','$payment_method','$ref_no','$code','$date')";


   $run_payment = mysqli_query($con, $insert_payment);

    $update_order = "UPDATE customer_orders SET order_status='$complete' WHERE order_id='$update_id'";
   $run_order = mysqli_query($con, $update_order);

    $update_pending_orders = "update pending_orders set order_status='$complete' where order_id='$update_id'";
    $run_pending_orders = mysqli_query($con, $update_pending_orders);  



   if($run_payment)
   {
   	echo "<h2 style='text-align:center; color:white;'>Payment Received, your Order Will Be Completed Within 24 Hours</h2>";
   }
   
 

 



}







?>