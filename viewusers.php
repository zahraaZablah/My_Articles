<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
</head>

<body>

<?php

include("db.php");
$sql1="select username from users ";
 $resultUser=$conn->query($sql1);
  echo"<tr>";
 while($resUser=$resultUser->fetch_assoc()){
 
 echo $resUser[username]."<br/>";
 }

?>
</body>

</html>
