<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardMenu extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "menu_v";
		$this->load->model('menu_model');
		$this->load->model('pages_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->menuItem = $this->menu_model->get_all();
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function newMenuForm()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/add/index", $viewData);
	}

	public function addMenu()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("description_tr", "Açıklama (TR)", "required|trim");
		$this->form_validation->set_rules("title_en", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("description_en", "Açıklama (EN)", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$saveDetails = $this->menu_model->add(
				array(
					"title_tr" => htmlspecialchars($this->input->post("title_tr")),
					"description_tr" => htmlspecialchars($this->input->post("description_tr")),
					"title_en" => htmlspecialchars($this->input->post("title_en")),
					"description_en" => htmlspecialchars($this->input->post("description_en")),
				)
			);

			if ($saveDetails) {
				$alert = array(
					"text" => "Servis ekleme başarılı ! ",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Servis ekleme sırasında bir hata meydana geldi ! ",
					"type" => "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-page'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('new-page'));
		}
	}

	public function editMenuForm($Id)
	{

		$validate = $this->pages_model->get(array('menuId' => $Id));

		if (!isset($validate)) {
			$alert = array(
				"text" => "Böyle bir menü mevcut değil ya da Alt menü değil !",
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-menu'));
			die();
		} else {
			$this->session->set_flashdata("menuItem", $validate);
			redirect(base_url('manage-menu'));
		}
	}

	public function saveMenuDetails($id)
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

			if (isset($_FILES["header_img"]) && $_FILES["header_img"]["name"] != '' && $_FILES["header_img"]["name"] != "no-photo.png" || isset($_FILES["product_img"]) && $_FILES["product_img"]["name"] != '' && $_FILES["product_img"]["name"] != "no-photo.png") {

				if (file_exists("assets/upload/" . $this->input->post('old_header_img'))) {
					unlink('assets/uploads/' . $this->input->post('old_header_img'));
				}

				if (file_exists("assets/upload/" . $this->input->post('old_product_img'))) {
					unlink('assets/uploads/' . $this->input->post('old_product_img'));
				}


				$headerImg = $this->ddoo_upload('header_img');
				$productImg = $this->ddoo_upload('product_img');


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
						'productType'    => htmlspecialchars($this->input->post('productType')),
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
						'productType'    => htmlspecialchars($this->input->post('productType')),
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
						'productType'    => htmlspecialchars($this->input->post('productType')),
					);
				}
			} else {
				$data = array(
					'about_title_tr'    => htmlspecialchars($this->input->post('about_title_tr')),
					'about_description_tr'    => htmlspecialchars($this->input->post('about_description_tr')),
					'about_title_en'    => htmlspecialchars($this->input->post('about_title_en')),
					'about_description_en'    => htmlspecialchars($this->input->post('about_description_en')),
					'video_tr'    => htmlspecialchars($this->input->post('video_tr')),
					'video_en'    => htmlspecialchars($this->input->post('video_en')),
					'productType'    => htmlspecialchars($this->input->post('productType')),
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
			redirect(base_url('manage-menu'));
		}
	}

	public function removeMenu()
	{
		$delete = $this->menu_model->delete(array("Id" => $this->input->post('menuId')));
		if ($delete) {
			//Menüye bağlı alt menüleri silme işlemi..
			$anotherMenu = $this->pages_model->get(array("menuId" => $this->input->post('menuId')));
			foreach ($anotherMenu as $item) {
				if ($item->header_img != "no-photo.png" || $item->product_img != "no-photo.png") {
					if (file_exists("assets/uploads/" . $item->header_img)) {
						unlink("assets/uploads/" . $item->header_img);
					}
					if (file_exists("assets/uploads/" . $item->product_img)) {
						unlink("assets/uploads/" . $item->product_img);
					}
				}
				$delete2 = $this->pages_model->delete(array("Id" => $item->Id));

				if ($delete2) {
					$alert = array(
						"text" => "Menü silme işlemi başarılı..",
						"type" => "success"
					);
					$this->session->set_flashdata("alert", $alert);
					redirect(base_url('manage-menu'));
				}
			}
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
