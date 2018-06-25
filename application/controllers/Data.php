<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller
{
	function __construct() {
		parent::__construct();

		if(empty($this->session->userdata('id_user'))&&$this->session->userdata('admin_valid') == FALSE) {
			$this->session->set_flashdata('flash_data', 'You don\'t have access!');
			$this->session->set_flashdata('url', $this->uri->uri_string);
			redirect('login');
		}
	}

	public function index() {
		$this->load->view("admin/home");
	}

	public function dataibu() {
		$this->load->view("admin/home");
	}

	public function dataanak() {
		$this->load->view("admin/home");
	}
}
