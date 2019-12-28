<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Catalognew extends My_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('catalognew_model');
		$this->load->model('menu_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('news_model');
		$this->load->library('upload_library');
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
	}
	function index(){
		$inputcatalog['order'] = array('sort_order', 'asc');
		$inputcatalog['where'] = array('parent_id' => 0);
		$catalogcha = $this->catalognew_model->get_list($inputcatalog);
		$this->data['catalogcha'] = $catalogcha;
		$this->data['temp'] = 'admin/catalognew/index';
		$this->load->view('admin/main', $this->data);
	}
	function an_hien(){
		$id = intval($this->input->post('idajax'));
		$anhien = $this->catalognew_model->get_info($id);
		if(!$anhien){
			$this->session->set_flashdata('message', 'Danh mục này không tồn tại');
			redirect(admin_url('catalognew'));
		}
		if($anhien->status == 1){
			$data = array('status' => 0);
			$this->catalognew_model->update($id, $data);
			$link = public_url('admin/images/uncheck.png');
			echo "<img src='$link'>";
		}
		if($anhien->status == 0){
			$data = array('status' => 1);
			$this->catalognew_model->update($id, $data);
			$link = public_url('admin/images/check.png');
			echo "<img src='$link'>";
		}
		$this->db->cache_delete_all();
	}
	function add(){
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			if($this->infosetting->ngonngu != 0){
				$this->form_validation->set_rules('name_en', 'Name', 'required');
			}
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$url = chuyenurl($this->input->post('url'));
				if($url == ''){
					$url = chuyenurl($name);
				}
				$name_en = $this->input->post('name_en');
				$url_en = chuyenurl($this->input->post('url_en'));
				if($url_en == ''){
					$url_en = chuyenurl($name_en);
				}
				// lấy ten file anh minh hoa duoc upload
				$upload_path = './uploads/images/catalogs';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				$image_link = '';
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$data = array(
					'name' => $name,
					'name_en' => $name_en,
					'url' => $url,
					'url_en' => $url_en,
					'intro' => $this->input->post('intro'),
					'intro_en' => $this->input->post('intro_en'),
					'title' => $this->input->post('title'),
					'title_en' => $this->input->post('title_en'),
					'description' => $this->input->post('description'),
					'description_en' => $this->input->post('description_en'),
					'keyword' => $this->input->post('keyword'),
					'keyword_en' => $this->input->post('keyword_en'),
					'parent_id' => $this->input->post('parent_id'),
					'status' => 1,
					'image_link' => $image_link,
					'module' => $this->input->post('module'),
					'sort_order' => intval($this->input->post('sort_order')),
				);
				if($this->catalognew_model->create($data)){
					$this->session->set_flashdata('message', 'Thêm danh mục thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được danh mục');
				}
				redirect(admin_url('catalognew'));
			}
		}
		$inputcatalog['order'] = array('sort_order', 'asc');
		$inputcatalog['where'] = array('parent_id' => 0);
		$catalogcha = $this->catalognew_model->get_list($inputcatalog);
		$this->data['catalogcha'] = $catalogcha;

		$this->data['temp'] = 'admin/catalognew/add';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	function edit(){
		$id = intval($this->uri->rsegment('3'));
		$info = $this->catalognew_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'Danh mục này không tồn tại hoặc đã bị xóa');
			redirect(admin_url('catalognew'));
		}
		$this->data['info'] = $info;
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			if($this->infosetting->ngonngu != 0){
				$this->form_validation->set_rules('name_en', 'Name', 'required');
			}
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$url = chuyenurl($this->input->post('url'));
				if($url == ''){
					$url = chuyenurl($name);
				}
				$name_en = $this->input->post('name_en');
				$url_en = chuyenurl($this->input->post('url_en'));
				if($url_en == ''){
					$url_en = chuyenurl($name_en);
				}
				// lay anh ten file duoc upload
				$upload_path = './uploads/images/catalogs';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				$image_link = '';
				if(isset($upload_data['file_name'])){
				$image_link = $upload_data['file_name'];
				}
				$data = array(
					'name' => $name,
					'name_en' => $name_en,
					'url' => $url,
					'url_en' => $url_en,
					'intro' => $this->input->post('intro'),
					'intro_en' => $this->input->post('intro_en'),
					'title' => $this->input->post('title'),
					'title_en' => $this->input->post('title_en'),
					'description' => $this->input->post('description'),
					'description_en' => $this->input->post('description_en'),
					'keyword' => $this->input->post('keyword'),
					'keyword_en' => $this->input->post('keyword_en'),
					'parent_id' => $this->input->post('parent_id'),
					'status' => 1,
					'module' => $this->input->post('module'),
					'sort_order' => intval($this->input->post('sort_order')),
				);
				if($image_link != '<' && $image_link != ''){
					$data['image_link'] = $image_link;
				}
				if($this->catalognew_model->update($id, $data)){
					$this->session->set_flashdata('message', 'Cập nhật danh mục thành công');
				}else{
					$this->session->set_flashdata('message', 'Không cập nhật được danh mục');
				}
				// Sửa tên trong bảng menu
				$where = array('link_id' => $id, 'module_menu' => 1);
				if($this->menu_model->check_exists($where)){
					$datamenu = array(
						'name' => $name,
						'name_en' => $name_en,
						'url' => $url.'-tt'.$id,
						'url_en' => $url_en.'-tt'.$id,
					);
					$this->menu_model->update_rule($where,$datamenu);
				}
				redirect(admin_url('catalognew/edit/'.$id));
			}
		}
		//lay danh muc
		$inputcatalog['order'] = array('sort_order', 'asc');
		$inputcatalog['where'] = array('parent_id' => 0);
		$catalogcha = $this->catalognew_model->get_list($inputcatalog);
		$this->data['catalogcha'] = $catalogcha;

		$this->data['temp'] = 'admin/catalognew/edit';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}

	function delete(){
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa danh mục thành công');
		redirect(admin_url('catalognew'));
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
		$info = $this->catalognew_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'Danh mục không tồn tại');
			if($redirect){
				redirect(admin_url('catalognew'));
			}else{
				return false;
			}
		}
		// kiem tra danh muc có danh muc con hay k;
		if(count($this->catalognew_model->menucon($info->id))>0){
			$this->session->set_flashdata('message', 'Danh mục '.$info->name.' này có chứa danh mục con. Bạn cần xóa danh mục con trước');
			if($redirect){
				redirect(admin_url('catalognew'));
			}else{
				return false;
			}
		}
		// kiem tra danh muc có san pham hay khong
		$product = $this->news_model->get_info_rule(array('catalog_id' => $id), 'id');
		if($product){
			$this->session->set_flashdata('message', 'Danh mục '.$info->name.' này có chứa sản phẩm. Bạn cần xóa sản phẩm trước');
			if($redirect){
				
				redirect(admin_url('catalognew'));
			}else{
				return false;
			}
		}
		$this->catalognew_model->delete($id);
		$this->db->cache_delete_all();
	}
}