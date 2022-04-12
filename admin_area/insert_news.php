<form action="" method="post">
	<br>
	<br>
<table width="700" align="center">

    


	<tr align="center">
		<td colspan="3" align="right">Insert  News</td>
		<td><input type="text" name="news_title"></td>

	</tr>

	<tr align="center">
		<td colspan="4"><input type="submit" name="insert_news" value="Insert News"></td>
	</tr>

</table>

</form>

<?php  

include("includes/db.php");

if(isset($_POST['insert_news']))
{

	$news_title = $_POST['news_title'];

	$insert_news = "insert into news (title) values('$news_title')";

	$run_news = mysqli_query($con, $insert_news);

   if($run_news)
   {
   	echo "<script>alert('New Category has Been Inserted')</script>";
   	echo "<script>window.open('index.php?view_news','_self')</script>";
   }



}

















?>

