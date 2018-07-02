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

        if($this->session->userdata('level')=="demo"){
            $this->load->model('LocationModel','loc');
            $this->load->model('DemoAnalyticsFhwEcModel','AnalyticsFhwModel');
            $this->load->model('DemoAnalyticsEcModel','AnalyticsModel');
            $this->load->model('DemoOnTimeSubmissionModel','OnTimeSubmissionModel');
        }else{
            $this->load->model('LocationModel','loc');
            $this->load->model('AnalyticsFhwEcModel','AnalyticsFhwModel');
            $this->load->model('AnalyticsEcModel','AnalyticsModel');
            $this->load->model('OnTimeSubmissionModel','OnTimeSubmissionModel');
        }
	}

	public function index() {
		$this->load->view("admin/home");
	}

	public function byform() {
		$this->load->model('LocationModel','loc');
		if($this->session->userdata('level')=="fhw"){

		}else{
			if($this->input->get('start')==null){
				$now = date("Y-m-d");
				redirect($this->uri->uri_string()."?start=2018-01-01&end=$now".(empty($this->input->get())?"":"&".http_build_query($this->input->get())));
			}else{
				$data['start'] = $this->input->get('start');
                $data['end'] = $this->input->get('end');
			}

			$parent_uuid = '7bcfed9e-0e92-492b-896f-2fa24faf862e';
			$data['loc'] = $this->loc->getAllChildLoc($parent_uuid);
			$data['loc'] = $data['loc'];
			$data['t1'] = $this->input->get("t1");
			$data['t2'] = $this->input->get("t2");
			$data['t3'] = $this->input->get("t3");
			$data['t4'] = $this->input->get("t4");
			if(isset($data['t4'])){
				$data['data'] = $this->AnalyticsModel->getCountPerForm($data['t4'],$data['start'],$data['end']);
			}elseif(isset($data['t3'])){
				$data['data'] = $this->AnalyticsModel->getCountPerForm($data['t3'],$data['start'],$data['end']);
			}elseif(isset($data['t2'])){
				$data['data'] = $this->AnalyticsModel->getCountPerForm($data['t2'],$data['start'],$data['end']);
			}elseif(isset($data['t1'])){
				$data['data'] = $this->AnalyticsModel->getCountPerForm($data['t1'],$data['start'],$data['end']);
			}else{
				$data['data'] = $this->AnalyticsModel->getCountPerForm($parent_uuid,$data['start'],$data['end']);
			}

			$this->load->view("dataentry/byform",$data);
		}

	}

	public function bytanggal() {
		$this->load->model('LocationModel','loc');
		if($this->session->userdata('level')=="fhw"){

		}else{
			if($this->input->get('start')==null){
				$now = date("Y-m-d");
                $start = date("Y-m-d",  strtotime($now."-29 days"));
				redirect($this->uri->uri_string()."?start=$start&end=$now".(empty($this->input->get())?"":"&".http_build_query($this->input->get())));
			}else{
				$data['start'] = $this->input->get('start');
                $data['end'] = $this->input->get('end');
			}

			$parent_uuid = '7bcfed9e-0e92-492b-896f-2fa24faf862e';
			$data['loc'] = $this->loc->getAllChildLoc($parent_uuid);
			$data['loc'] = $data['loc'];
			$data['t1'] = $this->input->get("t1");
			$data['t2'] = $this->input->get("t2");
			$data['t3'] = $this->input->get("t3");
			$data['t4'] = $this->input->get("t4");
			if(isset($data['t4'])){
				$data['data'] = $this->AnalyticsModel->getCountPerDayDrill($data['t4'],"",array($data['start'],$data['end']));
			}elseif(isset($data['t3'])){
				$data['data'] = $this->AnalyticsModel->getCountPerDayDrill($data['t3'],"",array($data['start'],$data['end']));
			}elseif(isset($data['t2'])){
				$data['data'] = $this->AnalyticsModel->getCountPerDayDrill($data['t2'],"",array($data['start'],$data['end']));
			}elseif(isset($data['t1'])){
				$data['data'] = $this->AnalyticsModel->getCountPerDayDrill($data['t1'],"",array($data['start'],$data['end']));
			}else{
				$data['data'] = $this->AnalyticsModel->getCountPerDayDrill($parent_uuid,"",array($data['start'],$data['end']));
			}

			$this->load->view("dataentry/bytanggal",$data);
		}
	}

	public function ontime() {
		$this->load->view("dataentry/ontime");
	}

    public function getbidanByFormByVisitDate($desa,$date){
        if($this->session->userdata('level')=="fhw"){
            $data = $this->AnalyticsFhwModel->getCountPerFormForDrill($desa,$date);
        }else{
            $data = $this->AnalyticsModel->getCountPerFormByVisitDateForDrill($desa,$date);
        }

        echo json_encode($data);
    }

    public function getbidanByForm($desa,$date){
        if($this->session->userdata('level')=="fhw"){
            $data = $this->AnalyticsFhwModel->getCountPerFormForDrill($desa,$date);
        }else{
            $data = $this->AnalyticsModel->getCountPerFormForDrill($desa,$date);
        }

        echo json_encode($data);
    }
    public function getfhwbidanByForm($desa,$date){

        $data = $this->AnalyticsFhwModel->getCountPerFormForDrill($desa,$date);
        echo json_encode($data);
    }
}
