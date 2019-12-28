<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Trang extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('menu_model');
		$this->load->library('form_validation');
		$this->load->library('upload_library');
		$this->load->helper('form');
		$this->load->library("image_lib");
		// lấy nội dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
	}
	function index(){
		$input['where'] = array('kieubaiviet' => 1);
		$total_rows = $this->news_model->get_total($input);
		$this->data['total_rows'] = $total_rows;
		// lấy danh sách san pham tren 1 trang
		$list = $this->news_model->get_list($input);
		$this->data['list'] = $list;
		$this->data['temp'] = 'admin/trang/index';
		$this->load->view('admin/main', $this->data);
	}
	function an_hien(){
		$id = intval($this->uri->rsegment('3'));
		$anhien = $this->news_model->get_info($id);
		if(!$anhien){
			$this->session->set_flashdata('message', 'Trang này không tồn tại');
			redirect(admin_url('trang'));
		}
		if($anhien->status == 1){
			$data = array('status' => 0);
			$this->news_model->update($id, $data);
		}
		if($anhien->status == 0){
			$data = array('status' => 1);
			$this->news_model->update($id, $data);
		}
		redirect(admin_url('trang'));
		$this->db->cache_delete_all();
	}
	function noi_bat(){
		$id = intval($this->uri->rsegment('3'));
		$noibat = $this->news_model->get_info($id);
		if(!$noibat){
			$this->session->set_flashdata('message', 'Bài viết này không tồn tại');
			redirect(admin_url('trang'));
		}
		if($noibat->noibat == 1){
			$data = array('noibat' => 0);
			$this->news_model->update($id, $data);
		}
		if($noibat->noibat == 0){
			$data = array('noibat' => 1);
			$this->news_model->update($id, $data);
		}
		redirect(admin_url('trang'));
		$this->db->cache_delete_all();
	}
	function add(){
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			if($this->infosetting->ngonngu != 0){
				$this->form_validation->set_rules('name_en', 'Name', 'required');
			}
			// khi nhap lieu chinh xac
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
				// lấy ten file anh duoc upload
				$upload_path = './uploads/images/news';
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
					'slogan' => $this->input->post('slogan'),
					'slogan_en' => $this->input->post('slogan_en'),
					'intro' => $this->input->post('intro'),
					'intro_en' => $this->input->post('intro_en'),
					'content' => $this->input->post('content'),
					'content_en' => $this->input->post('content_en'),
					'image_link' => $image_link,
					'title' => $this->input->post('title'),
					'title_en' => $this->input->post('title_en'),
					'description' => $this->input->post('description'),
					'description_en' => $this->input->post('description_en'),
					'keyword' => $this->input->post('keyword'),
					'keyword_en' => $this->input->post('keyword_en'),
					'sort_order' => intval($this->input->post('sort_order')),
					'catalog_id' => NULL,
					'created' => now(),
					'kieubaiviet' => 1,
					'status' => 1
				);
				if($this->news_model->create($data)){
					$this->session->set_flashdata('message', 'Thêm trang thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được trang, thử lại sau');
				}
				redirect(admin_url('trang'));
			}
		}
		$this->data['temp'] = 'admin/trang/add';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	function edit(){
		$id = intval($this->uri->rsegment('3'));
		$baiviet = $this->news_model->get_info($id);
		if(!$baiviet){
			$this->session->set_flashdata('message', 'Không tồn tại trang này');
			redirect(admin_url('trang'));
		}
		$this->data['baiviet'] = $baiviet;
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			if($this->infosetting->ngonngu != 0){
				$this->form_validation->set_rules('name_en', 'Name', 'required');
			}
			// khi nhap lieu chinh xac
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
				// lấy ten file anh duoc upload
				$upload_path = './uploads/images/news';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				$image_link = '';
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$data = array(
					'slogan' => $this->input->post('slogan'),
					'slogan_en' => $this->input->post('slogan_en'),
					'name' => $name,
					'name_en' => $name_en,
					'url' => $url,
					'url_en' => $url_en,
					'intro' => $this->input->post('intro'),
					'intro_en' => $this->input->post('intro_en'),
					'content' => $this->input->post('content'),
					'content_en' => $this->input->post('content_en'),
					'title' => $this->input->post('title'),
					'title_en' => $this->input->post('title_en'),
					'description' => $this->input->post('description'),
					'description_en' => $this->input->post('description_en'),
					'keyword' => $this->input->post('keyword'),
					'keyword_en' => $this->input->post('keyword_en'),
					'sort_order' => intval($this->input->post('sort_order')),
				);
				if($image_link != '<' && $image_link != ''){
					$data['image_link'] = $image_link;
				}
				if($this->news_model->update($id,$data)){
					$this->session->set_flashdata('message', 'Cập nhật trang thành công');
				}else{
					$this->session->set_flashdata('message', 'Không cập nhật được trang này');
				}
				// Sửa tên trong bảng menu
				$where = array('link_id' => $id, 'module_menu' => 0);
				if($this->menu_model->check_exists($where)){
					$datamenu = array(
						'name' => $name,
						'name_en' => $name_en,
						'url' => $url.'-t'.$id,
						'url_en' => $url_en.'-t'.$id,
					);
					$this->menu_model->update_rule($where,$datamenu);
				}
				redirect(admin_url('trang/edit/'.$id));
			}
		}
		$this->data['temp'] = 'admin/trang/edit';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	// xoa san pham
	function delete(){

		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa trangthành công');
		redirect(admin_url('trang'));
		$this->db->cache_delete_all();
	}
	// xoa nhieu san pham
	function del_all(){
		
		$ids = $this->input->post('ids');
		foreach($ids as $id){
			$this->_del($id);
		}
		$this->session->set_flashdata('message', 'Xóa trang thành công');
		redirect(admin_url('trang'));
		$this->db->cache_delete_all();
	}
	
	private function _del($id){
		$info = $this->news_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Trang không tồn tại');
			redirect(admin_url('trang'));
		}
		$this->news_model->delete($id);
		// xoa hinh anh san pham
		$image_link = './uploads/images/news/'.$info->image_link;
		if(file_exists($image_link)){
			unlink($image_link);
		}
		// xoa anh kem theo
		$image_list = json_decode($info->image_list);
		if(is_array($image_list)){
			foreach ($image_list as $img){
				$image_link = './uploads/images/news/'.$img;
				if(file_exists($image_link)){
					unlink($image_link);
				}
			}
		}
		$this->db->cache_delete_all();
	}
}