<?php
/*
 * Classname Logout.php
 *@reference http://www.codingcage.com/2015/04/php-login-and-registration-script-with.html
 * 
 * 
 */

	require_once('session.php');
	require_once('class.user.php');
	$user_logout = new USER();
	
	if($user_logout->is_loggedin()!="")
	{
		$user_logout->redirect('home.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user_logout->doLogout();
		$user_logout->redirect('home.php');
	}
