<?php

class Helper {
	
	function __construct() {
		
	}
	
	public function a($url, $text, $id = '', $pjax = true) {
		if ($id !== false) {
			echo "<a href='".URL.$url."' id=".$id." rel='nofollow'>".$text."</a>";
		} else {
			echo "<a href='".URL.$url."'rel='nofollow'>".$text."</a>";
		}
	}
	
	public function back() {
		echo "
				<script>
					window.history.back();
				</script>
			";
	}
	
	public function redirect($controller, $action = 'index') {
		$url = URL;
		header("location:$url.$controller/$action");
	}
	
	public function js_tag() {
		if (isset($this->js)) {
			foreach ($this->js as $js) {
				echo "<script src='".URL."app/media/js/".$js.".js'></script>";
			} 
		}
	}
	
	public function requestIsPost($name) {
		if (isset($_POST[$name]) || $_SERVER['REQUEST_METHOD'] == 'POST') {
			return true;
		} else {
			return false;
		}
	}
	
	public function requestIsGet($name) {
		if (isset($_GET[$name]) || $_SERVER['REQUEST_METHOD'] == 'GET') {
			return true;
		} else {
			return false;
		}
	}
	
	public function pjax_title($title) {
		if($_SERVER["HTTP_X_PJAX"]):
			echo "<script>
				document.title = '$title';
			</script>";
		endif;
	}
	
	
	
}