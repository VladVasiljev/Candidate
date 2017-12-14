
<?php
include 'header.php';
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	//Redirects the user to userprofile, if user tries to sign up while logged in.
	$user->redirect('userprofile.php');
}

if(isset($_POST['btn-signup']))
{
	
	
	$userName = strip_tags($_POST['txt_userName']);
	$userPassword = strip_tags($_POST['txt_userPassword']);
	$userEmail = strip_tags($_POST['txt_userEmail']);
	$firstName = strip_tags($_POST['txt_firstName']);
	$lastName = strip_tags($_POST['txt_lastName']);	
	$userExperience = strip_tags($_POST['txt_userExperience']);	
	$userIndustryType = strip_tags($_POST['txt_industryType']);	
	$userBiography = strip_tags($_POST['txt_userBio']);
	$userPicture = strip_tags($_POST['txt_userPic']);
	$userCV = strip_tags($_POST['txt_userCV']);
	$userLocation = strip_tags($_POST['txt_location']);

	
	/*
	
	if($firstName=="")	{
		$error[] = "provide name !";	
	}
	*/

	if($firstName=="")	{
		$error[] = "Provide Your First Name";	
	}
	else if($lastName=="")	{
		$error[] = "Provide Your Last Name";	
	}
	else if($userName=="")	{
		$error[] = "Provide Your Username";	
	}
	else if($userPassword=="")	{
		$error[] = "Provide Password";
	}
	
	else if($userEmail=="")	{
		$error[] = "Provide Your Username";	
	}
	else if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address';
	}
	else if(strlen($userPassword) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT uid, email FROM newuser WHERE uid=:userName OR email=:userEmail");
			$stmt->execute(array(':userName'=>$userName, ':userEmail'=>$userEmail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['uid']==$userName) {
				$error[] = "sorry username already taken !";
			}
			else if($row['email']==$userEmail) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->register($userName,$userEmail,$userPassword,$firstName,$lastName,$userExperience,$userIndustryType,$userBiography,$userPicture,$userCV,$userLocation)){	
					$user->redirect('user_login.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Uemployed</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>

<div class="signin-form">

<div class="container">
    	
        <form method="post" class="form-group">
            <h2 align="center" class="form-signin-heading">Candidate Signup.</h2><hr />
            <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php
			}
			?>
			
            <div align="center" class="form-group">
            <input type="text" class="form-control" name="txt_firstName" placeholder="Enter First Name" value="<?php if(isset($error)){echo $firstName;}?>"  />
            </div>
			
            <div align="center" class="form-group">
            <input type="text" class="form-control" name="txt_lastName" placeholder="Enter Last Name"  value="<?php if(isset($error)){echo $lastName;}?>"/>
            </div>
			
            <div align="center" class="form-group">
            	<input type="text" class="form-control" name="txt_userName" placeholder="Enter Username" value="<?php if(isset($error)){echo $userName;}?>"/>
            </div>
			<div align="center" class="form-group">
            	<input type="password" class="form-control" name="txt_userPassword" placeholder="Enter Password" />
            </div>
			<div align="center" class="form-group">
            	<input type="email" class="form-control" name="txt_userEmail" placeholder="Enter Email" value="<?php if(isset($error)){echo $userEmail;}?>"  />
            </div>
			
			<div align="center" class="form-group">
            	<input type="number" class="form-control" name="txt_userExperience" placeholder="Enter Years Experinece" min="0" max="60" value="0" />
            </div>

			<div align="center" class="form-group">
            	<input type="text" class="form-control" name="txt_userBio" placeholder="Enter Your Bio" value="<?php if(isset($error)){echo $bio;}?>"/>
            </div>

			<div align="center" class="form-group">
			<select type="industry" name="txt_industryType">
				  <option value="Academic">Acedemic</option>
                  <option value="Accountancy and Finance">Accountancy</option>
                  <option value="Architecture/Design">Architecture</option>
                  <option value="Childcare">Childcare</option>
                  <option value="Drivers">Drivers</option>
                  <option value="Education/Training">Education</option>
                  <option value="Graduate">Graduate</option>
                  <option value="Hair and Beauty">Hair And Beauty</option>
				  <option value="It">IT</option>
				  <option value="Manaul Labour">Manual Labour</option>
				  <option value="Medical">Medical</option>
				  <option value="Motor Industry">Motor Industry</option>
				  <option value="Retail">Retail</option>
                </select>
			 </div>
			<div align="center" class="form-group">
			<select type="location" name="txt_location">
				  <option value="Antrim">Antrim</option>
                  <option value="Armagh">Armagh</option>
                  <option value="Carlow">Carlow</option>
                  <option value="Clare">Clare</option>
                  <option value="Cork">Cork</option>
                  <option value="Derry">Derry</option>
                  <option value="Donegal">Donegal</option>
                  <option value="Down">Down</option>
				  <option value="Dublin">Dublin</option>
				  <option value="Fermanagh">Fermanagh</option>
				  <option value="Galway">Galway</option>
				  <option value="Kerry">Kerry</option>
				  <option value="Kildare">Kildare</option>
				  <option value="Kilkenny">Kilkenny</option>
				  <option value="Laois">Laois</option>
				  <option value="Leitrim">Leitrim</option>
				  <option value="Limerick">Limerick</option>
				  <option value="Longford">Longford</option>
				  <option value="Louth">Louth</option>
				  <option value="Mayo">Mayo</option>
				  <option value="Meath">Meath</option>
				  <option value="Monaghan">Monaghan</option>
				  <option value="Offaly">Offaly</option>
				  <option value="Roscommon">Roscommon</option>
				  <option value="Sligo">Sligo</option>
				  <option value="Tipperary">Tipperary</option>
				  <option value="Tyrone">Tyrone</option>
				  <option value="Waterford">Waterford</option>
				  <option value="Westmeath">Westmeath</option>
				  <option value="Wexford">Wexford</option>
				  <option value="Wicklow">Wicklow</option>
                </select>
			
            </div>

			<div class="form-group">
            	<input type="hidden" class="form-control" name="txt_userPic" placeholder="Enter Your Bio" value="default.png" />
            </div>

			<div class="form-group">
            	<input type="hidden" class="form-control" name="txt_userCV" placeholder="Enter Your Bio" value="samplecv.pdf" />
            </div>

			
			
            <div class="clearfix"></div><hr />
            <div align="center" class="form-group">
            	<button type="submit" class="btn btn-primary" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
            <br />
            <center><label>have an account ! <a href="user_login.php">Sign In</a></label></center
        </form>
       </div>
</div>

</div>

</body>
</html
