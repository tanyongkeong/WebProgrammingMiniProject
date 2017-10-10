<?php
	// login to MySQL Server from PHP, change username and password to your own 
	$conn = mysql_connect("localhost","tyk","a15cs0204");

	// If login failed, terminate the page (using function 'die')
	if (!$conn) die("Error! Cannot connect to server: ". mysql_error() );
	// Login was successful. Then choose a database to work with (change to your own database)
	$selected = mysql_select_db("db_tyk",$conn);

	// If required database cannot be used, terminate the page
	if (!$selected) die ("Cannot use database: " . mysql_error() );
?>
