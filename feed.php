<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Feed</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

</head>
<body>
</br>
   <?php
 include("db.php");

   //get permissions by role_id
         
    if(isset($_SESSION['account'])){
      $role_id= $_SESSION['role_id'];
      $sql="select r.role_name, p.perm_desc from roles r left join role_perm rp on r.role_id = rp.role_id right join permissions p on p.perm_id = rp.perm_id WHERE r.role_id ='$role_id' ";
      $result=$conn->query($sql);
 
      $perm_decs=array();
      while($resultx=$result->fetch_assoc()){
        array_push($perm_decs,$resultx[perm_desc]);
       }
      if (in_array("add articles", $perm_decs)) {
                    include("dialog.php");
         }
   } //Not a user, already has the view permission only
     
  
    
       
        
        
    
     $sql="select * from articles ORDER BY id DESC ";
     $result= $conn->query($sql);
       while($resultx=$result->fetch_assoc())
       {
 
    
    $title=$resultx[title];
    $post=$resultx[post];
    $author=$resultx[author];
    $date=$resultx[date];
    $category=$resultx[category];
    $id=$resultx[id];
       
 
        
  
     
     

         // Post
  
             echo '<div class="templatemo_post"> 
                
                	<div class="templatemo_post_top">
                    	<h1>'."$title".'</h1>
                                   
                    	                    
                    </div>
                    <div class="templatemo_post_mid_top">
                    </div>
                    
                    
              <div class="templatemo_post_mid"><p style="font-size:medium">';
              
          if(strlen($post)<500)
              echo $post;
         else  {
          // truncate string
           $stringCut = substr($post, 0, 500);

    // make sure it ends in a word so assassinate doesn't become ass...
        $string = substr($stringCut, 0, strrpos($stringCut, ''))."... <a href='index.php?page=seemore&id=$resultx[id]' >See More </a>"; 

          echo $stringCut.$string;
         
            }
                    	                        
                   echo'<div class="clear"></div>
                        
                    </div>
                    <div class="templatemo_post_bottom">
                    <span class="post">'.'Posted By: '."$author".' |  Category:'."$category".' | Added: '."$date"
                    ;
          //delete          
          if(isset($_SESSION['account'])){
                    
         if (in_array("delete articles", $perm_decs)) {             
                     echo "<a href='deletepost.php?id=$id'>".
                    "<img src='images/delete.png' align='right' style='height:20px;padding-bottom:3px' > </img></a>";
                   } 
          //update
           if (in_array("update articles", $perm_decs)) {         
                    echo "<a href='index.php?page=updatepost&id=$id'>".
                    "<img src='images/update.png' align='right' style='height:20px;padding-bottom:3px' > </img></a> ";
                    }   
                       
          }//not au user        
                    echo "</span>"
                    ."</div>"
                    ."</div>";
                        
                  

				
		 }
		 
		           $sql2="select count(*) as mycount from articles";
			       $result2= $conn->query($sql2);
                   $resultx2=$result2->fetch_assoc();
                    if ($resultx2["mycount"]==0)
                    echo "<hr/><font color='red'>There is no articles yet</font>";

   ?>
 
           


</body>

</html>
