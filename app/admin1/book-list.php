<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1>Book List</h1>

	<ul class="menu">
     <li><a href="book-list.php">Manage Books</a></li>
       <li><a href="cat-list.php">Manage Categories</a></li>
         <li><a href="order.php">Manage Orders</a></li> 
          <li><a href="logout.php">Logout</a></li> 
  </ul>
<?php
include("confs/config.php");
$result = mysqli_query($conn, "SELECT books.*, categories.name FROM books LEFT JOIN categories ON books.category_id = categories.id
ORDER BY books.created_date DESC");
?>

<ul class="books">
<?php 
	while($row = mysqli_fetch_assoc($result)): ?>
<li>
<img src="cover/<?php echo $row['cover'] ?>"
alt="" align="right" height="70" width="70">
<b><?php echo $row['title'] ?></b>
<i>by <?php echo $row['author'] ?></i>
<small><b>(in <?php echo $row['name'] ?>)</b></small>
<span style="color: blue;"><?php echo $row['price'] ?>Ks</span>
<div><?php echo $row['summary'] ?></div>
<button><a href="book-del.php?id=<?php echo $row['id'] ?>" class="del" style="color: red;" onClick="return confirm('Are you sure?')">del</a></button>
<button><a href="book-edit.php?id=<?php echo $row['id'] ?>">edit</a></button>
</li>
<hr>
<?php endwhile; ?>
</ul>

<a href="book-new.php" class="new">New Book</a>
</body>
</html>