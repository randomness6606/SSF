<?php

class View extends Helper {
	
	function __construct() {
		
	}
	
	public function render($name) {
		
		$page = 'app/views/'.$name.'.php';
		if($_SERVER["HTTP_X_PJAX"]):
			include $page;
			include 'app/views/footer.php';
		else:
			require 'app/views/header.php';
			require 'app/views/' . $name . '.php';
			require 'app/views/footer.php';
		endif;

	}
	
	
}