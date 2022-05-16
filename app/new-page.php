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
        $books = mysqli_query($conn, "SELECT * FROM books where quantity>0 order by id desc limit $offset,$total_records_per_page  ");  
     }  
     if(isset($_GET['q'])){
    $books = search_perform($_GET['q'], "books",$_GET["choice"]);
   }
  
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="new-page.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body><center>
	<div id="head">
		<div id="title">
			BookShop
		</div>
		<div id="nav">
			<ul>
				<li class="nav"><a href="new-page.php" style="text-decoration: none;">Home</a></li>
				<li class="nav"><a href="best-seller.php" style="text-decoration: none;">Best Seller</a></li>
				<li class="nav"><a href="comment.php" style="text-decoration: none;">Feeback</a></li>
				<li class="nav"><a href="admin/index.php" style="text-decoration: none;">Signin</a></li>
        <li class="nav"><a href="registration.php" style="text-decoration: none;">Registrtion</a></li>

				
			</ul>
		</div>
	</div>
	<div id="content">
		<div class="slideshow-container">

			<div class="mySlides fade">
  				<div class="numbertext">1 / 3</div>
  				<img src="images/b.jpg" style="width:100%; height: 300px;">
			</div>

			<div class="mySlides fade">
  				<div class="numbertext">2 / 3</div>
  				<img src="images/c.jpg" style="width:100%; height: 300px;">
			</div>

			<div class="mySlides fade">
  				<div class="numbertext">3 / 3</div>
  				<img src="images/d.jpg" style="width:100%; height: 300px;">
			</div>

		</div>
		<br>

		<div style="text-align:center">
  		<span class="dot"></span> 
  		<span class="dot"></span> 
  		<span class="dot"></span> 
	</div>
</div>
</center>
<div id="wrap">
	<div id="category">
				<ul>
					<br>
					<hr style="color: white; margin-left: 10%; margin-right: 10%;">
					<li class="category search">
						<form action="new-page.php" method="get" class="search">




              <select name="choice">
                <option value="title">Title</option>
                  <option value="author">Author</option>
                  <option value="publisher">Publisher</option>
                  <option value="year">Year</option>
              </select>
             
        					<input type="text" name="q" placeholder="Search by title">
        					<input type="submit" value=" ">
      					</form>
					</li>
					
					<hr style="color: white; margin-left: 10%; margin-right: 10%;">
					 <h2 style="margin-left: 70px; color: black;">Categories</h2>
                        <div class="sidebar_box_content">                      
                            <ul class="categories_list">
                                <?php
            						while($row = mysqli_fetch_assoc($result)):
        						?>
                              <li><a href="new-page.php?cat=<?php echo $row['id'] ?>"><?php echo $row['name']?> </a></li>
                                <?php endwhile; ?>
                            </ul>
                            
                         </div>
    
					<hr style="color: white; margin-left: 10%; margin-right: 10%;">
				</ul>
			</div>
			<div class ="main">
				<h1 style="margin-left: 25px;padding: 20px;">Books</h1>
				<?php while($row = mysqli_fetch_assoc($books)): ?> 
         			<table width="760">
             			<tr>
                 			<td rowspan="5" width="200"><a href="book-detail.php?id=<?php echo $row['id'] ?>"><img src="admin/cover/<?php echo $row['cover'] ?>" height="90" width="150"></a>
                 			</td>
                 			<td>
                    			<tr>
                    				<td>                     
                        				<b>Title: </b><a href="book-detail.php?id=<?php echo $row['id'] ?>" style="text-decoration: none;"><?php echo $row['title'] ?> </a>
                    				</td>
                    			</tr>
                    
                    			<tr>
                    				<td>
                        				<b>Price: </b><i><?php echo $row['price'] ?> Ks</i>

                       				</td>
                    			</tr>
                      
                   				<tr>
                   					<td>
                        				<button style="background-color: white"><a href="book-detail.php?id=<?php echo $row['id'] ?>"class="book-detail" style="text-decoration: none;">Detail</a></button>
                        			</td>
                    			</tr>
             				</td>
         				</tr>
         				<hr>
         			</table>                                       
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
        				for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) 
        				{         
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

        				for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) 
        				{
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
    		<?php 
    			if($page_no < $total_no_of_pages){
        			echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
        		} 
        	?>
		</ul>
		</div>
		</div>
			<div id="footer">
				
			</div>
		</div>
			<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides,1000); // Change image every 2 seconds
}
</script>
</body>
</html>