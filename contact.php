<?php
include("includes/db.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SN Soft | Online Shop</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<scriptsrc="js/jquery2.js"></script>
<scriptsrc="js/bootstrap.min.js"></script>
<script src="main.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="wait overlay">
<div class="loader"></div>
</div>
<div class="navbarnavbar-inverse navbar-fixed-top">
<div class="container-fluid">	
<div class="navbar-header">
<a href="#" class="navbar-brand">SN Soft Online Shop</a>
</div>


</div>
</div>
<p><br/></p>
<p><br/></p>
<p><br/></p>
<div class="container-fluid">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8" id="signup_msg">
<!--Alert from signup form-->
</div>
<div class="col-md-2"></div>
</div>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="panel panel-primary">
<div class="panel-heading">Customer Feedback Form</div>
<div class="panel-body">					
<form action="" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-md-6">
<label for="f_name">First Name</label>
<input type="text" id="f_name" name="f_name" class="form-control" required>
</div>
<div class="col-md-6">
<label for="f_name">Last Name</label>
<input type="text" id="l_name" name="l_name"class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-md-12">
<label for="mobile">Mobile</label>
<input type="text" id="mobile" name="mobile"class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-md-12">
<label for="mobile">Feedback</label>
<textarea name="text" colspan="5" class="form-control" required></textarea>
</div>
</div>
<p><br/></p>
<div class="row">
<div class="col-md-12">
<input style="width:100%;" value="Customer Feedback" type="submit" name="feedback"class="btnbtn-success btn-lg">
</div>
</div>					
</div>
</form>
<div class="panel-footer"></div>
</div>
</div>
<div class="col-md-2"></div>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST['feedback'])){
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$mobile = $_POST['mobile'];
$text = $_POST['text'];			
$insert_feedback = "insert into feedback(first_name,last_name,mobile_no,message) Values('$f_name','$l_name','$mobile','$text')";
$run_feedback = mysqli_query($con,$insert_feedback);
echo "<script>alert('Your Feedback Send Successfully $text')</script>";
}
 ?>
