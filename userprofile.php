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



  <!--  <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>-->

	
	<div class="wrapper">
		<div class="row">
			<div class="col-1-1">
			<!--	<center>
					<img alt="Logo" src="img/logo.png">
				</center>-->
			</div>
			<div align="center" class="col-1-2">
			<div class="user_details">
			<img src="user_images/<?php echo $userRow['userPic']; ?>" class="img-rounded" width="200px" height="200px" />
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
		<h2>Candidate Details</h2>
		<div class="UserInformation">
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