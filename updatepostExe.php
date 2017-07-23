<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

<?php
$title1=$_POST["title"];
$post1=$_POST["post"];
$category=$_POST["categories"];
$id1=$_POST["no"];
echo $category."ll";
// connect to database
include("db.php");
// insert stmt
if(!empty($title1)&&!empty($post1)){

$sql="update articles set title='$title1', post='$post1',category='$category' where id='$id1' ";
// run
$conn->query($sql);
 echo '<script language="javascript">';
    echo 'alert("Updated √")';
    echo '</script>';
 echo'<meta http-equiv="refresh" content="0;url=index.php?page=feed"/>';

} 
else{
 echo '<script language="javascript">';
    echo 'alert("Please Enter All Fileds")';
    echo '</script>';
  echo'<meta http-equiv="refresh" content="0;url=index.php?page=updatepost"/>';
}
?>


</body>

</html>
