<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Product extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('catalog_model');
		$this->load->model('product_model');
		$this->load->library('pagination');
	}

	function catalog(){
		//$this->db->cache_on();
		$id = intval($this->uri->rsegment(3));

		$catalog = $this->catalog_model->get_info($id);
		if(!$catalog){redirect();}
		$url = base_url($catalog->url.'-c'.$catalog->id);
		//$this->db->cache_off();
		$this->data['catalog'] = $catalog;

		// Seo ====================================
		$url = base_url($catalog->url.'-c'.$catalog->id);
		if($this->ngonngu == 'en'){
			$url = base_url('en/'.$catalog->url_en.'-c'.$catalog->id);
		}
		$title = ($catalog->meta_title)?$catalog->meta_title:$catalog->name;
		if($this->ngonngu == 'en'){
			$title = ($catalog->meta_title_en)?$catalog->meta_title_en:$catalog->name_en;
		}
		$description = ($catalog->meta_desc)?$catalog->meta_desc:$catalog->name;
		if($this->ngonngu == 'en'){
			$description = ($catalog->meta_desc_en)?$catalog->meta_desc_en:$catalog->name_en;
		}
		$keywords = ($catalog->meta_key)?$catalog->meta_key:$catalog->name;
		if($this->ngonngu == 'en'){
			$keywords = ($catalog->meta_key_en)?$catalog->meta_key_en:$catalog->name_en;
		}
		$this->data['url_vi'] = base_url($catalog->url.'-c'.$catalog->id);
		$this->data['url_en'] = base_url('en/'.$catalog->url_en.'-c'.$catalog->id);
		$this->data['url'] = $url;
		$this->data['title'] = $title;
		$this->data['description'] = $description;
		$this->data['keywords'] = $keywords;
		$this->data['image_seo'] = ($catalog->image_link)?base_url('uploads/images/catalogs/'.$catalog->image_link):'';

		if(count($this->catalog_model->menucon($catalog->id)) > 0){
			//$this->db->cache_on();
			$catalog_subs = $this->catalog_model->get_sub_full($catalog);
			if($catalog_subs){
				$this->db->where('status', 1);
				$this->db->where_in('catalog_id', $catalog_subs);
				$this->db->order_by('created', 'desc');
				$this->db->order_by('noibat', 'asc');
				$this->db->limit(10, 0);
				$list_sp = $this->db->get('product')->result();
				foreach($catalog_subs as $row){
					if($row != $catalog->id){
						$list_data[$row] = $list_sp; 
					}
				}
			}
			//$this->db->cache_off();
			$this->data['list_data'] = $list_data;
		}else{
			$this->db->where('status', 1);
			$this->db->where('catalog_id', $catalog->id);
			$list_sp = $this->db->get('product')->result();
			// phan trang
			$total_rows = count($list_sp);
			$this->data['total_rows'] = $total_rows;
			$config = array();// lấy url catalog để phân trang
			$config['base_url'] = $url;//base_url('product/catalog/'.$id);
			$config['total_rows'] = $total_rows; // tat ca san pham
			$config['per_page'] = 20; // so luong san pham tren 1 trang
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
			$config['full_tag_open'] = '<nav class="block-pagination"><ul class="pagination">';
			$config['full_tag_close'] = '</ul></nav>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a>';
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
			$this->db->limit($config['per_page'], $segment);
			$phantrang = $this->pagination->create_links();
			$this->data['phantrang'] = $phantrang;
			
			//$this->db->cache_on();
			$this->db->where('status', 1);
			$this->db->where('catalog_id', $catalog->id);
			$this->db->order_by('created', 'desc');
			$this->db->order_by('noibat', 'asc');
			$list_sp = $this->db->get('product')->result();
			//$this->db->cache_off();
			$this->data['list_data_con'] = $list_sp;
		}

		// Breadcrumb
		if($this->ngonngu != 'en'){
			$this->mybreadcrumb->add('Trang chủ', base_url());
			$this->mybreadcrumb->add($catalog->name, base_url($catalog->url.'-c'.$catalog->id));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}
		if($this->ngonngu == 'en'){
			$this->mybreadcrumb->add('Home', base_url('en'));
			$this->mybreadcrumb->add($catalog->name_en, base_url('en/'.$catalog->url_en.'-c'.$catalog->id));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}

		$this->data['temp'] = 'site/product/catalog';
		$this->load->view('site/layout', $this->data);
	}
	function view(){
		// lay thong tin san pham
		$id = intval($this->uri->rsegment(3));
		$product = $this->product_model->get_info($id);
		if(!$product){redirect();}
		$this->data['product'] = $product;
		// lấy thong tin danh muc san pham
		$catalog = $this->catalog_model->get_info($product->catalog_id);
		$this->data['catalog'] = $catalog;
		// lấy sản phẩm cùng loại
		//$this->db->cache_on();
		$inputcl['where'] = array('catalog_id'=> $product->catalog_id, 'id !=' => $id);
		$inputcl['order'] = array('created','desc');
		$inputcl['limit'] = array(6,0);
		$spcungloai = $this->product_model->get_list($inputcl);
		//$this->db->cache_off();
		$this->data['spcungloai'] = $spcungloai;

		//$product->size = json_decode($product->size);

		// Seo ======================================================
		$url = base_url($product->url.'-sp'.$product->id);
		if($this->ngonngu == 'en'){
			$url = base_url('en/'.$product->url_en.'-sp'.$product->id);
		}
		$title = ($product->meta_title)?$product->meta_title:$product->name;
		if($this->ngonngu == 'en'){
			$title = ($product->meta_title_en)?$product->meta_title_en:$product->name_en;
		}
		$description = ($product->meta_desc)?$product->meta_desc:$product->name;
		if($this->ngonngu == 'en'){
			$description = ($product->meta_desc_en)?$product->meta_desc_en:$product->name_en;
		}
		$keywords = ($product->meta_key)?$product->meta_key:$product->name;
		if($this->ngonngu == 'en'){
			$keywords = ($product->meta_key_en)?$product->meta_key_en:$product->name_en;
		}
		$this->data['url_vi'] = site_url($product->url.'-sp'.$product->id);
		$this->data['url_en'] = site_url('en/'.$product->url_en.'-sp'.$product->id);
		$this->data['url'] = $url;
		$this->data['title'] = $title;
		$this->data['description'] = $description;
		$this->data['keywords'] = $keywords;
		$this->data['image_seo'] = ($product->image_link)?base_url('uploads/images/news/'.$product->image_link):'';
		// LẤY HÌNH ANH KEM THEO
		$image_list = @json_decode($product->image_list);
		$this->data['image_list'] = $image_list;

		// Breadcrumb
		if($this->ngonngu != 'en'){
			$this->mybreadcrumb->add('Trang chủ', base_url());
			$this->mybreadcrumb->add($catalog->name, base_url($catalog->url.'-c'.$catalog->id));
			$this->mybreadcrumb->add($product->name, site_url($product->url.'-sp'.$product->id));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}
		if($this->ngonngu == 'en'){
			$this->mybreadcrumb->add('Home', base_url('en'));
			$this->mybreadcrumb->add($catalog->name_en, base_url('en/'.$catalog->url_en.'-c'.$catalog->id));
			$this->mybreadcrumb->add($product->name_en, site_url('en/'.$product->url_en.'-sp'.$product->id));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}

		$this->data['temp'] = 'site/product/view';
		$this->load->view('site/layout', $this->data);
	}
}