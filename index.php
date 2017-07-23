<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MY Articles</title>

<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
  
</head>
<body>
	<div id="templatemo_background_section_top">
	  <div class="templatemo_container">
	    <div id="templatemo_header">
	    
	   
		            
  <!--search-->
    </br>
    <h5 align="right" ></p>
    <form method="post" action="index.php?page=viewsearchres">
     <select name="type">
       <option value="author">Author</option>
       <option value="title">Title  </option>
      </select>
        <input type="text" name="new"   />
        <input type="submit" value="GO"/>

     </form>
     
    </h5>
         
	      <div id="templatemo_logo_section">
	      	        <h1>MY Articles</h1>            
			</div>
               
    </div><!-- end of headder -->
                
    		<div id="templatemo_menu_panel">
    			<div id="templatemo_menu_section">
    			
            		<ul>
            	       <li id="welcome">
            	       <?php
            	          if(isset($_SESSION['account'])){
            	            echo "Welcome"."&nbsp";
            	            echo $_SESSION['account'];
            	            } 
            	        ?>
            	       </li>	
		                <li><a href="index.php?page=feed"  class="current">Home</a></li>
        		        



     <?php
             
   //get permissions by role_id
      include("db.php");   
    if(isset($_SESSION['account'])){
      $role_id= $_SESSION['role_id'];
      $sql="select r.role_name, p.perm_desc from roles r left join role_perm rp on r.role_id = rp.role_id right join permissions p on p.perm_id = rp.perm_id WHERE r.role_id ='$role_id' ";
      $result=$conn->query($sql);
 
      $perm_decs=array();
      while($resultx=$result->fetch_assoc()){
        array_push($perm_decs,$resultx[perm_desc]);
       }
      
     
  
      if (in_array("add roles", $perm_decs)) {

           echo' <li><a href="index.php?page=role_perm"  >Add Roles</a></li>';
        }
      
       if (in_array("add users", $perm_decs)) {
            echo' <li><a href="index.php?page=users"  >Add Users</a></li>';
            }
            
        echo'<li><a href="index.php?page=logout" >Logout</a></li>';
     
         
       } //Not a user
       else
        echo'<li><a href="index.php?page=login" >Login</a></li>';

                     ?>
    
         </ul>   

				</div>
               
		    </div> <!-- end of menu -->
            
		</div><!-- end of container-->
        
	</div><!-- end of templatemo_background_section_top-->
    
    <div id="templatemo_background_section_middle">
    
    	<div class="templatemo_container">
        
        	<div id="templatemo_left_section">
        	
        	
         <!-- content -->
        <?php
        $page1=$_GET["page"];
  
          $path=$page1.".php";// path of subpages
           if(is_file($path))
             include($path);
          else
             include("a.php");
         
           ?>
        <!-- end of content -->

        	
        	
        	
            
		                
            </div><!-- end of left section-->
            
            <div id="templatemo_right_section">
            	
                <div class="templatemo_section_box">
                	<div class="templatemo_section_box_top">
                    	<h1>Advertisements</h1>
                    </div>
					<div class="templatemo_section_box_mid">
                   		
						<img alt="125x125 Banner"  src="images/templatemo_ads.jpg" /> 
                    	<img alt="Advertise Here"  src="images/templatemo_ads.jpg"/>
                    	<img alt="Advertisement"  src="images/templatemo_ads.jpg"/>
                        <img alt="Your Banner"  src="images/templatemo_ads.jpg"/>
                        
                        <div class="clear">&nbsp;</div>
					</div>
                    <div class="templatemo_section_box_bottom"></div>
                </div><!-- end of section box -->
                
                <div class="templatemo_section_box">
                	<div class="templatemo_section_box_top">
                    	<h1>About This Blog</h1>
                    </div>
					<div class="templatemo_section_box_mid">
                   		
						<p>This free website blog layout is provided by <a href="http://www.templatemo.com" target="_parent">templatemo.com</a> website. You may download, modify and apply this layout for any web blog CMS templates.</p>
					</div>
                    <div class="templatemo_section_box_bottom"></div>
                </div><!-- end of section box -->
                
                <div class="templatemo_section_box">
                	<div class="templatemo_section_box_top">
                    
                    	<h1>Categories</h1>
                        
                    </div>
					<div class="templatemo_section_box_mid">
                   		
						<ul>
                        	<li><a href="index.php?page=categories&category=Computers and Electronics">Computers and Electronics</a></li>
                            <li><a href="index.php?page=categories&category=Education and Communications">Education and Communications</a></li>
                            <li><a href="index.php?page=categories&category=Arts and Entertainment" >Arts and Entertainment</a></li>
                            <li><a href="index.php?page=categories&category=Cars and other vehicles" >Cars and other vehicles</a></li>
                            <li><a href="index.php?page=categories&category=Family Life">Family Life</a></li>
                            <li><a href="index.php?page=categories&category=Finance and Business" >Finance and Business</a></li>
                            <li><a href="index.php?page=categories&category=Health" >Health</a></li>
                            <li><a href="index.php?page=categories&category=Hobbies and Crafts" >Hobbies and Crafts</a></li>
                            <li><a href="index.php?page=categories&category=Holidays and Traditions">Holidays and Traditions</a></li>
                            <li><a href="index.php?page=categories&category=Home and Garden">Home and Garden</a></li>
                            <li><a href="index.php?page=categories&category=Personal Care and Style" >Personal Care and Style</a></li>
                            <li><a href="index.php?page=categories&category=Pets and Animals" >Pets and Animals</a></li>
                            <li><a href="index.php?page=categories&category=Philosophy and Religion">Philosophy and Religion</a></li>
                            <li><a href="index.php?page=categories&category=Relationships" >Relationships</a></li>
                            <li><a href="index.php?page=categories&category=Travel" >Travel</a></li>
                            <li><a href="index.php?page=categories&category=Work World" >Work World</a></li>
                            <li><a href="index.php?page=categories&category=Youth">Youth</a></li>
                            <li><a href="index.php?page=categories&category=other">other</a></li>

                            


                        </ul>
					</div>
                    <div class="templatemo_section_box_bottom"></div>
                </div><!-- end of section box -->

            </div><!-- end of right Section -->

        </div><!-- end of container-->

	</div><!-- end of background middle-->
    
    <div id="templatemo_bottom_section">
    	<div class="templatemo_container">
        	<div id="templatemo_footer">
            	Copyright © 2017 zahraa
                          </div>
        </div>
</div><!-- end of background bottom-->
</html>