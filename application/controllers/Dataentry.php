<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataentry extends CI_Controller
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

	public function byform() {
		$this->load->model('LocationModel','loc');
		$parent_uuid = '7bcfed9e-0e92-492b-896f-2fa24faf862e';
		$data['loc'] = $this->loc->getAllChildLoc($parent_uuid);
		$data['loc'] = $data['loc'];
		$data['t1'] = $this->input->get("t1");
		$data['t2'] = $this->input->get("t2");
		$data['t3'] = $this->input->get("t3");
		$data['t4'] = $this->input->get("t4");
		$this->load->view("dataentry/byform",$data);
	}

	public function bytanggal() {
		$this->load->view("dataentry/bytanggal");
	}

	public function ontime() {
		$this->load->view("dataentry/ontime");
	}
}
