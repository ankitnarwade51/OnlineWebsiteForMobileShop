<form action="" method="post">
	<br>
	<br>
<table width="700" align="center">

    


	<tr align="center">
		<td colspan="3" align="right">Insert New Brand</td>
		<td><input type="text" name="brand_title"></td>

	</tr>

	<tr align="center">
		<td colspan="4"><input type="submit" name="insert_brand" value="Insert Brand"></td>
	</tr>

</table>

</form>

<?php  

include("includes/db.php");

if(isset($_POST['insert_brand']))
{

	$brand_title = $_POST['brand_title'];

	$insert_brand = "insert into brands (brand_title) values('$brand_title')";

	$run_brand = mysqli_query($con, $insert_brand);

   if($run_brand)
   {
   	echo "<script>alert('New Brand has Been Inserted')</script>";
   	echo "<script>window.open('index.php?view_brands','_self')</script>";
   }



}

















?>

