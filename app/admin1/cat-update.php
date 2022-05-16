<?php  

 include("confs/config.php"); 
  $id = $_POST['id'];  
   $name = $_POST['name'];
       
       $sql = "UPDATE categories SET name='$name', modified_date=now() WHERE id = $id";   
       mysqli_query($conn, $sql);
        header("location: cat-list.php"); ?>
