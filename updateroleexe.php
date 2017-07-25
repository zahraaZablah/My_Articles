<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php
include("db.php");
$rolename=$_POST["role"];
$roleid=$_POST['Hidden1'];
$perm1=$_POST["perm"];

if(!empty($rolename)&&is_array($perm1)){
$sql="update roles set role_name='$rolename' where role_id='$roleid'";
$conn->query($sql);
 
 $del="delete from role_perm where role_id='$roleid'";
 $conn->query($del);


 foreach ($perm1 as $perm_id)
 {
$sql2="insert into role_perm values('$roleid','$perm_id')";
$conn->query($sql2);
  }

  echo '<script language="javascript">';
  echo 'alert("Updated √")';
  echo '</script>';


}
else{
  echo '<script language="javascript">';
  echo 'alert("Please inter role name and  his permissions")';
  echo '</script>';
  
  }


?>
<meta http-equiv="refresh" content="0;url=index.php?page=role_perm"/>

</body>

</html>
