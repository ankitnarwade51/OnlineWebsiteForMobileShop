<?php

session_start();

if(!isset($_SESSION['admin_email']))
{

  echo "<script>window.open('login.php','_self')</script>";

}

else
{





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

<div class="wrapper">
	
  <div class="header">
  <h1>Manage Your Content</h1>
	
  </div>
   
   <div class="left">
   <h2>Manage Content</h2>	
   	<a href="index.php?insert_product">Insert New Product</a>
   	<a href="index.php?view_products">View All Products</a>
   	<a href="index.php?insert_cat">Insert New Category</a>
   	<a href="index.php?view_cats">View All Categories</a>
   	<a href="index.php?insert_brand">Insert New Brand</a>
   	<a href="index.php?view_brands">View All Brands</a>
   	<a href="index.php?view_customers">View Customers</a>
   	<a href="index.php?view_orders">View Orders</a>
   	<a href="index.php?view_payments">View Payments</a>
	<a href="index.php?insert_news">Insert News</a>
	<a href="index.php?view_news">View All News</a>
    <a href="logout.php">Admin Logout</a>
   </div>

  <div class="right"> 

  	<h3 style="text-align: center;padding:10px;"><?php echo @$_GET['logged_in']; ?></h3>

  <?php       

   include("includes/db.php");

   if(isset($_GET['insert_product']))
   {
   	include("insert_product.php");
   }

     if(isset($_GET['view_products']))
   {
   	include("view_products.php");
   }
   
     if(isset($_GET['edit_pro']))
   {
   	include("edit_pro.php");
   }

     if(isset($_GET['insert_cat']))
   {
   	include("insert_cat.php");
   }

   if(isset($_GET['view_cats']))
   {
   	include("view_cats.php");
   }
  
    if(isset($_GET['edit_cat']))
   {
   	include("edit_cat.php");
   }

     if(isset($_GET['delete_cat']))
   {
   	include("delete_cat.php");
   }

     if(isset($_GET['insert_brand']))
   {
   	include("insert_brand.php");
   }

     if(isset($_GET['view_brands']))
   {
   	include("view_brands.php");
   }
 
   if(isset($_GET['edit_brand']))
   {
   	include("edit_brand.php");
   }

     if(isset($_GET['delete_brand']))
   {
   	include("delete_brand.php");
   }

      if(isset($_GET['view_customers']))
   {
   	include("view_customers.php");
   }

       if(isset($_GET['delete_c']))
   {
   	include("delete_c.php");
   }

    if(isset($_GET['view_orders']))
   {
   	include("view_orders.php");
   }
  
   if(isset($_GET['view_payments']))
   {
   	include("view_payments.php");
   }
if(isset($_GET['insert_news']))
   {
   	include("insert_news.php");
   }
if(isset($_GET['view_news']))
   {
   	include("view_news.php");
   }

if(isset($_GET['edit_news']))
   {
   	include("edit_news.php");
   }

  ?>

  </div>

</div>

</body>
</html>
<?php }  ?>
