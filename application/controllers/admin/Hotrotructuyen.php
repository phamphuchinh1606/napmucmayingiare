<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Hotrotructuyen extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('hotrotructuyen_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	// hien thi danh sach 
	function index(){
		$total_rows = $this->hotrotructuyen_model->get_total();
		$this->data['total_rows'] = $total_rows;
		// lấy danh sách tren 1 trang
		$list = $this->hotrotructuyen_model->get_list();
		$this->data['list'] = $list;
		// lấy nội dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/hotrotructuyen/index';
		$this->load->view('admin/main', $this->data);
	}
	// them du lieu
	function add(){
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			if($this->form_validation->run()){
				$data = array(
					'name' => $this->input->post('name'),
					'chucdanh' => $this->input->post('chucdanh'),
					'chucdanh_en' => $this->input->post('chucdanh_en'),
					'sdt' => $this->input->post('sdt'),
					'sort_order' => intval($this->input->post('sort_order')),
				);
				if($this->hotrotructuyen_model->create($data)){
					$this->session->set_flashdata('message', 'Thêm thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được. Thử lại sau');
				}
				// chuyển tới trang danh sách admin và thông báo bằng biến message 
				redirect(admin_url('hotrotructuyen'));
			}
		}
		$this->data['temp'] = 'admin/hotrotructuyen/add';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	// chinh sua san pham
	function edit(){
		// lay thong tin san pham edit theo id
		$id = intval($this->uri->rsegment('3'));
		$hotrotructuyen = $this->hotrotructuyen_model->get_info($id);
		if(!$hotrotructuyen){
			$this->session->set_flashdata('message', 'Không tồn tại');
			redirect(admin_url('hotrotructuyen'));
		}
		$this->data['hotrotructuyen'] = $hotrotructuyen;
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			if($this->form_validation->run()){

				$data = array(
					'name' => $this->input->post('name'),
					'chucdanh' => $this->input->post('chucdanh'),
					'chucdanh_en' => $this->input->post('chucdanh_en'),
					'sdt' => $this->input->post('sdt'),
					'sort_order' => intval($this->input->post('sort_order')),
				);

				if($this->hotrotructuyen_model->update($id, $data)){
					$this->session->set_flashdata('message', 'Cập nhật thành công');
				}else{
					$this->session->set_flashdata('message', 'Không Cập nhật được');
				}
				// chuyển tới trang danh sách admin và thông báo bằng biến message 
				redirect(admin_url('hotrotructuyen'));
			}
		}
		$this->data['temp'] = 'admin/hotrotructuyen/edit';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	// xoa 
	function delete(){
		$id = intval($this->uri->rsegment('3'));
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa thành công');
		redirect(admin_url('hotrotructuyen'));
		$this->db->cache_delete_all();
	}
	// xoa nhieu 
	function del_all(){
		$ids = $this->input->post('ids');
		foreach($ids as $id){
			$this->_del($id);
		}
		$this->session->set_flashdata('message', 'Xóa danh sách thành công');
		redirect(admin_url('hotrotructuyen'));
		$this->db->cache_delete_all();
	}
	private function _del($id){
		$info = $this->hotrotructuyen_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'Không tồn tại');
			redirect(admin_url('hotrotructuyen'));
		}
		$this->hotrotructuyen_model->delete($id);

		$this->db->cache_delete_all();
	}
}