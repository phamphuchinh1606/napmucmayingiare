<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Emailtintuc extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('lienhe_model');
		$this->load->library('form_validation');
		$this->load->library('upload_library');
		$this->load->helper('form');
		$this->load->library('pagination');
	}

	function index(){
		$input = array();
		$input['where'] = array('module' => 2);
		// lấy tong so luong bai viet trong website
		$total_rows = count($this->lienhe_model->get_list($input));
		$this->data['total_rows'] = $total_rows;

		// phan trang
		$config = array();
		$config['total_rows'] = $total_rows; // tat ca san pham
		$config['base_url'] = admin_url('emailtintuc/index'); // link hien thi ra danh sach san pham
		$config['per_page'] = 10; // so luong san pham tren 1 trang
		$config['uri_segment'] = 4;// phan doan hien thi số trang trên url
		$config['next_link'] = 'Trang sau';
		$config['prev_link'] = 'Trang trước';
		$this->pagination->initialize($config); // khoi tao cao hinh phan trang
		$segment = $this->uri->segment(4);
		$segment = intval($segment);
		$input['limit'] = array($config['per_page'], $segment);
		//kiem tra co lọc hay không
		// loc theo id
		$id = $this->input->get('id');
		$id = intval($id);
		$input['where'] = array();
		$input['where'] = array('module' => 2);
		if($id > 0){
			$input['where']['id'] = $id;
		}
		// loc theo ten
		$email = $this->input->get('email');
		if($email){
			$input['like'] = array('email', $email);
		}
		// lấy danh sách san pham tren 1 trang
		$list = $this->lienhe_model->get_list($input);

		$this->data['list'] = $list;
		$this->data['phantrang'] = $this->pagination->create_links();

		// lấy nội dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/emailtintuc/index';
		$this->load->view('admin/main', $this->data);
	}
	// them du lieu
	// xoa tin tuc
	function delete(){
		$id = intval($this->uri->rsegment('3'));
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa thành công');
		redirect(admin_url('emailtintuc'));
	}
	// xoa nhieu san pham
	function del_all(){
		$ids = $this->input->post('ids');
		foreach($ids as $id){
			$this->_del($id);
		}
		$this->session->set_flashdata('message', 'Xóa thành công');
		redirect(admin_url('emailtintuc'));
	}
	
	private function _del($id){
		$info = $this->lienhe_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'Email không tồn tại');
			redirect(admin_url('emailtintuc_model'));
		}
		$this->lienhe_model->delete($id);
	}
}