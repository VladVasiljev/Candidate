<html>
        <?php
    include 'header.php';
    include 'dbh.php';
?>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>
    RightPerson
    </title>
    
</head>
         

<body>
  <div class="wrapper">
       <div class="row">
      <div class="col-1-1">
    
         <center> <img  src="img/logo.png" alt="Logo" max-width="100%" ></center>
           </div>
            <div class="col-2-1">
      <h2>User Details</h2>
       <?php
             if(isset($_SESSION['id'])){
             echo "Hello, your user ID is:" ;
             echo $_SESSION ['id'];
             
             $sql = "SELECT id, first, uid, last, email, years, industry, bio FROM newuser WHERE id = '" . $_SESSION['id'] . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo " <br>Username: " . $row['uid']. " <br> Name " . $row["first"]. " " . $row["last"].  " <br>Email: " . $row["email"]. "<br> Years Experience: " .$row["years"]."<br> Industry: " .$row["industry"]."<br>Bio: ".$row["bio"] ;
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
            
              }
            else{
             echo "You are not logged in";
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