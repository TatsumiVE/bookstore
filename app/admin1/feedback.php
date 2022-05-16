
<?php
include("confs/config.php");
$no=1;
$result = mysqli_query($conn, "SELECT * from comment order by created_date DESC");
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}




	</style>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>



	<ul class="menu">
     <li><a href="book-list.php">Manage Books</a></li>
       <li><a href="cat-list.php">Manage Categories</a></li>
         <li><a href="order.php">Manage Orders</a></li> 
          <li><a href="logout.php">Logout</a></li> 
  </ul>

<center><h1>Customer Feedback</h1></center>

<table id="customers">
  
  <tr>
  		<th width="5%"><span>No.</span></th>
          <th width="25%"><span>Name</span></th>          
          <th width="15%"><span>Email</span></th>
          <th width="10%"><span>Comment</span></th>          	
          <th width="10%"><span>Date</span></th>
  </tr>
  
<?php 
	while($row = mysqli_fetch_assoc($result)): ?>

  <tr>
   
<td><?php echo $no++ ?></td>
<td>
<?php echo $row['name'] ?></td>
<td> <?php echo $row['gmail'] ?></td>
<td><?php echo $row['comment'] ?></td>
<td><?php echo $row['created_date'] ?></td>

  </tr>
  
<?php endwhile; ?>
 
</table>
</body>
</html>




































