<?php
/*
 * Classname liveSearch.php
 *@reference https://daveismyname.blog/autocomplete-with-php-mysql-and-jquery-ui
 *@author Vladislavs Vasiljevs, x15493322
 * 
 */
	$HOST = 'localhost';
	$USER = 'root';
	$PASS = '';
	$NAME = 'candidate';

	

if (isset($_GET['term'])){
	$return_arr = array();

	try{
		$conn = new PDO("mysql:host={$HOST};dbname={$NAME}",$USER,$PASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    
	    $stmt = $conn->prepare('SELECT industry FROM industrytypes WHERE industry LIKE :term');
	    $stmt->execute(array('term' => '%'.$_GET['term'].'%'));
	    
	    while($row = $stmt->fetch()) {
	        $return_arr[] =  $row['industry'];
	    }

	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}
?>