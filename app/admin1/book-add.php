<?php  

include("confs/config.php"); 
 $title = $_POST['title']; 
 $author = $_POST['author']; 
 $summary = $_POST['summary']; 
 $price = $_POST['price']; 
  $language = $_POST['language']; 
 $publisher = $_POST['publisher']; 
 $published_year = $_POST['published_year']; 
 $quantity = $_POST['quantity']; 
 $category_id = $_POST['category_id']; 
 $cover = $_FILES['cover']['name']; 
 $tmp = $_FILES['cover']['tmp_name']; 
  if($cover) {
  	move_uploaded_file($tmp, "cover/$cover"); 
  } 
  $sql = "INSERT INTO books ( title, author, price,cover,language,summary,quantity,category_id,created_date,modified_date,publisher,year) VALUES (  '$title', '$author', '$price','$cover','$language','$summary','$quantity', '$category_id',  NOW(), NOW() ,'$publisher','$published_year' )"; 
   mysqli_query($conn, $sql); 
   header("location: book-list.php"); ?>