<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Ajax extends MY_Controller {

	function __construct(){
		parent::__construct();
	}
	function ajaxloadquanhuyen(){
		$this->load->model('tinhthanh_model');
		$this->load->model('quanhuyen_model');
		$idtinhthanh = $this->input->post('idtinhthanh');
		$input['where'] = array('tinhthanh_id' => $idtinhthanh);
		$input['order'] = array('sort_order', 'asc');
		$quanhuyen = $this->quanhuyen_model->get_list($input);
        foreach ($quanhuyen as $row){
        	echo "<option value='".$row->id."'>".$row->name.' ('.$row->name_en.')'."</option>";
    	}
	}
}