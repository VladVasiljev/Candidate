<?php
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
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
				if($user->register($userName,$userEmail,$userPassword,$firstName,$lastName,$userExperience,$userIndustryType,$userBiography,$userPicture)){	
					$user->redirect('sign-up.php?joined');
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
<!doctype html>
<html lang="en">
  <head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
	  
<div class="signin-form">

<div class="container">
    	
        <form method="post" class="form-signin">
            <h2 class="form-signin-heading">Sign up.</h2><hr />
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
			
            <div class="form-group">
            <input type="text" class="form-control" name="txt_firstName" placeholder="Enter First Name" value="<?php if(isset($error)){echo $firstName;}?>"  />
            </div>
			
            <div class="form-group">
            <input type="text" class="form-control" name="txt_lastName" placeholder="Enter Last Name"  value="<?php if(isset($error)){echo $lastName;}?>"/>
            </div>
			
            <div class="form-group">
            	<input type="text" class="form-control" name="txt_userName" placeholder="Enter Username" value="<?php if(isset($error)){echo $userName;}?>"/>
            </div>
			<div class="form-group">
            	<input type="password" class="form-control" name="txt_userPassword" placeholder="Enter Password" />
            </div>
			<div class="form-group">
            	<input type="email" class="form-control" name="txt_userEmail" placeholder="Enter Email" value="<?php if(isset($error)){echo $userEmail;}?>"  />
            </div>
			
			<div class="form-group">
            	<input type="number" class="form-control" name="txt_userExperience" placeholder="Enter Years Experinece" min="0" max="60" value="0" />
            </div>

			<div class="form-group">
            	<input type="text" class="form-control" name="txt_userBio" placeholder="Enter Your Bio" value="<?php if(isset($error)){echo $bio;}?>"/>
            </div>

			<div class="form-group">
			<select name="txt_industryType">
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
			</select>
            </div>

			<div class="form-group">
            	<input type="hidden" class="form-control" name="txt_userPic" placeholder="Enter Your Bio" value="7798.png" />
            </div>

			<div class="form-group">
            	<input type="hidden" class="form-control" name="txt_userCV" placeholder="Enter Your Bio" value="7798.pdf" />
            </div>
			
            <div class="clearfix"></div><hr />
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
            <br />
            <label>have an account ! <a href="user_login.php">Sign In</a></label>
        </form>
       </div>
</div>

</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>