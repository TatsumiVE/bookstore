<html>
<head><title>Category</title>
	<style>form label {
display: block;
margin-top: 8px;
}
</style>
<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	
	<h1>New Category</h1>

	<ul class="menu">
     <li><a href="book-list.php">Manage Books</a></li>
       <li><a href="cat-list.php">Manage Categories</a></li>
         <li><a href="order.php">Manage Orders</a></li> 
          <li><a href="logout.php">Logout</a></li> 
  </ul>
<form action="cat-add.php" method="post">
<label for="name">Category Name</label>
<input type="text" name="name" id="name">
<br><br>
<input type="submit" value="Add Category">
</form>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script>
$(function() {
	$("form").validate({
		rules: {
			"name": "required"
		},
		messages: {
			"name": "Please provide category name"
		}
	});
});
</script>
</body>
</html>