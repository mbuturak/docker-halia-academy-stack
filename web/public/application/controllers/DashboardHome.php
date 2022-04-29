<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardHome extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "home_v";
		$this->load->model('hero_model');
		$this->load->model('application_model');
		$this->load->model('copyrights_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->heroItem = $this->hero_model->get(array('Id' => 1));
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/index", $viewData);
	}

	public function saveDetails()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("title_en", "Başlık (EN)", "required|trim");
		$this->form_validation->set_rules("description_tr", "Açıklama (TR)", "required|trim");
		$this->form_validation->set_rules("description_en", "Açıklama (EN)", "required|trim");


		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES["image"]) && $_FILES["image"]["name"] != '' && $_FILES["image"]["name"] != "no-photo.png") {

				if ($this->input->post('old_image') != $_FILES["image"]["name"]) {
					if (file_exists("assets/upload/" . $this->input->post('old_image'))) {
						unlink('assets/uploads/' . $this->input->post('old_image'));
					}
					$image = $this->ddoo_upload('image');
				}

				if (isset($image)) {
					$data = array(
						'image' => $image['upload_data']['file_name'],
						"title_tr" => htmlspecialchars($this->input->post("title_tr")),
						"description_tr" => htmlspecialchars($this->input->post("description_tr")),
						"title_en" => htmlspecialchars($this->input->post("title_en")),
						"description_en" => htmlspecialchars($this->input->post("description_en")),
						"videoLink_tr" => htmlspecialchars($this->input->post("description_en")),
						"videoLink_en" => htmlspecialchars($this->input->post("description_en")),
					);
				}
			} else {
				$data = array(
					"title_tr" => htmlspecialchars($this->input->post("title_tr")),
					"description_tr" => htmlspecialchars($this->input->post("description_tr")),
					"title_en" => htmlspecialchars($this->input->post("title_en")),
					"description_en" => htmlspecialchars($this->input->post("description_en")),
					"videoLink_tr" => htmlspecialchars($this->input->post("description_en")),
					"videoLink_en" => htmlspecialchars($this->input->post("description_en")),
				);
			}


			$saveDetails = $this->hero_model->update(array(
				"Id" => 1
			), $data);

			if ($saveDetails) {
				//Save Copyrights
				$this->copyrights_model->update(array("contentId" => 1),
					array(
						"title" => $_FILES["image"]["name"],
						"url" => $this->input->post('copyrights_url'),
						"contentId" => $this->input->post('contentId')
					)
				);

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

	public function removeHero()
	{
		$id = $this->input->post("heroId");

		$getHero = $this->hero_model->get(array('Id' => $id));

		if ($getHero->image != "no-image.png" && file_exists("assets/upload/" . $getHero->image)) {
			unlink('assets/uploads/' . $getHero->image);
		}

		$this->hero_model->delete(array('Id' => $id));
	}

	public function removeFeatures()
	{
		$id = $this->input->post("featuresId");

		$getFeatures = $this->features_model->get(array('Id' => $id));

		if ($getFeatures->image != "no-image.png" && file_exists("assets/upload/" . $getFeatures->image)) {
			unlink('assets/uploads/' . $getFeatures->image);
		}

		$this->hero_model->delete(array('Id' => $id));
	}
}
