<?php
include("confs/config.php");
$no=1;
$result = mysqli_query($conn, "SELECT * from member order by created_date DESC");
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1>Book List</h1>

	<ul class="menu">
     <li><a href="book-list.php">Manage Books</a></li>
       <li><a href="cat-list.php">Manage Categories</a></li>
         <li><a href="order.php">Manage Orders</a></li> 
          <li><a href="logout.php">Logout</a></li> 
  </ul>

<table width="100%">
	<tr>
	<th width="5%"><span>No.</span></th>
          <th width="25%"><span>Name</span></th>          
          <th width="15%"><span>Email</span></th>
          <th width="10%"><span>Address</span></th>
          <th width="15%"><span>Phone No</span></th>          
          <th width="15%"><span>Gender</span></th>
          <th width="5%"><span>Password</span></th>  	
          <th width="10%"><span>Date</span></th>
           <th width="10%"><span>Function</span></th>
      </tr>
                  
<?php 
	while($row = mysqli_fetch_assoc($result)): ?>
<tr>

<td><?php echo $no++ ?></td>
<td>
<?php echo $row['name'] ?></td>
<td> <?php echo $row['email'] ?></td>
<td><?php echo $row['address'] ?></td>
<td><?php echo $row['phone'] ?>Ks</td>
<td><?php echo $row['gender'] ?></td>
<td><?php echo $row['password'] ?></td>
<td><?php echo $row['created_date'] ?></td>
<td>
<button><a href="member-del.php?id=<?php echo $row['id'] ?>" class="del" style="color: red;">delete</a></button></td>


<?php endwhile; ?>
</table>
</body>
</html>
