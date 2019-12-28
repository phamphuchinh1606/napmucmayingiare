<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timkiem extends MY_Controller {

	function __construct(){
		parent::__construct();
	}
	function index(){
		// loc theo tên
		if($this->input->get('keyword')){
			$keyword = $this->input->get('keyword');
			if($this->ngonngu != 'en'){
				$input['like'] = array('name',$keyword);
			}
			if($this->ngonngu == 'en'){
				$input['like'] = array('name_en',$keyword);
			}
			$input['where'] = array('status' => 1);
			$ketqua = $this->product_model->get_list($input);
			$this->data['ketqua'] = $ketqua;
		}
		// SEO =================================================
		$url = base_url('timkiem');
		if($this->ngonngu == 'en'){
			$url = base_url('en/timkiem');
		}
		$title = 'Kết quả tìm kiếm: ';
		if($this->ngonngu == 'en'){
			$title = 'Search Results: ';
		}
		$description = 'Kết quả tìm kiếm: ';
		if($this->ngonngu == 'en'){
			$description = 'Search Results: ';
		}
		$keywords = 'Kết quả tìm kiếm: ';
		if($this->ngonngu == 'en'){
			$keywords = 'Search Results: ';
		}
		$this->data['url_vi'] = base_url('timkiem');
		$this->data['url_en'] = base_url('en/timkiem');
		$this->data['url'] = $url;
		$this->data['title'] = $title;
		$this->data['description'] = $description;
		$this->data['keywords'] = $keywords;
		// Breadcrumb
		if($this->ngonngu != 'en'){
			$this->mybreadcrumb->add('Trang chủ', base_url());
			$this->mybreadcrumb->add('Tìm kiếm', base_url('timkiem'));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}
		if($this->ngonngu == 'en'){
			$this->mybreadcrumb->add('Home', base_url('en'));
			$this->mybreadcrumb->add('Search', base_url('en/timkiem'));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}

		$this->data['temp'] = 'site/timkiem/index';
		$this->load->view('site/layout', $this->data);
	}
}
