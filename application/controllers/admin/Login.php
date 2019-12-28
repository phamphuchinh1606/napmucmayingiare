<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends MY_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	function index(){

		if($this->input->post()){
			$this->form_validation->set_rules('username','Tên đăng nhập','required');
			$this->form_validation->set_rules('password','Mật khẩu','required');
			$this->form_validation->set_rules('login','login','callback_check_login');

			if($this->form_validation->run()){
				// tao session login
				$username = $this->input->post('username');
				$password = $this->input->post('password');
//				$password = md5($password);
				$where = array('username' => $username, 'password' => $password);
				$info = $this->admin_model->get_info_rule($where);
				$this->session->set_userdata('login', $info);
				if($info->admin_group_id != 0){
					redirect(site_url());
				}
				redirect(admin_url('home'));
			}
		}
		$this->load->view('admin/login/index');
	}
	// kiem tra user name va pass co chinh xac khong.
	function check_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
//		$password = md5($password);

		$where = array('username' => $username, 'password' => $password);
		$admin = $this->admin_model->get_info_rule($where);
		if($admin)
		{
			$this->session->set_userdata('quyen', json_decode($admin->quyen));
			$this->session->set_userdata('quyen_id', $admin->id);
			return true;
		}
		$this->form_validation->set_message(__FUNCTION__, 'Tên đăng nhập hoặc mật khẩu không đúng');
		return false;
	}
}