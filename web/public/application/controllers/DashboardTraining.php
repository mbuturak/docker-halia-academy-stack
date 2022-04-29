<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardTraining extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "training_v";
		$this->load->model('training_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->trainingItem = $this->training_model->get_all();
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function newTrainingForm()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/add/index", $viewData);
	}

	public function addTraining()
	{

		$newDate = date('H:i', strtotime('+2 hour', strtotime($this->input->post('startTime')))); //Eğitim süresini ekliyoruz.

		$this->load->library("form_validation");

		$this->form_validation->set_rules("trainingName_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("trainingDescription_tr", "Açıklama (TR)", "required|trim");
		$this->form_validation->set_rules("trainingName_en", "Başlık (EN)", "required|trim");
		$this->form_validation->set_rules("trainingDescription_en", "Açıklama (EN)", "required|trim");


		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES["image"]) && $_FILES["image"]["name"] != '' && $_FILES["image"]["name"] != "no-photo.png") {

				$image = $this->ddoo_upload('image');
				if (isset($image)) {
					$data = array(
						'Image' => $image['upload_data']['file_name'],
						"trainingName_tr" => htmlspecialchars($this->input->post("trainingName_tr")),
						"trainingDescription_tr" => htmlspecialchars($this->input->post("trainingDescription_tr")),
						"trainingName_en" => htmlspecialchars($this->input->post("trainingName_en")),
						"trainingDescription_en" => htmlspecialchars($this->input->post("trainingDescription_en")),
						"isStartAt" => htmlspecialchars($this->input->post("isStartAt") . ' ' . $this->input->post('startTime')),
						"tutorId" => htmlspecialchars($this->input->post("tutorId")),
						"isEndAt" => $newDate,
						"seo_url" => convertToSEO($this->input->post("trainingName_en"))

					);
				}
			} else {
				$data = array(
					"trainingName_tr" => htmlspecialchars($this->input->post("trainingName_tr")),
					"trainingDescription_tr" => htmlspecialchars($this->input->post("trainingDescription_tr")),
					"trainingName_en" => htmlspecialchars($this->input->post("trainingName_en")),
					"trainingDescription_en" => htmlspecialchars($this->input->post("trainingDescription_en")),
					"isStartAt" => htmlspecialchars($this->input->post("isStartAt") . ' ' . $this->input->post('startTime')),
					"tutorId" => htmlspecialchars($this->input->post("tutorId")),
					"isEndAt" => $newDate,
					"seo_url" => convertToSEO($this->input->post("trainingName_en"))

				);
			}


			$saveDetails = $this->training_model->add($data);

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
			redirect(base_url('manage-training'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('new-training'));
		}
	}

	public function editTraining($id)
	{
		$trainingItem = $this->training_model->get(array('Id' => $id, 'isActive' => 1));

		if (isset($trainingItem)) {
			$this->session->set_flashdata("trainingItem", $trainingItem);
		} else {
			$alert = array(
				"text" => "Böyle bir eğitim mevcut değil ya da aktif değil!",
			);
			$this->session->set_flashdata("alert", $alert);
		}

		redirect(base_url('manage-training'));
	}

	public function saveDetails($id)
	{
		$newDate = date('H:i', strtotime('+2 hour', strtotime($this->input->post('startTime')))); //Eğitim süresini ekliyoruz.

		$this->load->library("form_validation");

		$this->form_validation->set_rules("trainingName_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("trainingDescription_tr", "Açıklama (TR)", "required|trim");
		$this->form_validation->set_rules("trainingName_en", "Başlık (EN)", "required|trim");
		$this->form_validation->set_rules("trainingDescription_en", "Açıklama (EN)", "required|trim");


		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES["image"]) && $_FILES["image"]["name"] != '' && $_FILES["image"]["name"] != "no-photo.png") {

				if ($this->input->post('old_image') != $_FILES["image"]["name"] && $this->input->post('old_image') != 'no-image.png' && file_exists('assets/uploads/') . $this->input->post('old_image')) {
					unlink('assets/uploads/' . $this->input->post('old_image'));
				}

				$image = $this->ddoo_upload('image');

				if (isset($image)) {
					$data = array(
						'Image' => $image['upload_data']['file_name'],
						"trainingName_tr" => htmlspecialchars($this->input->post("trainingName_tr")),
						"trainingDescription_tr" => htmlspecialchars($this->input->post("trainingDescription_tr")),
						"trainingName_en" => htmlspecialchars($this->input->post("trainingName_en")),
						"trainingDescription_en" => htmlspecialchars($this->input->post("trainingDescription_en")),
						"isStartAt" => htmlspecialchars($this->input->post("isStartAt") . ' ' . $this->input->post('startTime')),
						"tutorId" => htmlspecialchars($this->input->post("tutorId")),
						"isEndAt" => $newDate,
						"seo_url" => convertToSEO($this->input->post("trainingName_en"))

					);
				}
			} else {
				$data = array(
					"trainingName_tr" => htmlspecialchars($this->input->post("trainingName_tr")),
					"trainingDescription_tr" => htmlspecialchars($this->input->post("trainingDescription_tr")),
					"trainingName_en" => htmlspecialchars($this->input->post("trainingName_en")),
					"trainingDescription_en" => htmlspecialchars($this->input->post("trainingDescription_en")),
					"isStartAt" => htmlspecialchars($this->input->post("isStartAt") . ' ' . $this->input->post('startTime')),
					"tutorId" => htmlspecialchars($this->input->post("tutorId")),
					"isEndAt" => $newDate,
					"seo_url" => convertToSEO($this->input->post("trainingName_en"))
				);
			}


			$saveDetails = $this->training_model->update(array("Id" => $id), $data);

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
			redirect(base_url('manage-training'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('new-training'));
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

	public function removeTraining()
	{
		$id = $this->input->post("trainingId");

		$getFeatures = $this->training_model->get(array('Id' => $id));

		if ($this->input->post('imageUrl') != "no-image.png" && file_exists('assets/uploads/') . $this->input->post('imageUrl')) {
			unlink(base_url('assets/uploads/' . $this->input->post('imageUrl')));
		}

		$this->training_model->delete(array('Id' => $id));
	}

	public function statusChange()
	{
		$id = $this->input->post("trainingId");

		$getFeatures = $this->training_model->get(array('Id' => $id));

		if (isset($getFeatures)) {

			if ($getFeatures->isActive) {
				$isActive = 0;
			} else {
				$isActive = 1;
			}

			$this->training_model->update(array("Id" => $id), array(
				'isActive' => $isActive
			));
		}
	}
}
