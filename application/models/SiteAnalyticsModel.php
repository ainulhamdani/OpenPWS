<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SiteAnalyticsModel extends CI_Model{

    function __construct() {
        parent::__construct();
    }

    public function trackPage($tab,$page,$url){
        date_default_timezone_set("Asia/Makassar");
        $now = date("Y-m-d H:i:s");
        $this->db->query("INSERT INTO page_views (username,level,tipe,tab,page,url,timestamp) VALUES ("
                ."'".$this->session->userdata('username')."',"
                ."'".$this->session->userdata('level')."',"
                ."'".$this->session->userdata('tipe')."',"
                ."'".$tab."',"
                ."'".$page."',"
                ."'".$url."',"
                ."'".$now. "')");
    }

}
