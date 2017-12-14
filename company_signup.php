<?php
//required connection scripts
include 'header.php';
session_start();
//require company class
require_once('class.company.php');
$company = new COMPANY();
//checking if user is logged in
if($company->is_loggedin()!="")
{
	//Redirects the user to userprofile, if user tries to sign up while logged in.
	$company->redirect('new_company_profile.php');
}

//checking the submit button was pressed
if(isset($_POST['btn-signup']))
{
	
	//storing post data in variables 
	$userName = strip_tags($_POST['txt_userName']);
	$companyPassword = strip_tags($_POST['txt_companyPassword']);
	$companyName = strip_tags($_POST['txt_companyName']);
    $IndustryType = strip_tags($_POST['txt_industryType']);	
    $companyPicture = strip_tags($_POST['txt_userPic']);
    $position = strip_tags($_POST['txt_position']);
	

	
	/*
	
	if($firstName=="")	{
		$error[] = "provide name !";	
	}
	*/
	//basic error handling, checking to see if fields are empty
	if($companyName=="")	{
		$error[] = "Provide Your Company Name";	
	}
	else if($userName=="")	{
		$error[] = "Provide Your Username Name";	
	}
	
	else if($companyPassword=="")	{
		$error[] = "Provide Password";
	}
	

	else if(strlen($companyPassword) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			//comparing input data to database records
			$stmt = $company->runQuery("SELECT username FROM company WHERE username=:userName ");
			$stmt->execute(array(':userName'=>$userName));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['username']==$userName) {
				$error[] = "sorry username already taken !";
			}
			
			else
			{
				if($company->register($userName,$companyName,$companyPassword,$position,$IndustryType,$companyPicture)){	
					$company->redirect('new_company_login.php?joined');
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

<!--Start of html document-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign up</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>



<div class="container">
	<div class="row">
		<div class="col-1-1">
<div class="signin-form">
        <form method="post" class="form-signin">
           <center> <h2 class="form-signin-heading">Company Signup  </h2><hr /></center>
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
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='new_company_login.php'>login</a> here
                 </div>
                 <?php
			}
			?>
			
            <div align="center" class="form-group">
            <input type="text" class="form-control" name="txt_companyName" placeholder="Enter Username" value="<?php if(isset($error)){echo $userName;}?>"  />
            </div>
			
            
			
            <div align="center" class="form-group">
            	<input type="text" class="form-control" name="txt_userName" placeholder="Enter Company Name" value="<?php if(isset($error)){echo $companyName;}?>"/>
            </div>
			<div align="center" class="form-group">
            	<input type="password" class="form-control" name="txt_companyPassword" placeholder="Enter Password" />
			</div>
		</div>
		</div>
		<div align="center" class="col-1-1">
			<div class="form-group">
		
			
				
			<select type="industry" name="txt_industryType">
			<option value="Academic">Acedemic</option>
                  <option value="Accountancy">Accountancy</option>
                  <option value="Architecture/Design">Architecture</option>
                  <option value="Childcare">Childcare</option>
                  <option value="Drivers">Drivers</option>
                  <option value="Education/Training">Education/Training</option>
                  <option value="Graduate">Graduate</option>
                  <option value="Hair and Beauty">Hair And Beauty</option>
				  <option value="It">IT</option>
				  <option value="Manaul Labour">Manual Labour</option>
				  <option value="Medical">Medical</option>
				  <option value="Motor Industry">Motor Industry</option>
				  <option value="Retail">Retail</option>
                </select>
			</select>
            </div>

            <div class="form-group">
            <!--<label for='position'>Position</label> -->
                <select type="industry" name='txt_position'>
                <option value='manager'>Manager</option>
                <option value='hr'>HR</option>
                <option value='recruiter'>Recruiter</option>
                </select>
            </div>

			<div class="form-group">
            	<input type="hidden" class="form-control" name="txt_userPic" placeholder="Enter Your Bio" value="default.png" />
            </div>


			
			
            <div class="clearfix"></div><hr />
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
            <br />
            <label>have an account ! <a href="new_company_login.php">Sign In</a></label>
		</form>
		</div>
	   </div>
		</div>
</div>

</div>

</body>
</html>