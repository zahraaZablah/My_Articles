<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

<?php
echo"Home >> Search Results <hr/>";
$type1=$_POST["type"];
$new1=$_POST["new"];
if(!empty($new1)){

include("db.php");
  if($type1==author){
  echo"  $new1 Articles";
 //  $sqlauthor="select * from articles where author like '%$new1%'";
 $sqlauthor="select * from articles where author='$new1'";
   $resultauthor= $conn->query($sqlauthor);
   
  if(!$resultauthor) 
    echo "<br/><font color='red'>No Result</font>";
  else{
    while($resultauthorx=$resultauthor->fetch_assoc()){
    $title=$resultauthorx[title];
    $post=$resultauthorx[post];
    $author=$resultauthorx[author];
    $date=$resultauthorx[date];
    $category=$resultauthorx[category];
    $id=$resultauthorx[id];
    
    
    

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
                          
      
                    
                    echo "</span>"
                    ."</div>"
                    ."</div>";
                        
                  
           } //while
    
         }   //check resultauthor 

        
      }
         else{
       // search based on title  
       
       
           echo" Articles with similar titles to $new1";
   $sqltitle="select * from articles where title like '%$new1%'";
   $resulttitle= $conn->query($sqltitle);
   
  if(!$resulttitle) 
    echo "<br/><font color='red'>No Result</font>";
  else{
    while($resulttitlex=$resulttitle->fetch_assoc()){
    $title=$resulttitlex[title];
    $post=$resulttitlex[post];
    $author=$resulttitlex[author];
    $date=$resulttitlex[date];
    $category=$resulttitlex[category];
    $id=$resulttitlex[id];
    
    
    

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
                          
        
                    
                    echo "</span>"
                    ."</div>"
                    ."</div>";
                        
                  
           } //while
    
         }   //check resulttitle

      } //search by title 
       

   }//check empty
   else echo "<br/><font color='red'>Please Enter Search field</font>";
        

     
   
?>
</body>

</html>
