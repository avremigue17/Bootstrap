<?php
	init_set('display_errors',1);
	init_set('display_startup_errrors',1);
	error_reporting(E_ALL);

	if(!isset($_SESSION)){
		session_start();
	}

	if(!defined('BASE_PATH')){
		define('BASE_PATH','http://localhost/bootstrap/');
	}

?>