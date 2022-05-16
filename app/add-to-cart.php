<?php  
session_start();
include("admin/confs/config.php");
$pid = $_GET['id'];
$qty = $_GET['qty'];

$books = mysqli_query($conn, "SELECT * FROM books WHERE id = $pid");  
$row = mysqli_fetch_assoc($books);  
$_SESSION['cart'][$pid]++; 
$i=0;
if($_SESSION['cart'][$pid]>$row['quantity']){
$i=1;
}
else{
	$i=0;
}

echo $qty;

