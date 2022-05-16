<?php  

include("confs/config.php");
  $id = $_GET['id'];
    $sql = "DELETE FROM member WHERE id = $id";
     mysqli_query($conn, $sql);
       header("location: member.php"); 
       ?>