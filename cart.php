<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, intial-scale=1.0">	 	
	<title> SNSoft Services | Online Shop</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link rel="stylesheet" type="text/css" href="styles/style.css">	
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">	
</head>
<body>

<!--Main  Container Start-->
<div class="main-wrapper">
	
   <div class="header-wrapper"><!--Header Secction  start-->
	   <a href="index.php"><img src="images/logo.jpg"></a>

   </div><!--Header Secction End-->	

   
    <div id="navbar"><!-- Navigation Section start-->
      <ul id="menu">
          <li><a href="index.php">Home</a></li>	
          <li><a href="all_products.php">All Product</a></li>	
          <li><a href="my_account.php">My Account</a></li>	
          <li><a href="user_register.php">Sign Up</a></li>		
          <li><a href="cart.php">Shopping Cart</a></li>	
           <li><a href="contact.php">Contact Us</a></li>

      </ul>  

       <!--start search Button-->
       <div id="form">
       	 <form method="get" action="results.php" enctype="multipart/form-data">
       	 	
           <input type="text" name="user_query" placeholder="Search a Product"/>
           <input type="submit" name="search" value="Search"/>


       	 </form>



       </div>
      <!--end Of search Button-->


    </div><!-- Navigation Section End-->

    <div class="section-wrapper"><!--  Section wrapper start-->
      
      <!--left section Start-->
       <div id="left-section">
          <div id="sidebar-title">Categories</div>  	
 
           <ul id="cats">
            <?php getcats(); ?>  
            
          </ul><!--end of cats-->  
          <div id="sidebar-title">Brand</div>  
            
             <ul id="cats">
             <?php getbrands(); ?>

             </ul><!--end of Brand-->  
         

       </div>
       <!--left section end-->

       <!--right section Start-->
        <div id="right-section">
          <?php cart();   ?>

   	<div id="headline">
     <div id="headline_content">
   
     <?php  
    if(!isset($_SESSION['customer_email']))
    {
      echo "<b style='color:white'>Welcome Guest</b> <b style='color:orange'>Shopping Cart </b>";
    }

    else
    {
      echo "<b style='color:white'>welcome : ".$_SESSION['customer_email']."</b>";
    }

    ?>

   <span style="color:white">Total Itmes: <?php items(); ?>  Total Price: <?php total_price(); ?>  <a href="index.php" style="color:orange; text-decoration: none;"> &nbsp;Back To Shopping</a>
 
     
    <?php

    if(!isset($_SESSION['customer_email']))
   {
       echo "<a href='checkout.php' style='color:white; text-decoration: none;'> &nbsp;Login</a>";
  
   }

   else
   {

     echo "<a href='logout.php' style='color:white; text-decoration: none;'> &nbsp;Logout</a>";
  
   }


  ?>
   </span>

            </div>

          </div>  
     
         
          
       <div id="product_box"><br>
   
         <form method="post" action="cart.php" enctype="multipart/form-data">
           
         <table width="700px" align="center">
          
        <tr align="center"> 
          <th>Remove</th>
          <th>Product(s)</th>
          <th>Quantity</th>
          <th>Total Price</th>

       </tr>
       
       <?php 



    $ip_add = getRealIpAddr();

    $total = 0;

    $sel_price = "select * from cart where ip_add='$ip_add'";

    $run_price = mysqli_query($con, $sel_price);

    while($record = mysqli_fetch_array($run_price))
    {
      $pro_id = $record['p_id'];

      $pro_price = "select * from products where product_id='$pro_id'";

      $run_pro_price = mysqli_query($db, $pro_price);

      while($p_price = mysqli_fetch_array($run_pro_price))
      {
        $product_price = array($p_price['product_price']); 
        $product_title = $p_price['product_title'];
        $product_image = $p_price['product_img1'];
        $only_price = $p_price['product_price'];


        $values = array_sum($product_price);

        $total +=$values;


    



 

?>



 <tr>
<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"></td>

<td><?php echo $product_title;?><br><img src="admin_area/product_images/<?php echo $product_image;  ?>" height="80" width="80"></td>

<td><input type="text" name="qty" value="" size="3"></td>

 <?php   
if(isset($_POST['update']))
{
   $qty = $_POST['qty'];

   $insert_qty = "update cart set qty='$qty' where ip_add='$ip_add'";

   $run_qty = mysqli_query($con,$insert_qty);

   $total = $total*$qty;  


}



 ?>



<td><?php echo "Rs :  ".$only_price; ?></td>

 </tr>

 <?php  }}   ?>


<tr>
    
<td colspan="3" align="right">Sub Total:</td>
<td><?php echo "Rs : ".$total;?></td>

</tr>

<tr></tr>


<tr align="center">
  
<td colspan="2"><input type="submit" name="update" value="Update Cart" style="cursor: pointer;" /></td>
<td><input type="submit" name="continue" value="Continue Shopping"/></td>
<td><button><a href="checkout.php" style="text-decoration: none;padding:0;margin:0;">Checkout</a></button></td>

</tr>

</table> 

</form>

<?php  

function updatecart()
{
   global $con;

if(isset($_POST['update']))
{
  foreach ($_POST['remove'] as $remove_id) 
  {
    $delete_products = "delete from cart where p_id='$remove_id'";

    $run_delete = mysqli_query($con, $delete_products);

     if($run_delete)
     {
      echo "<script>window.open('cart.php','_self')</script";

     }

    
  }


}

if(isset($_POST['continue']))
{
  
echo "<script>window.open('index.php','_self')</script";

}


}

echo @$up_cart = updatecart();


?>



       
 </div>
 </div>
  <!--right section end-->


    </div><!--  Section End-->


   <div class="footer"><!---Footer  start-->
   	
<h1>Copyright &copy;  2019 SN Soft Services | Powered By SN Soft Services</h1>


   </div><!--End Of footer-->



</div><!--main Container End -->

</body>
</html>