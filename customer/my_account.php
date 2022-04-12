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
	   <a href="../index.php"><img src="../images/logo.jpg"></a>

   </div><!--Header Secction End-->	

   
    <div id="navbar"><!-- Navigation Section start-->
      <ul id="menu">
          <li><a href="../index.php">Home</a></li>	
          <li><a href="../all_products.php">All Product</a></li>	
          <li><a href="customer/my_account.php">My Account</a></li>	
       <?php 
         if(isset($_SESSION['customer_email']))
        {
          
            echo "<span style='display:none;'><li><a href='../user_register.php'>Sign  Up</a></li></span>";		
         }

         else
         {
           echo "<li><a href='../user_register.php'>Sign  Up</a></li>";
         }  



          ?>

          <li><a href="../cart.php">Shopping Cart</a></li>	
           <li><a href="../contact.php">Contact Us</a></li>

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
          <div id="sidebar-title">Manage Account</div>  	
 
           <ul id="cats">
<?php
           
       $customer_session = $_SESSION['customer_email'];

   $get_customer_pic = "select * from customers where customer_email='$customer_session'";

   $run_customer = mysqli_query($con, $get_customer_pic);

   $row_customer = mysqli_fetch_array($run_customer);
              
   $customer_pic = $row_customer['customer_image'];

   echo "<img src='customer_photos/$customer_pic' width='150' height='150' style='border:3px solid #efefef;'>";

 ?>
            <li><a href="my_account.php?my_orders">My Orders</a></li>
            <li><a href="my_account.php?edit_account">Edit Account</a></li>
            <li><a href="my_account.php?change_pass">Change Password</a></li>
            <li><a href="my_account.php?delete_account">Delete Account</a></li>
            <li><a href="logout.php">Logout</a></li>
         
          </ul><!--end of cats-->  
       

       </div>
       <!--left section end-->

       <!--right section Start-->
        <div id="right-section">
         
     <?php cart();   ?>

   	<div id="headline">
     <div id="headline_content">
   
   <?php
 
    if(isset($_SESSION['customer_email']))
    {
      echo "<b style='color:white;'>Welcome : ". $_SESSION['customer_email'] ."</b>";
    }

   ?>

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
     
         
          
      <div>
      <h3 align="center">Manage Your Account Here</h3>

       <?php getDefault();  ?>
       
       <?php  
       
       if(isset($_GET['my_orders']))
       {
        include("my_orders.php");
       }
      
       if(isset($_GET['edit_account']))
       {
        include("edit_account.php");
       }
      
        if(isset($_GET['change_pass']))
       {
        include("change_pass.php");
       }

         if(isset($_GET['delete_account']))
       {
        include("delete_account.php");
       }



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