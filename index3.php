<<<<<<< HEAD:index3.php
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
=======
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
                        
             
             
             <?php
            
//check if search data was submitted
if(isset($_GET['s'])){
    //include the search class
    require_once( dirname( __FILE__ ) . '../class-search.php');
    
    //instantiate a new instance of the search class
    $search = new search();
    
    //store search term into variable
    $search_term = $_GET['s'];
    
    //send the search term to our search class and store the result
    $search_results = $search->search($search_term);
    
}

?>
<div align="center" id="search">
              <h1>Search</h1>
        <p>Please use the search box to search by industry or name</p><br>
    <div class="search-form">
        <form action=" " method="get">
            <div class="form-field">
            <input type="search" name="s" placeholder="Search industry, example it, retail etc" results ="5" value="
            <?php $search_term =' '; echo $search_term; ?>">
             <input type="submit" value="Search">
            </div>
        </form>
        
        </div>
                </div>
                <?php 
        if(!empty($search_results)):?>
        <div align="center" class="results-count">
        <p><?php echo $search_results['count'];?> Results found,
            </p>
   
            
        </div><br>
        
        <div class="col 1-1">
        <?php foreach($search_results['results'] as $search_result): ?>
            <div class="result">
            <p>First Name: <?php echo $search_result->first; ?></p>
                <p>Surname: <?php echo $search_result->last; ?></p>
                <p>Email Address: <?php echo $search_result->email; ?></p>
                <p>Industry: <?php echo $search_result->industry; ?></p>
                <p>Years Experience: <?php echo $search_result->years; ?></p><br><br>
            </div>
            <?php endforeach; ?>
            
        </div>
             <form action="includes/logout.inc.php" >
        <button>Clear List</button>
        </form>
      
        <?php endif; ?>
             
             </div>
             </div>            
        </div>
    </body>
</html>
>>>>>>> 01333f06c9ceac7fd571b146e2c449aa816f304a:candidate/index3.php
      