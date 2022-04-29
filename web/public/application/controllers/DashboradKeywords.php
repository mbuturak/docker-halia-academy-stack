<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboradKeywords extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "keywords_v";
		$this->load->model('keywords_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->keywordItem = $this->keywords_model->get_all();
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function newKeywords()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/add/index", $viewData);
	}

	public function editKeywordForm($id)
	{
		$keywordItem = $this->keywords_model->get(array(
			"Id" => $id
		));
		$this->session->set_flashdata("keywordsItem", $keywordItem);
		redirect(base_url('manage-keywords'));
	}

	public function addKeywords()
	{
		$saveDetails = $this->keywords_model->add(
			array(
				"Icon" => htmlspecialchars($this->input->post("icon")),
				"title_tr" => htmlspecialchars($this->input->post("title_tr")),
				"title_en" => htmlspecialchars($this->input->post("title_en")),
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
		$this->session->set_flashdata("alert", $alert);
		redirect(base_url('manage-keywords'));
	}

	public function saveKeywords($id)
	{	
		$saveDetails = $this->keywords_model->update(
			array(
				"Id" => $id
			),
			array(
				"Icon" => htmlspecialchars($this->input->post("icon")),
				"title_tr" => htmlspecialchars($this->input->post("title_tr")),
				"title_en" => htmlspecialchars($this->input->post("title_en")),
			)
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
		redirect(base_url('manage-keywords'));
	}

	public function removeKeywords()
	{
		$delete = $this->keywords_model->delete(array('Id' => $this->input->post('keywordsId')));
		return true;
	}
}
