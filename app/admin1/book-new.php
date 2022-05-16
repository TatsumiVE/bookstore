<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
			form label {
display: block;
margin-top: 8px;
}
	</style>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>New Book</h1>
	<ul class="menu">
     <li><a href="book-list.php">Manage Books</a></li>
       <li><a href="cat-list.php">Manage Categories</a></li>
         <li><a href="order.php">Manage Orders</a></li> 
          <li><a href="logout.php">Logout</a></li> 
  </ul>
<form action="book-add.php" method="post" enctype="multipart/form-data">
<label for="title">Book Title</label>
<input type="text" name="title" id="title">
<label for="author">Author</label>
<input type="text" name="author" id="author">

<label for="categories">Category</label>
<select name="category_id" id="categories">
<option value="0">-- Choose --</option>
<?php
include("confs/config.php");
$result = mysqli_query($conn, "SELECT id, name FROM categories");
while($row = mysqli_fetch_assoc($result)):
?>
<option value="<?php echo $row['id'] ?>">
<?php echo $row['name'] ?>
</option>
<?php endwhile; ?>
</select>

<label for="summary">Summary</label>
<textarea name="summary" id="summary"></textarea>
<label for="price">Price</label>
<input type="text" name="price" id="price">


<label for="quantity">Quantity</label>
<input type="text" name="quantity" id="quantity">
<label for="Language">Language</label>
<input type="text" name="language" id="language">
<label for="publisher">Publisher</label>
<input type="text" name="publisher" id="publisher">
<label for="price">Published Year</label>
<input type="text" name="published_year" id="published_year">


<label for="cover">Cover</label>
<input type="file" name="cover" id="cover">
<br><br>
<input type="submit" value="Add Book">
<a href="book-list.php" class="back">Back</a>
</form>

<script src="../js/jquery.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script>
$(function() {
	$("form").validate({
		rules: {
			"title": "required",
			"author": "required",
			"category_id": "required",
			"summary": "required",
			"price": "required",
			"quantity":"required",
			"language":"required",
			"publisher":"required",
			"published_year":"required"
		},
		messages: {
			"title": "Please provide book title",
			"author": "Please provide author name",
			"category_id": "Please choose a category",
			"summary": "Please provide summary",
			"price": "Please provide book price",
			"quantity":"Please provide book quantity",
			"language":"Please provide book language",
			"publisher":"Please provide book publisher",
			"published_year":"Please provide book published year"
		}
	});
});
</script>
</body>
</html>
