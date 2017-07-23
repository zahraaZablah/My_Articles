<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php
include("db.php");
$role1=$_POST["role"];
if(!empty($role1)){
$sql="insert into roles values(0,'$role1')";
$r=$conn->query($sql);
if(!$r){
  echo '<script language="javascript">';
  echo 'alert("This role already exists")';
  echo '</script>';
  
  }
 else{
 
$sql2="select role_id from roles where role_name='$role1'";
$result=$conn->query($sql2);
$resultx=$result->fetch_assoc();
$role_id=$resultx[role_id];



$perm1=$_POST["perm"];
if(is_array($perm1)){
foreach ($perm1 as $perm_id){
 $role_perm="insert into role_perm values('$role_id','$perm_id')";
 $conn->query($role_perm);
 }
   echo '<script language="javascript">';
   echo 'alert("Added√")';
   echo '</script>';


    }
   else{
   echo '<script language="javascript">';
    echo 'alert("Please inter at least one permission")';
    echo '</script>';
    }
   
   
   
    }//exist
 
 
  }//!empty?
  
  else{
   echo '<script language="javascript">';
    echo 'alert("Please inter role name")';
    echo '</script>';
   }
  
?>
<meta http-equiv="refresh" content="0;url=index.php?page=role_perm"/>
</body>

</html>
