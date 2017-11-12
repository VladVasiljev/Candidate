<?php
//session_start();
// including the database connection file
include_once("dbh.php");
include 'header.php';
//Session_start();
/*
if(isset($_POST['update']))
{	
	
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);	

	$firstName = mysqli_real_escape_string($conn, $_POST['first']);	
	$lastName = mysqli_real_escape_string($conn, $_POST['last']);	
	$userName = mysqli_real_escape_string($conn, $_POST['uid']);	
	$email = mysqli_real_escape_string($conn, $_POST['email']);	
	$yearsXP = mysqli_real_escape_string($conn, $_POST['years']);	
	$industryType = mysqli_real_escape_string($conn, $_POST['industry']);	
	$bio = mysqli_real_escape_string($conn, $_POST['bio']);	

	
		
	
	// checking empty fields
	if(empty($firstName) || empty($lastName) || empty($email) || empty($yearsXP) || empty($industryType) || empty($bio) ) {	
			
		if(empty($firstName)) {
			echo "<font color='red'>Location: </font><br/>";
			
		}
		
		if(empty($lastName)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
        }	
        
        if(empty($yearsXP)) {
			echo "<font color='red'>Years of Experience field is empty.</font><br/>";
        }
        if(empty($industryType)) {
			echo "<font color='red'>Industry Type field is empty.</font><br/>";
        }
        if(empty($bio)) {
			echo "<font color='red'>Bio field is empty.</font><br/>";
		}
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE newuser  SET first='$firstName',last='$lastName',email='$email', years='$yearsXP',industry='$industryType',bio='$bio' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: userprofile.php");
	}
}
*/
?>

<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM newuser WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$userName = $res['uid'];
	$firstName = $res['first'];
	$lastName = $res['last'];
    $email = $res['email'];
    $yearsXP = $res['years'];
    $industryType = $res['industry'];
	$bio = $res['bio'];
	
}
?>

<?php
	//Start of Image Upload PHP
	error_reporting( ~E_NOTICE );
	
	require_once 'imageUploadConnection.php';

	
	
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		$id = $_GET['id'];
		$stmt_edit = $conn->prepare('SELECT id,first,last,years,industry,bio,userPic, user_cv FROM newuser WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: userprofile.php");
		
		
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$firstName = $_POST['first_name'];//Users First Name
		$lastName = $_POST['last_name'];//Users last name
		$email = $_POST['email_Address'];//Emaill Address
		$yearsXP = $_POST['years_XP'];//Years of Experi
		$industryType = $_POST['industry_Type'];//Industry Type
		$bio = $_POST['biography'];//biography
		

		//image upload code
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'user_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['userPic']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $edit_row['userPic']; // old image from database
		}	
			//cv upload code
		$cvFile = $_FILES['user_cv']['name'];
		$tmp_dir = $_FILES['user_cv']['tmp_name'];
		$cvSize = $_FILES['user_cv']['size'];

		if($cvFile)
		{
			$upload_dir = 'user_cv/'; // cv upload directory	
			$cvExt = strtolower(pathinfo($cvFile,PATHINFO_EXTENSION)); // get cv extension
			$valid_extensions = array('pdf'); // valid extensions
			$usercv = $userName.".".$cvExt;
			//$usercv = rand(1000,1000000).".".$cvExt;
			if(in_array($cvExt, $valid_extensions))
			{			
				if($cvSize < 5000000)
				{
					unlink($upload_dir.$edit_row['usercv']);
					move_uploaded_file($tmp_dir,$upload_dir.$usercv);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only PDF files are allowed.";		
			}	
		}
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $conn->prepare('UPDATE newuser SET first=:fname,
													   last=:lname,
													   email=:email,
													   years=:yearsofXP,
													   industry=:industry,
													   bio=:biography,
													   userPic=:upic,
													   user_cv=:cv 
													   WHERE id=:uid');
			$stmt->bindParam(':fname',$firstName);
			$stmt->bindParam(':lname',$lastName);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':yearsofXP',$yearsXP);
			$stmt->bindParam(':industry',$industryType);						
			$stmt->bindParam(':biography',$bio);						
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);
			$stmt->bindParam(':cv',$usercv);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='userprofile.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	//End of Image Upload File
?>

<?php
if(isset($_POST['cancel']))
{
	header("Location: userprofile.php");
}

?>
<!doctype html>
<html lang="en">
<head>
	<!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link href="bootstrap/css/custom.css" rel="stylesheet"/>
-->
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Edit Profile</title>
	
</head>
<body>
<!--
		<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Navbar</a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="companysignup.php">Company</a>
      <a class="nav-item nav-link" href="signup.php">User</a>
    </div>
  </div>
