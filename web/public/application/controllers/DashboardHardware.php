<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardHardware extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "hardware_v";
		$this->load->model('hardware_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->hardwareItem = $this->hardware_model->get_all();
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function newHardware()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/add/index", $viewData);
	}

	public function editHardwareForm($id)
	{
		$hardwareItem = $this->hardware_model->get(array(
			"Id" => $id
		));
		$this->session->set_flashdata("hardwareItem", $hardwareItem);
		redirect(base_url('manage-hardware'));
	}

	public function addProduct()
	{

		$this->load->library("form_validation");

		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("description_tr", "Açıklama (TR)", "required|trim");
		$this->form_validation->set_rules("sku", "SKU", "required|trim");
		$this->form_validation->set_rules("description_en", "Açıklama (EN)", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES["image"]) && $_FILES["image"]['name'] != "") {
				$productImage = $this->ddoo_upload('image');
			}

			if (isset($productImage)) {
				$data = array(
					"image" => $productImage['upload_data']['file_name'],
					"title_tr" => htmlspecialchars($this->input->post('title_tr')),
					"sku" => htmlspecialchars($this->input->post('sku')),
					"seo_url" => convertToSEO($this->input->post('title_tr')),
					"description_tr" => htmlspecialchars($this->input->post('description_tr')),
					"description_en" => htmlspecialchars($this->input->post('description_en')),
					"menuId" => htmlspecialchars($this->input->post('menuId')),
					"isActive" => 1,
				);
			} else {
				$data = array(
					"title_tr" => htmlspecialchars($this->input->post('title_tr')),
					"sku" => htmlspecialchars($this->input->post('sku')),
					"seo_url" => convertToSEO($this->input->post('title_tr')),
					"description_tr" => htmlspecialchars($this->input->post('description_tr')),
					"description_en" => htmlspecialchars($this->input->post('description_en')),
					"menuId" => htmlspecialchars($this->input->post('menuId')),
					"isActive" => 1,
				);
			}

			$saveDetails = $this->hardware_model->add($data);
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
			//Validasyon hatalı..
			$alert = array(
				"text" => "Lütfen eksiksiz ve doğru bir biçimde giriş yapınız.. ",
				"type" => "error"
			);
		}

		$this->session->set_flashdata("alert", $alert);
		redirect(base_url('manage-hardware'));
	}

	public function saveProduct($id)
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("description_tr", "Açıklama (TR)", "required|trim");
		$this->form_validation->set_rules("sku", "SKU", "required|trim");
		$this->form_validation->set_rules("description_en", "Açıklama (EN)", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES["image"]) && $_FILES["image"]['name'] != "") {

				if ($this->input->post('old_image') != $_FILES["image"]['name']) {
					unlink('assets/uploads/products/' . $this->input->post('old_image'));
				}

				$productImage = $this->ddoo_upload('image');
			}

			if (isset($productImage)) {
				$data = array(
					"image" => $productImage['upload_data']['file_name'],
					"title_tr" => htmlspecialchars($this->input->post('title_tr')),
					"sku" => htmlspecialchars($this->input->post('sku')),
					"seo_url" => convertToSEO($this->input->post('title_tr')),
					"description_tr" => htmlspecialchars($this->input->post('description_tr')),
					"description_en" => htmlspecialchars($this->input->post('description_en')),
					"menuId" => htmlspecialchars($this->input->post('menuId')),
					"isActive" => 1,
				);
			} else {
				$data = array(
					"title_tr" => htmlspecialchars($this->input->post('title_tr')),
					"sku" => htmlspecialchars($this->input->post('sku')),
					"seo_url" => convertToSEO($this->input->post('title_tr')),
					"description_tr" => htmlspecialchars($this->input->post('description_tr')),
					"description_en" => htmlspecialchars($this->input->post('description_en')),
					"menuId" => htmlspecialchars($this->input->post('menuId')),
					"isActive" => 1,
				);
			}

			$saveDetails = $this->hardware_model->update(array("Id" => $id), $data);
			if ($saveDetails) {
				$alert = array(
					"text" => "Güncelleme başarılı..",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Güncelleme sırasında bir hata meydana geldi ! ",
					"type" => "error"
				);
			}
		} else {
			//Validasyon hatalı..
			$alert = array(
				"text" => "Lütfen eksiksiz ve doğru bir biçimde giriş yapınız.. ",
				"type" => "error"
			);
		}

		$this->session->set_flashdata("alert", $alert);
		redirect(base_url('manage-hardware'));
	}

	public function removeKeywords()
	{
		$delete = $this->keywords_model->delete(array('Id' => $this->input->post('keywordsId')));
		return true;
	}

	public function ddoo_upload($filename)
	{
		$config["allowed_types"] = "jpg|jpeg|png|svg";
		$config["upload_path"] =   "assets/uploads/products/";
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
