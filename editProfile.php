
<?php
//session_start();
// including the database connection file
include_once("configs/dbh.php");
include 'header.php';

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
	
	require_once 'configs/imageUploadConnection.php';

	
	
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
		$tmp_dir1 = $_FILES['user_cv']['tmp_name'];
		$cvSize = $_FILES['user_cv']['size'];

		if($cvFile)
		{
			$upload_dir = 'user_cv/'; // cv upload directory	
			$cvExt = strtolower(pathinfo($cvFile,PATHINFO_EXTENSION)); // get cv extension
			$valid_extensions = array('pdf'); // valid extensions
			$usercv = $userName."'s CV.".$cvExt;
			//$usercv = rand(1000,1000000).".".$cvExt;
			if(in_array($cvExt, $valid_extensions))
			{			
				if($cvSize < 5000000)
				{
					unlink($upload_dir.$edit_row['usercv']);
					move_uploaded_file($tmp_dir1,$upload_dir.$usercv);
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
			// if no cv selected the old cv remains as it is.
			$usercv = $edit_row['user_cv']; // old cv from database
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
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Edit Profile</title>
	
</head>
<body>

	<form method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
	<div class="container">
    <h3>Hello <?php echo $firstName; ?> You can edit your profile here!</h3>
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
            <label class="col-lg-3 control-label ">Industry</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select name="industry_Type" class="form-control">
				
                  <option value="<?php echo $industryType; ?>" selected > <?php echo $industryType; echo " [Current Position]"; ?></option> 
                  <option value="academic">Acedemic</option>
                  <option value="accountancy and finance">Accountancy</option>
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



		<div class="form-group">
            <label class="col-lg-3 control-label">Biography:</label>
            <div class="col-lg-8">
			<input class="form-control" type="text" name="biography" value="<?php echo $bio; ?>" required />
            </div>
        </div>

	
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

</form>

</body>
</html>
