<?php
	
	session_start();
	ob_start();
	require_once '../../config/config.php';
	if(!strpos($_SERVER['REQUEST_URI'], "login")){
			if(!isset($_SESSION['login'])){
				header('Location: '.URL.'login');
			}
	    }

?>