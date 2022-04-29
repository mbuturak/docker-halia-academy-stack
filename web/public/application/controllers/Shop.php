<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends MY_Controller
{


	public $viewFolder = "";

	public function index()
	{
		$viewData = new stdClass();

		if ($_SESSION['lang'] == "en") {
			$this->lang->load("en", "en");
		} else {
			$this->lang->load("tr", "tr");
		}

		$viewData->productAllItem = $this->product_model->get_all();
		$this->load->view('web/shop_v/index', $viewData);
	}

	public function getProduct($seo_url)
	{
		$viewData = new stdClass();

		if ($_SESSION['lang'] == "en") {
			$this->lang->load("en", "en");
		} else {
			$this->lang->load("tr", "tr");
		}

		$getMenuId = $this->menu_model->get(array("seo_url" => $seo_url));

		if (isset($getMenuId)) {
			$viewData->title = $getMenuId->title_tr;
			$viewData->menuId = $getMenuId->Id;

		} else {

			$viewData->productAllItem = $this->product_model->get_all();
		}

		$this->load->view('web/shop_v/index', $viewData);
	}

	public function getProductDetails($seo_url)
	{
		$viewData = new stdClass();

		if ($_SESSION['lang'] == "en") {
			$this->lang->load("en", "en");
		} else {
			$this->lang->load("tr", "tr");
		}

		$getProductInfo = $this->product_model->get(array("seo_url" => $seo_url));

		if (isset($getProductInfo)) {
			$viewData->productInfo = $getProductInfo;
			$this->load->view('web/shop_v/details_v/index', $viewData);
		} else {

			$viewData->productAllItem = $this->product_model->get_all();
			$this->load->view('web/shop_v/index', $viewData);
		}

		
	}
}
