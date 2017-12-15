<?php include 'header.php';?>
<?php
/*
 * Classname new_company_profile.php
 *@reference http://www.codingcage.com/2016/02/upload-insert-update-delete-image-using.html
 *@reference http://www.codingcage.com/2015/04/php-login-and-registration-script-with.html
 *@reference https://daveismyname.blog/autocomplete-with-php-mysql-and-jquery-ui
 * @author Vladislavs Vasiljevs, x15493322
 * @author Paul Kinsella, x13125974
 */ 



    //require connection scripts
    require_once("company_session.php");
    require_once("class.company.php");
    $auth_company = new COMPANY();
    
    //assigning session id
    $company_id = $_SESSION['company_session'];
    
    //select all information from company table in database
    $stmt = $auth_company->runQuery("SELECT * FROM company WHERE cid=:company_id");
    $stmt->execute(array(":company_id"=>$company_id));
    $companyRow=$stmt->fetch(PDO::FETCH_ASSOC);
    
?>
<!-- Start of html-->
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
</head>
<body>
<!-- <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>-->
    <div class ="container">
    <div class ="row">
    <div align="center" class ="col-1-1">
    <div id ="details">
    
    <br>
      <center><h2>Company Details</h2></center>
   

        <?php
            include_once 'configs/imageUploadConnection.php';
            $stmt = $conn->prepare("SELECT cid,userPic FROM company WHERE cid = '" . $_SESSION['company_session'] . "'");
            $stmt->execute();
            
        if ($stmt->rowCount() > 0) {
            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>

               
           
                    <!-- <p class="page-header"><?php echo $userName."&nbsp;/&nbsp;".$userProfession; ?></p> -->
                    <center><img src="company_images/<?php echo $row['userPic']; ?>" class="img-rounded" width="200px" height="200px" /></center>
                    <p class="page-header">
                        
                    </p>
                    
                   
                           
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
    <div class = "UserInformation">
    <a  href="editProfileCompany.php?cid=<?php echo $companyRow['cid']; ?>" title="click for edit"> <img id="edit" src="https://png.icons8.com/edit-file/office/30/000000">Edit Profile</a>
	<a href="logout.php?logout=true"><img id="edit" src="https://png.icons8.com/export/office/30/000000"/>Sign Out</a>
    <!--<a href="logout.php?logout=true">Sign Out</a><br>-->
    <span></span> <br>
    <?php
        include_once 'configs/dbh.php';
    if (isset($companyRow['cid'])) {
        echo "Hello ". $companyRow['username'] ." your profile ID is:";
        echo $companyRow['cid'];
    }
                ?>
   
    <?php echo   " <br><b>Username:</b> " . $companyRow['username'] . " <br> <b>Company Name:</b> " . $companyRow["name"] . "<br><b>Industry:</b> " . $companyRow["industry"] .  "<br><b>Position:</b> " . $companyRow["position"]."<br>" ; ?><br>
    </div>
    </div>
    </div>
</div>
</div>
                 
<div class="col-1-1">
<!--
 * Classname new_company_profile.php
 *@reference https://www.youtube.com/watch?v=546sFEHUS_k
 * @author Paul Kinsella, x13125974
 */ -->

<!-- Searching Database-->

<?php
                    
                //check if search data was submitted for search input and years input
if (isset($_GET['s'], $_GET['y'],$_GET['l'])) {
//include the search class
    require_once( dirname( __FILE__ ) . '../class-search.php');

//instantiate a new instance of the search class
    $search = new search();

//store search term and years into variable's
    $search_term = $_GET['s'];
    $search_term2 = $_GET['y'];
    $search_term3 = $_GET['l'];

//send the search term to our search class and store the result
    $search_results = $search->search($search_term, $search_term2,$search_term3);
}
 ?>
        <div align="center"  id="search">
        <br><br>
            <h1>Search for your Candidate</h1><hr>
            <!--Search Instruction-->
            <img src="https://png.icons8.com/level-1/androidL/49/3498db">
            <h5> Choose Industry</h5><hr><br>
            <img src="https://png.icons8.com/circled-2-c/color/49/3498db">
            <h5> Choose Years Experience</h5><hr><br><img src="https://png.icons8.com/circled-3-c/color/49/3498db">
             <h5>Choose Location</h5><hr><br>
                <div class="search-form">
                    <form action=" " method="get">
                        <div class="form-field">
                            <!--Input for searching industry -->
                            <div class="form-field">
                            <input type="search" class="form-control" name="s" placeholder="Search industry, example it, retail etc" results ="5" value="" >
                            </div><br>
                            <!--Input for searching Years experience -->
                            <div class="form-field">
                            <input  type="number" class="form-control" name="y" placeholder="Number of years" results ="5" value="" >
                        </div><br>
                            <div class="form-group">
                            <!--Input for searching location -->
			<select type="location" name="l">
            <option value="antrim">Antrim</option>
				  <option value="antrim">Antrim</option>
                  <option value="armagh">Armagh</option>
                  <option value="carlow">Carlow</option>
                  <option value="clare">Clare</option>
                  <option value="cork">Cork</option>
                  <option value="derry">Derry</option>
                  <option value="donegal">Donegal</option>
                  <option value="down">Down</option>
				  <option value="dublin">Dublin</option>
				  <option value="fermanagh">Fermanagh</option>
				  <option value="galway">Galway</option>
				  <option value="kerry">Kerry</option>
				  <option value="kildare">Kildare</option>
				  <option value="kilkenny">Kilkenny</option>
				  <option value="laois">Laois</option>
				  <option value="leitrim">Leitrim</option>
				  <option value="limerick">Limerick</option>
				  <option value="longford">Longford</option>
				  <option value="louth">Louth</option>
				  <option value="mayo">Mayo</option>
				  <option value="meath">Meath</option>
				  <option value="monaghan">Monaghan</option>
				  <option value="offaly">Offaly</option>
				  <option value="roscommon">Roscommon</option>
				  <option value="sligo">Sligo</option>
				  <option value="tipperary">Tipperary</option>
				  <option value="tyrone">Tyrone</option>
				  <option value="waterford">Waterford</option>
				  <option value="westmeath">Westmeath</option>
				  <option value="wexford">Wexford</option>
				  <option value="wicklow">Wicklow</option>
                </select>
			
            </div>
                                <!--Echo results of search-->
                                <?php $search_term ='';
                                echo $search_term; ?>                                                                      
                                 <button>Search</button>
                        </div>
                    </form>
                    

        </div>
                </div>
</div>
</div>                  
                <!-- @author Vladislavs Vasiljevs, x15493322
                @reference https://daveismyname.blog/autocomplete-with-php-mysql-and-jquery-ui
                 -->
                    <!--External JS Links-->
                    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
                    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
                           <!-- Live search script-->
                           <script type="text/javascript">
                                
                            $(function() {
                                
                                //autocomplete
                                $(".form-control").autocomplete({
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
<h3><?php echo $search_results['count'];?> Candidates match your search,
</h3></br>
</div><br>
<?php foreach ($search_results['results'] as $search_result) : ?>
<!--Start of the candidate profile card section-->
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
        <p>Location: <?php echo $search_result->location; ?></p> 
      <!--  <?php echo $search_result->user_cv; ?>--> <!--Displays link saved in database-->
       <!-- <a href="user_cv/<?php echo $search_result->user_cv?>"target=_blank>View Cv</a>--><!--View cv-->
     <div style="margin: 24px 0;">
            <a href="#"><i class="fab fa-twitter"></i></a>  
            <a href="#"><i class="fab fa-linkedin"></i></a>  
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a> 
        </div>
      <form action="user_cv/<?php echo $search_result->user_cv?>"target=_blank>
        <button>View CV</button><br><br>
    </form>
        </div>
            </div>
            
    <?php endforeach; ?>
  
    

 

<?php endif; ?>

          
</div>
<!--link to footer-->
<?php include 'footer.php'?> 
</body>
</html>
