<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Thongketruycap extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('thongketruycap_model');
	}
	// hien thi danh sach 
	function index(){

		$thongke = $this->thongketruycap_model->get_info(1);
		$this->data['thongke'] = $thongke;

		if($this->input->post())
		{
			$this->form_validation->set_rules('online', 'Số người online', 'numeric');
			$this->form_validation->set_rules('day', 'Số người truy cập trong ngày', 'numeric');
			$this->form_validation->set_rules('totalkh', 'Tổng truy cập', 'numeric');
			// khi nhap lieu chinh xac
			if($this->form_validation->run())
			{
				$online = $this->input->post('online');
				$day = $this->input->post('day');
				$totalkh = $this->input->post('totalkh');

				$data = array (
					'online' => $online,
					'day' => $day,
					'totalkh' => $totalkh
					);
				if($this->thongketruycap_model->update(1,$data))
				{
					// tạo nội dung thông báo luu vào set_flashdata bằng biến message (xem trên function index)
					$this->session->set_flashdata('message', 'Cập nhật thành công');
				}else{
					$this->session->set_flashdata('message', 'Không cập nhật được');
				}
				// chuyển tới trang danh sách admin và thông báo bằng biến message 
				redirect(admin_url('thongketruycap'));
			}

		}
		//lấy nội dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/thongketruycap/index';
		$this->load->view('admin/main', $this->data);
	}
}
