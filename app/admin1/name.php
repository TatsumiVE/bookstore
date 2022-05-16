<?php
session_start();  

	include("confs/config.php");
	$no=1;
	$post_at = "";
	$post_at_to_date ="";
	$name="";
	
	
	$queryCondition = "";


	if(!empty($_GET["search"]["post_at"])) {			
		$post_at = $_GET["search"]["post_at"];
		list($fid,$fim,$fiy) = explode("-",$post_at);

		
		$post_at_todate = date('Y-m-d');
		if(!empty($_GET["search"]["post_at_to_date"])) {
			$post_at_to_date = $_GET["search"]["post_at_to_date"];
			list($tid,$tim,$tiy) = explode("-",$_GET["search"]["post_at_to_date"]);
			$post_at_todate = "$tiy-$tim-$tid";
		}
		$name = $_GET['title'];
		$queryCondition .= "WHERE books.title='$name' ANd orders.id=order_items.order_id ANd books.id=order_items.book_id AND orders.created_date BETWEEN '$fiy-$fim-$fid' AND '" . $post_at_todate . "'";

	}

	$sql = "SELECT books.title,books.quantity,orders.name,orders.email,orders.phone,orders.address,orders.created_date,order_items.qty from orders,books,order_items " . $queryCondition . " ORDER BY orders.created_date desc";

	$result = mysqli_query($conn,$sql);
?>

<html>
	<head>
    <title>Recent Articles</title>		
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<style>
	.table-content{border-top:#CCCCCC 4px solid; width:50%;}
	.table-content th {padding:5px 20px; background: #F0F0F0;vertical-align:top;} 
	.table-content td {padding:5px 20px; border-bottom: #F0F0F0 1px solid;vertical-align:top;} 
	</style>
	</head>
	
	<body>
    <div class="demo-content">
		<h2 class="title_with_link">Recent Articles</h2>
  <form name="frmSearch" method="get"  action="name.php" class="search">
  	
   
         <input type="text" name="title">
      

	 <p class="search_input">
		<input type="text" placeholder="From Date" id="post_at" name="search[post_at]"  value="<?php echo $post_at; ?>" class="input-control" />
	    <input type="text" placeholder="To Date" id="post_at_to_date" name="search[post_at_to_date]" style="margin-left:10px"  value="<?php echo $post_at_to_date; ?>" class="input-control"  />			 
		<input type="submit" name="go" value="Search" >
	</p>
<?php 	 { ?>
<table class="table-content" width="100%">
          <thead>
        <tr>
                      
          <th ><span>No.</span></th>
          <th width="25%"><span>Book </span></th>          
          <th width="15%"><span>Customer</span></th>
          <th width="10%"><span>Email</span></th>
          <th width="15%"><span>Phone</span></th>          
          <th width="15%"><span>Address</span></th>
           <th width="5%"><span>Qunantity</span></th> 
          <th width="5%"><span>Order Qunantity</span></th>  	
          <th width="10%"><span>Date</span></th>
                  
        		  
        </tr>
      </thead>
    <tbody>
	<?php
		while($row = mysqli_fetch_array($result)) {
	?>
        <tr>
        	<td><?php echo $no++ ?></td>
			<td><?php echo $row["title"]; ?></td>
			<td><?php echo $row["name"]; ?></td>
			<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["phone"]; ?></td>
			<td><?php echo $row["address"]; ?></td>
			<td><?php echo $row["quantity"]; ?></td>
			<td><?php echo $row["qty"]; ?></td>
			<td><?php echo $row["created_date"]; ?></td>
		

		</tr>
   <?php
		}
   ?>
   <tbody>
  </table>
<?php } ?>
  </form>
  </div>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$.datepicker.setDefaults({
showOn: "button",
buttonImage: "datepicker.png",
buttonText: "Date Picker",
buttonImageOnly: true,
dateFormat: 'dd-mm-yy'  
});
$(function() {
$("#post_at").datepicker();
$("#post_at_to_date").datepicker();
});
</script>
</body></html>
