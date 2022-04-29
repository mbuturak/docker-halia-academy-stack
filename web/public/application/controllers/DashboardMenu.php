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
		$this->load->model('process_model');
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
		$this->form_validation->set_rules("title_en", "Başlık (TR)", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$saveDetails = $this->menu_model->add(
				array(
					"parentId" => htmlspecialchars($this->input->post("parentId")),
					"title_tr" => htmlspecialchars($this->input->post("title_tr")),
					"title_en" => htmlspecialchars($this->input->post("title_en")),
					"seo_url" => htmlspecialchars(convertToSEO($this->input->post("title_en"))),
					"rank" => htmlspecialchars(convertToSEO($this->input->post("rank"))),
					"megaMenu" => htmlspecialchars($this->input->post('megaMenu'))
				)
			);

			$lastId = $this->db->insert_id();

			if ($saveDetails) {

				$savePages = $this->pages_model->add(array(
					"menuId" => $lastId
				));

				if ($savePages) {
					$alert = array(
						"text" => "Ekleme başarılı ! ",
						"type" => "success"
					);
				} else {
					$alert = array(
						"text" => "Pages Ekleme sırasında bir hata meydana geldi ! ",
						"type" => "error"
					);
				}
			} else {
				$alert = array(
					"text" => "Ekleme sırasında bir hata meydana geldi ! ",
					"type" => "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-menu'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('new-menu'));
		}
	}

	public function addProcess($pageId)
	{
		if (isset($_POST)) {
			$saveProcess = $this->process_model->add(array(
				"Icon" => $this->input->post('Icon'),
				"title_tr" => $this->input->post('title_tr'),
				"subtitle_tr" => $this->input->post('subtitle_tr'),
				"title_en" => $this->input->post('title_en'),
				"subtitle_en" => $this->input->post('subtitle_en'),
				"pages_id" => $pageId,
				"isActive" => $this->input->post('isActive'),
				"rank" => $this->input->post('rank'),
			));
			if ($saveProcess) {
				return true;
			} else {
				return false;
			}
		}
	}

	public function editMenuForm($Id)
	{

		$validate = $this->pages_model->get(array('menuId' => $Id));
		$menuItem = $this->menu_model->get(array('Id' => $Id));

		if (!isset($validate) && !isset($menuItem)) {
			$alert = array(
				"text" => "Böyle bir menü mevcut değil ya da Alt menü değil !",
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-menu'));
			die();
		} else {
			$this->session->set_flashdata("menuItem", $validate);
			$this->session->set_flashdata("menuInformation", $menuItem);
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

			if (isset($_FILES['catalog'])) {
				if ($this->input->post('old_catalog') != $_FILES["catalog"]["name"]) {
					unlink('assets/uploads/catalog/' . $this->input->post('old_catalog'));
				}
				$catalog = $this->product_upload('catalog');
			}

			if (isset($_FILES["header_img"])) {
				if ($this->input->post('old_header_img') != $_FILES["header_img"]["name"]) {
					$headerImg = $this->ddoo_upload('header_img');
				}
			}

			if (isset($_FILES["product_img"])) {
				if ($this->input->post('old_product_img') != $_FILES["product_img"]["name"]) {
					$productImg = $this->ddoo_upload('product_img');
				}
			}

			if (isset($headerImg['upload_data']['file_name'])) {
				$headerImage = $headerImg['upload_data']['file_name'];
			}

			if (isset($productImg['upload_data']['file_name'])) {
				$productImage = $productImg['upload_data']['file_name'];
			}

			if (isset($catalog['upload_data']['file_name'])) {
				$catalogFile = $catalog['upload_data']['file_name'];
			}

			if (isset($headerImage) && !isset($productImage) && isset($catalogFile)) {
				$data = array(
					'header_img' => $headerImage,
					'catalog' 	=> $catalogFile,
					'product_img' => htmlspecialchars($this->input->post('old_product_img')),
					'about_title_tr'    => htmlspecialchars($this->input->post('about_title_tr')),
					'about_description_tr'    => htmlspecialchars($this->input->post('about_description_tr')),
					'about_title_en'    => htmlspecialchars($this->input->post('about_title_en')),
					'about_description_en'    => htmlspecialchars($this->input->post('about_description_en')),
					'video_tr'    => htmlspecialchars($this->input->post('video_tr')),
					'video_en'    => htmlspecialchars($this->input->post('video_en')),
					'productType'    => htmlspecialchars($this->input->post('productType')),
				);
			} else if (!isset($headerImage) && isset($productImage) && isset($catalogFile)) {

				$data = array(
					'header_img' => htmlspecialchars($this->input->post('old_header_img')),
					'catalog' 	=> $catalogFile,
					'product_img' => $productImage,
					'about_title_tr'    => htmlspecialchars($this->input->post('about_title_tr')),
					'about_description_tr'    => htmlspecialchars($this->input->post('about_description_tr')),
					'about_title_en'    => htmlspecialchars($this->input->post('about_title_en')),
					'about_description_en'    => htmlspecialchars($this->input->post('about_description_en')),
					'video_tr'    => htmlspecialchars($this->input->post('video_tr')),
					'video_en'    => htmlspecialchars($this->input->post('video_en')),
					'productType'    => htmlspecialchars($this->input->post('productType')),
				);
			} else if (isset($headerImage) && isset($productImage) && isset($catalogFile)) {

				$data = array(
					'header_img' => $headerImage,
					'product_img' => $productImage,
					'catalog' 	=> $catalogFile,
					'about_title_tr'    => htmlspecialchars($this->input->post('about_title_tr')),
					'about_description_tr'    => htmlspecialchars($this->input->post('about_description_tr')),
					'about_title_en'    => htmlspecialchars($this->input->post('about_title_en')),
					'about_description_en'    => htmlspecialchars($this->input->post('about_description_en')),
					'video_tr'    => htmlspecialchars($this->input->post('video_tr')),
					'video_en'    => htmlspecialchars($this->input->post('video_en')),
					'productType'    => htmlspecialchars($this->input->post('productType')),
				);
			} elseif (isset($headerImage) && isset($productImage) && !isset($catalogFile)) {
				$data = array(
					'header_img' => $headerImage,
					'product_img' => $productImage,
					'about_title_tr'    => htmlspecialchars($this->input->post('about_title_tr')),
					'about_description_tr'    => htmlspecialchars($this->input->post('about_description_tr')),
					'about_title_en'    => htmlspecialchars($this->input->post('about_title_en')),
					'about_description_en'    => htmlspecialchars($this->input->post('about_description_en')),
					'video_tr'    => htmlspecialchars($this->input->post('video_tr')),
					'video_en'    => htmlspecialchars($this->input->post('video_en')),
					'productType'    => htmlspecialchars($this->input->post('productType')),
				);
			} elseif (!isset($headerImage) && !isset($productImage) && isset($catalogFile)) {
				$data = array(
					'catalog'	=>   $catalogFile,
					'about_title_tr'    => htmlspecialchars($this->input->post('about_title_tr')),
					'about_description_tr'    => htmlspecialchars($this->input->post('about_description_tr')),
					'about_title_en'    => htmlspecialchars($this->input->post('about_title_en')),
					'about_description_en'    => htmlspecialchars($this->input->post('about_description_en')),
					'video_tr'    => htmlspecialchars($this->input->post('video_tr')),
					'video_en'    => htmlspecialchars($this->input->post('video_en')),
					'productType'    => htmlspecialchars($this->input->post('productType')),
				);
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

	public function saveMenu($id)
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("title_en", "Başlık (TR)", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$saveDetails = $this->menu_model->update(
				array("Id" => $id),
				array(
					"parentId" => htmlspecialchars($this->input->post("parentId")),
					"title_tr" => htmlspecialchars($this->input->post("title_tr")),
					"title_en" => htmlspecialchars($this->input->post("title_en")),
					"seo_url" => htmlspecialchars(convertToSEO($this->input->post("title_en"))),
					"rank" => htmlspecialchars(convertToSEO($this->input->post("rank"))),
					"megaMenu" => htmlspecialchars($this->input->post('megaMenu'))
				)
			);

			$lastId = $this->db->insert_id();

			if ($saveDetails) {

				$alert = array(
					"text" => "Güncelleme başarılı..",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Güncelleme sırasında bir hata meydana geldi..",
					"type" => "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-menu'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('edit-menu/') . $id);
		}
	}

	public function removeMenu($id)
	{
		$delete = $this->menu_model->delete(array("Id" => $id));
		if ($delete) {
			//Menüye bağlı alt menüleri silme işlemi..
			$anotherMenu = $this->pages_model->get(array("menuId" => $id));
			if ($anotherMenu->header_img != "no-photo.png" || $anotherMenu->product_img != "no-photo.png") {
				if (file_exists("assets/uploads/" . $anotherMenu->header_img)) {
					unlink("assets/uploads/" . $anotherMenu->header_img);
				}
				if (file_exists("assets/uploads/" . $anotherMenu->product_img)) {
					unlink("assets/uploads/" . $anotherMenu->product_img);
				}
			}
			$delete2 = $this->pages_model->delete(array("Id" => $anotherMenu->Id));

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

	public function product_upload($filename)
	{
		$config["allowed_types"] = "xls|docx|pdf|doc|xlsx";
		$config["upload_path"] =   "assets/uploads/catalog/";
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload($filename)) {
			$error = array('error' => $this->upload->display_errors());
			return $error;
		} else {
			$data = array('upload_data' => $this->upload->data());
			return $data;
		}
	}

	public function getProductMenu($produtType)
	{

		if ($produtType == 2) {
			$menuItem = $this->menu_model->get(array('Id' => 2));
			$software = $this->menu_model->get_all();
			$this->session->set_flashdata("software", $software);
			$this->session->set_flashdata("menuInformation", $menuItem);
			redirect(base_url('manage-menu'));
			die();
		}

		if ($produtType == 3) {
			$hardware = $this->menu_model->get_all();
			$this->session->set_flashdata("hardware", $hardware);
			redirect(base_url('manage-menu'));
			die();
		}
	}
}
