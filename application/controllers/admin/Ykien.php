<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Ykien extends MY_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model('ykien_model');
		$this->load->library('form_validation');
		$this->load->library('upload_library');
		$this->load->helper('form');
		$this->load->library("image_lib");
	}
	// hien thi danh sach ykien
	function index(){
		$total_rows = $this->ykien_model->get_total();
		$this->data['total_rows'] = $total_rows;
		// lấy danh sách ykien tren 1 trang
		$input = array();
		$list = $this->ykien_model->get_list($input);
		$this->data['list'] = $list;
		// lấy nội dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/ykien/index';
		$this->load->view('admin/main', $this->data);
	}
	// them du lieu
	function add(){
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			if($this->form_validation->run()){
				// lấy ten file anh minh hoa duoc upload
				$upload_path = './uploads/images/slide';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				$image_link = '';
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$data = array(
					'name' => $this->input->post('name'),
					'ykien_en' => $this->input->post('ykien_en'),
					'ykien' => $this->input->post('ykien'),
					'image_link' => $image_link,
					'sort_order' => intval($this->input->post('sort_order')),
				);
				if($this->ykien_model->create($data)){
					$this->session->set_flashdata('message', 'Thêm thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được. Thử lại sau');
				}
				// chuyển tới trang danh sách admin và thông báo bằng biến message 
				redirect(admin_url('ykien'));
			}
		}
		$this->data['temp'] = 'admin/ykien/add';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	// chinh sua san pham
	function edit(){
		// lay thong tin san pham edit theo id
		$id = intval($this->uri->rsegment('3'));
		$ykien = $this->ykien_model->get_info($id);
		if(!$ykien){
			$this->session->set_flashdata('message', 'Không tồn tại');
			redirect(admin_url('ykien'));
		}
		$this->data['ykien'] = $ykien;
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			if($this->form_validation->run()){
				// lấy ten file anh minh hoa duoc upload
				$upload_path = './uploads/images/slide';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				$image_link = '';
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$data = array(
					'name' => $this->input->post('name'),
					'ykien_en' => $this->input->post('ykien_en'),
					'ykien' => $this->input->post('ykien'),
					'sort_order' => intval($this->input->post('sort_order')),
				);
				if($image_link != '<' && $image_link != ''){
					$data['image_link'] = $image_link;
				}
				if($this->ykien_model->update($id, $data)){
					$this->session->set_flashdata('message', 'Cập nhật thành công');
				}else{
					$this->session->set_flashdata('message', 'Không Cập nhật được');
				}
				// chuyển tới trang danh sách admin và thông báo bằng biến message 
				redirect(admin_url('ykien'));
			}
		}
		$this->data['temp'] = 'admin/ykien/edit';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	// xoa ykien
	function delete(){
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa thành công');
		redirect(admin_url('ykien'));
		$this->db->cache_delete_all();
	}
	// xoa nhieu ykien
	function del_all(){
		$ids = $this->input->post('ids');
		foreach($ids as $id){
			$this->_del($id);
		}
		$this->session->set_flashdata('message', 'Xóa danh sách thành công');
		redirect(admin_url('ykien'));
		$this->db->cache_delete_all();
	}
	private function _del($id){
		$info = $this->ykien_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'Không tồn tại');
			redirect(admin_url('ykien'));
		}
		$this->ykien_model->delete($id);
		// xoa hinh anh
		$image_link = './uploads/images/slide/'.$info->image_link;
		if(file_exists($image_link)){
			unlink($image_link);
		}
		$this->db->cache_delete_all();
	}
}