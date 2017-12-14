
<?php
/*
 * Classname class.user.php
 *@reference http://www.codingcage.com/2015/04/php-login-and-registration-script-with.html
 *@author Paul Kinsella, x13125974
 */ 
	session_start();
	
	require_once 'class.company.php';
	$session = new COMPANY();
	
	// if user session is not active(not loggedin) this page will help 'home.php and profile.php' to redirect to login page
	// put this file within secured pages that users (users can't access without login)
	
	if(!$session->is_loggedin())
	{
		// session no set redirects to login page
		$session->redirect('home.php');
	}
              ?>