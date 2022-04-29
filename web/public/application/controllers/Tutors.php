<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tutors extends MY_Controller
{

	public function pageDetails()
	{

		if ($_SESSION['lang'] == "en") {
			$this->lang->load("en", "en");
		} else {
			$this->lang->load("tr", "tr");
		}

		$viewData = new stdClass();

		$viewData->tutors = getAllTutor();


		$this->load->view("web/tutors_v/index", $viewData);
	}

	public function tutorDetails($seo_url)
	{

		$viewData = new stdClass();

		if ($_SESSION['lang'] == "en") {
			$this->lang->load("en", "en");
		} else {
			$this->lang->load("tr", "tr");
		}

		if (isset($seo_url)) {
			$tutorItem = $this->tutor_model->get(array('seo_url' => $seo_url));
			if (isset($tutorItem)) {
				$viewData->tutorItem = $tutorItem;
				$this->load->view("web/tutors_v/details_v/index", $viewData);
			}
		}
	}
}
