

<html>
    
    <?php
    include 'header.php';
    include 'dbh.php';
?>
        <body>
            
     
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
            <head>
                <title>Right Person</title>
    <link rel="stylesheet" type="text/css" href="style.css">
            </head>
          
        
               <?php
            
           
           
             
         if(isset($_SESSION['id'])){
             echo "Hello user" ;
             echo $_SESSION ['id'];
             
             $sql = "SELECT id, first, uid, last, email FROM newuser WHERE id = '" . $_SESSION['id'] . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. $row['uid']. " - Name: " . $row["first"]. " " . $row["last"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
            
              }
            else{
             echo "You are not logged in";
         }
        header('Location: index2.php');
        ?>
        
         <div id="search">
              <h1>Search</h1>
        <p>Please use the search box to search by industry or name</p><br>
    <div class="search-form">
        <form action=" " method="get">
            <div class="form-field">
            <input type="search" name="s" placeholder=" Search industry, example it, retail etc" results ="5" value="<?php $search_term =' '; echo $search_term; ?>">
             <input type="submit" value="Search">
            </div>
        </form>
        
        </div>
                </div>
         
        <?php 
        if(!empty($search_results)):?>
        <div class="results-count">
        <p><?php echo $search_results['count'];?> Results found</p>
        </div><br>
        
        <div class="results-table">
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
    
    
    </body>

</html>
