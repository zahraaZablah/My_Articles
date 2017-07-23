
<html dir=rtl>
<head>
<title>Control Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.style2 {
	font-size: xx-large;
}
</style>
</head>
<body >

<?php
$user1=$_POST["user"];
$pass1=$_POST["pass"];
//role id
$role1=$_POST["role"];


// connect to database
include("db.php");
// insert stmt
if(!empty($user1)&&!empty($pass1)){

$sql="insert into users values(0,'$user1',md5('$pass1'))";
  
// run
$result=$conn->query($sql);

 if(!$result){
  echo '<script language="javascript">';
  echo 'alert("This user already exists...choose another username")';
  echo '</script>';
  }
   else {
    echo '<script language="javascript">';
    echo 'alert("Added√")';
    echo '</script>';
    
    //user id
    $sql="select user_id from users where username='$user1' and password=md5('$pass1')";
    $result=$conn->query($sql);
    $resultx=$result->fetch_assoc();
    $user_id=$resultx[user_id];
   
   //insert into user_role table
    $user_role="insert into user_role values('$user_id','$role1')";
    $conn->query($user_role);

  
   }
  }
else
{

echo '<script language="javascript">';
echo 'alert("Please enter all fields")';
echo '</script>';
}



?>

<meta http-equiv="refresh" content="0;url=index.php?page=users"/> 
</body>
</html>