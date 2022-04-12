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
	
	<td colspan="5"><h2>View All Categories</h2></td>
</tr>

<tr align="center">
	<th>Category ID</th>
	<th>Category Title</th>
	<th>Edit</th>
	<th>Delete</th>
</tr>
<?php

include("includes/db.php");

$get_cats = "select * from categories";

$run_cats = mysqli_query($con, $get_cats);

while($row_cats=mysqli_fetch_array($run_cats))
{

	$cat_id = $row_cats['cat_id'];
	$cat_title = $row_cats['cat_title'];




?>
<tr align="center">
	<td><?php echo $cat_id; ?></td>
	<td><?php echo $cat_title; ?></td>
	<td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
	<td><a href="index.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
</tr>

<?php } ?>


</table>
</body>
</html>