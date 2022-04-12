<?php  

include("includes/db.php");

if(isset($_GET['edit_cat']))
{

	$cat_id = $_GET['edit_cat'];

	$edit_cat = "select * from categories where cat_id='$cat_id'";

	$run_edit = mysqli_query($con, $edit_cat);

	$row_edit = mysqli_fetch_array($run_edit);

	$cat_title = $row_edit['cat_title'];









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
		<td colspan="3" align="right">Edit Category</td>
		<td><input type="text" name="cat_title1" value="<?php echo $cat_title; ?>"></td>

	</tr>

	<tr align="center">
		<td colspan="4"><input type="submit" name="update_cat" value="Update Category"></td>
	</tr>

</table>

</form>


</body>

</html>


<?php  

if(isset($_POST['update_cat']))
{
	$cat_edit_id = $row_edit['cat_id'];

	$cat_title123 = $_POST['cat_title1'];

	$update_cat = "update categories set cat_title='$cat_title123' where cat_id='$cat_edit_id'";

 $run_update = mysqli_query($con, $update_cat);

   if($run_update)
   {
   	echo "<script>alert('Category has Been Updated')</script>";
   	echo "<script>window.open('index.php?view_cats','_self')</script>";
   }



}








?>












