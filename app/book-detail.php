<?php
 session_start();

    include("admin/confs/config.php");


    $id = $_GET['id'];  
	$sql="SELECT *  FROM books WHERE id = $id";
	$books = mysqli_query($conn,$sql);  
	$row = mysqli_fetch_assoc($books);

    $cart = 0;
    if(isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $qty) {
            $cart += $qty;
        }
    }
 
	
    ?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel="stylesheet" href="css/style.css"> 
	  <link rel="stylesheet" href="templatemo_style.css">
	  <link rel="stylesheet" href="new-page.css">
	  <script type="text/javascript">
function incrementButtons( upBtn, downBtn, qtyField )
{
var step = parseFloat( qtyField.value ) || 1,
currentValue = step;

downBtn.onclick = function()
{
currentValue = parseFloat( qtyField.value ) || step;
qtyField.value = ( currentValue -= Math.min( step, currentValue - step ) );
}

upBtn.onclick = function()
{
currentValue = parseFloat( qtyField.value ) || step;
qtyField.value = ( currentValue += step );
}
}
</script>
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
	<div class="book_detail">
	<h1>Book Detail</h1> 
	
	 <div class="detail">
	 	       
     <form id="f1" method="get" action="add-to-cart.php">                            
	 <table>
	 	<tr>
	 		<td rowspan="10"><img src="admin/cover/<?php echo $row['cover'] ?>" width="400" height="300"> </td>
	 		<td>
	 			<tr>
	 				<td><b>Title</b><td>:</td><td><?php echo $row['title'] ?></td></td>
	 			</tr>
	 			<tr>
	 				<td><b>Author</b><td>:</td><td><?php echo $row['author'] ?></td></td>
	 			</tr>
	 			<tr>
	 				<td><b>Price</b><td>:</td><td><?php echo $row['price'] ?></td></td>
	 			</tr>
	 			<tr>
	 				<td><b>Language</b><td>:</td><td><?php echo $row['language'] ?></td></td>
	 			</tr>
	 			<tr>
	 				<td><b>Summary</b><td>:</td><td><?php echo $row['summary'] ?></td></td>
	 			</tr>
	 			<tr>
	 				<td><b>Quantity</b><td>:</td><td><?php echo $row['quantity'] ?></td></td>
	 			</tr>
	 			<tr>
	 				<td><b>Publisher</b><td>:</td><td><?php echo $row['publisher'] ?></td></td>
	 			</tr>
	 			<tr>
	 				<td><b>Published Year</b><td>:</td><td><?php echo $row['year'] ?></td></td>
	 			</tr>
	 			<tr>
	 				<?php
	 					$num = 0;
	 				?>
	 				<td>
						 
							<input type='text' name='qty' id='qty' value='1'/>

							<input type='button' name='add' value='+'/>
							<input type='button' name='subtract' value='-'/>
						<button><a href="add-to-cart.php?id=<?php echo $row['id'] ?>&amp;qty=<?php urlencode($_POST['qty']) ?>"class="book-detail">Add to cart</a></button></strong>
						 

						 
	 				</td>
	 					

	 			</tr>
				<tr>
					<td>
						
					 <h3>Shopping Cart</h3>
                <p>Total <span><a href="view-cart.php?id=<?php echo $row['id'] ?>" style="color: blue;">(<?php echo $cart ?>) items</a></span> in your cart</p></td>
				</tr>
				

	 		</td>	 		
	 	</tr>
	 </table> 
	</form>

</div>
</div>
	 
		<a href="new-page.php" class="back">&laquo; Go Back</a> 
		 
		  
		<div class="footer">  &copy; <?php echo date("Y") ?>. All right reserved. </div>
</div>
</center>
<script type="text/javascript">

with( document.getElementById( 'f1' ) )
incrementButtons( add, subtract, qty );

</script>
</body>
</html>