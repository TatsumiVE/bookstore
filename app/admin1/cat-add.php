<?php
include("confs/config.php");
$name = $_POST['name'];
$sql = "INSERT INTO categories (name,created_date,
modified_date) VALUES ('$name',now(), now())";
mysqli_query($conn, $sql);
header("location: cat-list.php");
?>