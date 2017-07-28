<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php
  function Access_perm($perm){
     include("db.php");
        $role_id= $_SESSION['role_id'];
      $sql="select r.role_name, p.perm_desc from roles r left join role_perm rp on r.role_id = rp.role_id right join permissions p on p.perm_id = rp.perm_id WHERE r.role_id ='$role_id' ";
      $result=$conn->query($sql);
 
      $perm_decs=array();
      while($resultx=$result->fetch_assoc()){
        array_push($perm_decs,$resultx[perm_desc]);
       }
      if (in_array($perm, $perm_decs)) 
      return true;
      else
      return false;
            
      }
     
?>
</body>

</html>
