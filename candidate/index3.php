<?php

include 'header.php';
    include 'dbh.php';




?>


<html>
    <head>
    <meta charset="UTF-8">
    <title>Right Person</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>
         <div class="wrapper">
       <div class="row">
      <div class="col-1-1">
        
        <center> <img  src="img/logo.png" alt="Logo" max-width="100%" ></center>
         
                        <div align="center" class="form">
                            <?php
                
                                if(isset($_SESSION['id'])){
                                    echo"You are currently logged in, continue to your profile";
                             echo" <form action='userprofile.php' >
        <button>Profile</button>
        </form>";
                         } else{
                                    echo"<h1>User Login</h1>";
                              echo" <form action='includes/login.inc.php' method='POST'>
                                <input type ='text' name='uid' placeholder='Username'>
                                <input type ='password' name='pwd' placeholder='Password'>
                                <button type ='submit'>Login</button>
                                </form>";
                                    
                                       echo"<h1>Company Login</h1>";
                              echo" <form action='includes/company.login.inc.php' method='POST'>
                                <input type ='text' name='uid' placeholder='Username'>
                                <input type ='password' name='pwd' placeholder='Password'>
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
      