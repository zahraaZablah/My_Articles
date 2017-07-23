<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<br/><br/>
<?php
$id1=$_GET['id'];

  include("db.php");
    
     $sql="select * from articles where id=$id1 ";
     $result= $conn->query($sql);
     $resultx=$result->fetch_assoc();
    $resultx[post];
   echo' <font style="font:message-box">'.$resultx[post].'</font>';
   
   ?>
</body>

</html>
