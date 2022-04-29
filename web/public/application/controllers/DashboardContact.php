<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardContact extends CI_Controller
{

	public $mainFolder = "";
	public $viewFolder = "";
	public $subViewFolder = "";
	public function __construct()

	{
		parent::__construct();
		$this->mainFolder = "panel";
		$this->viewFolder = "contact_v";
		$this->load->model('settings_model');
		$this->load->model('contact_model');
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->mainFolder = $this->mainFolder;
		$viewData->viewFolder = $this->viewFolder;
		$viewData->contactItem = $this->contact_model->get_all();
		$this->load->view("{$this->mainFolder}/{$viewData->viewFolder}/list/index", $viewData);
	}

	public function showMessageForm($id)
	{
		//Get message
		$messageItem = $this->contact_model->get(array("Id" => $id));
		if (isset($messageItem)) {
			$this->session->set_flashdata("contactItem", $messageItem);
		} else {
			//mesaj yok.
			$alert = array(
				"type" => "error",
				"text" => "Böyle bir mesaj bulunamadı."
			);
			$this->session->set_flashdata("alert", $alert);
		}
		redirect(base_url('manage-contact'));
	}

	public function sendEmail()
	{
		$messageId = $this->input->post('Id');
		$to = $this->input->post('customerEmail');
		$message =  $this->input->post('recevie-message');

		$SMTP_HOST = "ssl://smtp.gmail.com";
		$SMTP_USER = "01buturak@gmail.com";
		$SMTP_PASS = "mehmet7485+";
		$SMTP_PORT = '465';

		$config = array(
			"protocol" => "smtp",
			"smtp_host" => $SMTP_HOST,
			"smtp_port" => $SMTP_PORT,
			'smtp_user' => $SMTP_USER,
			'smtp_pass' => $SMTP_PASS,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'wordwrap' => true,
			'newline' => "\r\n"
		);

		$this->load->library('email', $config);
		$this->email->from($SMTP_USER, "HALIA Technology");
		$this->email->to($to);
		$this->email->subject("no-reply");
		$this->email->message($message);
		$send = $this->email->send();
		if ($send) {
			$save = $this->contact_model->update(array("Id" => $messageId), array("response" => $message, "isActive" => 1));
			if ($save) {
				$alert = array(
					"type" => "success",
					"text" => "Mail gönderimi başarılı"
				);
			}
		} else {
			$alert = array(
				"type" => "error",
				"text" => "Mail gönderimi sırasında bir hata meydana geldi"
			);
		}
		$this->session->set_flashdata("alert", $alert);
		redirect(base_url('manage-contact'));
	}

	public function saveContact()
	{
		$saveDetails = $this->settings_model->update(
			array("Id" => 1),
			array(
				"phone" => htmlspecialchars($this->input->post("phone")),
				"adress" => htmlspecialchars($this->input->post("adress")),
				"google_maps" => htmlspecialchars($this->input->post("google_maps")),
				"instagram" => htmlspecialchars($this->input->post("instagram")),
				"linkedin" => htmlspecialchars($this->input->post("linkedin")),
			)
		);

		if ($saveDetails) {
			$alert = array(
				"text" => "Adres güncelleme başarılı..",
				"type" => "success"
			);
		} else {
			$alert = array(
				"text" => "Adres güncelleme sırasında bir hata meydana geldi ! ",
				"type" => "error"
			);
		}
		$this->session->set_flashdata("alert", $alert);
		redirect(base_url('manage-contact'));
	}
}
