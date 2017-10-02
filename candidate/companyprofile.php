<html>
        <?php
    include 'header.php';
    include 'dbh.php';
?>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>
    Candidate
    </title>
    
</head>
         

<body>
  <div class="wrapper">
       <div class="row">
      <div class="col-1-1">
    <center> 
        <img  src="img/logo.png" alt="Logo" max-width="100%" >
    </center>
     </div>
            <div class="col-2-1">
      <h2>Company Details</h2>
<?php
                
     if(isset($_SESSION['id'])){
     echo "Hello, your user ID is:" ;
     echo $_SESSION ['id'];
}
        
          ?>
           <form action="includes/logout.inc.php" >
        <button>
            
            LOG OUT
            </button>
        </form>
      </div></div>
    <div class="row">
      <div class="col-1-2">
        <h2>Bio</h2>
     
      </div>
      
    </div><!-- /.row -->
  </div><!-- /.wrapper -->
</body>

</html>