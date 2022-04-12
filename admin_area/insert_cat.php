<form action="" method="post">
	<br>
	<br>
<table width="700" align="center">

    


	<tr align="center">
		<td colspan="3" align="right">Insert New Category</td>
		<td><input type="text" name="cat_title"></td>

	</tr>

	<tr align="center">
		<td colspan="4"><input type="submit" name="insert_cat" value="Insert Category"></td>
	</tr>

</table>

</form>

<?php  

include("includes/db.php");

if(isset($_POST['insert_cat']))
{

	$cat_title = $_POST['cat_title'];

	$insert_cat = "insert into categories (cat_title) values('$cat_title')";

	$run_cat = mysqli_query($con, $insert_cat);

   if($run_cat)
   {
   	echo "<script>alert('New Category has Been Inserted')</script>";
   	echo "<script>window.open('index.php?view_cats','_self')</script>";
   }



}

















?>

