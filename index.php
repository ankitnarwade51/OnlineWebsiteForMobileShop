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
          <li><a href="customer/my_account.php">My Account</a></li>	
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
         
         <div id="sidebar-title">News Section</div>  
            
             <ul id="news">
             <marquee direction="up" scrolldelay="30">
			  <p> Get 50% off on samsung mobile </p><br> <br>
			    <p> Get one by one free on motorola </p> <br><br>
				  <p> Festival offer on printer </p> 
            </marquee>
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
    
   <span style="color:white">&nbsp;Total Itmes: <?php items(); ?>&nbsp;Total Price: <?php total_price(); ?> <a href="cart.php" style="color:orange; text-decoration: none;">  &nbsp;Go TO Cart</a>
     
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
     
         
          
        <div id="product_box">
        <?php 
        getpro(); 
        getcatpro();  
        getbrandpro(); 

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