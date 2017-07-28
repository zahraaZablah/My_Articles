
<html dir=ltr>
<head>
<title>Control Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body >

<font color=326698 face=tahoma>
Add Users
</font>
<hr width="80%" align=center>
<?php

   include("access_perm.php");
    $p="add users";
      if (Access_perm($p)){

?>
<form method="post" action="insertuser.php">
<table border="0" align="center" width="500">
<tr>
  <td>User name</td>
  <td><input type="text" name="user" size="50" value="User name"/></td>
</tr>
<tr>
  <td> Psssword  </td>
  <td><input type="password" name="pass" size="50" /></td>
</tr>
<tr>
  <td>  Role </td>
  <td><select name="role"  >
  <?php
  include("db.php");
  $sql="select * from roles";
  $roleName=$conn->query($sql);
  while($roleNamex=$roleName->fetch_assoc())
  echo "<option value='$roleNamex[role_id]'>".$roleNamex[role_name]."</option>"; 
  
  ?>

      
  </select>
  </td>
</tr>
<tr>
  
  <td colspan="2" align="center"><input type="submit" value=" Add"/></td>
</tr>
</table>
</form>
<?php
}
else
echo "You do not have permission to access this page";


?>

 
 
 
</body>
</html>
