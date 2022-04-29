<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardPartners extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "partners_v";
		$this->load->model('partners_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->partnersItem = $this->partners_model->get_all();
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function newPartnersForm()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/add/index", $viewData);
	}

	public function editPartnersForm($id)
	{
		$partnersItem = $this->partners_model->get(array(
			"Id" => $id
		));
		$this->session->set_flashdata("partnersItem", $partnersItem);
		redirect(base_url('manage-partners'));
	}

	public function addPartners()
	{
		if (isset($_FILES["image"])) {
			$imageName = $this->ddoo_upload('image');
		}

		if (isset($imageName)) {
			$saveDetails = $this->partners_model->add(
				array(
					"brand" => htmlspecialchars($this->input->post("brand")),
					"image" => $imageName['upload_data']['file_name'],
					"seo_url" => htmlspecialchars($this->input->post("seo_url")),
				)
			);

			if ($saveDetails) {
				$alert = array(
					"text" => "Ekleme başarılı..",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Ekleme sırasında bir hata meydana geldi ! ",
					"type" => "error"
				);
			}
		} else {
			//Görsel Yüklenmedi.
			$alert = array(
				"text" => "Görsel seçilmedi.",
				"type" => "error"
			);
		}
		$this->session->set_flashdata("alert", $alert);
		redirect(base_url('manage-partners'));
	}

	public function savePartners($id)
	{
		if (isset($_FILES["image"])) {
			if ($this->input->post('old_image') != $_FILES['image']['name']) {
				unlink('assets/uploads/partners/' . $this->input->post('old_image'));
			}
			$image = $this->ddoo_upload('image');
		}

		if (isset($image)) {
			$data = array(
				"image" => $image['upload_data']['file_name'],
				"brand" => htmlspecialchars($this->input->post("brand")),
				"seo_url" => htmlspecialchars($this->input->post("seo_url")),
			);
		} else {
			$data = array(
				"brand" => htmlspecialchars($this->input->post("brand")),
				"seo_url" => htmlspecialchars($this->input->post("seo_url")),
			);
		}


		$saveDetails = $this->partners_model->update(
			array(
				"Id" => $id
			),
			$data
		);

		if ($saveDetails) {
			$alert = array(
				"text" => "Güncelleme başarılı..",
				"type" => "success"
			);
		} else {
			$alert = array(
				"text" => "Gübcelleme sırasında bir hata meydana geldi ! ",
				"type" => "error"
			);
		}
		$this->session->set_flashdata("alert", $alert);
		redirect(base_url('manage-partners'));
	}

	public function removePartners($id)
	{
		$delete = $this->partners_model->delete(array('Id' => $id));
		redirect(base_url('manage-partners'));
	}

	public function ddoo_upload($filename)
	{
		$config["allowed_types"] = "jpg|jpeg|png|svg";
		$config["upload_path"] =   "assets/uploads/partners/";
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($filename)) {
			$error = array('error' => $this->upload->display_errors());
			return $error;
		} else {
			$data = array('upload_data' => $this->upload->data());
			return $data;
		}
	}
}
