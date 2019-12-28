<?php

defined('BASEPATH') OR exit('No direct script access allowed');
Class Admin extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	function index()
	{
		$input = array();
		$list = $this->admin_model->get_list($input);
		$this->data['list'] = $list;
		$total = $this->admin_model->get_total($input);
		$this->data['total'] = $total;
		// lấy nội dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/admin/index';
		$this->load->view('admin/main', $this->data);

	}
	// Check user name tồn tại hay chưa
	function check_username(){
		$action = $this->uri->rsegment(2);
		$username = $this->input->post('username');
		$where = array('username' => $username);
		// kiem tra xem tai khoan da ton tai hay chua
		$check = true;
		if($action == 'edit'){
			$info = $this->data['info'];
			if($info->username == $username){
				$check = false;
			}
		}
		if($check && $this->admin_model->check_exists($where))
		{
			// thông báo lỗi
			$this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
			return false;
		}
		return true;
	}
	//Thêm mới quản trị viên
	function add()
	{
		// neu co du lieu post lên thì kiem tra
		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Tên', 'required|min_length[6]');
			$this->form_validation->set_rules('username', 'Tài khoản đăng nhập', 'required|min_length[6]|callback_check_username');
			$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
			$this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');
			//$this->form_validation->set_rules('quyen', 'quyền đăng nhập', 'required');
			// khi nhap lieu chinh xac
			if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$tongtien = $this->input->post('tongtien');
				$quyen = $this->input->post('quyen');
				$quyen = json_encode($quyen);
				$data = array (
					'name' => $name,
					'username' => $username,
					'password' => md5($password),
					'quyen' => $quyen,
					'admin_group_id' => 2,
					'tongtien' => $tongtien
					);
				if($this->admin_model->create($data))
				{
					// tạo nội dung thông báo luu vào set_flashdata bằng biến message (xem trên function index)
					$this->session->set_flashdata('message', 'Thêm người dùng thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				// chuyển tới trang danh sách admin và thông báo bằng biến message 
				redirect(admin_url('admin'));
			}
		}
		$this->config->load('quyen', true);
		$config_quyen = $this->config->item('quyen');
		$this->data['config_quyen'] = $config_quyen;
		$this->data['temp'] = 'admin/admin/add';
		$this->load->view('admin/main', $this->data);
	}
	// Chỉnh sửa thông tin quản trị viên
	function edit(){
		// lấy id cần chỉnh sửa phân đoạn thứ 3 của uri
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$info = $this->admin_model->get_info($id);
		// kiem tra admin này có tồn tai không
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Quản trị viên này không tồn tại');
			redirect(admin_url('admin'));
		}
		// kiem tra k cho sửa thành viên khác
		$admin_root = $this->config->item('root_admin');
		if(($this->session->userdata('quyen_id') != $id) && ($this->session->userdata('quyen_id') != $admin_root))
		{
			$this->session->set_flashdata('message', 'Ban không có quyền này');
			redirect(admin_url('admin'));
		}
		$info->quyen = json_decode($info->quyen);
		$this->data['info'] = $info;
		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Tên', 'required|min_length[6]');
			$this->form_validation->set_rules('username', 'Tài khoản đăng nhập', 'required|min_length[6]|callback_check_username');
			// kiểm tra nếu có nhập password thì mới kiềm tra validation
			$password = $this->input->post('password');
			if($password)
			{
				$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
				$this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');
			}
			// kiem tra validay chính xác
			if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$quyen = $this->input->post('quyen');
				$tongtien = $this->input->post('tongtien');
				$quyen = json_encode($quyen);
				if($this->session->userdata('quyen_id') == $admin_root){
					$data = array (
						'name' => $name,
						'username' => $username,
						'quyen' => $quyen,
						'tongtien' => $tongtien
						);
				}else{
					$data = array (
					'name' => $name,
					'username' => $username,
					'tongtien' => $tongtien
					);
				}
				// kiểm tra nếu có nhập password thì mới kiềm tra validation
				if($password)
				{
					$data['password'] = md5($password);
				}
				if($this->admin_model->update($id, $data))
				{
					// tạo nội dung thông báo luu vào set_flashdata bằng biến message (xem trên function index)
					$this->session->set_flashdata('message', 'Cập nhật người dùng thành công, <h5 style="color: red">Đăng nhập lại để cập nhật</h5>');
				}else{
					$this->session->set_flashdata('message', 'Không cập nhật được');
				}
				// chuyển tới trang danh sách admin và thông báo bằng biến message 
				redirect(admin_url('admin/edit/'.$id));
			}
		}
		$this->config->load('quyen', true);
		$config_quyen = $this->config->item('quyen');
		$this->data['config_quyen'] = $config_quyen;
		$this->data['temp'] = 'admin/admin/edit';
		$this->load->view('admin/main', $this->data);
	}
	// xoa nguoi dung
	function delete(){
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$info = $this->admin_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Người dùng không tồn tại');
			redirect(admin_url('admin'));
		}
		$this->admin_model->delete($id);
		$this->session->set_flashdata('message', 'Xóa người dùng thành công');
		redirect(admin_url('admin'));
	}
}