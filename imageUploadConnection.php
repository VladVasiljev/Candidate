<?php
	$HOST = 'localhost';
	$USER = 'root';
	$PASS = '';
	$NAME = 'logintest';
	
	try{
		$conn = new PDO("mysql:host={$HOST};dbname={$NAME}",$USER,$PASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>