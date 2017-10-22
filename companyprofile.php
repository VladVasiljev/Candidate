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
            <img alt="Logo" src="img/logo.png">
        </center>
    </div>
</div>
<div class="row">
<div class="col-1-1">
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
        <div align="center"  id="search">
            <h1>Search for your Candidate</h1>
            <p>Please use the search box to search by industry or name</p><br>
                <div class="search-form">
                    <form action=" " method="get">
                        <div class="form-field">
                            <input type="search" name="s" placeholder="Search industry, example it, retail etc" results ="5" value=" ">
                                <?php $search_term =' '; echo $search_term; ?>">                                                                       
                                 <input type="submit" value="Search">
                        </div>
                    </form>

        </div>
                </div>
</div>
</div>


<div class="row">
    <div class="col-1-2">
                <?php
                if (isset($_SESSION['cid'])) {
                    echo "Hello, Welcome back.<br> Your user ID is: ";
                    echo $_SESSION['cid'];
                    
                    $sql    = "SELECT cid, name, username, position FROM company WHERE cid = '" . $_SESSION['cid'] . "'";
                    $result = mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo " <br>Company Name: " . $row['name'] . " <br> Username: " . $row["username"]." <br> Position: " .$row["position"] ;
                            echo "</br><a href=\"editProfileCompany.php?cid=$row[cid]\">Edit Profile</a>";
                            
                        }
                    } else {
                        echo "0 results";
                    }
                    
                    mysqli_close($conn);
                    
                } else {
                    echo "You are not logged in";
                }

                ?>
                    <form action="includes/logout.inc.php" >
                        <button>
                        LOG OUT
                        </button>
                    </form>

    </div>

<div class="col-1-2">
<p>This is the right side div- place content here</p>
             
</div>


        <?php 
        
if(!empty($search_results)):?>
<div align="center" class="results-count">
<p><?php echo $search_results['count'];?> Results found,
    </p></br>

    
</div><br>


<?php foreach($search_results['results'] as $search_result): ?>
<div align="center" class="col 1-1">
    
    <p>First Name: <?php echo $search_result->first; ?></p>
        <p>Surname: <?php echo $search_result->last; ?></p>
        <p>Email Address: <?php echo $search_result->email; ?></p>
        <p>Industry: <?php echo $search_result->industry; ?></p>
        <p>Years Experience: <?php echo $search_result->years; ?></p>
        <a href="#"><p>Contact Candidate</p></a><br><br>
    
    <?php endforeach; ?>
    </div>
    

 

<?php endif; ?>
</div>
<!-- /.row -->
</div><!-- /.wrapper -->
</body>

</html>