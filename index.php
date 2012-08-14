<?php
	
	error_reporting(E_ALL ^ E_NOTICE);

	require 'app/config/globals.php';
	require 'app/config/db.php';
	
	function __autoload($class) {
		require "app/libs/$class.php";
	}
	
	$app = new App();