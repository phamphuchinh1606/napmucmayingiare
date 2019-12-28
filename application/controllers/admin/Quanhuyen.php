<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Quanhuyen extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('quanhuyen_model');
		$this->load->model('tinhthanh_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->library('pagination');
		// lấy nội dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
	}
	function index(){
		$total_rows = $this->quanhuyen_model->get_total();
		$this->data['total_rows'] = $total_rows;
		// phan trang
		$config = array();
		$config['total_rows'] = $total_rows; // tat ca san pham
		$config['base_url'] = admin_url('quanhuyen/index/'); // link hien thi ra danh sach san pham
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
		// loc theo ten
		$name = $this->input->get('name');
		if($name){
			$input['like'] = array('name', $name);
		}
		// loc theo catalog
		$catalog_id = intval($this->input->get('catalog'));
		if($catalog_id > 0){
			$input['where']['tinhthanh_id'] = $catalog_id;
		}
		// lấy danh sách san pham tren 1 trang
		$input['order'] = array('sort_order', 'asc');
		$list = $this->quanhuyen_model->get_list($input);
		$this->data['list'] = $list;
		$this->data['phantrang'] = $this->pagination->create_links();

		// lấy thông tin catalog de tim kiem
		$catalog = $this->tinhthanh_model->get_list();
		$this->data['catalog'] = $catalog;
		$this->data['temp'] = 'admin/quanhuyen/index';
		$this->load->view('admin/main', $this->data);
	}
	function an_hien(){
		$id = intval($this->input->post('idanhien'));
		$anhien = $this->quanhuyen_model->get_info($id);
		if(!$anhien){
			$this->session->set_flashdata('message', 'Bài viết này không tồn tại');
			redirect(admin_url('quanhuyen'));
		}
		if($anhien->status == 1){
			$data = array('status' => 0);
			$this->quanhuyen_model->update($id, $data);
			$link = public_url('admin/images/uncheck.png');
			echo "<img src='$link'>";
		}
		if($anhien->status == 0){
			$data = array('status' => 1);
			$this->quanhuyen_model->update($id, $data);
			$link = public_url('admin/images/check.png');
			echo "<img src='$link'>";
		}
		$this->db->cache_delete_all();
	}
	function add(){
		$inputcatalog['order'] = array('sort_order', 'asc');
		$catalogcha = $this->tinhthanh_model->get_list($inputcatalog);
		$this->data['catalogcha'] = $catalogcha;
		if($this->input->post()){
			$this->form_validation->set_rules('catalog', 'Tỉnh thành', 'required');
			$this->form_validation->set_rules('name', 'Tên', 'required');
			$this->form_validation->set_rules('name', 'Name', 'required');
			if($this->form_validation->run()){
				$data = array(
					'name' => $this->input->post('name'),
					'name_en' => $this->input->post('name_en'),
					'tinhthanh_id' => $this->input->post('catalog'),
					'status' => 1,
					'sort_order' => intval($this->input->post('sort_order')),
				);
				if($this->quanhuyen_model->create($data)){
					$this->session->set_flashdata('message', 'Thêm quận/huyện thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được quận/huyện, thử lại sau');
				}
				redirect(admin_url('quanhuyen'));
			}
		}
		$this->data['temp'] = 'admin/quanhuyen/add';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	function edit(){
		$id = intval($this->uri->rsegment('3'));
		$baiviet = $this->quanhuyen_model->get_info($id);
		if(!$baiviet){
			$this->session->set_flashdata('message', 'Không tồn tại quận/huyện này');
			redirect(admin_url('quanhuyen'));
		}
		$this->data['baiviet'] = $baiviet;
		$catalog = $this->tinhthanh_model->get_list();
		$this->data['catalog'] = $catalog;
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			$this->form_validation->set_rules('name_en', 'Name', 'required');
			$this->form_validation->set_rules('catalog', 'Tỉnh thành', 'required');

			// khi nhap lieu chinh xac
			if($this->form_validation->run()){
				$data = array(
					'name' => $this->input->post('name'),
					'name_en' => $this->input->post('name_en'),
					'tinhthanh_id' => $this->input->post('catalog'),
					'sort_order' => intval($this->input->post('sort_order')),
				);
				if($this->quanhuyen_model->update($id,$data)){
					$this->session->set_flashdata('message', 'Cập nhật quận/huyện thành công');
				}else{
					$this->session->set_flashdata('message', 'Không cập nhật được quận/huyện');
				}
				redirect(admin_url('quanhuyen/edit/'.$id));
			}
		}
		$this->data['temp'] = 'admin/quanhuyen/edit';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	// xoa san pham
	function delete(){
		$id = intval($this->uri->rsegment('3'));
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa quận/huyện thành công');
		redirect(admin_url('quanhuyen'));
		$this->db->cache_delete_all();
	}
	// xoa nhieu san pham
	function del_all(){
		$ids = $this->input->post('ids');
		foreach($ids as $id){
			$this->_del($id);
		}
		$this->session->set_flashdata('message', 'Xóa quận/huyện thành công');
		redirect(admin_url('quanhuyen'));
		$this->db->cache_delete_all();
	}
	private function _del($id){
		$info = $this->quanhuyen_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'Quận/huyện không tồn tại');
			redirect(admin_url('quanhuyen'));
		}
		$this->quanhuyen_model->delete($id);
		$this->db->cache_delete_all();
	}
}