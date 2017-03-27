<?php
	require_once 'db.php';
	$conecta = mysqli_connect(DBHOST, DBUSER, DBPASS) or print (mysqli_error(die())); 
	mysqli_select_db($conecta, DBNAME) or print(mysqli_error()); 
	$GLOBALS['CON'] = $conecta;

?>