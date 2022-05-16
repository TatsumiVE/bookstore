<?php
 session_start();

    include("admin/confs/config.php");
     if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }
    
    
    $total_records_per_page = 2;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";

  $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM  bestseller");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1;
    
    

    $result = mysqli_query($conn,"SELECT * FROM categories");
    if(isset($_GET['cat'])) {    
    $cat_id = $_GET['cat'];    
    $books = mysqli_query($conn, "SELECT * FROM books WHERE category_id = $cat_id"); 
     } 
     else {    
        $books = mysqli_query($conn, "SELECT * FROM bestseller order by id desc limit $offset,$total_records_per_page  ");  
     }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
        <div class="bestseller">
	     <div id="content_middle">
                	<h1 style="margin-left: 25px;padding: 20px;">Best Seller</h1>

         <?php while($row = mysqli_fetch_assoc($books )): ?> 
         <table width="760">
             <tr>
                 <td rowspan="5" width="200"><a href="book-detail.php"><img src="admin/cover/<?php echo $row['cover'] ?>" height="90" width="150"></a>
                 </td>
                 <td>
                    <tr><td>
                    <b> 
                        Title: <a href="book-detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?>  </a>
                    </b></td></tr>
                    
                    <tr><td>
                        Price: <i><?php echo $row['price'] ?> Ks</i>
                    
                    </td></tr>
                      
                    <tr><td>
                        <button><a href="book-detail.php?id=<?php echo $row['id'] ?>"class="book-detail">Detail</a></button>
                        </td>
                    
                
             </tr>
             </td>
         </tr>
         <hr>
         </table> 
         <a href=""></a>
            
                                      
         <?php endwhile; ?>              
    <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
    <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
    
</div>

    
<ul class="pagination">
    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
    <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 10){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 10){
        
    if($page_no <= 4) {         
     for ($counter = 1; $counter < 8; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        }

     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {         
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                  
       }
       echo "<li><a>...</a></li>";
       echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
       echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                   
                }
            }
    }
?>
    
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
        } ?>
</ul>
</div>
	</div>
</center>
</body>
</html>