<?php 

 include("confs/config.php"); 
 $id = $_POST['id'];
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
   if($cover) 
   {
      move_uploaded_file($tmp, "cover/$cover");  
      $sql = "UPDATE books SET title='$title', author='$author',  price='$price',cover='$cover',
     language='$language', summary='$summary', quantity='$quantity',  category_id='$category_id', 
     modified_date=now(),publisher='$publisher',year='$published_year' WHERE id = $id"; 
              } 
    else { 
       $sql = "UPDATE books SET title='$title', author='$author',  price='$price',
     language='$language', summary='$summary', quantity='$quantity',  category_id='$category_id', 
     modified_date=now(),publisher='$publisher',year='$published_year' WHERE id = $id"; 
      }  
    mysqli_query($conn, $sql);  
    header("location: book-list.php"); 
     ?>