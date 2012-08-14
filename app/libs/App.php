<?php

class App {

	function __construct() {
	
	
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = explode('/', $_GET['url']);
		
		if (empty($url[0])) {
			require 'app/controllers/index_controller.php';
			$controller = new IndexController();
			$controller->index();
			return false;
		} else {
			$controller = $url[0];
		}
		
		$file = 'app/controllers/' . $url[0] . '_controller.php';
		if (file_exists($file)) {
			require $file;
			
			$controller_class = ucfirst($controller).'Controller';
			$controller = new $controller_class;
			$controller->loadModel($url[0]);
			
			if (!$url[1]) {
				$controller->index();
				return false; // Check back on this!
			}
			
		} else {
			require 'app/controllers/error_controller.php';
			$controller = new ErrorController();
			$controller->notfound();
			exit();
		}
		
		if (isset($url[2])) {
			$arg = $url[2];
		} else {
			$arg = '';
		}
		
		if (isset($url[1])) {
			if (method_exists($controller, $url[1])) {
				$action = $url[1];
				if (empty($arg)) {
					$controller->$action();
				} else {
					$controller->$action($arg);
				}
			} else {
				require 'app/controllers/error_controller.php';
				$controller = new ErrorController();
				$controller->notfound();
				exit();
			}
		}
	
	}

}