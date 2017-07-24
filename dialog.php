<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Articles</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>
<body>
<?php
//verification of access permission
     include("db.php");

      $role_id= $_SESSION['role_id'];
      $sql="select r.role_name, p.perm_desc from roles r left join role_perm rp on r.role_id = rp.role_id right join permissions p on p.perm_id = rp.perm_id WHERE r.role_id ='$role_id' ";
      $result=$conn->query($sql);
 
      $perm_decs=array();
      while($resultx=$result->fetch_assoc()){
        array_push($perm_decs,$resultx[perm_desc]);
       }
      if (in_array("add articles", $perm_decs)) {

?>


<div class="container">
  
  
  <!-- Trigger the modal with a button -->
    <button style="background:orange; font-weight:bold;caption; color:white; border-bottom-color:gray; width:100px;height:40px " type="button" data-toggle="modal" data-target="#myModal">Add Article</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Article</h4>
        </div>
        <div class="modal-body">
          <p>
       <!-- post structure -->
         <?php
         include("post.php");
         ?> 
                  
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<?php
}
else
echo "You do not have permission to access this page";


?>

</body>
</html>