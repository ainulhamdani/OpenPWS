<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LocationModel extends CI_Model{

    function __construct() {
        parent::__construct();
    }

    public function getAllLoc(){

    }

    public function getAllChildLoc($uuid){
        $string = file_get_contents('assets/location/'.$uuid.'.json');
        return json_decode($string, true);
    }

    public function saveAllChildLoc($parent_uuid){
        $headers = [
            'Authorization: Basic xxxx=',
            'Content-Type: application/json'
        ];
        $url = 'http://ip:port/opensrp/location/location-tree/'.$parent_uuid;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        if(!$response){
            die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
        }
        curl_close($ch);
        $json = json_decode($response,true);
        if(!$json) {
            echo "bad json data!";
            exit;
        }
        file_put_contents('assets/location/ntb.json', $response);
        echo 'success';
        return json_decode($response,TRUE);
    }

    public function getTagDesc($tag){
        $tags = [
            'Province'=>'Provinsi',
            'District'=>'Kabupaten',
            'Sub-district'=>'Kecamatan',
            'Village'=>'Desa',
            'Sub-village'=>'Dusun'
        ];
        return $tags[$tag];
    }

    public function saveEachocation($map){
		foreach ($map as $uuid => $data) {
			$json = json_encode($data);
			file_put_contents('assets/location/'.$uuid.'.json', $json);
			if(isset($data['children'])){
				$this->saveEachocation($data['children']);
			}
		}
	}

}
