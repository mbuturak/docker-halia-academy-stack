<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardTutor extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "tutor_v";
		$this->load->model('tutor_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->tutorItem = $this->tutor_model->get_all();
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function newTutorForm()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/add/index", $viewData);
	}

	public function addTutor()
	{

		$this->load->library("form_validation");

		$this->form_validation->set_rules("tutorName", "İsim", "required|trim");
		$this->form_validation->set_rules("tutorBusiness", "Firma", "required|trim");
		$this->form_validation->set_rules("tutorTitle", "Unvan", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES["image"]) && $_FILES["image"]["name"] != '' && $_FILES["image"]["name"] != "no-photo.png") {

				$image = $this->ddoo_upload('image');
				if (isset($image)) {
					$data = array(
						'image' => $image['upload_data']['file_name'],
						"tutorName" => htmlspecialchars($this->input->post("tutorName")),
						"tutorBusiness" => htmlspecialchars($this->input->post("tutorBusiness")),
						"tutorTitle" => htmlspecialchars($this->input->post("tutorTitle")),
						"tutorLinkedIn" => htmlspecialchars($this->input->post("tutorLinkedIn")),
						"tutorDetails" => htmlspecialchars($this->input->post("tutorDetails")),
						"seo_url" => convertToSEO($this->input->post("tutorName")),
					);
				}
			} else {
				$data = array(
					"tutorName" => htmlspecialchars($this->input->post("tutorName")),
					"tutorBusiness" => htmlspecialchars($this->input->post("tutorBusiness")),
					"tutorTitle" => htmlspecialchars($this->input->post("tutorTitle")),
					"tutorLinkedIn" => htmlspecialchars($this->input->post("tutorLinkedIn")),
					"tutorDetails" => htmlspecialchars($this->input->post("tutorDetails")),
					"seo_url" => convertToSEO($this->input->post("tutorName")),
				);
			}


			$saveDetails = $this->tutor_model->add($data);

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
			redirect(base_url('manage-tutor'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('new-training'));
		}
	}

	public function editTutor($id)
	{
		$tutorItem = $this->tutor_model->get(array('Id' => $id));

		if (isset($tutorItem)) {
			$this->session->set_flashdata("tutorItem", $tutorItem);
		} else {
			$alert = array(
				"text" => "Böyle bir eğitmen mevcut değil ya da aktif değil!",
			);
			$this->session->set_flashdata("alert", $alert);
		}

		redirect(base_url('manage-tutor'));
	}

	public function saveDetails($id)
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("tutorName", "İsim", "required|trim");
		$this->form_validation->set_rules("tutorBusiness", "Firma", "required|trim");
		$this->form_validation->set_rules("tutorTitle", "Unvan", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {


			if ($this->input->post('old_image') != "no-image.png") {
				unlink('assets/uploads/tutors/' . $this->input->post('old_image'));
				$image = $this->ddoo_upload('image');
			}

			if ($image['upload_data']['file_name'] != "") {
				$data = array(
					'image' => $image['upload_data']['file_name'],
					"tutorName" => htmlspecialchars($this->input->post("tutorName")),
					"tutorBusiness" => htmlspecialchars($this->input->post("tutorBusiness")),
					"tutorTitle" => htmlspecialchars($this->input->post("tutorTitle")),
					"tutorLinkedIn" => htmlspecialchars($this->input->post("tutorLinkedIn")),
					"tutorDetails" => htmlspecialchars($this->input->post("tutorDetails")),
					"seo_url" => convertToSEO($this->input->post("tutorName")),
				);
			} else {
				$data = array(
					"tutorName" => htmlspecialchars($this->input->post("tutorName")),
					"tutorBusiness" => htmlspecialchars($this->input->post("tutorBusiness")),
					"tutorTitle" => htmlspecialchars($this->input->post("tutorTitle")),
					"tutorLinkedIn" => htmlspecialchars($this->input->post("tutorLinkedIn")),
					"tutorDetails" => htmlspecialchars($this->input->post("tutorDetails")),
					"seo_url" => convertToSEO($this->input->post("tutorName")),
				);
			}


			$saveDetails = $this->tutor_model->update(array("Id" => $id), $data);

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
			redirect(base_url('manage-tutor'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('new-training'));
		}
	}

	public function ddoo_upload($filename)
	{
		$config["allowed_types"] = "jpg|jpeg|png|svg";
		$config["upload_path"] =   "assets/uploads/tutors/";
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($filename)) {
			$error = array('error' => $this->upload->display_errors());
			return $error;
		} else {
			$data = array('upload_data' => $this->upload->data());
			return $data;
		}
	}

	public function removeTutor()
	{
		$id = $this->input->post("tutorId");

		$getFeatures = $this->tutor_model->get(array('Id' => $id));

		if ($this->input->post('imageUrl') != "no-image.png") {
			unlink('assets/uploads/tutors/' . $this->input->post('imageUrl'));
			$this->tutor_model->delete(array('Id' => $id));
		}
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
