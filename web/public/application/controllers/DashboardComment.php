<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardComment extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "comment_v";
		$this->load->model('comment_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->commentItem = $this->comment_model->get_all();
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function newCommentForm()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/add/index", $viewData);
	}

	public function addComment()
	{

		$this->load->library("form_validation");

		$this->form_validation->set_rules("name", "İsim", "required|trim");
		$this->form_validation->set_rules("comment", "Yorum", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES["image"])) {
				$imageName = $this->ddoo_upload('image');
			}

			if (isset($imageName)) {
				$data = array(
					"image" => $imageName['upload_data']['file_name'],
					"name" => htmlspecialchars($this->input->post('name')),
					"comment" => htmlspecialchars($this->input->post('comment')),
					"isCreatedAt" => date("d/m/Y H:i")
				);
			} else {
				$data = array(
					"name" => htmlspecialchars($this->input->post('name')),
					"comment" => htmlspecialchars($this->input->post('comment')),
					"isCreatedAt" => date("d/m/Y H:i")
				);
			}

			$saveDetails = $this->comment_model->add($data);

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
			redirect(base_url('manage-comment'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('new-comment'));
		}
	}

	public function editComment($id)
	{
		$commentItem = $this->comment_model->get(array('Id' => $id));


		if (isset($commentItem)) {
			$this->session->set_flashdata("commentItem", $commentItem);
		} else {
			$alert = array(
				"text" => "Böyle bir yorum mevcut değil",
			);
			$this->session->set_flashdata("alert", $alert);
		}

		redirect(base_url('manage-comment'));
	}

	public function saveDetails($id)
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("name", "İsim", "required|trim");
		$this->form_validation->set_rules("comment", "Yorum", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			if (isset($_FILES['image'])) {
				if ($this->input->post('old_image') != $_FILES["image"]['name']) {
					unlink('assets/uploads/comments/' . $this->input->post('old_image'));
				}
				$imageName = $this->ddoo_upload('image');
			}

			if (isset($imageName)) {
				$data = array(
					"image" => $imageName['upload_data']['file_name'],
					"name" => htmlspecialchars($this->input->post('name')),
					"comment" => htmlspecialchars($this->input->post('comment')),
					"isCreatedAt" => date("d/m/Y H:i")
				);
			} else {
				$data = array(
					"name" => htmlspecialchars($this->input->post('name')),
					"comment" => htmlspecialchars($this->input->post('comment')),
					"isCreatedAt" => date("d/m/Y H:i")
				);
			}


			$saveDetails = $this->comment_model->update(array("Id" => $id), $data);

			if ($saveDetails) {
				$alert = array(
					"text" => "Güncelleme başarılı!",
					"type" => "success"
				);
			} else {
				$alert = array(
					"text" => "Güncelleme sırasında bir hata meydana geldi!",
					"type" => "error"
				);
			}
			$this->session->set_flashdata("alert", $alert);
			redirect(base_url('manage-comment'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('new-comment'));
		}
	}

	public function removeComment($id)
	{
		$delete = $this->comment_model->delete(array('Id' => $id));
		if ($delete) {
			$alert = array(
				"type" => "success",
				"text" => "Kayıt silindi"
			);
		}
		$this->session->set_flashdata("alert", $alert);
		redirect(base_url('manage-comment'));
	}

	public function ddoo_upload($filename)
	{
		$config["allowed_types"] = "jpg|jpeg|png|svg";
		$config["upload_path"] =   "assets/uploads/comments/";
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
