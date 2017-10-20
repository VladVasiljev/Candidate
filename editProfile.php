<?php
// including the database connection file
include_once("dbh.php");
include 'header.php';
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
		$stmt_edit = $conn->prepare('SELECT id,first,last,years,industry,bio,userPic FROM newuser WHERE id =:uid');
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
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $conn->prepare('UPDATE newuser SET first=:fname,
													   last=:lname,
													   email=:email,
													   years=:yearsofXP,
													   industry=:industry,
													   bio=:biography,
													   userPic=:upic 
													   WHERE id=:uid');
			$stmt->bindParam(':fname',$firstName);
			$stmt->bindParam(':lname',$lastName);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':yearsofXP',$yearsXP);
			$stmt->bindParam(':industry',$industryType);						
			$stmt->bindParam(':biography',$bio);						
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);
				
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

<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<br/><br/>
	
	<div class="forms">
<<<<<<< HEAD
	<H1>Please Enter All Fields</H1>
	<!--
=======
	<center><H1>Please Enter All Fields</H1></center>
>>>>>>> 4a3ac5032956ef1d0c33fd7e32a0b7b3ac5807dd
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

	<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div>
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-bordered table-responsive">
	
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
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates"> Update</button>
        
        <button type="submit" name="cancel" class="cancelbtn">Cancel </button>
        
        </td>
    </tr>
    
    </table>
    
</form>

	
	</form>
</body>
</html>
