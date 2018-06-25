<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller
{
	function __construct() {
		parent::__construct();
	}

	public function saveAllChildLoc($parent_uuid="") {
		if($parent_uuid==""){
			exit("uuid is empty");
		}
		set_time_limit(3600);
		$this->load->model('LocationModel','loc');
		$loc = $this->loc->saveAllChildLoc($parent_uuid);
	}

	public function saveAllChildFromFile(){
		set_time_limit(3600);
		$this->load->model('LocationModel','loc');
		$loc = $this->loc->getAllChildLoc('ntb');
		$this->loc->saveEachocation($loc['locationsHierarchy']['map']);
	}


}
