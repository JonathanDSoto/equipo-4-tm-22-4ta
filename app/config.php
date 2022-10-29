<?php 
	session_start();
	include_once "AuthController.php";

	
	if (!isset($_SESSION['global_token'])) {
		$_SESSION['global_token'] = md5( uniqid( mt_rand(),true ) );
	}
	
	if (!defined('BASE_PATH')) {
		define('BASE_PATH','http://localhost/equipo-4-tm-22-4ta/');
	}
	
?>