<?php
include 'dbh.php';
include 'header.php';
require_once( dirname( __FILE__ ) . '../dbh.php');

?>


<html>
<head>
    <title>User Profile</title>
    </head>
<body>
    <div class="wrapper">
    <p>You are logged in, welcome to right person.ie</p>
       
        
  
        
     <form action="includes/logout.inc.php" >
        <button>
            
            LOG OUT
            </button>
        </form>
        </div>
    </body>
</html>