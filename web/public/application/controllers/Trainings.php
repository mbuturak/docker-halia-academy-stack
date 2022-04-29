<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trainings extends MY_Controller
{

	public function pageDetails()
	{

		if ($_SESSION['lang'] == "en") {
			$this->lang->load("en", "en");
		} else {
			$this->lang->load("tr", "tr");
		}

		$viewData = new stdClass();

		$viewData->training = getTraining();


		$this->load->view("web/trainings_v/index", $viewData);
	}

	public function trainingDetails($seo_url)
	{

		$viewData = new stdClass();

		if ($_SESSION['lang'] == "en") {
			$this->lang->load("en", "en");
		} else {
			$this->lang->load("tr", "tr");
		}

		if (isset($seo_url)) {
			$trainingItem = $this->training_model->get(array('seo_url' => $seo_url));
			if (isset($trainingItem)) {
				$viewData->trainingDetails = $trainingItem;
				$this->load->view("web/trainings_v/details_v/index", $viewData);
			}
		}
	}
}
