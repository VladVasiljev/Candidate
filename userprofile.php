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



    <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>

    <div class="container">

		<?php
			include_once 'configs/imageUploadConnection.php';
			$stmt = $conn->prepare("SELECT id,userPic FROM newuser WHERE id = '" . $_SESSION['user_session'] . "'");
			$stmt->execute();
			
			if($stmt->rowCount() > 0)
			{
				while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					?>

				<div class="col-1-2">
						<!-- <p class="page-header"><?php echo $userName."&nbsp;/&nbsp;".$userProfession; ?></p> -->
						<img src="user_images/<?php echo $row['userPic']; ?>" class="img-rounded" width="200px" height="200px" />
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
	
	<?php echo " <br>Username: " . $userRow['uid'] . " <br> Name " . $userRow["first"] . " " . $userRow["last"] . " <br>Email: " . $userRow["email"] . "<br> Years Experience: " . $userRow["years"] . "<br> Industry: " . $userRow["industry"] . "<br><h2>Bio:</h2> " . $userRow["bio"]; ?>

			
	
	<?php include 'footer.php'?>

</body>
</html>