<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Donhang extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('setting_model');
		$this->load->model('transaction_model');
		$this->load->model('order_model');
		$this->load->model('product_model');
		$this->load->library('form_validation');
		$this->load->library('upload_library');
		$this->load->helper('form');
		$this->load->library('pagination');
	}
	function index(){
		$total_rows = $this->transaction_model->get_total();
		$this->data['total_rows'] = $total_rows;
		// phan trang
		$config = array();
		$config['total_rows'] = $total_rows; // tat ca san pham
		$config['base_url'] = admin_url('donhang/index'); // link hien thi ra danh sach san pham
		$config['per_page'] = 30; // so luong san pham tren 1 trang
		$config['uri_segment'] = 4;// phan doan hien thi số trang trên url
		$config['next_link'] = 'Trang sau';
		$config['prev_link'] = 'Trang trước';
		$this->pagination->initialize($config); // khoi tao cao hinh phan trang
		$segment = $this->uri->segment(4);
		$segment = intval($segment);
		$input = array();
		$input['limit'] = array($config['per_page'], $segment);
		//kiem tra co lọc hay không
		// loc theo id
		$tinhtrang = $this->input->get('tinhtrang');
		$input['where'] = array();
		if($tinhtrang != ''){
			$input['where']['status'] = $tinhtrang;
		}
		// loc theo id
		$id = $this->input->get('id');
		$id = intval($id);
		if($id > 0){
			$input['where']['id'] = $id;
		}
		// loc theo ten
		$title = $this->input->get('title');
		if($title){
			$input['like'] = array('user_name', $title);
		}
		// lấy danh sách san pham tren 1 trang

		$list = $this->transaction_model->get_list($input);
		$this->data['list'] = $list;
		$this->data['phantrang'] = $this->pagination->create_links();
		// lấy nội dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/donhang/index';
		$this->load->view('admin/main', $this->data);
	}
	function edit(){
		$id = intval($this->uri->rsegment('3'));
		$donhang = $this->transaction_model->get_info($id);
		if(!$donhang){
			$this->session->set_flashdata('message', 'Không tồn tại trang này');
			redirect(admin_url('donhang'));
		}
		$this->data['donhang'] = $donhang;
		$inputdetail['where'] = array('transaction_id' => $id);
		$chitietdonhang = $this->order_model->get_list($inputdetail);
		$this->data['chitietdonhang'] = $chitietdonhang;
		if($this->input->post())
		{
			$status = $this->input->post('status');
			$data = array (
				'status' => $status,
			);
			if($this->transaction_model->update($id,$data))
			{
				$this->session->set_flashdata('message', 'Cập nhật đơn hàng thành công');
			}else{
				$this->session->set_flashdata('message', 'Không cập nhật được đơn hàng này');
			}
			redirect(admin_url('donhang/edit/'.$id));
		}
		$this->data['temp'] = 'admin/donhang/edit';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	function inhoadon(){
		$this->data['infosetting'] = $this->setting_model->get_info(1);
		$id = intval($this->uri->rsegment('3'));
		$donhang = $this->transaction_model->get_info($id);
		if(!$donhang){
			$this->session->set_flashdata('message', 'Không tồn tại trang này');
			redirect(admin_url('donhang'));
		}
		$this->data['donhang'] = $donhang;
		$inputdetail['where'] = array('transaction_id' => $id);
		$chitietdonhang = $this->order_model->get_list($inputdetail);
		$this->data['chitietdonhang'] = $chitietdonhang;

		$this->load->view('admin/donhang/hoadon', $this->data);
	}
	function delete(){
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa đơn hàng thành công');
		redirect(admin_url('donhang'));
	}
	// xoa nhieu san pham
	function del_all(){
		$ids = $this->input->post('ids');
		foreach($ids as $id){
			$this->_del($id);
		}
		$this->session->set_flashdata('message', 'Xóa đơn hàng thành công');
		redirect(admin_url('donhang'));
	}
	private function _del($id){
		$info = $this->transaction_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Đơn hàng không tồn tại');
			redirect(admin_url('donhang'));
		}
		$this->transaction_model->delete($id);
	}
}