<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Lienhe extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('lienhe_model');
		$this->load->library('form_validation');
		$this->load->library('upload_library');
		$this->load->helper('form');
		// lấy nội dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
	}
	// hien thi danh sach slide
	function index(){
		// lấy danh sách slide tren 1 trang
		$input = array();
		$input['where'] = array('module' => 1);
		$list = $this->lienhe_model->get_list($input);
		$this->data['list'] = $list;
		$this->data['total_rows'] = count($list);

		$this->data['temp'] = 'admin/lienhe/index';
		$this->load->view('admin/main', $this->data);
	}

	public function traloi(){
		// lay thong tin khach hang
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$info = $this->lienhe_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'Không tồn tại khách hàng này');
			redirect(admin_url('lienhe'));
		}
		$this->data['info'] = $info;
		
		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Tiêu đề', 'required');
			$this->form_validation->set_rules('emailgui', 'Email gửi', 'required|valid_email');
			$this->form_validation->set_rules('emailnhan', 'Email nhận', 'required');
			$this->form_validation->set_rules('noidung', 'Nội dung', 'required');
			// khi nhap lieu chinh xac 
			if($this->form_validation->run())
			{
				$tieude = $this->input->post('name');
				$emailgui = $this->input->post('emailgui');
				$emailnhan = $this->input->post('emailnhan');
				$noidung = $this->input->post('noidung');
				$tennguoigui = $this->input->post('tennguoigui');
				// Cấu hình
			            $config['protocol']='smtp';
			            $config['smtp_host']='ssl://smtp.googlemail.com';
			            $config['smtp_port']='465';
			            $config['smtp_timeout']='30';
			            $config['smtp_user']='info.89warehouse@gmail.com';
			            $config['smtp_pass']='vwvkeptenugumcmq';
			            $config['charset']='utf-8';
			            $config['newline']="\r\n";
			            $config['wordwrap'] = TRUE;
			            $config['mailtype'] = 'html';
			            $this->email->initialize($config);
			            $this->email->from($emailgui, $tennguoigui);
			            $this->email->to($emailnhan);
			            $this->email->subject($tieude);
			            $this->email->message($noidung);
				//thuc hien gui
				if ( ! $this->email->send())
				{
				    // Generate error
				    $error = $this->email->print_debugger();
				    $this->session->set_flashdata('message', $error);
				}else{
				    $this->session->set_flashdata('message', 'Gửi mail thành công');
				}
				redirect(admin_url('lienhe'));
			}
		}
				
		$this->data['temp'] = 'admin/lienhe/traloi';
		$this->load->view('admin/main', $this->data);
	}
	function delete(){

		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa thành công');
		redirect(admin_url('lienhe'));
	}
	private function _del($id){
		
		$info = $this->lienhe_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Ý kiến này không tồn tại');
			redirect(admin_url('lienhe'));
		}

		$this->lienhe_model->delete($id);

	}
}