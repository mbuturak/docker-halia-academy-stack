<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends MY_Controller
{

	public function pageDetails($seo_url)
	{

		if (!isset($seo_url)) {
			redirect(base_url());
			die();
		}

		if ($_SESSION['lang'] == "en") {
			$this->lang->load("en", "en");
		} else {
			$this->lang->load("tr", "tr");
		}

		$viewData = new stdClass();

		//Get Menu ID
		$getMenuItem = $this->menu_model->get(array(
			"seo_url" => $seo_url
		));

		if (isset($getMenuItem)) {
			//Get page details
			$viewData->pageDetails = $this->pages_model->get(array(
				"menuId" => $getMenuItem->Id
			));
		} else {
			redirect(base_url());
			die();
		}


		$this->load->view("web/pages_v/index", $viewData);
	}

	public function featuresDetails($seo_url)
	{
		if (!isset($seo_url)) {
			redirect(base_url());
			die();
		}

		if ($_SESSION['lang'] == "en") {
			$this->lang->load("en", "en");
		} else {
			$this->lang->load("tr", "tr");
		}

		$viewData = new stdClass();

		//Get Menu ID
		$getMenuItem = $this->features_model->get(array(
			"url" => $seo_url
		));

		if (isset($getMenuItem)) {
			//Get page details
			$this->session->set_flashdata('featuresItem',getFeaturesWithProductType($getMenuItem->Id));
			redirect(base_url());
		} else {
			redirect(base_url());
			die();
		}
	}


	public function catelog($seo_url)
	{
		if (!isset($seo_url)) {
			redirect(base_url());
			die();
		}

		if ($_SESSION['lang'] == "en") {
			$this->lang->load("en", "en");
		} else {
			$this->lang->load("tr", "tr");
		}

		$viewData = new stdClass();
	}
}
