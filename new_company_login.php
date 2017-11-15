<?php
include 'header.php';
session_start();
require_once("class.company.php");
$login = new COMPANY();

if($login->is_loggedin()!="")
{
	$login->redirect('new_company_profile.php');
}

if(isset($_POST['btn-login']))
{
    
	$userName = strip_tags($_POST['txt_uname_email']);	
	$companyPassword = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($userName,$companyPassword))
	{
		$login->redirect('new_company_profile.php');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
?>
<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coding Cage : Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link href="bootstrap/css/custom.css" rel="stylesheet" />
</head>
<body>

<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Log Into your Company profile.</h2><hr />
        
        <div id="error">
        <?php
        
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
		?>
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
        </div>
       
        

     	<hr />
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-default">
                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
            </button>
        </div>  
      	<br />
            <label>Don't have account yet ! <a href="company_signup.php">Sign Up</a></label>
      </form>

    </div>
    
</div>

</body>
</html>