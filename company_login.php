<?php
include 'header.php';
include 'configs/dbh.php';
?>


<html>
    <head>
    <meta charset="UTF-8">
    <title>Candidate</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>
         <div class="wrapper">
       <div class="row">
      <div class="col-1-1">
        
       <!-- <center> <img  src="img/logo.png" alt="Logo" max-width="100%" ></center>-->
          
         
                        <div align="center" class="form">
                        
                      
                            <?php
                                  if(isset($_SESSION['cid'])){
                                    echo"You are currently logged in, continue to your profile";
                             echo" <form action='userprofile.php' >
        <button>Profile</button>
        </form>";
                         } else{
                                    echo"<h1>Company Login</h1>";
                              echo" <form action='includes/company.login.inc.php' method='POST'>
                                <input type ='text' name='username' placeholder='Username'required>
                                <input type ='password' name='pwd' placeholder='Password'required>
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
