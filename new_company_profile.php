<?php include 'header.php';?>
<?php
    
    require_once("company_session.php");
    require_once("class.company.php");
    $auth_company = new COMPANY();
    
    
    $company_id = $_SESSION['company_session'];
    
    $stmt = $auth_company->runQuery("SELECT * FROM company WHERE cid=:company_id");
    $stmt->execute(array(":company_id"=>$company_id));
   
    
    $companyRow=$stmt->fetch(PDO::FETCH_ASSOC);
    
?>


<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
</head>

<body>



   <!-- <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>-->

    <div class="container">

        <?php
            include_once 'configs/imageUploadConnection.php';
            $stmt = $conn->prepare("SELECT cid,userPic FROM company WHERE cid = '" . $_SESSION['company_session'] . "'");
            $stmt->execute();
            
        if ($stmt->rowCount() > 0) {
            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>

                <div class="col-1-1">
           
                    <!-- <p class="page-header"><?php echo $userName."&nbsp;/&nbsp;".$userProfession; ?></p> -->
                    <center><img src="company_images/<?php echo $row['userPic']; ?>" class="img-rounded" width="200px" height="200px" /></center>
                    <p class="page-header">
                        
                    </p>
                    
                    </div>
                           
                    <?php
            }
        } else {
            ?>
            <div class="col-xs-12">
                <div class="alert alert-warning">
                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
                </div>
            </div>
            <?php
        }
            
        ?>
     <div class="row">
    <div align="center" class="col-1-1">
    <a class="nav-item nav-link" href="logout.php?logout=true">Sign Out</a>
    <?php
        include_once 'configs/dbh.php';
    if (isset($companyRow['cid'])) {
        echo "Hello ". $companyRow['username'] ." your profile ID is:";
        echo $companyRow['cid'];
    }
                ?>
    <span>
    <a  href="editProfileCompany.php?cid=<?php echo $companyRow['cid']; ?>" title="click for edit"> <img id="edit" src="img/edit.png"></a> 
    </span>
    <?php echo   " <br><b>Username:</b> " . $companyRow['username'] . " <br> <b>Company Name:</b> " . $companyRow["name"] . "<br><b>Industry:</b> " . $companyRow["industry"] .  "<br><b>Position:</b> " . $companyRow["position"]; ?>
    </div>
</div>
<div class="row">
<div class="col-1-1">
<!-- Searching Database-->
<?php
                    
                //check if search data was submitted
if (isset($_GET['s'])) {
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
            <p>Please use the search box to search by industry or years experience</p><br>
                <div class="search-form">
                    <form action=" " method="get">
                        <div class="form-field">
                            <input type="search" name="s" placeholder="Search industry, example it, retail etc" results ="5" value="" class='auto'>
                                <?php $search_term ='';
                                echo $search_term; ?>                                                                      
                                 <button>Search</button>
                        </div>
                    </form>
                    

        </div>
                </div>
</div>
</div>

                    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
                    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    

                    <script type="text/javascript">
$(function() {
    
    //autocomplete
    $(".auto").autocomplete({
        source: "liveSearch.php",
        minLength: 1
    });                

});
</script>
            
    <!-- Search results-->
<div class="col-1-1">
<p>Results of your search appear here!</p>
<?php
        
if (!empty($search_results)) :?>
<div align="center" class="results-count">
<p><?php echo $search_results['count'];?> Candidates match your search,
    </p></br>
</div><br>
<?php foreach ($search_results['results'] as $search_result) : ?>
<!--Start of the profile card section-->
    <div class="namecard"></br>
    <div class="card">
        <div class="card_img">
    <img src="user_images/<?php echo $search_result->userPic; ?>" width="100%" height="100px" />
            </div>
    <h1><?php echo $search_result->first; ?></h1>
        <h1><?php echo $search_result->last; ?></h1>
        <p>Email Address: <?php echo $search_result->email; ?></p>
        <p>Industry: <?php echo $search_result->industry; ?></p>
        <p>Years Experience: <?php echo $search_result->years; ?></p> 
        <?php echo $search_result->user_cv; ?> <!--Displays link saved in database-->
       <!-- <?php echo "<iframe src=\"user_cv\" width=\"100%\" style=\"height:50%\"></iframe>";?>--> <!--Displays link saved in database in an iframe-->
      <div style="margin: 24px 0;">
            <a href="#"><i class="fa fa-twitter"></i></a>  
            <a href="#"><i class="fa fa-linkedin"></i></a>  
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-whatsapp"></i></a> 
        </div>
        <button>View CV</button><br><br>
   
        </div>
            </div>
    
    <?php endforeach; ?>
  
    

 

<?php endif; ?>

             
</div>
<<<<<<< HEAD
<?php include 'footer.php'?>
=======
    <?php include 'footer.php'?>
>>>>>>> ad206576df0a238bb80fd1a12cc689f6a19e26ae

</body>
</html>
