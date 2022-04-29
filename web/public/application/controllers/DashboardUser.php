<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardUser extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "user_v";
		$this->load->model('hero_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->heroItem = $this->hero_model->get_all();
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/index", $viewData);
	}

	public function loginForm()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/login/index", $viewData);
	}

	public function saveHeroDetails()
	{

		$this->load->library("form_validation");

		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("description_tr", "Alt Başlık (TR)", "trim");
		$this->form_validation->set_rules("videoLink_tr", "Video Link (TR)", "trim");
		$this->form_validation->set_rules("title_en", "Başlık (EN)", "required|trim");
		$this->form_validation->set_rules("description_en", "Alt Başlık (EN)", "trim");
		$this->form_validation->set_rules("videoLink_en", "Video Link (En)", "trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$saveDetails = $this->hero_model->update(array(
				"Id" => 1
			), array(
				"title_tr" => htmlspecialchars($this->input->post("title_tr")),
				"description_tr" => htmlspecialchars($this->input->post("description_tr")),
				"videoLink_tr" => htmlspecialchars($this->input->post("videoLink_tr")),
				"title_en" => htmlspecialchars($this->input->post("title_en")),
				"description_en" => htmlspecialchars($this->input->post("description_en")),
				"videoLink_en" => htmlspecialchars($this->input->post("videoLink_en")),
			));

			if ($saveDetails) {
				$alert = array(
					"text" => "Güncelleme başarılı!",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Güncelleme sırasında bir hata meydana geldi!",
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-home'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('manage-home'));
		}
	}
}
