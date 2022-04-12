<?php  

include("includes/db.php");

if(isset($_GET['edit_brand']))
{

	$brand_id = $_GET['edit_brand'];

	$edit_brand = "select * from brands where brand_id='$brand_id'";

	$run_edit = mysqli_query($con, $edit_brand);

	$row_edit = mysqli_fetch_array($run_edit);

	$brand_title = $row_edit['brand_title'];


 }

?>





<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="" method="post">
	<br>
	<br>
<table width="700" align="center">

    


	<tr align="center">
		<td colspan="3" align="right">Edit Brand</td>
		<td><input type="text" name="brand_title1" value="<?php echo $brand_title; ?>"></td>

	</tr>

	<tr align="center">
		<td colspan="4"><input type="submit" name="update_brand" value="Update Brand"></td>
	</tr>

</table>

</form>


</body>

</html>


<?php  

if(isset($_POST['update_brand']))
{
	$brand_edit_id = $row_edit['brand_id'];

	$brand_title123 = $_POST['brand_title1'];

	$update_brand = "update brands set brand_title='$brand_title123' where brand_id='$brand_edit_id'";

 $run_update = mysqli_query($con, $update_brand);

   if($run_update)
   {
   	echo "<script>alert('Brand has Been Updated')</script>";
   	echo "<script>window.open('index.php?view_brands','_self')</script>";
   }



}








?>












