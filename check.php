<?php
session_start();
?>
<html dir=ltr>
<head>
<title>Control Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body >

 
  
<?php
 $user1=addslashes(strip_tags($_POST["user"]));
 $pass1=addslashes(strip_tags($_POST["pass"]));
  
 include("db.php");
 
//$sql="select * from users where username='$user1' and password=md5('$pass1')";
$sql="select u.username, r.role_id from users u left join user_role ur on u.user_id = ur.user_id right join roles r on r.role_id = ur.role_id where u.username='$user1' and u.password=md5('$pass1')";
 $result=$conn->query($sql);
 $resultx=$result->fetch_assoc();
// echo $resultx[username];
 if(!$resultx){
  // echo "role deleted";
   $sql2="select * from users where username='$user1' and password=md5('$pass1')";
   $result2=$conn->query($sql2);
   $resultx2=$result2->fetch_assoc();

  
  
 }
 if(isset($resultx[username]))
 {
 $_SESSION['account']=$resultx[username];
 $_SESSION['role_id']=$resultx[role_id];
 

echo'<meta http-equiv="refresh" content="0;url=index.php?page=feed"/>';

 }
 
 else if(isset($resultx2[username]))
 {
 $_SESSION['account']=$resultx2[username];
 
 echo'<meta http-equiv="refresh" content="0;url=index.php?page=feed"/>';

 }

 
 else
 {
 echo '<script language="javascript">';
 echo 'alert("incorrect username or password")';
 echo '</script>';

  
 echo '<meta http-equiv="refresh" content="0;url=index.php?page=login"/>';

 }

?>
</body>
</html>