
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comment box</title>
</head>
 
<body>
<center>
<form action="add-comment.php" method="POST">
<table>
<tr><td>Name: <br><input type="text" name="gmail"></td></tr>
<tr><td colspan="2">Comment: </td></tr>
<tr><td colspan="5"><textarea name="comment" rows="10" cols="50"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" name="submit" value="Comment"></td></tr>
</table>
</form>
<?php
include("admin/confs/config.php"); 
$getquery=mysqli_query($conn,"SELECT * FROM comment ORDER BY id DESC");
while($rows=mysqli_fetch_assoc($getquery))
{
$id=$rows['id'];
$name=$rows['gmail'];
$comment=$rows['comment'];
echo $name . '<br/>' . '<br/>' . $comment . '<br/>' . '<br/>' . '<hr size="1"/>'
;}
?>
 
</body>
</html>

