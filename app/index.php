 <?php
 session_start();
 include("search.lib.php");

    include("admin/confs/config.php");

    $cart = 0;
    if(isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $qty) {
            $cart += $qty;
        }
    }


       

    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }
    
    
    $total_records_per_page = 3;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";

    $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM books");
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
        $books = mysqli_query($conn, "SELECT * FROM books order by id desc limit $offset,$total_records_per_page  ");  
     }  
     if(isset($_GET['q'])) {
    $books = search_perform($_GET['q'], "books", "title");
  }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Store</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

	<div id="templatemo_body_wrapper">
    <div id="templatemo_wrapper">
        <div id="header" >
    	
            <div id="site_title">
               
                   <h3 class="glow">BOOK SHOP MYANMAR</h3>   </div>
                                  <div id="shopping_cart_box">
                <h3>Shopping Cart</h3>
                <p>Total <span><a href="view-cart.php" style="color: blue;">(<?php echo $cart ?>) items</a></span> in your cart</p>
            </div>         
    
        </div> <!-- end of templatemo_header -->
        
    <div id="templatemo_menu">
        
        <ul class="na">
        <li>
            <a href="#">Home</a>
        </li>     
        <li>
            <a href="best-seller.php">Best Seller</a>
        </li>     
        <li>
            <a href="test.php">Feedback</a>
        </li>     
         <li>
            <a href="admin/index.php"><img src="images/login.png" width="50" height="37"></a>
        </li>

              
              
    </ul> 
        
         
    </div> 
        
       
        
        
        <!-- end of templatemo_menu -->
        <div id="templatemo_content_wrapper">
        	
            <div class="templatemo_sidebar_wrapper float_l">
                <div class="templatemo_sidebar_top"></div>
                <div class="templatemo_sidebar">
                
                    <div class="sidebar_box">
            
                        <h2>Categories</h2>
                        <div class="sidebar_box_content">                      
                            <ul class="categories_list">
                                <?php
            while($row = mysqli_fetch_assoc($result)):

        ?>
                              <li><a href="index.php?cat=<?php echo $row['id'] ?>"><?php echo $row['name']?> </a></li>
                                <?php endwhile; ?>
                            </ul>
                            
                         </div>
    
                    </div>
                
                    <div class="sidebar_box">
                    
                        <h2>Free Books</h2>
                        
                  <div class="sidebar_box_content">
                        
                            <a href="#"><img src="images/templatemo_image_01.jpg" alt="product" width="160" height="120" /></a>
                            
                          <p>Praesent mi mi, suscipit non aliquam</p>
                            
                            <div class="discount"><span>30% off</span> | <a href="#">Read more</a></div>
                        
                        	<div class="cleaner"></div>
                        </div>
                        
                  </div>      
                
                </div> <div class="templatemo_sidebar_bottom"></div> <!-- end of sidebar -->
            </div> <!-- end of templatemo_sidebar_wrapper --> 
            
            <div id="templatemo_content">
            	
                <div id="banner">
                	<a href="index.php" target="_parent"><img src="images/books.jpg" alt="banner"  width="760" height="200" /></a>                
                </div>
            
           	  
                <div id="content_middle">
                	<h1 style="margin-left: 25px;padding: 20px;">Books</h1>

         <?php while($row = mysqli_fetch_assoc($books)): ?> 
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
<div>
    <form action="index.php" method="get" class="search">
        <input type="text" name="q" placeholder="Search by title">
        <input type="submit" value=" ">
      </form>

               
           </body>
</html>