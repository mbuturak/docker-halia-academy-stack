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

			$saveDetails = $this->comment_model->add(array(
				"name" => htmlspecialchars($this->input->post('name')),
				"comment" => htmlspecialchars($this->input->post('comment')),
				"trainingId" => $this->input->post('trainingId'),
				"isCreatedAt" => date("d/m/Y H:i")
			));

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



			$saveDetails = $this->comment_model->update(array(), array(
				"name" => htmlspecialchars($this->input->post('name')),
				"comment" => htmlspecialchars($this->input->post('comment')),
				"trainingId" => $this->input->post('trainingId'),
				"isCreatedAt" => date("d/m/Y H:i")
			));

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

	public function removeComment()
	{
		$id = $this->input->post("commentId");

		$this->comment_model->delete(array('Id' => $id));
	}
}
