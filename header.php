
<?php
 //session_start();

 
?>
<!doctype html>
<html lang="en">
      <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link href="bootstrap/css/custom.css" rel="stylesheet" />
        <meta charset="UTF-8">
        <title>Uemployed</title>
        <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    </head>
    <body>
     <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
               <!-- <img id="nav-logo" src="img/new-logo.png"/>-->
                   <div class="navbar-nav">
                        <a class="nav-item nav-link" href="home.php">Home</a>
                        <a class="nav-item nav-link" href="company_signup.php">Company</a>
                        <a class="nav-item nav-link" href="signup.php">User</a>
                        <a class="nav-item nav-link" href="contact.php">Contact</a>
                    
                      <!--  <a class="nav-item nav-link" href="logout.php?logout=true">Sign Out</a>-->
                     </div>
                     </div>
                 </nav>
         <?php
if(isset($_SESSION['id'])){
    echo"  <a class='nav-item nav-link' href='logout.php?logout=true'>Sign Out</a>  ";
}

?>

                    <img id="MainLogo" src="img/main_logo.png">
                    
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
         </body>

     </html>