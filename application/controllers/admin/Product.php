<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Product extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('catalog_model');
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
		$total_rows = $this->product_model->get_total();
		$this->data['total_rows'] = $total_rows;
		// phan trang
		$config = array();
		$config['total_rows'] = $total_rows; // tat ca san pham
		$config['base_url'] = admin_url('product/index/'); // link hien thi ra danh sach
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
		//kiem tra co lọc hay không
		// loc theo id
		$id = $this->input->get('id');
		$id = intval($id);
		$input['where'] = array();
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
		$list = $this->product_model->get_list($input);
		$this->data['list'] = $list;
		$this->data['phantrang'] = $this->pagination->create_links();

		// lấy thông tin catalog de tiem kiem
		$input = array();
		$input['where'] = array('parent_id' => 0);
		$catalog = $this->catalog_model->get_list($input);
		$this->data['catalog'] = $catalog;

		$this->data['temp'] = 'admin/product/index';
		$this->load->view('admin/main', $this->data);
	}
	// an hien san pham
	function sp_an_hien(){
		$id = intval($this->input->post('idanhien'));
		$anhien = $this->product_model->get_info($id);
		if(!$anhien){
			$this->session->set_flashdata('message', 'Sản phẩm này không tồn tại');
			redirect(admin_url('product'));
		}
		if($anhien->status == 1){
			$data = array('status' => 0);
			$this->product_model->update($id, $data);
			$link = public_url('admin/images/uncheck.png');
			echo "<img src='$link'>";
		}
		if($anhien->status == 0){
			$data = array('status' => 1);
			$this->product_model->update($id, $data);
			$link = public_url('admin/images/check.png');
			echo "<img src='$link'>";
		}
		$this->db->cache_delete_all();
	}
	function sp_new(){
		$id = intval($this->input->post('idnew'));
		$spnew = $this->product_model->get_info($id);
		if(!$spnew){
			$this->session->set_flashdata('message', 'Sản phẩm này không tồn tại');
			redirect(admin_url('product'));
		}
		if($spnew->new == 1){
			$data = array('new' => 0);
			$this->product_model->update($id, $data);
			$link = public_url('admin/images/uncheck.png');
			echo "<img src='$link'>";
		}
		if($spnew->new == 0){
			$data = array('new' => 1);
			$this->product_model->update($id, $data);
			$link = public_url('admin/images/check.png');
			echo "<img src='$link'>";
		}
		$this->db->cache_delete_all();
	}
	function sp_noi_bat(){
		$id = intval($this->input->post('idnoibat'));
		$spnoibat = $this->product_model->get_info($id);
		if(!$spnoibat){
			$this->session->set_flashdata('message', 'Sản phẩm này không tồn tại');
			redirect(admin_url('product'));
		}
		if($spnoibat->noibat == 1){
			$data = array('noibat' => 0);
			$this->product_model->update($id, $data);
			$link = public_url('admin/images/uncheck.png');
			echo "<img src='$link'>";
		}
		if($spnoibat->noibat == 0){
			$data = array('noibat' => 1);
			$this->product_model->update($id, $data);
			$link = public_url('admin/images/check.png');
			echo "<img src='$link'>";
		}
		$this->db->cache_delete_all();
	}
	// them du lieu
	function add(){
		//load catalog ra danh muc
		$inputcatalog['order'] = array('sort_order', 'asc');
		$inputcatalog['where'] = array('parent_id' => 0);
		$catalogcha = $this->catalog_model->get_list($inputcatalog);
		$this->data['catalogcha'] = $catalogcha;

		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			if($this->infosetting->ngonngu != 0){
				$this->form_validation->set_rules('name_en', 'Name', 'required');
			}
			$this->form_validation->set_rules('catalog', 'Thể loại', 'required');
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
				/*$size = $this->input->post('size');
				$size = json_encode($size);*/

				// lấy ten file anh duoc upload
				$upload_path = './uploads/images/products-images';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				$image_link = '';
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}

				// lấy ten file word,pdf duoc upload
				$upload_download_data = $this->upload_library->upload_download($upload_path, 'file_download');
				$file_download_link = '';
				if(isset($upload_download_data['file_name'])){
					$file_download_link = $upload_download_data['file_name'];
				}

				// lấy ten file anh kem theo duoc upload
				$image_list = array();
				$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
				$image_list = json_encode($image_list);
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$data = array(
					'name' => $name,
					'name_en' => $name_en,
					'url' => $url,
					'url_en' => $url_en,
					'price' => str_replace(',','',$this->input->post('price')),
					'discount' => str_replace(',','',$this->input->post('discount')),
					'price_en' => str_replace(',','',$this->input->post('price_en')),
					'discount_en' => str_replace(',','',$this->input->post('discount_en')),
					'catalog_id' => $this->input->post('catalog'),
					'mota' => $this->input->post('mota'),
					'mota_en' => $this->input->post('mota_en'),
					'content' => $this->input->post('noidung'),
					'content_en' => $this->input->post('content_en'),
					'thongso' => $this->input->post('thongso'),
					'thongso_en' => $this->input->post('thongso_en'),
					'image_link' => $image_link,
					'image_list' => $image_list,
					'meta_title' => $this->input->post('title'),
					'meta_title_en' => $this->input->post('title_en'),
					'meta_desc' => $this->input->post('description'),
					'meta_desc_en' => $this->input->post('description_en'),
					'meta_key' => $this->input->post('keywords'),
					'meta_key_en' => $this->input->post('keywords_en'),
					'ma_sp' => $this->input->post('ma_sp'),
					'created' => now(),
					'status' => 1,
					'file_download' => $file_download_link,
					);
				if($this->product_model->create($data)){
					$this->session->set_flashdata('message', 'Thêm sản phẩm thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được sản phẩm');
				}
				redirect(admin_url('product'));
			}
		}

		$this->data['temp'] = 'admin/product/add';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	function edit(){
		$id = intval($this->uri->rsegment('3'));
		$product = $this->product_model->get_info($id);
		if(!$product){
			$this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
			redirect(admin_url('product'));
		}
		$this->data['product'] = $product;
		// lấy thông tin catalog
		$input = array();
		$input['where'] = array('parent_id' => 0);
		$catalog = $this->catalog_model->get_list($input);
		$this->data['catalog'] = $catalog;

		//$product->size = json_decode($product->size);

		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
			if($this->infosetting->ngonngu != 0){
			$this->form_validation->set_rules('name_en', 'Name', 'required');
			}
			$this->form_validation->set_rules('catalog', 'Thể loại', 'required');
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

				/*$size = $this->input->post('size');
				$size = json_encode($size);*/

				// lấy ten file anh duoc upload
				$upload_path = './uploads/images/products-images';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				$image_link = '';
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}



				// lấy ten file word,pdf duoc upload
				$upload_download_data = $this->upload_library->upload_download($upload_path, 'file_download');
				$file_download_link = '';
				if(isset($upload_download_data['file_name'])){
					$file_download_link = $upload_download_data['file_name'];
				}

				// lấy ten file anh kem theo duoc upload
				$image_list = array();
				$image_list = $this->upload_library->upload_file($upload_path, 'image_list');
				$image_list_json = json_encode($image_list);
				$data = array(
					'name' => $name,
					'name_en' => $name_en,
					'url' => $url,
					'url_en' => $url_en,
					'price' => str_replace(',','',$this->input->post('price')),
					'discount' => str_replace(',','',$this->input->post('discount')),
					'price_en' => str_replace(',','',$this->input->post('price_en')),
					'discount_en' => str_replace(',','',$this->input->post('discount_en')),
					'catalog_id' => $this->input->post('catalog'),
					'mota' => $this->input->post('mota'),
					'mota_en' => $this->input->post('mota_en'),
					'content' => $this->input->post('noidung'),
					'content_en' => $this->input->post('noidung_en'),
					'thongso' => $this->input->post('thongso'),
					'thongso_en' => $this->input->post('thongso_en'),
					'meta_title' => $this->input->post('title'),
					'meta_title_en' => $this->input->post('title_en'),
					'meta_desc' => $this->input->post('description'),
					'meta_desc_en' => $this->input->post('description_en'),
					'meta_key' => $this->input->post('keywords'),
					'meta_key_en' => $this->input->post('keywords_en'),
					'ma_sp' => $this->input->post('ma_sp'),
					'file_download' => $file_download_link,
					);
				if($image_link != '<' && $image_link != ''){
					$data['image_link'] = $image_link;
				}
				if(!empty($image_list)){
					$data['image_list'] = $image_list_json;
				}
				if($this->product_model->update($id,$data)){
					$this->session->set_flashdata('message', 'Cập nhật sản phẩm thành công');
				}else{
					$this->session->set_flashdata('message', 'Không cập nhật được sản phẩm');
				} 
				redirect(admin_url('product/edit/'.$id));
			}
		}

		/*$this->config->load('size', true);
		$config_size = $this->config->item('size');
		$this->data['config_size'] = $config_size;*/

		$this->data['temp'] = 'admin/product/edit';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
	// xoa san pham
	function delete(){
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa sản phẩm thành công');
		redirect(admin_url('product'));
		$this->db->cache_delete_all();
	}
	// xoa nhieu san pham
	function del_all(){
		$ids = $this->input->post('ids');
		foreach($ids as $id){
			$this->_del($id);
		}
		$this->session->set_flashdata('message', 'Xóa sản phẩm thành công');
		redirect(admin_url('product'));
		$this->db->cache_delete_all();
	}
	private function _del($id){
		
		$info = $this->product_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Sản phẩm không tồn tại');
			redirect(admin_url('product'));
		}

		$this->product_model->delete($id);
		
		// xoa hinh anh san pham
		$image_link = './uploads/images/products-images/'.$info->image_link;
		if(file_exists($image_link)){
			unlink($image_link);
		}
		// xoa anh kem theo
		$image_list = json_decode($info->image_list);
		if(is_array($image_list)){
			foreach ($image_list as $img){
				$image_link = './uploads/images/products-images/'.$img;
				if(file_exists($image_link)){
					unlink($image_link);
				}
			}
		}
		$this->db->cache_delete_all();
	}
}