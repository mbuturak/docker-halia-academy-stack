<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardBlog extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "blog_v";
		$this->load->model('blog_model');
		$this->load->model('copyrights_model');
		$this->load->helper('string');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->blogItem = $this->blog_model->get_all();
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function newBlogForm()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/add/index", $viewData);
	}

	public function editBlogForm($id)
	{
		if (isset($id)) {
			$blogItem = $this->blog_model->get(array(
				"Id" => $id
			));

			if (isset($blogItem)) {
				$this->session->set_flashdata("blogItem", $blogItem);
				redirect(base_url('manage-blog'));
			} else {
				//blog yok.
				$alert = array(
					"text" => "Böyle bir blog bulunamadı!",
					"type" => "error"
				);
				$this->session->set_flashdata("alert", $alert);
				redirect(base_url('manage-blog'));
			}
		} else {
			//ıd yok.
			$alert = array(
				"text" => "Böyle bir blog bulunamadı!",
				"type" => "error"
			);
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-blog'));
		}
	}

	public function addBlog()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("description_tr", "Açıklama (TR)", "required|trim");
		$this->form_validation->set_rules("title_en", "Açıklama (EN)", "required|trim");
		$this->form_validation->set_rules("description_en", "Açıklama (EN)", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES['image']) && $_FILES['image']['name'] != null && $_FILES['image']['name'] != "no-image.png") {
				$blogImg = $this->ddoo_upload('image');
			}

			if (isset($blogImg)) {
				$data = array(
					"image" => $blogImg['upload_data']['file_name'],
					"title_tr" => htmlspecialchars($this->input->post('title_tr')),
					"title_en" => htmlspecialchars($this->input->post('title_en')),
					"description_tr" => htmlspecialchars($this->input->post('description_tr')),
					"description_en" => htmlspecialchars($this->input->post('description_en')),
					"isActive" => 1,
					"isCreatedAt" => date('d/m/Y'),
					"seo_url" => convertToSEO($this->input->post('title_en'))
				);
			} else {
				$data = array(
					"title_tr" => htmlspecialchars($this->input->post('title_tr')),
					"title_en" => htmlspecialchars($this->input->post('title_en')),
					"description_tr" => htmlspecialchars($this->input->post('description_tr')),
					"description_en" => htmlspecialchars($this->input->post('description_en')),
					"isActive" => 1,
					"isCreatedAt" => date('d/m/Y'),
					"seo_url" => convertToSEO($this->input->post('title_en'))
				);
			}

			$success = $this->blog_model->add($data);
			$last_id = $this->db->insert_id();
			if ($success) {
				//Save Copyrights
				$this->copyrights_model->add(
					array(
						"title" => random_string('alnum', 16),
						"url" => $this->input->post('copyrights_url'),
						"contentId" => $last_id
					)
				);
				$alert = array(
					"text" => "Blog ekleme işlemi başarılı ",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Blog ekleme işlemi bir hatadan dolayı tamamlanamadı.",
					"type" => "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-blog'));
		}
	}

	public function saveBlog($id)
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("title_tr", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("description_tr", "Açıklama (TR)", "required|trim");
		$this->form_validation->set_rules("title_en", "Açıklama (EN)", "required|trim");
		$this->form_validation->set_rules("description_en", "Açıklama (EN)", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES['image']) && $_FILES['image']['name'] != null && $_FILES['image']['name'] != "no-image.png") {
				if ($this->input->post('old_image') != $_FILES['image']['name']) {
					unlink('assets/uploads/blog/' . $this->input->post('old_image'));
				}
				$blogImg = $this->ddoo_upload('image');
			}

			if (isset($blogImg)) {
				$data = array(
					"image" => $blogImg['upload_data']['file_name'],
					"title_tr" => htmlspecialchars($this->input->post('title_tr')),
					"title_en" => htmlspecialchars($this->input->post('title_en')),
					"description_tr" => htmlspecialchars($this->input->post('description_tr')),
					"description_en" => htmlspecialchars($this->input->post('description_en')),
					"isActive" => 1,
					"seo_url" => convertToSEO($this->input->post('title_en'))
				);
			} else {
				$data = array(
					"title_tr" => htmlspecialchars($this->input->post('title_tr')),
					"title_en" => htmlspecialchars($this->input->post('title_en')),
					"description_tr" => htmlspecialchars($this->input->post('description_tr')),
					"description_en" => htmlspecialchars($this->input->post('description_en')),
					"isActive" => 1,
					"seo_url" => convertToSEO($this->input->post('title_en'))
				);
			}

			$success = $this->blog_model->update(array("Id" => $id), $data);
			//Save Copyrights
			$this->copyrights_model->update(
				array("contentId" => $id),
				array(
					"title" => random_string('alnum', 16),
					"url" => $this->input->post('copyrights_url'),
				)
			);

			if ($success) {
				$alert = array(
					"text" => "Blog güncelleme işlemi başarılı ",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Blog güncelleme işlemi bir hatadan dolayı tamamlanamadı.",
					"type" => "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-blog'));
		}
	}

	public function removeBlog($id)
	{
		//Get blog item
		$blogItem = $this->blog_model->get(array("Id" => $id));

		if (isset($blogItem->image) && $blogItem->image != "no-image.png") {
			unlink('assets/uploads/blog/' . $blogItem->image);
		}

		$remove = $this->blog_model->delete(array("Id" => $id));

		if ($remove) {
			$alert = array(
				"text" => "Blog silme işlemi başarılı.",
				"type" => "success"
			);
		} else {
			$alert = array(
				"text" => "Blog silme işlemi sırasında bir sorun oluştu.",
				"type" => "error"
			);
		}
		$this->session->set_flashdata("alert", $alert);
		redirect(base_url('manage-blog'));
	}


	public function blogChangeStatus($id)
	{
		$blogItem = $this->blog_model->get(array('Id' => $id));
		if ($blogItem->isActive) {
			$changeStatus = $this->blog_model->update(array('Id' => $id), array("isActive" => 0));
		} else {
			$changeStatus = $this->blog_model->update(array('Id' => $id), array("isActive" => 1));
		}

		if ($changeStatus) {
			$alert = array(
				"text" => "Durum güncelleme işlemi başarılı.",
				"type" => "success"
			);
		} else {
			$alert = array(
				"text" => "Durum güncelleme sırasında bir sorun oluştu.",
				"type" => "error"
			);
		}
		$this->session->set_flashdata("alert", $alert);
		redirect(base_url('manage-blog'));
	}


	public function ddoo_upload($filename)
	{
		$config["allowed_types"] = "jpg|jpeg|png|svg";
		$config["upload_path"] =   "assets/uploads/blog/";
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
