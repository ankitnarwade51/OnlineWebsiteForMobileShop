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
   <b style="color:white">Welcome Guest</b>
    <b style="color:orange"> &nbsp;Shopping Cart</b>
   <span style="color:white"> &nbsp;Total Itmes: <?php items(); ?> &nbsp; Total Price: <?php total_price(); ?> &nbsp;<a href="cart.php" style="color:orange; text-decoration: none;">&nbsp;Go TO Cart</a>

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
       <br>
       <form action="customer_register.php" method="post" enctype="multipart/form-data">
          
        <table width="700" align="center">
          
         <tr align="center">
          <td colspan="8"><h2>Create An Account</h2></td>
        </tr>

        <tr>
          <td align="">Customer Name:</td>
          <td><input type="text" name="c_name" required /></td>
        </tr>

         <tr>
          <td align="">Customer Email:</td>
          <td><input type="text" name="c_email" required /></td>
        </tr>

          <tr>
          <td align="">Customer Password:</td>
          <td><input type="password" name="c_pass" required /></td>
        </tr>

         <tr>
          <td align="">Customer Country:</td>
          <td>
            <select name="c_country">
               <option>Select a country</option>
               <option>Afganistan</option>
               <option>India</option>
               <option>Iran</option>
               <option>America</option>
               <option>Japan</option>
               <option>China</option>
            </select>

          </td>
        </tr>

          <tr>
          <td align="">Customer City:</td>
          <td><input type="text" name="c_city" required /></td>
        </tr>

          <tr>
          <td align="">Customer Mobile No:</td>
          <td><input type="text" name="c_contact" required /></td>
        </tr>


         <tr>
          <td align="">Customer Address:</td>
          <td><input type="text" name="c_address" required /></td>
        </tr>


         <tr>
          <td align="">Customer Image:</td>
          <td><input type="file" name="c_image" required /></td>
        </tr>


         <tr align="right">
          <td colspan="10"><input type="submit" name="register" value="Submit" /></td>
        </tr>

        </table>

       </form>

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



<?php  

  if(isset($_POST['register']))
  {
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    $c_ip = getRealIpAddr();

 $insert_customer = "insert into customers(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip)
   values('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";

   $run_customer = mysqli_query($con,$insert_customer);

   move_uploaded_file($c_image_tmp,"customer/customer_photos/$c_image");
 
  $sel_cart = "select * from cart where ip_add='$c_ip'";

 $run_cart = mysqli_query($con, $sel_cart);

 $check_cart = mysqli_num_rows($run_cart);

  if($check_cart>0)
  {
    $_SESSION['customer_email']=$c_email;

   echo "<script>alert('Account Created Successfully,thank You')</script>";

    echo "<script>window.open('checkout.php','_self')</script>";
  } 

   else
   {
     $_SESSION['customer_email']=$c_email;
     echo "<script>alert('Account Created Successfully,thank You')</script>";
    echo "<script>window.open('index.php','_self')</script>";
   }


 }



  ?>
