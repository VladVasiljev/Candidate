<?php
<<<<<<< HEAD
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
				if($user->register($userName,$userEmail,$userPassword,$firstName,$lastName,$userExperience,$userIndustryType,$userBiography,$userPicture,$userCV)){	
					$user->redirect('signup.php?joined');
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
<title>Coding Cage : Sign up</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css"  />
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
            	<input type="hidden" class="form-control" name="txt_userCV" placeholder="Enter Your Bio" value="123.pdf" />
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
=======
include 'header.php';
?>
<html>
        <body>
             <div class="wrapper">
       <div class="row">
      <div class="col-1-1">
        
       <!-- <center> <img  src="img/logo.png" alt="Logo" max-width="100%" ></center>-->
      
        
        <?php
            
            $url ="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            if(strpos($url, 'error=empty')!==false){
                echo " <div align='center'><h2>Please fill in all fields</h2><br>";
            }
            
            elseif(strpos($url, 'error=username')!==false){
                echo "<div align='center'><h2>Username already in use!</h2><br>";
            }
            
         if(isset($_SESSION['id'])){
             echo "<p class='pCenter'>Hi there user!</p>";
         } else{
             echo " <div align='center'>Enter User details and SignUp<br>";
             echo "Already Signed up?<br>Click <a href='user_login.php'>Login</a></div> ";
         }
        
        ?>
        
        
        
        <br>
        <br>
        <br>
          <div align="center">
        <?php
         if(isset($_SESSION['id'])){
             echo "You're already logged in";
         } else{
            echo" <form id ='signup'  action='includes/signup.inc.php' method='POST'>
      <input type ='text' name='first' placeholder='First Name'required><br>
         <input type ='text' name='last' placeholder='last Name'required><br>
        <input type ='text' name='uid' placeholder='Username'required><br>
       <input type ='password' name='pwd' placeholder='Password'required><br>
         <input type ='text' name='email' placeholder='email'required><br>
        <input type ='number' name='years' placeholder='Years experience'required><br>
        <label for='Industry'>Select Industry</label> 
        <select name='industry'>
        <option value='it'>IT</option>
        <option value='retail'>Retail</option>
        <option value='medical'>Medical</option>
        <option value='manual labour'>Manual Labour</option>
        <option value='motor industry'>Motor Industry</option>
        <option value='academic'>Academic</option>
        <option value='accountancy and finance'>Accountancy and Finance</option>
        <option value='architecture/design'>Architecture/Design</option>
        <option value='childcare'>Childcare</option>
        <option value='drivers'>Drivers</option>
        <option value='education/training'>Education/Training</option>
        <option value='graduate'>Graduate</option>
        <option value='hair and beauty'>Hair and Beauty</option>
        </select>
        <button type ='submit'>Sign Up</button>
        </form>";
        
>>>>>>> parent of a9bd66c... Added Secure Signup and Register system.

        
         } 
            ?>
            
              </div>
           </div></div></div>
    </body>

</html>
