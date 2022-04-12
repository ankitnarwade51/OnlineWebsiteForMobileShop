<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">

tr th
{
	border:3px groove #000;
}
	
tr td a
{
	text-decoration: none;
	transition: 0.5s ease-in; 
}
tr td a:hover
{
	color: black;
}


</style>

</head>
<body>

<table width="800" align="center" bgcolor="#ffcccc">
	
<tr align="center"> 
	
	<td colspan="5"><h2>View All News</h2></td>
</tr>

<tr align="center">
	<th>News ID</th>
	<th>News Title</th>
	<th>Edit</th>
	<th>Delete</th>
</tr>
<?php

include("includes/db.php");

$get_news = "select * from news";

$run_news = mysqli_query($con, $get_news);

while($row_news=mysqli_fetch_array($run_news))
{

	$news_id = $row_news['id'];
	$news_title = $row_news['title'];




?>
<tr align="center">
	<td><?php echo $news_id; ?></td>
	<td><?php echo $news_title; ?></td>
	<td><a href="index.php?edit_news=<?php echo $news_id; ?>">Edit</a></td>
	<td><a href="index.php?delete_news=<?php echo $news_id; ?>">Delete</a></td>
</tr>

<?php } ?>


</table>
</body>
</html>