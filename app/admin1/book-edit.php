<?php 
 include("confs/config.php"); 
 
  $id = $_GET['id']; 
   $result = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");  
   $row = mysqli_fetch_assoc($result); ?> 


   <!DOCTYPE html>
   <html>
   <head>
   	<title>Book Edit</title>
   	
   	<link rel="stylesheet" href="css/style.css">
  
   </head>
   <body>
    <ul class="menu">
  <li><a href="book-list.php">Manage Books</a></li>
  <li><a href="cat-list.php">Manage Categories</a></li>
  <li><a href="orders.php">Manage Orders</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

    <form action="book-update.php" method="post" enctype="multipart/form-data">  
    	<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
    	<label for="title">Book Title</label>
    	<input type="text" name="title" id="title" value="<?php echo $row['title'] ?>"> 
    	<label for="author">Author</label> 
    	<input type="text" name="author" id="author" value="<?php echo $row['author'] ?>"> 
      <label for="categories">Category</label> 
      <select name="category_id" id="categories">   
      <option value="0">-- Choose --</option> 
      <?php     
        $categories = mysqli_query($conn, "SELECT id, name FROM categories");     
        while($cat = mysqli_fetch_assoc($categories)):    
      ?>   
      <option value="<?php echo $cat['id'] ?>" <?php if($cat['id'] == $row['category_id']) echo "selected" ?> >    <?php echo $cat['name'] ?>    
      </option>  
      <?php endwhile; ?>  
      </select>
    	<label for="sum">Summary</label> 
    	<textarea name="summary" id="summary">
    	<?php echo $row['summary'] ?>
    	</textarea>
    	<label for="price">Price</label> 
    	<input type="text" name="price" id="price" value="<?php echo $row['price'] ?>">
      <label for="quantity">Quantity</label>
      <input type="text" name="quantity" id="quantity" value="<?php echo $row['quantity'] ?>">
      <label for="Language">Language</label>
      <input type="text" name="language" id="language" value="<?php echo $row['language'] ?>">
      <label for="publisher">Publisher</label>
      <input type="text" name="publisher" id="publisher" value="<?php echo $row['publisher'] ?>">
      <label for="price">Published Year</label>
      <input type="text" name="published_year" id="published_year" value="<?php echo $row['year'] ?>">
   	  <br><br>
   	  <img src="cover/<?php echo $row['cover'] ?>" alt="" height="150"> 
   	  <label for="cover">Change Cover</label>  
   	  <input type="file" name="cover" id="cover">  <br><br> 
   	  <input type="submit" value="Update Book"> 
   	  <a href="book-list.php">Back</a> 
   	  </form>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script>
$(function() {
  $("form").validate({
    rules: {
      "title": "required",
      "author": "required",
      "category_id": "required",
      "price": "required"
    },
    messages: {
      "title": "Please provide book title",
      "author": "Please provide author name",
      "category_id": "Please choose a category",
      "price": "Please provide book price"
    }
  });
});
</script>
   </body>
   </html>