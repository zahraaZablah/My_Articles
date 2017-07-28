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
         
    if(isset($_SESSION['account'])){
    
       include("access_perm.php");
       
        $p="add articles";
         if (Access_perm($p)){
      
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
             $p2="delete articles";
                if (Access_perm($p2)){          
                     echo "<a href='index.php?page=deletepost&id=$id'>".
                    "<img src='images/delete.png' align='right' style='height:20px;padding-bottom:3px' > </img></a>";
                   } 
          //update
             $p3="update articles";
                 if (Access_perm($p3)){ 
                    echo "<a href='index.php?page=updatepost&id=$id'>".
                    "<img src='images/update.png' align='right' style='height:20px;padding-bottom:3px' > </img></a> ";
                    }   
                       
          }//not a user        
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
