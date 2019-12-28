<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Slide extends MY_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->model('slide_model');
		$this->load->library('form_validation');
		$this->load->library('upload_library');
		$this->load->helper('form');
		$this->load->library("image_lib");
	}
	// hien thi danh sach slide
	function index(){
		$total_rows = $this->slide_model->get_total();
		$this->data['total_rows'] = $total_rows;
		// lấy danh sách slide tren 1 trang
		$input = array();
		$list = $this->slide_model->get_list($input);
		$this->data['list'] = $list;
		// lấy nội dung message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->data['temp'] = 'admin/slide/index';
		$this->load->view('admin/main', $this->data);
	}
	// them du lieu
	function add(){
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			if($this->infosetting->ngonngu != 0){
				$this->form_validation->set_rules('name_en', 'Name', 'required');
			}
			// khi nhap lieu chinh xac
			if($this->form_validation->run()){
				// lấy ten file anh minh hoa duoc upload
				$upload_path = './uploads/images/slide';

				$upload_data = $this->upload_library->upload($upload_path, 'image');
				$image_link = '';
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$upload_data_en = $this->upload_library->upload($upload_path, 'image_en');
				$image_link_en = '';
				if(isset($upload_data_en['file_name'])){
					$image_link_en = $upload_data_en['file_name'];
				}
				$upload_data_mobile = $this->upload_library->upload($upload_path, 'image_mobile');
				$image_link_mobile = '';
				if(isset($upload_data_mobile['file_name'])){
					$image_link_mobile = $upload_data_mobile['file_name'];
				}
				$upload_data_mobile_en = $this->upload_library->upload($upload_path, 'image_mobile_en');
				$image_link_mobile_en = '';
				if(isset($upload_data_mobile_en['file_name'])){
					$image_link_mobile_en = $image_link_mobile_en['file_name'];
				}
				$data = array(
					'name' => $this->input->post('name'),
					'name_en' => $this->input->post('name_en'),
					'link' => $this->input->post('link'),
					'link_en' => $this->input->post('link_en'),
					'intro' => $this->input->post('intro'),
					'intro_en' => $this->input->post('intro_en'),
					'image_link' => $image_link,
					'image_link_en' => $image_link_en,
					'image_link_mobile' => $image_link,
					'image_link_mobile_en' => $image_link_en,
					'sort_order' => intval($this->input->post('sort_order')),
				);
				if($this->slide_model->create($data)){
					$this->session->set_flashdata('message', 'Thêm slide thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được slide. Thử lại sau');
				}
				// chuyển tới trang danh sách admin và thông báo bằng biến message 
				redirect(admin_url('slide'));
			}
		}
		$this->data['temp'] = 'admin/slide/add';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	// chinh sua san pham
	function edit(){
		// lay thong tin san pham edit theo id
		$id = intval($this->uri->rsegment('3'));
		$slide = $this->slide_model->get_info($id);
		if(!$slide){
			$this->session->set_flashdata('message', 'Không tồn tại');
			redirect(admin_url('slide'));
		}
		$this->data['slide'] = $slide;
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			if($this->infosetting->ngonngu != 0){
				$this->form_validation->set_rules('name_en', 'Name', 'required');
			}
			// khi nhap lieu chinh xac
			if($this->form_validation->run()){
				// lấy ten file anh minh hoa duoc upload
				$upload_path = './uploads/images/slide';

				$upload_data = $this->upload_library->upload($upload_path, 'image');
				$image_link = '';
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$upload_data_en = $this->upload_library->upload($upload_path, 'image_en');
				$image_link_en = '';
				if(isset($upload_data_en['file_name'])){
					$image_link_en = $upload_data_en['file_name'];
				}
				$upload_data_mobile = $this->upload_library->upload($upload_path, 'image_mobile');
				$image_link_mobile = '';
				if(isset($upload_data_mobile['file_name'])){
					$image_link_mobile = $upload_data_mobile['file_name'];
				}
				$upload_data_mobile_en = $this->upload_library->upload($upload_path, 'image_mobile_en');
				$image_link_mobile_en = '';
				if(isset($upload_data_mobile_en['file_name'])){
					$image_link_mobile_en = $upload_data_mobile_en['file_name'];
				}
				$data = array(
					'name' => $this->input->post('name'),
					'name_en' => $this->input->post('name_en'),
					'link' => $this->input->post('link'),
					'link_en' => $this->input->post('link_en'),
					'intro' => $this->input->post('intro'),
					'intro_en' => $this->input->post('intro_en'),
					'sort_order' => intval($this->input->post('sort_order')),
				);

				if($image_link != '<' && $image_link != ''){
					$data['image_link'] = $image_link;
				}
				if($image_link_en != '<' && $image_link_en != ''){
					$data['image_link_en'] = $image_link_en;
				}
				if($image_link_mobile != '<' && $image_link_mobile != ''){
					$data['image_link_mobile'] = $image_link_mobile;
				}
				if($image_link_mobile_en != '<' && $image_link_mobile_en != ''){
					$data['image_link_mobile_en'] = $image_link_mobile_en;
				}
				if($this->slide_model->update($id, $data)){
					$this->session->set_flashdata('message', 'Cập nhật slide thành công');
				}else{
					$this->session->set_flashdata('message', 'Không Cập nhật được slide');
				}
				// chuyển tới trang danh sách admin và thông báo bằng biến message 
				redirect(admin_url('slide'));
			}
		}
		$this->data['temp'] = 'admin/slide/edit';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	// xoa slide
	function delete(){
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa slide thành công');
		redirect(admin_url('slide'));
		$this->db->cache_delete_all();
	}
	// xoa nhieu slide
	function del_all(){
		$ids = $this->input->post('ids');
		foreach($ids as $id){
			$this->_del($id);
		}
		$this->session->set_flashdata('message', 'Xóa danh sách slide thành công');
		redirect(admin_url('slide'));
		$this->db->cache_delete_all();
	}
	private function _del($id){
		$info = $this->slide_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'Slide không tồn tại');
			redirect(admin_url('slide'));
		}
		$this->slide_model->delete($id);
		// xoa hinh anh
		$image_link = './uploads/images/slide/'.$info->image_link;
		if(file_exists($image_link)){
			unlink($image_link);
		}
		// xoa anh kem theo
		$image_list = json_decode($info->image_list);
		if(is_array($image_list)){
			foreach ($image_list as $img){
				$image_link = './uploads/images/slide/'.$img;
				if(file_exists($image_link)){
					unlink($image_link);
				}
			}
		}
		$this->db->cache_delete_all();
	}
}