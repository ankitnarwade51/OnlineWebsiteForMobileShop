<?php
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
      	  <div id="headline">
            <div id="headline_content">
               <b style="color:white">Welcome Guest</b>
               <b style="color:orange">Shopping Cart</b>
               <span style="color:white"> Itmes:- Price:-</span>

            </div>

          </div>  
          
        <div id="product_box">
        <?php 
           
            if(isset($_GET['search']))
            {
              $user_keyword = $_GET['user_query'];


  $get_products = "select * from products where product_keywords like '%$user_keyword%'";

          $run_products = mysqli_query($con, $get_products);

              $count = mysqli_num_rows($run_products);

          if($count==0)
          {
             echo "<h2>No Product Found</h2>";

          }

          while($row_products = mysqli_fetch_array($run_products))
          {
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_cat = $row_products['cat_id'];
            $pro_brand = $row_products['brand_id'];
            $pro_desc = $row_products['product_desc'];
            $pro_price = $row_products['product_price'];
            $pro_image = $row_products['product_img1'];

         
          echo "

          <div id='single_product'>
           <h3>$pro_title</h3>
           <img src='admin_area/product_images/$pro_image' width='180' height='180'><br>
           <p><b>Price: RS - $pro_price</b></p>
           <a href='details.php?pro_id=$pro_id' style='float:left;'>Detail</a>
           <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add TO Cart</button></a>
          </div>
          ";
          }
     
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