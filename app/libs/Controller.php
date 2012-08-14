<?php

class Controller extends Helper {
	
	function __construct() {
		$this->view = new View();
	}
	
	public function loadModel($name) {
		$path = 'app/models/'.$name.'.php';
		if (file_exists($path)) {
			require $path;
			$modelName = ucfirst($name);
			$this->model = new $modelName();
		}
	}
	
}