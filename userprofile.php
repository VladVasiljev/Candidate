<!DOCTYPE html>
<html>
<?php
    include 'header.php';
?>
<head>
<!--	<link href="style.css" rel="stylesheet" type="text/css">-->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>RightPerson</title>
</head>
<body>
	<div class="wrapper">
		<div class="row">
			<div class="col-1-1">
				<center>
					<img alt="Logo" src="img/logo.png">
				</center>
			</div>
			<div align="center" class="col-1-1">
			<div class="user_details">

			<?php
			include_once 'imageUploadConnection.php';
			$stmt = $conn->prepare("SELECT id,userPic FROM newuser WHERE id = '" . $_SESSION['id'] . "'");
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
						<a class="btn btn-info" href="editProfile.php?id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('Edit Profile ?')"><span class="glyphicon glyphicon-edit"></span>Edit Profile</a> 

						</span>
						</p>
						<form action="includes/logout.inc.php">
					<button>LOG OUT</button>
				</form>
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
		include_once 'dbh.php';
				if (isset($_SESSION['id'])) {
				    echo "Hello Candidate, your user ID is:";
				    echo $_SESSION['id'];
				    
				    $sql    = "SELECT id, first, uid, last, email, years, industry, bio FROM newuser WHERE id = '" . $_SESSION['id'] . "'";
				    $result = mysqli_query($conn, $sql);
				    
				    if (mysqli_num_rows($result) > 0) {
				        // output data of each row
				        while ($row = mysqli_fetch_assoc($result)) {
							echo " <br>Username: " . $row['uid'] . " <br> Name " . $row["first"] . " " . $row["last"] . " <br>Email: " . $row["email"] . "<br> Years Experience: " . $row["years"] . "<br> Industry: " . $row["industry"] . "<br><h2>Bio:</h2> " . $row["bio"];
							//echo "</br><a href=\"editProfile.php?id=$row[id]\">Edit Profile</a>";
							
							
							
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