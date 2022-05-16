<?php  session_start(); 
$name = $_POST['name'];  
$email = $_POST['email'];
$address = $_POST['address'];  
$phone = $_POST['phone'];
$choice = $_POST['choice'];  
$password = $_POST['password'];
$confirm = $_POST['confirm'];  


if($password==$confirm) { 
	$_SESSION['auth'] = true;
	include("admin/confs/config.php");

$sql = "INSERT INTO member (name,email,address,phone,gender,password,confirm,created_date) VALUES ('$name','$email', '$address','$phone' ,'$choice','$password','$confirm',now())";
mysqli_query($conn, $sql);
header("location:new-page.php");
 }
 else {    header("location: registration.php?login=failed");  } 
 ?>