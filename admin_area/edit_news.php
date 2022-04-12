<?php  

include("includes/db.php");

if(isset($_GET['edit_news']))
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
		<td colspan="3" align="right">Edit News</td>
		<td><input type="text" name="news_title1" value="<?php echo $title; ?>"></td>

	</tr>

	<tr align="center">
		<td colspan="4"><input type="submit" name="update_news" value="Update news"></td>
	</tr>

</table>

</form>


</body>

</html>


<?php  

if(isset($_POST['update_news']))
{
	$news_edit_id = $row_edit['id'];

	$news_title123 = $_POST['news_title1'];

	$update_news = "update news set title='$news_title123' where id='$news_edit_id'";

 $run_update = mysqli_query($con, $update_news);

   if($run_update)
   {
   	echo "<script>alert('News has Been Updated')</script>";
   	echo "<script>window.open('index.php?view_news','_self')</script>";
   }



}








?>