</nav>
-->

	
	
	<!--
	<form name="form1" method="post" action="editProfile.php">
		<table border="0">
			
			<tr> 
				<td>First Name</td>
				<td><input type="text" name="first" value="<?php// echo $firstName;?>"></td>
			</tr>
			<tr> 
				<td>Last Name</td>
				<td><input type="text" name="last" value="<?php //echo $lastName;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php //echo $email;?>"></td>
			</tr>
            <tr> 
				<td>Years Experience</td>
				<td><input type="text" name="years" value="<?php //echo $yearsXP;?>"></td>
			</tr>
            <tr> 
				<td>Industry Type</td>
				<td><input type="text" name="industry" value="<?php// echo $industryType;?>"></td>
			</tr>
            <tr> 
				<td>Bio</td>
				<td><input type="text" name="bio" value="<?php //echo $bio;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php //echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
			</div>
				
			
		</table>
	</form>
	-->


	<form method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
	<div class="container">
    <h3>Hello <?php echo $firstName; ?> you can edit your profile here!</h3>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
		<img src="user_images/<?php echo $userPic; ?>" height="250" width="250" class="rounded-circle" alt="avatar" />
          <h6>Prefered Image Size 250 x250</h6>
		  
          <input type="file" name="user_image" class="form-control" accept="image/*">
		  <p><b>Image upload</b></p>
		  <input type="file" name="user_cv" class="form-control" accept="file_extention/*">
		  <p><b>CV upload</b></p>
        </div>
	  </div>
	  
	  <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>  
          Please Fill In <strong>All Fields</strong> Before Saving Changes.
        </div>
		<h3>Personal info</h3>
		
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
			<input class="form-control" type="text" name="first_name" value="<?php echo $firstName; ?>" required />
            </div>
		</div>
		
		<div class="form-group">
            <label class="col-lg-3 control-label">Last Name:</label>
            <div class="col-lg-8">
			<input class="form-control" type="text" name="last_name" value="<?php echo $lastName; ?>" required />
            </div>
		</div>
		
		<div class="form-group">
            <label class="col-lg-3 control-label">Email Address:</label>
            <div class="col-lg-8">
			<input class="form-control" type="text" name="email_Address" value="<?php echo $email; ?>" required />
            </div>
		</div>
		
		<div class="form-group">
            <label class="col-lg-3 control-label">Years of Experience:</label>
            <div class="col-lg-8">
			<input class="form-control" type="text" name="years_XP" value="<?php echo $yearsXP; ?>" required />
            </div>
		</div>

		<div class="form-group">
            <label class="col-lg-3 control-label">Industry</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select name="industry_Type" class="form-control">
				<?php
				while($res = mysqli_fetch_array($result)){
					echo "<option value='" .$res['industry']."'>'".$res['name']."'</option>";
				}
				?>
                  <option value="academic">Acedemic</option>
                  <option value="accountancy">Accountancy</option>
                  <option value="architecture">Architecture</option>
                  <option value="childcare">Childcare</option>
                  <option value="drivers">Drivers</option>
                  <option value="education">Education</option>
                  <option value="graduate">Graduate</option>
                  <option value="hair and beauty">Hair And Beauty</option>
				  <option value="it">IT</option>
				  <option value="manaul labour">Manual Labour</option>
				  <option value="medical">Medical</option>
				  <option value="motor industry">Motor Industry</option>
				  <option value="retail">Retail</option>
                </select>
              </div>
            </div>
          </div>



		<!--
		<div class="form-group">
            <label class="col-lg-3 control-label">Industry:</label>
            <div class="col-lg-8">
			<input class="form-control" type="text" name="industry_Type" value="<?php echo $industryType; ?>" required /></td>
            </div>
		</div>
		-->
		<div class="form-group">
            <label class="col-lg-3 control-label">Biography:</label>
            <div class="col-lg-8">
			<input class="form-control" type="text" name="biography" value="<?php echo $bio; ?>" required />
            </div>
        </div>
		
<!--
    <tr>
	<td><label class="control-label">First Name</label></td>
	<td><input class="form-control" type="text" name="first_name" value="<?php echo $firstName; ?>" required /></td>
</tr>
    
    <tr>
    	<td><label class="control-label">Last Name</label></td>
        <td><input class="form-control" type="text" name="last_name" value="<?php echo $lastName; ?>" required /></td>
    </tr>
	<tr>
    	<td><label class="control-label">Email Address</label></td>
        <td><input class="form-control" type="text" name="email_Address" value="<?php echo $email; ?>" required /></td>
    </tr>

	<tr>
    	<td><label class="control-label">Years of Experience</label></td>
        <td><input class="form-control" type="text" name="years_XP" value="<?php echo $yearsXP; ?>" required /></td>
    </tr>

	<tr>
    	<td><label class="control-label">Industry</label></td>
        <td><input class="form-control" type="text" name="industry_Type" value="<?php echo $industryType; ?>" required /></td>
    </tr>

	<tr>
    	<td><label class="control-label">Biography</label></td>
        <td><input class="form-control" type="text" name="biography" value="<?php echo $bio; ?>" required /></td>
    </tr>
   
    <tr>
    	<td><label class="control-label">Profile Imgage</label></td>
        <td>
        	<p><img src="user_images/<?php echo $userPic; ?>" height="150" width="150" /></p>
        	<input  type="file" name="user_image" accept="image/*" /> 
        </td>
    </tr>
	-->
	
	<div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
			<button type="submit" name="btn_save_updates" class="btn btn-success"> Save Changes</button>
              <span></span>
              <button type="submit" name="cancel" class="btn btn-danger">Cancel </button>
            </div>
		  </div>
		  </div>
        </div>
		</div>
<!--
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates"> Update</button>
        
        <button type="submit" name="cancel" class="cancelbtn">Cancel </button>
        
        </td>
    </tr>
    
	</table>
	
-->
    
</form>

<!--
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
			-->
</body>
</html>
