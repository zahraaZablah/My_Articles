<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php
 include("access_perm.php");
  $p="add roles";
    if (Access_perm($p)){

$id1=$_GET["id"];
 
// connect to database
include("db.php");
 $sql="delete from roles where role_id='$id1'";
 $conn->query($sql);
     }
else
echo "You do not have permission to access this page";


?>

 <meta http-equiv="refresh" content="0;url=index.php?page=role_perm"/>
</body>

</html>
