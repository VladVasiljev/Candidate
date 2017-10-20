<!DOCTYPE html>
<html>
<?php
    include 'header.php';
    include 'dbh.php';
?>
<head>
	<link href="style.css" rel="stylesheet" type="text/css">
	<title>RightPerson</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="row">
			<div class="col-1-1">
				<center>
					<img alt="Logo" src="img/logo.png">
				</center>
			</div>
			<div class="col-1-2">
				<h2>User Details</h2>
                <?php
				if (isset($_SESSION['id'])) {
				    echo "Hello, your user ID is:";
				    echo $_SESSION['id'];
				    
				    $sql    = "SELECT id, first, uid, last, email, years, industry, bio FROM newuser WHERE id = '" . $_SESSION['id'] . "'";
				    $result = mysqli_query($conn, $sql);
				    
				    if (mysqli_num_rows($result) > 0) {
				        // output data of each row
				        while ($row = mysqli_fetch_assoc($result)) {
							echo " <br>Username: " . $row['uid'] . " <br> Name " . $row["first"] . " " . $row["last"] . " <br>Email: " . $row["email"] . "<br> Years Experience: " . $row["years"] . "<br> Industry: " . $row["industry"] . "<br>Bio: " . $row["bio"];
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

				<form action="includes/logout.inc.php">
					<button>LOG OUT</button>
				</form>
			</div>
<<<<<<< HEAD
=======
			<div class="col-1-2">
		<?php
$q = mysqli_query($conn, "SELECT * FROM newuser");
while($row = mysqli_fetch_assoc($q)){
	
	if($row['image'] == ""){
		echo "<img width = 200px  src='img/default.png'/>";
	}
}
>>>>>>> 4a3ac5032956ef1d0c33fd7e32a0b7b3ac5807dd

</div>
		</div>
		<div class="row">
		<?php
			include 'imageUploadConnection.php';
			$stmt = $conn->prepare("SELECT id,userPic FROM newuser WHERE id = '" . $_SESSION['id'] . "'");
			$stmt->execute();
			
			if($stmt->rowCount() > 0)
			{
				while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{
					extract($row);
					?>

				<div class="col-xs-3">
						<!-- <p class="page-header"><?php echo $userName."&nbsp;/&nbsp;".$userProfession; ?></p> -->
						<img src="user_images/<?php echo $row['userPic']; ?>" class="img-rounded" width="250px" height="250px" />
						<p class="page-header">
						<span>
						<a class="btn btn-info" href="editProfile.php?id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span>Edit Profile</a> 
						<!--  <a class="btn btn-danger" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a> -->
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
		</div>	
		
	



	
			<div class="col-1-2">
				<!-- <h2>Bio</h2> -->
			</div>
		</div><!-- /.row -->
	</div><!-- /.wrapper -->
</body>
</html>