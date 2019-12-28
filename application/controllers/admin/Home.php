<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Home extends My_Controller {

	

	function index(){

		$this->data['temp'] = 'admin/home/index';

		$this->load->view('admin/main', $this->data);

	}

	// xóa session va dang xuat

	function logout(){



		if($this->session->userdata('login')){

			$this->session->unset_userdata('login');

		}

		redirect(admin_url('login'));

	}

}