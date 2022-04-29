<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


	public $viewFolder = "";

	public function index()
	{
		if($_SESSION['lang'] == "en"){
			$this->lang->load("en","en");
		}else{
			$this->lang->load("tr","tr");
		}
		
		$this->viewFolder = "web/home_v";
		$this->load->view($this->viewFolder.'/index');
	}

}
