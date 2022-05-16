<?php  
session_start();  
include("admin/confs/config.php"); 
$name = $_POST['name'];  
$email = $_POST['email']; 
$phone = $_POST['phone'];  
$address = $_POST['address'];  
mysqli_query($conn, "INSERT INTO orders (name, email, phone, address, status, created_date, modified_date) VALUES ('$name','$email','$phone','$address', 0, NOW(), NOW()) ");  


$order_id = mysqli_insert_id($conn);  
foreach($_SESSION['cart'] as $id => $qty)
 { mysqli_query($conn, "INSERT INTO order_items (book_id,order_id,qty) VALUES ($id,$order_id,$qty)");  }
 	mysqli_query($conn, "Update books set quantity=quantity-$qty where books.id=$id ");   
unset($_SESSION['cart']); ?>
<!DOCTYPE html>
<html>
<head>
	  <title>Order Submitted</title> 
	   <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
	 <h1>Order Submitted</h1>    <div class="msg">    Your order has been submitted. We'll deliver the items soon.   
	  <a href="index.php" class="done">Book Store Home</a>  </div>  <div class="footer">    &copy; <?php echo date("Y") ?>. All right reserved.  </div> 

</body>
</html>