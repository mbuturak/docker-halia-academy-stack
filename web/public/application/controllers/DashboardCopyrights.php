<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardCopyrights extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "copyrights_v";
		$this->load->model('copyrights_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->copyrightsItem = $this->copyrights_model->get_all();
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function newCopyrightsForm()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/add/index", $viewData);
	}

	public function addCopyrights()
	{

		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_rules("url", "Url", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$saveDetails = $this->copyrights_model->add(array(
				"title" => htmlspecialchars($this->input->post('title')),
				"url" => $this->input->post('url'),
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
			redirect(base_url('manage-copyrights'));
		} else {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url('new-comment'));
		}
	}

	public function editCopyrightsForm($id)
	{
		$commentItem = $this->copyrights_model->get(array('Id' => $id));


		if (isset($commentItem)) {
			$this->session->set_flashdata("copyrightsItem", $commentItem);
		} else {
			$alert = array(
				"text" => "Böyle bir yorum mevcut değil",
			);
			$this->session->set_flashdata("alert", $alert);
		}

		redirect(base_url('manage-copyrights'));
	}

	public function saveDetails($id)
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("title", "Başlık", "required|trim");
		$this->form_validation->set_rules("url", "Url", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {

			$saveDetails = $this->copyrights_model->update(array(
				"Id" => $id
			), array(
				"title" => htmlspecialchars($this->input->post('title')),
				"url" => $this->input->post('url'),
			));

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
			redirect(base_url('manage-copyrights'));
		}
	}

	public function removeCopyrights($id)
	{
		$this->copyrights_model->delete(array('Id' => $id));
		redirect(base_url('manage-copyrights'));
	}
}
