<?php
session_start();
?>

<html dir=ltr>
<head>
<title>Control Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.style2 {
	font-size: xx-large;
}
</style>
</head>
<body >

<?php

$tite1=$_POST["title"];
$post1=$_POST["post"];
$categories1=$_POST["categories"];
$author1=$_SESSION['account'];
$date1=date("Y-m-d") ;
$time1=date("h:i:sa");

// connect to database
include("db.php");
// insert stmt
if(!empty($tite1)&&!empty($post1)){

$sql="insert into articles(title,post,author,date,category,time) values('$tite1','$post1','$author1','$date1','$categories1','$time1')";
// run
$conn->query($sql);
echo'<meta http-equiv="refresh" content="0;url=index.php?page=feed"/> ';

}
else
{
echo '<script language="javascript">';
echo 'alert("Please enter all fields")';
echo '</script>';

echo'<meta http-equiv="refresh" content="0;url=index.php?page=feed"/> ';


}

?>
</body>
</html>