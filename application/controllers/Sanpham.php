<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Sanpham extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('catalog_model');
		$this->load->model('product_model');
		$this->load->library('pagination');
	}
	function index(){	     

		// Seo ====================================
		$url = base_url('san-pham');
		if($this->ngonngu == 'en'){
			$url = base_url('en/product');
		}
		$title = ($this->infosetting->title_pagesp)?$this->infosetting->title_pagesp:'Sản phẩm';
		if($this->ngonngu == 'en'){
			$title = ($this->infosetting->title_pagesp_en)?$this->infosetting->title_pagesp_en:'Product';
		}
		$description = ($this->infosetting->des_pagesp)?$this->infosetting->des_pagesp:'Sản phẩm';
		if($this->ngonngu == 'en'){
			$description = ($this->infosetting->des_pagesp_en)?$this->infosetting->des_pagesp_en:'Product';
		}
		$keywords = ($this->infosetting->key_pagesp)?$this->infosetting->key_pagesp:'Sản phẩm';
		if($this->ngonngu == 'en'){
			$keywords = ($this->infosetting->key_pagesp_en)?$this->infosetting->key_pagesp_en:'Product';
		}
		$this->data['url_vi'] = site_url('san-pham');
		$this->data['url_en'] = site_url('en/product');
		$this->data['url'] = $url;
		$this->data['title'] = $title;
		$this->data['description'] = $description;
		$this->data['keywords'] = $keywords;
		$this->data['image_seo'] = ($this->infosetting->image_pagesp)?base_url('uploads/images/logo-banner/'.$this->infosetting->image_pagesp):'';

        $input = array();
		$input['where']= array('status' => 1);
		// phan trang
		$total_rows = $this->product_model->get_total($input);
		$this->data['total_rows'] = $total_rows;
		$config = array();// lấy url catalog để phân trang
		$config['base_url'] = $url;//base_url('product/catalog/'.$id);
		$config['total_rows'] = $total_rows; // tat ca san pham
		$config['per_page'] = 16; // so luong san pham tren 1 trang
		$config['use_page_numbers'] = true; // hiển thị đúng số trang 1,2,3,4.. 
		$config['first_url'] = $url; //base_url('product/catalog/'.$id);
		$config['uri_segment'] = 2;// phan doan hien thi số trang trên url
		if($this->ngonngu == 'en'){
			$config['uri_segment'] = 3;// phan doan hien thi số trang trên url
		}
		$config['next_link'] = '&raquo;';
		$config['prev_link'] = '&laquo;';
		$config['first_link'] = 'Đầu';
		$config['last_link'] = 'Cuối';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="active">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config); // khoi tao cau hinh phan trang
		$segment = $this->uri->segment(2);
		if($this->ngonngu == 'en'){
			$segment = $this->uri->segment(3);
		}
		$segment = ($segment  == NULL) ? 0 : ($segment * $config['per_page']) - $config['per_page'];
		$this->pagination->initialize($config);
		$input['limit'] = array($config['per_page'], $segment);
		$phantrang = $this->pagination->create_links();
		$this->data['phantrang'] = $phantrang;
		// lấy danh sach san pham
		$input['order'] = array('created', 'desc');
		$listsp = $this->product_model->get_list($input);
		// pre(count($list));
		// pre($this->db->last_query());
		$this->db->cache_off();
		$this->data['listsp'] = $listsp;

		// Breadcrumb
		if($this->ngonngu != 'en'){
			$this->mybreadcrumb->add('Trang chủ', base_url());
			$this->mybreadcrumb->add('Sản phẩm', base_url('san-pham'));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}
		if($this->ngonngu == 'en'){
			$this->mybreadcrumb->add('Home', base_url('en'));
			$this->mybreadcrumb->add('Product', base_url('en/product'));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}


		$this->data['temp'] = 'site/sanpham/index';
		$this->load->view('site/layout', $this->data);
	}
}