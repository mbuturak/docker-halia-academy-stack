<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends MY_Controller
{

	public function pageDetails()
	{

		if ($_SESSION['lang'] == "en") {
			$this->lang->load("en", "en");
		} else {
			$this->lang->load("tr", "tr");
		}

		$viewData = new stdClass();

		$viewData->blog = $this->blog_model->get_all();


		$this->load->view("web/blog_v/index", $viewData);
	}

	public function blogDetails($seo_url)
	{

		$viewData = new stdClass();

		if ($_SESSION['lang'] == "en") {
			$this->lang->load("en", "en");
		} else {
			$this->lang->load("tr", "tr");
		}

		if (isset($seo_url)) {
			$blogItem = $this->blog_model->get(array('seo_url' => $seo_url));
			if (isset($blogItem)) {
				$viewData->blogItem = $blogItem;
				$this->load->view("web/blog_v/details_v/index", $viewData);
			}
		}
	}
}
