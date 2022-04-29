<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends MY_Controller
{

	public function index()
	{

		if ($_SESSION['lang'] == "en") {
			$this->lang->load("en", "en");
		} else {
			$this->lang->load("tr", "tr");
		}

		$this->load->view("web/contact_v/index");
	}

	public function saveContact()
	{

		$this->load->library("form_validation");

		$this->form_validation->set_rules("customerName", "Başlık (TR)", "required|trim");
		$this->form_validation->set_rules("customerPhone", "Alt Başlık (TR)", "trim");
		$this->form_validation->set_rules("customerEmail", "Video Link (TR)", "trim");
		$this->form_validation->set_rules("message", "Başlık (EN)", "required|trim");

		$this->form_validation->set_message(array(
			"required" => "{field} alanı doldurulmadı."
		));

		$validate = $this->form_validation->run();

		if ($validate) {
			$saveDetails = $this->contact_model->add(
				array(
					"customerName" => htmlspecialchars($this->input->post("customerName")),
					"customerPhone" => htmlspecialchars($this->input->post("customerPhone")),
					"customerEmail" => htmlspecialchars($this->input->post("customerEmail")),
					"productType" => htmlspecialchars($this->input->post("productType")),
					"productName" => htmlspecialchars($this->input->post("productName")),
					"message" => htmlspecialchars($this->input->post("message")),
					"isCreatedAt" => date("d/m/Y H:i"),
				)
			);

			if ($saveDetails) {
				$alert = array(
					"type" => "success"
				);
			}
		} else {
			$alert = array(
				"type" => "error"
			);
		}
		$this->session->set_flashdata("alert", $alert);
		redirect(base_url('contact'));
	}

	public function getProducts()
	{
		$product = "";
		$getProduct = getContactFormInformationMenu($this->input->post('myId'));
		foreach ($getProduct as $productItem) {
			$product .= "<option value='" . $productItem->Id . "'>" . $productItem->title_tr . "</option>";
		}
		print_r($product);
	}
}
