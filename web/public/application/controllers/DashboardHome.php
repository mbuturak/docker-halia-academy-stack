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
		$this->load->model('features_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->heroItem = $this->hero_model->get_all();
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/index", $viewData);
	}

	public function newHero()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/add/index", $viewData);
	}

	public function newFeatures()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/features/index", $viewData);
	}

	public function addFeatures()
	{

		$this->load->library("form_validation");

		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("title_en", "Başlık (EN)", "required|trim");
		$this->form_validation->set_rules("description_tr", "Açıklama (TR)", "required|trim");
		$this->form_validation->set_rules("description_en", "Açıklama (EN)", "required|trim");
		$this->form_validation->set_rules("url", "Url", "required|trim");
		$this->form_validation->set_rules("rank", "Sıra", "required|trim");
		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES["icon"]) && $_FILES["icon"]["name"] != '' && $_FILES["icon"]["name"] != "no-photo.png") {

				$image = $this->ddoo_upload('icon');
				if (isset($image)) {
					$data = array(
						'icon' => $image['upload_data']['file_name'],
						"title_tr" => htmlspecialchars($this->input->post("title_tr")),
						"description_tr" => htmlspecialchars($this->input->post("description_tr")),
						"title_en" => htmlspecialchars($this->input->post("title_en")),
						"description_en" => htmlspecialchars($this->input->post("description_en")),
						"url"	=> htmlspecialchars($this->input->post('url')),
						"productType"	=> htmlspecialchars($this->input->post('productType')),
						"rank" => htmlspecialchars($this->input->post('rank'))
					);
				}
			} else {
				$data = array(
					"title_tr" => htmlspecialchars($this->input->post("title_tr")),
					"description_tr" => htmlspecialchars($this->input->post("description_tr")),
					"title_en" => htmlspecialchars($this->input->post("title_en")),
					"description_en" => htmlspecialchars($this->input->post("description_en")),
					"url"	=> htmlspecialchars($this->input->post('url')),
					"productType"	=> htmlspecialchars($this->input->post('productType')),
					"rank" => htmlspecialchars($this->input->post('rank'))
				);
			}


			$saveDetails = $this->features_model->add($data);

			if ($saveDetails) {
				$alert = array(
					"text" => "Features ekleme başarılı!",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Features ekleme sırasında bir hata meydana geldi!",
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-menu'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('manage-menu'));
		}
	}

	public function addHero()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("title_en", "Başlık (EN)", "required|trim");

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
						"title_tr" => htmlspecialchars($this->input->post("title_tr")),
						"description_tr" => htmlspecialchars($this->input->post("description_tr")),
						"title_en" => htmlspecialchars($this->input->post("title_en")),
						"description_en" => htmlspecialchars($this->input->post("description_en")),
						"rank" => htmlspecialchars($this->input->post('rank'))
					);
				}
			} else {
				$data = array(
					"title_tr" => htmlspecialchars($this->input->post("title_tr")),
					"description_tr" => htmlspecialchars($this->input->post("description_tr")),
					"title_en" => htmlspecialchars($this->input->post("title_en")),
					"description_en" => htmlspecialchars($this->input->post("description_en")),
					"rank" => htmlspecialchars($this->input->post('rank'))
				);
			}


			$saveDetails = $this->hero_model->add($data);

			if ($saveDetails) {
				$alert = array(
					"text" => "Hero ekleme başarılı!",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Hero ekleme sırasında bir hata meydana geldi!",
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-home'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('manage-home'));
		}
	}

	public function editHeroItem($id)
	{

		if (!isset($id)) {
			$alert = array(
				"text" => "Böyle bir heroItem bulunamadı !",
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-home'));
			die();
		} else {
			$heroItem = $this->hero_model->get(array("Id" => $id));
			$this->session->set_flashdata("heroItem", $heroItem);
			redirect(base_url('manage-home'));
		}
	}

	public function editFeaturesItem($id)
	{

		if (!isset($id)) {
			$alert = array(
				"text" => "Böyle bir heroItem bulunamadı !",
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-home'));
			die();
		} else {
			$heroItem = $this->features_model->get(array("Id" => $id));
			$this->session->set_flashdata("featuresItem", $heroItem);
			redirect(base_url('manage-home'));
		}
	}

	public function saveHeroDetails($id)
	{

		$this->load->library("form_validation");

		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("title_en", "Başlık (EN)", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES["image"]) && $_FILES["image"]["name"] != '' && $_FILES["image"]["name"] != "no-photo.png") {

				if (file_exists("assets/upload/" . $this->input->post('old_image'))) {
					unlink('assets/uploads/' . $this->input->post('old_image'));
				}

				$image = $this->ddoo_upload('image');

				if (isset($image)) {
					$data = array(
						'image' => $image['upload_data']['file_name'],
						"title_tr" => htmlspecialchars($this->input->post("title_tr")),
						"description_tr" => htmlspecialchars($this->input->post("description_tr")),
						"title_en" => htmlspecialchars($this->input->post("title_en")),
						"description_en" => htmlspecialchars($this->input->post("description_en")),
						"rank" => htmlspecialchars($this->input->post('rank'))
					);
				}
			} else {
				$data = array(
					"title_tr" => htmlspecialchars($this->input->post("title_tr")),
					"description_tr" => htmlspecialchars($this->input->post("description_tr")),
					"title_en" => htmlspecialchars($this->input->post("title_en")),
					"description_en" => htmlspecialchars($this->input->post("description_en")),
					"rank" => htmlspecialchars($this->input->post('rank'))
				);
			}


			$saveDetails = $this->hero_model->update(array(
				"Id" => $id
			), $data);

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
			redirect(base_url('manage-home'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('manage-home'));
		}
	}

	public function saveFeatures($id)
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("title_en", "Başlık (EN)", "required|trim");
		$this->form_validation->set_rules("description_tr", "Açıklama (TR)", "required|trim");
		$this->form_validation->set_rules("description_en", "Açıklama (EN)", "required|trim");
		$this->form_validation->set_rules("url", "Url", "required|trim");
		$this->form_validation->set_rules("rank", "Sıra", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES["icon"]) && $_FILES["icon"]["name"] != '' && $_FILES["icon"]["name"] != "no-photo.png") {

				if ($this->input->post('old_icon') != "no-image.png") {
					unlink('assets/uploads/' . $this->input->post('old_icon'));
				}


				$icon = $this->ddoo_upload('icon');

				if (isset($icon)) {
					$data = array(
						'icon' => $icon['upload_data']['file_name'],
						"title_tr" => htmlspecialchars($this->input->post("title_tr")),
						"description_tr" => htmlspecialchars($this->input->post("description_tr")),
						"title_en" => htmlspecialchars($this->input->post("title_en")),
						"description_en" => htmlspecialchars($this->input->post("description_en")),
						"url"	=> htmlspecialchars($this->input->post('url')),
						"rank" => htmlspecialchars($this->input->post('rank'))
					);
				}
			} else {
				$data = array(
					"title_tr" => htmlspecialchars($this->input->post("title_tr")),
					"description_tr" => htmlspecialchars($this->input->post("description_tr")),
					"title_en" => htmlspecialchars($this->input->post("title_en")),
					"description_en" => htmlspecialchars($this->input->post("description_en")),
					"url"	=> htmlspecialchars($this->input->post('url')),
					"rank" => htmlspecialchars($this->input->post('rank'))
				);
			}


			$saveDetails = $this->features_model->update(array(
				"Id" => $id
			), $data);

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

	public function removeFeatures($idForm = null)
	{
		if (isset($idForm)) {
			$id = $idForm;
		} else {
			$id = $this->input->post("featuresId");
		}


		$getFeatures = $this->features_model->get(array('Id' => $id));

		if ($getFeatures->icon != "no-image.png") {
			unlink('assets/uploads/' . $getFeatures->icon);
		}

		$this->features_model->delete(array('Id' => $id));
	}

	public function saveFeaturesSpesific($id)
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("title_en", "Başlık (EN)", "required|trim");


		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES["icon"]) && $_FILES["icon"]["name"] != '' && $_FILES["icon"]["name"] != "no-photo.png") {

				if ($this->input->post('old_icon') != "no-image.png" || $this->input->post('old_icon') != $_FILES["icon"]["name"]) {
					unlink('assets/uploads/' . $this->input->post('old_icon'));
				}

				$icon = $this->ddoo_upload('icon');

				if (isset($icon)) {
					$data = array(
						'icon' => $icon['upload_data']['file_name'],
						"title_tr" => htmlspecialchars($this->input->post("title_tr")),
						"title_en" => htmlspecialchars($this->input->post("title_en")),

					);
				}
			} else {
				$data = array(
					"title_tr" => htmlspecialchars($this->input->post("title_tr")),
					"title_en" => htmlspecialchars($this->input->post("title_en")),
				);
			}


			$saveDetails = $this->features_model->update(array(
				"Id" => $id
			), $data);

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
			redirect(base_url('manage-menu'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('manage-menu'));
		}
	}
}
