<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>
<body>
<?php
$id1=$_GET["id"];
include("db.php");
$sql="select * from articles where id='$id1'";
$result=$conn->query($sql);
$resultx=$result->fetch_assoc();
 

?>
<br/>
<form method="post" action="updatepostExe.php">

<table border="0" align="center" width="500">
<tr>
  <td>Title</td>
  <td><input type="text" name="title" size="50" value="<?php  echo $resultx[title];   ?>"/></td>
</tr>
<br/>
<tr>
  <td>Body</td>
  <td><textarea name="post" rows="8" cols="45"  ><?php  echo $resultx[post];   ?></textarea></td>
</tr>
<tr> 
  <td></td>
   <td colspan="2">categories
    <select name="categories" >
    <option>Computers and Electronics </option>
    <option>Arts and Entertainment </option>
    <option>Cars and other vehicles</option>
    <option>Education and Communications</option>
    <option>Family Life</option>
    <option>Finance and Business</option>
    <option>Health</option>
    <option>Hobbies and Crafts</option>
    <option>Holidays and Traditions</option>
    <option>Home and Garden</option>
    <option>Personal Care and Style</option>
    <option>Pets and Animals</option>
    <option>Philosophy and Religion</option>
    <option>Relationships</option>
    <option>Travel</option>
    <option>Work World</option>
    <option>Youth</option>
    <option>Other</option>

  </select></td>

</tr>

<?php
 echo " <input type='hidden' name='no' value='$id1' /> ";
 ?>
  <td colspan="2" align="center"><input type="submit" value= "update"/></td>
</tr>


</table>
</form>

</body>

</html>
