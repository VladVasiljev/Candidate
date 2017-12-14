<?php
/*
 * Classname EditProfileCompany.php
 *@reference http://www.codingcage.com/2016/02/upload-insert-update-delete-image-using.html
 * @author Vladislavs Vasiljevs, x15493322
 * @author Paul Kinsella, x13125974
 */ 



// including the database connection file
include_once("configs/dbh.php");
include 'header.php';
/*
if(isset($_POST['update']))
{	
	
	
	$cid = mysqli_real_escape_string($conn, $_POST['cid']);	

	$companyName = mysqli_real_escape_string($conn, $_POST['name']);	
	$userName = mysqli_real_escape_string($conn, $_POST['username']);		
	$industryType = mysqli_real_escape_string($conn, $_POST['industry']);
	$positionType = mysqli_real_escape_string($conn, $_POST['position']);	

	
		
	
	// checking empty fields
	if(empty($companyName) || empty($userName) || empty($industryType) ) {	
			
		if(empty($companyName)) {
			echo "<font color='red'>Location: </font><br/>";
			
		}
		
		if(empty($userName)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($industryType)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}	
		
		if(empty($positionType)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE company SET name='$companyName',username='$userName',industry='$industryType', position='$positionType' WHERE cid=$cid");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: companyprofile.php");
	}
}
*/
?>

<?php
require_once("company_session.php");

require_once("class.company.php");
$auth_company = new COMPANY();


$company_id = $_SESSION['company_session'];

$stmt = $auth_company->runQuery("SELECT * FROM company WHERE cid=:company_id");
$stmt->execute(array(":company_id"=>$company_id));


$companyRow=$stmt->fetch(PDO::FETCH_ASSOC);
//getting id from url
$id = $_GET['cid'];

if ($company_id == $id) {
	//echo "$company_id + \n $id";
}
else{
	echo header("Location: new_company_profile.php");
	
}

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM company WHERE cid=$id");

while($res = mysqli_fetch_array($result))
{
	$companyName = $res['name'];
	$userName = $res['username'];
	$industryType = $res['industry'];
	$positionType = $res['position'];
	
}
?>

<?php
	//Start of Image Upload PHP
	error_reporting( ~E_NOTICE );
	
	require_once 'configs/imageUploadConnection.php';

	
	
	if(isset($_GET['cid']) && !empty($_GET['cid']))
	{
		$id = $_GET['cid'];
		$stmt_edit = $conn->prepare('SELECT cid,name,username,industry,position,userPic FROM company WHERE cid =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: new_company_profile.php");
		
		
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$companyName = $_POST['company_Name'];//Users First Name
		$userName = $_POST['user_Name'];//Users last name
		$industryType = $_POST['industry_Type'];//Emaill Address
		$positionType = $_POST['position_Type'];//Years of Experi

		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'company_images/'; // upload directory	
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
			$stmt = $conn->prepare('UPDATE company SET name=:fname,
													   username=:lname,
													   industry=:email,
													   position=:yearsofXP,
													   userPic=:upic 
													   WHERE cid=:uid');
			$stmt->bindParam(':fname',$companyName);
			$stmt->bindParam(':lname',$userName);
			$stmt->bindParam(':email',$industryType);
			$stmt->bindParam(':yearsofXP',$positionType);						
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='new_company_profile.php';
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
	header("Location: new_company_profile.php");
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
<div class="wrapper">
	<div class="row">
	<div class="col-1-1">
	<br/><br/>
	<div class="forms">
	<H1>Please Enter All Fields</H1>
	<form name="form1" method="post" action="editProfileCompany.php">
		<table border="0">
			
			<tr> 
				<td>Company Name</td>
				<td><input type="text" name="name" value="<?php echo $companyName;?>"></td>
			</tr>
			<tr> 
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $userName;?>"></td>
			</tr>
			<tr> 
				<td>Industry</td>
				<td><input type="text" name="industry" value="<?php echo $industryType;?>"></td>
			</tr>
			<tr> 
				<td>Position</td>
				<td><input type="text" name="position" value="<?php echo $positionType;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="cid" value=<?php echo $_GET['cid'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
			
				
			
		</table>
	</form>
	<form action="companyprofile.php">
    <button type="submit" value="Go to Profile" />Go to Profile</button>
</form>
</div>
</div>
<div>
-->

<form method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
	<div class="container">
    <h3>Hello <?php echo $companyName; ?> you can edit your profile here!</h3>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-1-2">
        <div class="text-center">
		<img src="company_images/<?php echo $userPic; ?>" height="250" width="250" class="rounded-circle" alt="avatar" />
          <h6>Prefered Image Size 250 x250</h6>
		  
          <input type="file" name="user_image" class="btn-primary" accept="image/*">
        </div>
	  </div>
	  
	  <div class="col-1-2">
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
            <label class="col-lg-3 control-label">Company Name:</label>
            <div class="col-lg-8">
			<input class="form-control" type="text" name="company_Name" value="<?php echo $companyName; ?>" required />
            </div>
		</div>
		
		<div class="form-group">
            <label class="col-lg-3 control-label">Last Name:</label>
            <div class="col-lg-8">
			<input class="form-control" type="text" name="user_Name" value="<?php echo $userName; ?>" required />
            </div>
		</div>
		
		
		<div class="form-group">
            <label class="col-lg-3 control-label">Years of Experience:</label>
            <div class="col-lg-8">
			<input class="form-control" type="text" name="position_Type" value="<?php echo $positionType; ?>" required />
            </div>
		</div>

		<div class="form-group">
            <label class="col-lg-3 control-label">Industry</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select name="industry_Type" class="form-control">
				<option value="<?php echo $industryType; ?>" selected > <?php echo $industryType; echo " [Current Position]"; ?></option> 
                  <option value="Academic">Acedemic</option>
                  <option value="Accountancy and finance">Accountancy</option>
                  <option value="Architecture/Design">Architecture</option>
                  <option value="Childcare">Childcare</option>
                  <option value="Drivers">Drivers</option>
                  <option value="Education">Education</option>
                  <option value="Graduate">Graduate</option>
                  <option value="Hair and Beauty">Hair And Beauty</option>
				  <option value="It">IT</option>
				  <option value="Manaul Labour">Manual Labour</option>
				  <option value="Medical">Medical</option>
				  <option value="Motor Industry">Motor Industry</option>
				  <option value="Retail">Retail</option>
                </select>
              </div>
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
