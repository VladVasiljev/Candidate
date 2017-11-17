<?php include 'header.php';?>
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
			<div align="center" class="col-1-1">
			<div class="user_details">

			<?php
			include_once 'configs/dbconfig.php';
			$stmt = $auth_user->runQuery("SELECT id,userPic FROM newuser WHERE id = '" . $userRow['id'] . "'");
			$stmt->execute();
			
			if($stmt->rowCount() > 0)
			{
				while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					?>

				<div class="col-1-2">
						<!-- <p class="page-header"><?php echo $userName."&nbsp;/&nbsp;".$userProfession; ?></p> -->
						<img src="user_images/<?php echo $userRow['userPic']; ?>" class="img-rounded" width="200px" height="200px" />
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
			
		?>
		
		<h2>Candidate Details</h2>
		<?php
		include_once 'configs/dbh.php';
				if (isset($userRow['id'])) {
				    echo "Hello Candidate, your user ID is:";
					echo $userRow['id'];
					
				    
				    $sql    = "SELECT id, first, uid, last, email, years, industry, bio, timestamp FROM newuser WHERE id = '" . $userRow['id'] . "'";
				    $result = mysqli_query($conn, $sql);
				    
				    if (mysqli_num_rows($result) > 0) {
				        // output data of each row
				        while ($row = mysqli_fetch_assoc($result)) {
							echo " <br><b>Username:</b> " . $row['uid'] . " <br><b>Name:</b> " . $row["first"] . " " . $row["last"] . " <br><b>Email:</b> " . $row["email"] . "<br><b> Years Experience:</b> " . $row["years"] . "<br> <b>Industry:</b> " . $row["industry"] . " <br>You joined on ".$row['timestamp']."<br><b>Bio:</b> " . $row["bio"];
							//echo "</br><a href=\"editProfile.php?id=$row[id]\">Edit Profile</a>";
							echo"<a class='nav-item nav-link' href='logout.php?logout=true'>Sign Out</a>";
							
							
							
				        }
				    } else {
				        echo "0 results";
				    }
				    
				  //  mysqli_close($conn);
				    
				} else {
				    echo "You are not logged in";
				}

				?>
				</div>
				</div>	
		</div><!-- /.row -->
		
	</div><!-- /.wrapper -->
	<?php include 'footer.php'?>

</body>
</html>