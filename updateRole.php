<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

<font color=326698 face=tahoma>
Update Roles
</font>
<hr width="80%" align=center>
<?php
 
 include("access_perm.php");
  $p="add roles";
      if (Access_perm($p)){

$roleid=$_GET['id'];
$psid=$_GET['psid'];

// text-> array
$pp_ids=explode(",",$psid);



$sql="select role_name from roles where role_id='$roleid'";
$r=$conn->query($sql);
$row=$r->fetch_assoc();
 
?>
<form method="post" action="updateroleexe.php">
<table border="0" align="center" width="585">

<input name='Hidden1' type='hidden' value=<?php echo $roleid ?> />

<tr>
  
  <td rowspan="2"><input type="text" name="role" size="30" value="<?php echo$row[role_name]; ?>"/></td>
  
  <?php
  include("db.php");    

 $sql2="select * from permissions ";
 $result2= $conn->query($sql2);
 

       while($resultx2=$result2->fetch_assoc())
{
   
   
  echo"<td><input type='checkbox' name='perm[]' value='$resultx2[perm_id]' "; if (in_array($resultx2[perm_id], $pp_ids)){echo checked ;}  echo " >".$resultx2[perm_desc]."</td>" ;
 }

echo'</tr>

<tr>
   
  <td colspan="3" align="right"><input type="submit" value="Update Role"/></td>
</tr>

</table>
</form>';
    }
    else
   echo "You do not have a permission to access this page";


?>

</body>

</html>
