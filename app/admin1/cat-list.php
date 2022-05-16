<html>
<head>

<title></title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<h1>Category List</h1>
<ul class="menu">
     <li><a href="book-list.php">Manage Books</a></li>
       <li><a href="cat-list.php">Manage Categories</a></li>
         <li><a href="order.php">Manage Orders</a></li> 
          <li><a href="logout.php">Logout</a></li> 
  </ul>
<?php
include("confs/config.php");
$result = mysqli_query($conn, "SELECT * FROM categories");
?>
<ul>
<?php 
while($row = mysqli_fetch_assoc($result)): ?>
	<table width="800">
		<tr>
			<td width="600"><?php echo $row['name'] ?></td>
			<td width="100"><button><a href="cat-del.php?id=<?php echo $row['id'] ?>" class="del" style="color: red;" onClick="return confirm('Are you sure?')">del</a></button></td>
			<td><button><a href="cat-edit.php?id=<?php echo $row['id'] ?>">edit</a></button></td>
		</tr>
	</table>

<?php endwhile; ?>
</ul>
<a href="cat-new.php" class="new">New Category</a>
</body>
</html>