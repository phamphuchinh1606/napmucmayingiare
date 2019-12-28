<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Logodoitac extends MY_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model('logodoitac_model');
		$this->load->library('form_validation');
		$this->load->library('upload_library');
		$this->load->helper('form');
		$this->load->library("image_lib");
	}
	// hien thi danh sach logodoitac
	function index(){
		// lấy tong so luong logo trong website
		$total_rows = $this->logodoitac_model->get_total();
		$this->data['total_rows'] = $total_rows;
		// lấy danh sách logodoitac tren 1 trang
		$input = array();
		$list = $this->logodoitac_model->get_list($input);
		$this->data['list'] = $list;

		// lấy nội dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/logodoitac/index';
		$this->load->view('admin/main', $this->data);
	}
	// them du lieu
	function add()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Tên đối tác', 'required');
			$this->form_validation->set_rules('sort_order', 'Thứ tự', 'numeric');
			// khi nhap lieu chinh xac
			if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$link = $this->input->post('link');
				$sort_order = $this->input->post('sort_order');
				$sort_order = intval($sort_order);
				// lấy ten file anh minh hoa duoc upload
				$upload_path = './uploads/images/doitac';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				    // resize anh
				    $config['image_library'] = 'gd2';
                    $config['source_image'] = './uploads/images/doitac/'.$upload_data['file_name'];
                    $config['create_thumb'] = TRUE;
                    $config['quality'] = '80%';
                    $config['maintain_ratio'] = TRUE;
                    $config['width']     = 200;
                    $config['height']   = 70;
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
				$image_link = '';
				$image_thumb = '';
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
					$image_thumb = $upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];
				}
				$data = array (
					'name' => $name,
					'image_link' => $image_link,
					'image_thum' => $image_thumb,
					'url' => $link,
					'sort_order' => $sort_order,
					);
				if($this->logodoitac_model->create($data))
				{
					// tạo nội dung thông báo luu vào set_flashdata bằng biến message
					$this->session->set_flashdata('message', 'Thêm đối tác thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được đối tác');
				}
				// chuyển tới trang danh sách admin và thông báo bằng biến message 
				redirect(admin_url('logodoitac/add'));
			}

		}
		
		$this->data['temp'] = 'admin/logodoitac/add';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	
	// chinh sua san pham
	function edit(){
		// lay thong tin san pham edit theo id
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$logodoitac = $this->logodoitac_model->get_info($id);
		if(!$logodoitac){
			$this->session->set_flashdata('message', 'Không tồn tại đối tác này');
			redirect(admin_url('logodoitac'));
		}
		$this->data['logodoitac'] = $logodoitac;
		
		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Tên đối tác', 'required');
			$this->form_validation->set_rules('sort_order', 'Thứ tự', 'numeric');
			// khi nhap lieu chinh xac
			if($this->form_validation->run())
			{
				$name = $this->input->post('name');
				$link = $this->input->post('link');
				$sort_order = $this->input->post('sort_order');
				$sort_order = intval($sort_order);
				
				// lấy ten file anh minh hoa duoc upload
				$upload_path = './uploads/images/doitac';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				    // resize anh
				    $config['image_library'] = 'gd2';
		                    $config['source_image'] = './uploads/images/doitac/'.$upload_data['file_name'];
		                    $config['create_thumb'] = TRUE;
		                    $config['quality'] = '80%';
		                    $config['maintain_ratio'] = TRUE;
		                    $config['width']     = 200;
		                    $config['height']   = 70;
		                    $this->image_lib->initialize($config);
		                    $this->image_lib->resize();
				$image_link = '';
				$image_thumb = '';
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
					$image_thumb = $upload_data['raw_name'].'_thumb'.$upload_data['file_ext'];
				}
				$data = array (
					'name' => $name,
					'url' => $link,
					'sort_order' => $sort_order,
					);
				if($image_link != '<' && $image_link != ''){
					$data['image_link'] = $image_link;
					$data['image_thum'] = $image_thumb;
				}
				if($this->logodoitac_model->update($id, $data))
				{
					$this->session->set_flashdata('message', 'Cập nhật đối tác thành công');
				}else{
					$this->session->set_flashdata('message', 'Không Cập nhật được đối tác');
				}
				redirect(admin_url('logodoitac/edit/'.$id));
			}
		}
		
		$this->data['temp'] = 'admin/logodoitac/edit';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	// xoa tin tuc
	function delete(){

		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa đối tác thành công');
		redirect(admin_url('logodoitac'));
		$this->db->cache_delete_all();
	}
	// xoa nhieu san pham
	function del_all(){
		
		$ids = $this->input->post('ids');
		foreach($ids as $id){
			$this->_del($id);
		}
		$this->session->set_flashdata('message', 'Xóa đối tác thành công');
		redirect(admin_url('logodoitac'));
		$this->db->cache_delete_all();
	}
	
	private function _del($id){
		
		$info = $this->logodoitac_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Đối tác không tồn tại');
			redirect(admin_url('logodoitac'));
		}

		$this->logodoitac_model->delete($id);
		
		// xoa hinh anh san pham
		$image_link = './uploads/images/doitac/'.$info->image_link;
		if(file_exists($image_link)){
			unlink($image_link);
		}
		// xoa anh kem theo
		$image_list = json_decode($info->image_list);
		if(is_array($image_list)){
			foreach ($image_list as $img){
				$image_link = './uploads/images/doitac/'.$img;
				if(file_exists($image_link)){
					unlink($image_link);
				}
			}
		}
		$this->db->cache_delete_all();
	}
}