<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardAbout extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "about_v";
		$this->load->model('pages_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->aboutItem = $this->pages_model->get(array(
			"menuId" => 5
		));
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/index", $viewData);
	}

	public function saveDetails($id)
	{

		$this->load->library("form_validation");

		$this->form_validation->set_rules("about_title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("about_description_tr", "Açıklama (TR)", "required|trim");
		$this->form_validation->set_rules("about_title_en", "Açıklama (EN)", "required|trim");
		$this->form_validation->set_rules("about_description_en", "Açıklama (EN)", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {


			if ($_FILES['header_img']['name'] != "") {

				if ($_FILES['header_img']['name'] != $this->input->post('old_header_img') && $_FILES['header_img']['name'] != null && $_FILES['header_img']['name'] != "no-photo.png") {
					unlink('assets/uploads/' . $this->input->post('old_header_img'));
				}
				$headerImg = $this->ddoo_upload('header_img');
			}

			if ($_FILES['product_img']['name'] != "") {
				if ($_FILES['product_img']['name'] != $this->input->post('old_product_img') && $_FILES['product_img']['name'] != null && $_FILES['product_img']['name'] != "no-photo.png") {
					unlink('assets/uploads/' . $this->input->post('old_product_img'));
				}
				$productImg = $this->ddoo_upload('product_img');
			}


			if (isset($headerImg) && !isset($productImg)) {

				$data = array(
					'header_img' => $headerImg['upload_data']['file_name'],
					'product_img' => htmlspecialchars($this->input->post('old_product_img')),
					'about_title_tr'    => htmlspecialchars($this->input->post('about_title_tr')),
					'about_description_tr'    => htmlspecialchars($this->input->post('about_description_tr')),
					'about_title_en'    => htmlspecialchars($this->input->post('about_title_en')),
					'about_description_en'    => htmlspecialchars($this->input->post('about_description_en')),
					'video_tr'    => htmlspecialchars($this->input->post('video_tr')),
					'video_en'    => htmlspecialchars($this->input->post('video_en')),

				);
			} else if (!isset($headerImg) && isset($productImg)) {

				$data = array(
					'header_img' => htmlspecialchars($this->input->post('old_header_img')),
					'product_img' => $productImg['upload_data']['file_name'],
					'about_title_tr'    => htmlspecialchars($this->input->post('about_title_tr')),
					'about_description_tr'    => htmlspecialchars($this->input->post('about_description_tr')),
					'about_title_en'    => htmlspecialchars($this->input->post('about_title_en')),
					'about_description_en'    => htmlspecialchars($this->input->post('about_description_en')),
					'video_tr'    => htmlspecialchars($this->input->post('video_tr')),
					'video_en'    => htmlspecialchars($this->input->post('video_en')),

				);
			} else if (isset($headerImg) && isset($productImg)) {

				$data = array(
					'header_img' => $headerImg['upload_data']['file_name'],
					'product_img' => $productImg['upload_data']['file_name'],
					'about_title_tr'    => htmlspecialchars($this->input->post('about_title_tr')),
					'about_description_tr'    => htmlspecialchars($this->input->post('about_description_tr')),
					'about_title_en'    => htmlspecialchars($this->input->post('about_title_en')),
					'about_description_en'    => htmlspecialchars($this->input->post('about_description_en')),
					'video_tr'    => htmlspecialchars($this->input->post('video_tr')),
					'video_en'    => htmlspecialchars($this->input->post('video_en')),

				);
			} else {

				$data = array(
					'about_title_tr'    => htmlspecialchars($this->input->post('about_title_tr')),
					'about_description_tr'    => htmlspecialchars($this->input->post('about_description_tr')),
					'about_title_en'    => htmlspecialchars($this->input->post('about_title_en')),
					'about_description_en'    => htmlspecialchars($this->input->post('about_description_en')),
					'video_tr'    => htmlspecialchars($this->input->post('video_tr')),
					'video_en'    => htmlspecialchars($this->input->post('video_en')),
				);
			}

			$saveDetails = $this->pages_model->update(
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
					"text" => "Güncelleme sırasında bir hata meydana geldi ! ",
					"type" => "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-about'));
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
}
