<?php include 'header.php';
include_once("configs/dbh.php");?>
<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM newuser WHERE id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	
?>
<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link href="bootstrap/css/custom.css" rel="stylesheet" />
<title>welcome - <?php print($userRow['id']); ?></title>
</head>

<body>

<form method="" enctype="multipart/form-data" class="form-horizontal" role="form" id="userProfileForm">
	<div class="container">
    <h3>Hello <?php echo $userRow['first']; ?> <?php echo $userRow['last'];?> Welcome To Your Profile Page</h3>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-1-2">
        <div class="text-center">
		<!--user image display -->
		<img src="user_images/<?php echo $userRow['userPic']; ?>" height="250" width="250" class="rounded-circle" alt="avatar" />
		  <!-- <input class="btn-primary" type="file" name="user_image" class="form-control" accept="image/*">
		  <p><b>Image upload</b></p>
		  <input class="btn-primary" type="file" name="user_cv" class="form-control" accept="file_extention/*">
		  <p><b>CV upload</b></p>
		  -->
        </div>
		<div class="editview">
		<a  href="editProfile.php?id=<?php echo $userRow['id']; ?>" title="click for edit"> <img id="edit" src="img/edit.png">Edit Profile</a>
		<a  href="user_cv/<?php echo $userRow['user_cv']; ?>" title="Click To View CV"> <img id="edit" src="img/edit.png">View CV</a>
	  </div>
	  </div>

	  
	  <div class="col-1-2">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <!-- <i class="fa fa-coffee"></i> --> 
          Please Fill In <strong>All Fields</strong> Before Saving Changes.
        </div>
		
		<h3>Personal information</h3>
	
    <?php
	if(isset($errMSG)){
		?>
        <div>
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>

   
    
		<div class="form-group">
            <label class="col-lg-3 control-label">First Name:</label>
            <div class="col-lg-8">
			<input class="form-control" type="text" name="first_name" readonly value="<?php echo $userRow['first']; ?>" />
            </div>
		</div>
		
		<div class="form-group">
            <label class="col-lg-3 control-label">Last Name:</label>
            <div class="col-lg-8">
			<input class="form-control" type="text" name="last_name" readonly value="<?php echo $userRow['last']; ?>"  />
            </div>
		</div>
		
		<div class="form-group">
            <label class="col-lg-3 control-label">Email Address:</label>
            <div class="col-lg-8">
			<input class="form-control" type="text" name="email_Address" readonly value="<?php echo $userRow['email']; ?>"  />
            </div>
		</div>
		
		<div class="form-group">
            <label class="col-lg-3 control-label">Years of Experience:</label>
            <div class="col-lg-8">
			<input class="form-control" type="text" name="years_XP" readonly value="<?php echo $userRow['years']; ?>"  />
            </div>
		</div>

		<div class="form-group">
		<label class="col-lg-3 control-label">Your Industry:</label>
		<div class="col-lg-8">
		<input class="form-control" type="text" name="biography" readonly value="<?php echo $userRow['industry']; ?>"  />
		</div>

		  <div class="form-group">
		  <label class="col-lg-3 control-label">Your Location:</label>
		  <div class="col-lg-8">
		  <input class="form-control" type="text" name="biography" readonly value="<?php echo $userRow['location']; ?>"  />
		  </div>

		<div class="form-group">
            <label class="col-lg-3 control-label">Biography:</label>
            <div class="col-lg-8">
			<input class="form-control" type="text" name="biography" readonly value="<?php echo $userRow['bio']; ?>"  />

            </div>
        </div>
		  </div>
        </div>
		</div>

</form>


  <!--  <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>-->

	<!--
	<div class="wrapper">
		<div class="row">
			<div class="col-1-1">
				<center>
					<img alt="Logo" src="img/logo.png">
				</center>
			</div>
			<div align="center" class="col-1-1">
			<div class="user_details">
			<img src="user_images/<?php echo $userRow['userPic']; ?>" class="img-rounded" width="200px" height="200px" /> -->
		
			<?php

			/*
			include_once 'configs/dbconfig.php';
			$stmt = $auth_user->runQuery("SELECT id,userPic FROM newuser WHERE id = '" . $userRow['id'] . "'");
			$stmt->execute();
			
			if($stmt->rowCount() > 0)
			{
				while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					?>

				<div class="col-1-1">
						<!-- <p class="page-header"><?php echo $userName."&nbsp;/&nbsp;".$userProfession; ?></p> -->
					<center>	<img src="user_images/<?php echo $userRow['userPic']; ?>" class="img-rounded" width="200px" height="200px" /></center>
						<p class="page-header">
						<span>
					
						<a  href="editProfile.php?id=<?php echo $userRow['id']; ?>" title="click for edit"> <img id="edit" src="img/edit.png"></a> 

						</span>
						</p>
					
					</div>
					       
					<?php
				}
			}
			else
			{
				?>
				<div class="col-xs-12">
					<div class="alert alert-warning">
						<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
					</div>
				</div>
				<?php
			}
			*/
		?>
		<!--
		<h2>Candidate Details</h2>
		<div class="UserInformation">
		<a  href="editProfile.php?id=<?php echo $userRow['id']; ?>" title="click for edit"> <img id="edit" src="img/edit.png"></a>
		<b>First Name: </b><p class="userInformation"><?php echo $userRow['first'];?></p>
		<br>
		<b>Last Name: </b><p class="userInformation"><?php echo $userRow['last'];?></p>
		<br>
		<b>Username: </b><p class="userInformation"><?php echo $userRow['uid'];?></p>
		<br>
		<b>Email Address: </b><p class="userInformation"><?php echo $userRow['email'];?></p>
		<br>
		<b>Years of Experince: </b><p class="userInformation"><?php echo $userRow['years'];?></p>
		<br>
		<b>Industry Type: </b><p class="userInformation"><?php echo $userRow['industry'];?></p>
		<br>
		<b>Biography: </b><p class="userInformation"><?php echo $userRow['bio'];?></p>
		<br>
		<b>Account Created On: </b><p class="userInformation"><?php echo $userRow['timestamp'];?></p>
		<br>
		<?php $today = new DateTime();
			$acountCreatedOn = new DateTime($userRow['timestamp']);
			$interval = $today->diff($acountCreatedOn);
			echo $interval->format('Your Account is %d Days Old'); ?>
			</div>
		<form action="user_cv/<?php echo $userRow['user_cv']?>"target=_blank>
        <button class="viewUserCvUserAccount">View CV</button><br><br>
    </form>	
		
		<?php
		/*
		include_once 'configs/dbh.php';
				if (isset($userRow['id'])) {
					echo"<a class='nav-item nav-link' href='logout.php?logout=true'>Sign Out</a>";
				    echo "<h3>Hello</h3>" . $userRow['uid'] ." your profile ID is:";
					echo $userRow['id'];
					
					
				    
				    $sql    = "SELECT id, first, uid, last, email, years, industry, bio, timestamp, user_cv, location FROM newuser WHERE id = '" . $userRow['id'] . "'";
				    $result = mysqli_query($conn, $sql);
				    
				    if (mysqli_num_rows($result) > 0) {
				        // output data of each row
				        while ($row = mysqli_fetch_assoc($result)) {
							echo " <br><label>Location:</label> " . $row['location'] . " <br><label>CV:</label> " . $row['user_cv'] . " <br><b>Username:</b> " . $row['uid'] . " <br><b>Name:</b> " . $row["first"] . " " . $row["last"] . " <br><b>Email:</b> " . $row["email"] . "<br><b> Years Experience:</b> " . $row["years"] . "<br> <b>Industry:</b> " . $row["industry"] . " <br>You joined on ".$row['timestamp']."<br><b>Bio:</b> " . $row["bio"] ;
							//echo "</br><a href=\"editProfile.php?id=$row[id]\">Edit Profile</a>";
							
							
						}
					}
					
					else {

				        echo "0 results";
				    }
				    
				  //  mysqli_close($conn);
				    
				} else {
				    echo "You are not logged in";
				}
*/
				?>
				<!--
				<form action="user_cv/<?php echo $userRow['user_cv']?>" target=_blank>
				<button>View CV</button>
				</form>
				<br><a href= "user_cv/<?php echo $userRow['user_cv']?>" target=_blank>View CV</a>-->




				</div>
				</div>	 
				<!--
				<div align="center" class="col-1-2">
					<div class="userCvImage">
				<center><h3><?php echo $userRow['uid']?>'s CV</h3></center>
					<iframe src="user_cv/<?php echo $userRow['user_cv']?>" height=100% width=100%> </iframe>
				<center><h5>Click here to view <?php echo $userRow['uid']?>'s CV</h5>
					<a href= "user_cv/<?php echo $userRow['user_cv']?>" target=_blank><img src="img/sample_cv.PNG" width="100%" height="100%"/></a></center>
				</div>
			</div>
			-->
		</div><!-- /.row -->
		<?php include 'footer.php'?>
	</div><!-- /.wrapper -->
	
</body>
</html>