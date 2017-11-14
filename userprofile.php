<?php
	require_once("header.php");
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
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="bootstrap/css/custom.css" rel="stylesheet" />
  </head>
  <body>


                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>



		<?php
			include_once 'imageUploadConnection.php';
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
    
    	<label class="h5">welcome : <?php print($userRow['uid']); ?></label>
    </div>

</div>


		
	</div><!-- /.wrapper -->
	<?php include 'footer.php'?>




	  
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
