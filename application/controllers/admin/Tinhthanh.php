<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Tinhthanh extends My_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('tinhthanh_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('quanhuyen_model');
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
	}
	function index(){
		$inputtinhthanh['order'] = array('sort_order', 'asc');
		$tinhthanh = $this->tinhthanh_model->get_list($inputtinhthanh);
		$this->data['tinhthanh'] = $tinhthanh;
		$this->data['tongso'] = $this->tinhthanh_model->get_total();
		$this->data['temp'] = 'admin/tinhthanh/index';
		$this->load->view('admin/main', $this->data);
	}
	function an_hien(){
		$id = intval($this->input->post('idajax'));
		$anhien = $this->tinhthanh_model->get_info($id);
		if(!$anhien){
			$this->session->set_flashdata('message', 'Danh mục này không tồn tại');
			redirect(admin_url('tinhthanh'));
		}
		if($anhien->status == 1){
			$data = array('status' => 0);
			$this->tinhthanh_model->update($id, $data);
			$link = public_url('admin/images/uncheck.png');
			echo "<img src='$link'>";
		}
		if($anhien->status == 0){
			$data = array('status' => 1);
			$this->tinhthanh_model->update($id, $data);
			$link = public_url('admin/images/check.png');
			echo "<img src='$link'>";
		}
		$this->db->cache_delete_all();
	}
	function add(){
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
			if($this->form_validation->run()){
				$data = array(
					'name' => $this->input->post('name'),
					'name_en' => $this->input->post('name_en'),
					'status' => 1,
					'sort_order' => intval($this->input->post('sort_order')),
				);
				if($this->tinhthanh_model->create($data)){
					$this->session->set_flashdata('message', 'Thêm thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được tỉnh thành');
				}
				redirect(admin_url('tinhthanh'));
			}
		}
		$this->data['temp'] = 'admin/tinhthanh/add';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	function edit(){
		$id = intval($this->uri->rsegment('3'));
		$info = $this->tinhthanh_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'Tỉnh thành này không tồn tại hoặc đã bị xóa');
			redirect(admin_url('tinhthanh'));
		}
		$this->data['info'] = $info;
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			$this->form_validation->set_rules('name_en', 'Name', 'required');
			if($this->form_validation->run()){
				$data = array(
					'name' => $this->input->post('name'),
					'name_en' => $this->input->post('name_en'),
					'status' => 1,
					'sort_order' => intval($this->input->post('sort_order')),
				);
				if($this->tinhthanh_model->update($id, $data)){
					$this->session->set_flashdata('message', 'Cập nhật danh mục thành công');
				}else{
					$this->session->set_flashdata('message', 'Không cập nhật được danh mục');
				}
				redirect(admin_url('tinhthanh/edit/'.$id));
			}
		}
		$this->data['temp'] = 'admin/tinhthanh/edit';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}

	function delete(){
		$id = intval($this->uri->rsegment('3'));
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa danh mục thành công');
		redirect(admin_url('tinhthanh'));
		$this->db->cache_delete_all();
	}
	
	function del_all(){
		$ids = $this->input->post('ids');
		foreach($ids as $id){
			$this->_del($id, false);
		}
		$this->db->cache_delete_all();
	}
	
	private function _del($id, $redirect = true){
		$info = $this->tinhthanh_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'Danh mục không tồn tại');
			if($redirect){
				redirect(admin_url('tinhthanh'));
			}else{
				return false;
			}
		}
		// kiem tra danh muc có san pham hay khong
		$product = $this->quanhuyen_model->get_info_rule(array('tinhthanh_id' => $id), 'id');
		if($product){
			$this->session->set_flashdata('message', 'Tỉnh thành '.$info->name.' này có chứa quận huyện. Bạn cần xóa quận huyện trước');
			if($redirect){
				redirect(admin_url('tinhthanh'));
			}else{
				return false;
			}
		}
		$this->tinhthanh_model->delete($id);
		$this->db->cache_delete_all();
	}
}