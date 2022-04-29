<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardSettings extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "settings_v";
		$this->load->model('settings_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->settingsItem = $this->settings_model->get_all();
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/general_settings/index", $viewData);
	}

	public function saveSettings()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("email_tr", "Email (TR)", "required|trim");
		$this->form_validation->set_rules("email_en", "Email (EN)", "required|trim");
		$this->form_validation->set_rules("phone_tr", "Telefon (TR)", "required|trim");
		$this->form_validation->set_rules("phone_en", "Telefon (EN)", "required|trim");
		$this->form_validation->set_rules("adress_tr", "Adres (TR)", "required|trim");
		$this->form_validation->set_rules("adress_en", "Adres (EN)", "required|trim");
		$this->form_validation->set_rules("google_maps", "Google Maps", "required|trim");
		$this->form_validation->set_rules("linkedin", "LinkedIn", "required|trim");
		$this->form_validation->set_rules("instagram", "Instagram", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$save = $this->settings_model->update(array("Id" => 1), array(
				"email_tr" => htmlspecialchars($this->input->post('email_tr')),
				"email_en" => htmlspecialchars($this->input->post('email_en')),
				"phone_tr" => htmlspecialchars($this->input->post('phone_tr')),
				"phone_en" => htmlspecialchars($this->input->post('phone_en')),
				"adress_tr" => htmlspecialchars($this->input->post('adress_tr')),
				"adress_en" => htmlspecialchars($this->input->post('adress_en')),
				"google_maps" => htmlspecialchars($this->input->post('google_maps')),
				"linkedin" => htmlspecialchars($this->input->post('linkedin')),
				"instagram" => htmlspecialchars($this->input->post('instagram')),
			));

			if ($save) {
				$alert = array(
					"text" => "Güncelleme başarılı",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Güncelleme sırasında bir hata oluştu",
					"type" => "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
		} else {
			$this->session->set_flashdata("errors", validation_errors());
		}

		redirect(base_url('manage-settings'));
	}
}
