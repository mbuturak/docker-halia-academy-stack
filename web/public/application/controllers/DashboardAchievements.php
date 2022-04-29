<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardAchievements extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "achievements_v";
		$this->load->model('achievements_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->achievementsItem = $this->achievements_model->get_all();
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function newAchievementsForm()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/add/index", $viewData);
	}

	public function addAchievements()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("icon", "Icon", "required|trim");
		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("title_en", "Başlık (EN)", "required|trim");
		$this->form_validation->set_rules("description_tr", "Açıklama (TR)", "required|trim");
		$this->form_validation->set_rules("description_en", "Açıklama (EN)", "required|trim");


		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$saveDetails = $this->achievements_model->add(array(
				"title_tr" => htmlspecialchars($this->input->post("title_tr")),
				"description_tr" => htmlspecialchars($this->input->post("description_tr")),
				"title_en" => htmlspecialchars($this->input->post("title_en")),
				"description_en" => htmlspecialchars($this->input->post("description_en")),
				"icon" => htmlspecialchars($this->input->post("icon")),
			));

			if ($saveDetails) {
				$alert = array(
					"text" => "Ekleme başarılı!",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Ekleme sırasında bir hata meydana geldi!",
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-achievements'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('manage-achievements'));
		}
	}

	public function editAchievementsForm($id)
	{
		$data = $this->achievements_model->get(array("Id" => $id));
		if (isset($data)) {
			$this->session->set_flashdata("achievementsItem", $data);
		} else {
			$alert = array(
				"text" => "Böyle bir kazanım mevcut değil !"
			);
			$this->session->set_flashdata("alert", $alert);
		}
		redirect(base_url('manage-achievements'));
	}

	public function saveDetails($id)
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("icon", "Icon", "required|trim");
		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("title_en", "Başlık (EN)", "required|trim");
		$this->form_validation->set_rules("description_tr", "Açıklama (TR)", "required|trim");
		$this->form_validation->set_rules("description_en", "Açıklama (EN)", "required|trim");


		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$saveDetails = $this->achievements_model->update(array(
				"Id" => $id
			),array(
				"title_tr" => htmlspecialchars($this->input->post("title_tr")),
				"description_tr" => htmlspecialchars($this->input->post("description_tr")),
				"title_en" => htmlspecialchars($this->input->post("title_en")),
				"description_en" => htmlspecialchars($this->input->post("description_en")),
				"icon" => htmlspecialchars($this->input->post("icon")),
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
			redirect(base_url('manage-achievements'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('manage-achievements'));
		}
	}

	public function ddoo_upload($filename)
	{
		$config["allowed_types"] = "jpg|jpeg|png|svg";
		$config["upload_path"] =   "assets/uploads/";
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($filename)) {
			$error = array('error' => $this->upload->display_errors());
			return $error;
		} else {
			$data = array('upload_data' => $this->upload->data());
			return $data;
		}
	}

	public function removeAchievements()
	{

		$this->hero_model->delete(array('Id' =>  $this->input->post("achievementsId")));
	}
}
