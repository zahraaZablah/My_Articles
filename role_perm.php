<html dir=ltr>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body >

<font color=326698 face=tahoma>
Add Roles
</font>
<hr width="80%" align=center>
<?php
  include("db.php");
 //verification of access permission
      $role_id= $_SESSION['role_id'];
      $sql="select r.role_name, p.perm_desc from roles r left join role_perm rp on r.role_id = rp.role_id right join permissions p on p.perm_id = rp.perm_id WHERE r.role_id ='$role_id' ";
      $result=$conn->query($sql);
 
      $perm_decs=array();
      while($resultx=$result->fetch_assoc()){
        array_push($perm_decs,$resultx[perm_desc]);
       }
      if (in_array("add roles", $perm_decs)) {


?>

<form method="post" action="addrole.php">
<table border="0" align="center" width="585">
<tr>
  
  <td rowspan="2"><input type="text" name="role" size="30"/></td>
  
  <?php
  
      

 $sql2="select * from permissions ";
 $result2= $conn->query($sql2);
 

       while($resultx2=$result2->fetch_assoc())
{
   
   
  echo"<td><input type='checkbox' name='perm[]' value='$resultx2[perm_id]'>".$resultx2[perm_desc]."</td>";
    /*
    <td><input type="checkbox" name="perm" value="delete_art">Delete Articles</td>

</tr>
<tr>
<td><input type="checkbox" name="perm" value="add_art">Add Articles</td>
    <td><input type="checkbox" name="perm" value="delete_art">Delete Articles</td>
*/
}

echo'</tr>

<tr>
   
  <td colspan="3" align="right"><input type="submit" value="Add Role"/></td>
</tr>


</table>
</form>';

?>

<br/>
<hr width="80%" align=center>
<br/>
<table border="0" align="center" width="90%">
<tr bgcolor="#FF6600">
   <td><font color="white">#</font></td>
   <td><font color="white">Role Name</font></td>
   <td><font color="white">Permission descreptions</font></td>
   <td></td>
</tr>
<?php
$rp="SELECT r.role_name, r.role_id, GROUP_CONCAT( p.perm_desc ) FROM roles r LEFT JOIN role_perm rp ON r.role_id = rp.role_id RIGHT JOIN permissions p ON p.perm_id = rp.perm_id GROUP BY r.role_id";
$resultrp=$conn->query($rp);
 $count=1;
while($resultrpx=$resultrp->fetch_assoc()){
 if($count%2==0)
 echo "<tr bgcolor='#FFCC66'>";
 else
  echo "<tr>";
 echo "<td>".$count."</td>";
  echo "<td>".$resultrpx[role_name]."</td>";
  echo "<td>".$resultrpx['GROUP_CONCAT( p.perm_desc )']."</td>";
  //action col
  echo "<td>";
  echo "<a href='deleteRole.php?id=$resultrpx[role_id]' title='Delete role'>";
echo '<img src="images/delete.png" width=15 border=0/>';
  echo "</a>";
echo "&nbsp;&nbsp;&nbsp;   ";
  echo "</td>";
  
  echo "</tr>";
 
  $count++;

}

  }
else
echo "You do not have a permission to access this page";

  
?>
</table>

</body>
</html>


