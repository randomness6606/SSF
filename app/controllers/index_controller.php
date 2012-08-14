<?php

class IndexController extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->title = 'Welcome to the Small Simple Framework! :D';
		$this->view->render('index/index');
	}

}