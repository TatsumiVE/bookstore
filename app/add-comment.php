<?php  
 	session_start();
	include("admin/confs/config.php"); 
	$name = $_POST['name'];
 	$gmail = $_POST['email']; 
 	$comment = $_POST['comment']; 
 
  	$sql = "INSERT INTO comment ( name,gmail,comment,created_date) VALUES (  '$name','$gmail','$comment' ,Now())"; 
   	mysqli_query($conn, $sql); 
  	header("location:comment.php");
?>