<?php

include 'header.php';
    include 'dbh.php';




?>


<html>
    <head>
    <meta charset="UTF-8">
    <title>Candidate</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src = "js/form.js"></script>
    </head>
    
    <body>
         <div class="wrapper">
       <div class="row">
      <div class="col-1-1">
        
       <!-- <center> <img  src="img/logo.png" alt="Logo" max-width="100%" ></center>-->
          
         
                        <div align="center" >
                       
                     
                            <?php
                           
                
                                if(isset($_SESSION['id'])){
                                    echo"You are currently logged in, continue to your profile";
                             echo" <form action='userprofile.php' >
        <button>Profile</button>
        </form>";
                         } 
                         
                         else{
                                    echo"<h1>Candidate Login</h1>";
                             echo" <form action='includes/login.inc.php' method='POST'>
                              <input type ='text' name='uid' placeholder='Username' required>
                               <input type ='password' name='pwd' placeholder='Password' required>
                               <button type ='submit'>Login</button>
                               </form>";

                             
                                
                               
                               
                              
                                    
                         }
                          

                            ?>

                            
                        
                            </div>
                        
             
             
           
             
             </div>
             </div>            
        </div>
        
    </body>
</html>
      