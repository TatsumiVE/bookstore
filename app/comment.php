<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="new-page.css">
</head>
<body>
	<center>
		<div id="head">
		<div id="title">
			BookShop
		</div>
		<div id="nav">
			<ul>
				<li class="nav"><a href="new-page.php" style="text-decoration: none;">Home</a></li>
				<li class="nav"><a href="best-seller.php" style="text-decoration: none;">Best Seller</a></li>
				<li class="nav"><a href="comment.php" style="text-decoration: none;">Feeback</a></li>
				<li class="nav"><a href="admin/index.php" style="text-decoration: none;">Login</a></li>
				
			</ul>
		</div>
	</div>
	<div class="feedback">
	<h1>Feedback</h1>
	<p>Please feel free to let us know if you have any comments or suggestions regarding our website and services.</p>
	<form action="add-comment.php" method="POST">
		<table>
			<tr>
	 			<td><b>Your Name</b><td>:</td><td><input type="text" name="name"></td>
	 		</tr><br>
			<tr>
				<td><b>Email Address</b><td>:</td><td><input type="text" name="email"></td>
			</tr><br>
			<tr>
				<td><b>Your Questions or Comments</b><td>:</td><td><textarea name="comment" rows="10" cols="50"></textarea></td>
			</tr><br>
			<tr>
				<td colspan="2"></td>
				<td><input type="submit" name="submit" value="Send">
				<input type="reset" name="clear" value="Reset"></td>				
			</tr>
		</table>
	</form><br><br><hr>
	<?php
		include("admin/confs/config.php"); 
		$getquery=mysqli_query($conn,"SELECT * FROM comment ORDER BY id DESC");
		
	?>
	
</div>
	</center>
</body>
</html>