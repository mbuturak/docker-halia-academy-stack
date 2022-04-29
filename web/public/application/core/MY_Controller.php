<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['lang'])) {
			$this->session->set_userdata('lang', "en");
		}
		$this->load->model('pages_model');
		$this->load->model('menu_model');
		$this->load->model('contact_model');
		$this->load->model('product_model');
		$this->load->model('features_model');
	}

	function switchLang()
	{

		if ($_SESSION['lang'] != "en") {
			unset($_SESSION['lang']);
			$language = "en";
		} else {
			unset($_SESSION['lang']);
			$language = "tr";
		}

		$this->session->set_userdata('lang', $language);
		redirect($_SERVER['HTTP_REFERER']);
	}
}
