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

//include("access_perm.php");
  $p="add articles";
      if (Access_perm($p)){

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
         
         
<!-- post body -->

<form method="post" action="insertpost.php">
<table border="0" align="center" width="500">

<tr>
  <td>Title</td>
  <td><input type="text" name="title" size="30"/></td>
  <td></td>
</tr>
</br>
<tr>

  <td> </td>
  <td><textarea name="post" cols="50" rows="5"> </textarea></td>
  <td></td>
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
<tr>
  <td colspan="2" align="center"><input type="submit" value="Post"/></td>
</tr>
</body>
</table>
</form>
         
                  
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
