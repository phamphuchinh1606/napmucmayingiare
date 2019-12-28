<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class News extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('catalognew_model');
		$this->load->library('form_validation');
		$this->load->library('upload_library');
		$this->load->helper('form');
		$this->load->library('pagination');
		$this->load->library("image_lib");
		// lấy nội dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
	}
	function index(){
		$inputtt['where'] = array('kieubaiviet' => 0);
		$total_rows = $this->news_model->get_total($inputtt);
		$this->data['total_rows'] = $total_rows;
		// phan trang
		$config = array();
		$config['total_rows'] = $total_rows; // tat ca san pham
		$config['base_url'] = admin_url('news/index/'); // link hien thi ra danh sach san pham
		$config['per_page'] = 30; // so luong san pham tren 1 trang
		//$config['uri_segment'] = 8;// phan doan hien thi số trang trên url
		$config['use_page_numbers'] = true;
		$config['next_link'] = '>';
		$config['prev_link'] = '<';
		$config['last_link']  = 'Cuối >>';
        	$config['first_link'] = '<< Đầu';
		$this->pagination->initialize($config); // khoi tao cao hinh phan trang
		$segment = $this->uri->segment(4);
		$segment = ($segment  == NULL) ? 0 : ($segment * $config['per_page']) - $config['per_page'];
		$input = array();
		$input['limit'] = array($config['per_page'], $segment);
		// loc theo id
		$id = $this->input->get('id');
		$id = intval($id);
		$input['where'] = array();
		$input['where'] = array('kieubaiviet' => 0);
		if($id > 0){
			$input['where']['id'] = $id;
		}
		// loc theo ten
		$name = $this->input->get('name');
		if($name){
			$input['like'] = array('name', $name);
		}
		// loc theo catalog
		$catalog_id = $this->input->get('catalog');
		$catalog_id = intval($catalog_id);
		if($catalog_id > 0){
			$input['where']['catalog_id'] = $catalog_id;
		}
		// lấy danh sách san pham tren 1 trang
		$list = $this->news_model->get_list($input);
		$this->data['list'] = $list;
		$this->data['phantrang'] = $this->pagination->create_links();

		// lấy thông tin catalog de tiem kiem
		$input = array();
		$input['where'] = array('parent_id' => 0);
		$catalog = $this->catalognew_model->get_list($input);
		$this->data['catalog'] = $catalog;
		$this->data['temp'] = 'admin/news/index';
		$this->load->view('admin/main', $this->data);
	}
	function an_hien(){
		$id = intval($this->input->post('idanhien'));
		$anhien = $this->news_model->get_info($id);
		if(!$anhien){
			$this->session->set_flashdata('message', 'Bài viết này không tồn tại');
			redirect(admin_url('news'));
		}
		if($anhien->status == 1){
			$data = array('status' => 0);
			$this->news_model->update($id, $data);
			$link = public_url('admin/images/uncheck.png');
			echo "<img src='$link'>";
		}
		if($anhien->status == 0){
			$data = array('status' => 1);
			$this->news_model->update($id, $data);
			$link = public_url('admin/images/check.png');
			echo "<img src='$link'>";
		}
		$this->db->cache_delete_all();
	}
	function noi_bat(){
		$id = intval($this->input->post('idnoibat'));
		$spnoibat = $this->news_model->get_info($id);
		if(!$spnoibat){
			$this->session->set_flashdata('message', 'Bài viết này không tồn tại');
			redirect(admin_url('news'));
		}
		if($spnoibat->noibat == 1){
			$data = array('noibat' => 0);
			$this->news_model->update($id, $data);
			$link = public_url('admin/images/uncheck.png');
			echo "<img src='$link'>";
		}
		if($spnoibat->noibat == 0){
			$data = array('noibat' => 1);
			$this->news_model->update($id, $data);
			$link = public_url('admin/images/check.png');
			echo "<img src='$link'>";
		}
		$this->db->cache_delete_all();
	}
	function add(){
		$inputcatalog['order'] = array('sort_order', 'asc');
		$inputcatalog['where'] = array('parent_id' => 0);
		$catalogcha = $this->catalognew_model->get_list($inputcatalog);
		$this->data['catalogcha'] = $catalogcha;
		if($this->input->post()){
			$this->form_validation->set_rules('catalog', 'Danh mục', 'required');
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
				// lấy ten file anh duoc upload
				$upload_path = './uploads/images/news';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				$image_link = '';
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$data = array(
					'linkvideo' => $this->input->post('linkvideo'),
					'map' => $this->input->post('map'),
					'name' => $name,
					'name_en' => $name_en,
					'url' => $url,
					'url_en' => $url_en,
					'catalog_id' => $this->input->post('catalog'),
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
					'created' => now(),
					'kieubaiviet' => 0,
					'status' => 1,
					'sort_order' => intval($this->input->post('sort_order')),
					'timer' => strtotime($this->input->post('timer')),
					'module' => $this->input->post('module'),
				);
				if($this->news_model->create($data)){
					$this->session->set_flashdata('message', 'Thêm bài viết thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được bài viết, thử lại sau');
				}
				redirect(admin_url('news'));
			}
		}
		$this->data['temp'] = 'admin/news/add';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	function edit(){
		$id = intval($this->uri->rsegment('3'));
		$baiviet = $this->news_model->get_info($id);
		if(!$baiviet){
			$this->session->set_flashdata('message', 'Không tồn tại bài viết này');
			redirect(admin_url('news'));
		}
		$this->data['baiviet'] = $baiviet;

		$input = array();
		$input['where'] = array('parent_id' => 0);
		$catalog = $this->catalognew_model->get_list($input);
		$this->data['catalog'] = $catalog;
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			if($this->infosetting->ngonngu != 0){
				$this->form_validation->set_rules('name_en', 'Name', 'required');
			}
			$this->form_validation->set_rules('catalog', 'Danh mục', 'required');

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
					'linkvideo' => $this->input->post('linkvideo'),
					'map' => $this->input->post('map'),
					'name' => $name,
					'name_en' => $name_en,
					'url' => $url,
					'url_en' => $url_en,
					'catalog_id' => $this->input->post('catalog'),
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
					'timer' => strtotime($this->input->post('timer')),
					'module' => $this->input->post('module'),
				);
				if($image_link != '<' && $image_link != ''){
					$data['image_link'] = $image_link;
				}
				if($this->news_model->update($id,$data)){
					$this->session->set_flashdata('message', 'Cập nhật bài viết thành công');
				}else{
					$this->session->set_flashdata('message', 'Không cập nhật được bài viết');
				}
				redirect(admin_url('news/edit/'.$id));
			}
		}
		$this->data['temp'] = 'admin/news/edit';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	// xoa san pham
	function delete(){
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa bài viết thành công');
		redirect(admin_url('news'));
		$this->db->cache_delete_all();
	}
	// xoa nhieu san pham
	function del_all(){
		$ids = $this->input->post('ids');
		foreach($ids as $id){
			$this->_del($id);
		}
		$this->session->set_flashdata('message', 'Xóa bài viết thành công');
		redirect(admin_url('news'));
		$this->db->cache_delete_all();
	}
	
	private function _del($id){
		$info = $this->news_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'bài viết không tồn tại');
			redirect(admin_url('news'));
		}
		$this->news_model->delete($id);
		// xoa hinh anh san pham
		$image_link = './uploads/news/'.$info->image_link;
		if(file_exists($image_link)){
			unlink($image_link);
		}
		// xoa anh kem theo
		$image_list = json_decode($info->image_list);
		if(is_array($image_list)){
			foreach ($image_list as $img){
				$image_link = './uploads/news/'.$img;
				if(file_exists($image_link)){
					unlink($image_link);
				}
			}
		}
		$this->db->cache_delete_all();
	}
}