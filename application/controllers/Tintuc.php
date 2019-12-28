<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tintuc extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('catalognew_model');
		$this->load->model('catalog_model');
		$this->load->library('pagination');
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
	}
	public function catalog(){	
		$id = intval($this->uri->rsegment(3));
		// lấy thông tin danh mục theo id
		$catalog = $this->catalognew_model->get_info($id);
		if(!$catalog){redirect();}
		$this->data['catalog'] = $catalog;
		// Seo ====================================
		$url = base_url($catalog->url.'-tt'.$catalog->id);
		if($this->ngonngu == 'en'){
			$url = base_url('en/'.$catalog->url_en.'-tt'.$catalog->id);
		}
		$title = ($catalog->title)?$catalog->title:$catalog->name;
		if($this->ngonngu == 'en'){
			$title = ($catalog->title_en)?$catalog->title_en:$catalog->name_en;
		}
		$description = ($catalog->description)?$catalog->description:$catalog->name;
		if($this->ngonngu == 'en'){
			$description = ($catalog->description_en)?$catalog->description_en:$catalog->name_en;
		}
		$keywords = ($catalog->keyword)?$catalog->keyword:$catalog->name;
		if($this->ngonngu == 'en'){
			$keywords = ($catalog->keyword_en)?$catalog->keyword_en:$catalog->name_en;
		}
		$this->data['url_vi'] = base_url($catalog->url.'-tt'.$catalog->id);
		$this->data['url_en'] = base_url('en/'.$catalog->url_en.'-tt'.$catalog->id);
		$this->data['url'] = $url;
		$this->data['title'] = $title;
		$this->data['description'] = $description;
		$this->data['keywords'] = $keywords;
		$this->data['image_seo'] = ($catalog->image_link)?base_url('uploads/images/catalogs/'.$catalog->image_link):'';



		// Danh Sách Danh Muc Sản phẩm
		$inputcatsp['where'] = array('parent_id' => 69);
		$this->db->order_by('id', 'desc');
		$this->db->limit(16, 0);
		$listcatsp = $this->catalog_model->get_list($inputcatsp);
		$this->data['listcatsp'] = $listcatsp;
			

		$input = array();
		$input['order'] = array('timer' => 'desc');
		// kiem tra xem danh muc con hay cha de hien thi san pham
		if($catalog->parent_id == 0){
			$input_catalog = array();
			$input_catalog['where'] = array('parent_id' => $id);
			$catalog_subs = $this->catalognew_model->get_list($input_catalog);
			if(!empty($catalog_subs)){
				$catalog_subs_id = array();
				foreach($catalog_subs as $subs){ 	
					if(count($this->catalognew_model->menucon($subs->id))>0){
						$ttcon = $this->catalognew_model->menucon($subs->id);
						foreach($ttcon as $subs1){
							$catalog_subs_id[] = $subs1->id;
						}
					}
					else{
						$catalog_subs_id[] = $subs->id;
					}
				}
				$this->db->where_in('catalog_id', $catalog_subs_id);
			}
			else{ 
				$input['where'] = array('catalog_id' => $id); 
			}
		}
		else{ 
			$input_catalog = array();
			$input_catalog['where'] = array('parent_id' => $id);
			$catalog_subs = $this->catalognew_model->get_list($input_catalog);
			if(!empty($catalog_subs)){
				$catalog_subs_id = array();
				foreach($catalog_subs as $subs){ 
					$catalog_subs_id[] = $subs->id;
				}
				$this->db->where_in('catalog_id', $catalog_subs_id);	
			}
			else{ 
				$input['where'] = array('catalog_id' => $id); 
			}
		}
		// phan trang
		$total_rows = $this->news_model->get_total($input);
		$this->data['total_rows'] = $total_rows;
		$config = array();// lấy url catalog để phân trang
		$config['base_url'] = $url;//base_url('product/catalog/'.$id);
		$config['total_rows'] = $total_rows; // tat ca san pham
		$config['per_page'] = 20; // so luong san pham tren 1 trang
		$config['use_page_numbers'] = true; // hiển thị đúng số trang 1,2,3,4.. 
		$config['first_url'] = $url.'.html'; //base_url('product/catalog/'.$id);
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
		$config['cur_tag_open'] = '<li><a class="active" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config); // khoi tao cau hinh phan trang
		$segment = $this->uri->segment(2);
		if($this->ngonngu == 'en'){
			$segment = $this->uri->segment(3);
		}
		$segment = ($segment  == NULL) ? 0 : ($segment * $config['per_page']) - $config['per_page'];
		//$segment = $this->uri->segment(2); //lấy phân đoạn thứ 2 trên url vd: http://viet.congtyweb.site/may-che-bien-go-c1/3 -> 3 là phẩn đoạn 2	
		$this->pagination->initialize($config);
		$input['limit'] = array($config['per_page'], $segment);
		$phantrang = $this->pagination->create_links();
		$this->data['phantrang'] = $phantrang ;
		// lấy danh sach bai viet
		if(isset($catalog_subs_id)){
			$this->db->where_in('catalog_id', $catalog_subs_id);
		}
		$input['where']['status'] = 1;
		$input['where']['timer <='] = now();
		$input['where']['kieubaiviet !='] = 1;
		$list = $this->news_model->get_list($input);

		$this->data['list'] = $list;
		// Breadcrumb
		if($this->ngonngu != 'en'){
			$this->mybreadcrumb->add('Trang chủ', base_url());
			$this->mybreadcrumb->add($catalog->name, base_url($catalog->url.'-tt'.$catalog->id));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}
		if($this->ngonngu == 'en'){
			$this->mybreadcrumb->add('Home', base_url('en'));
			$this->mybreadcrumb->add($catalog->name_en, base_url('en/'.$catalog->url_en.'-tt'.$catalog->id));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}
		$this->data['temp'] = 'site/tintuc/catalog';
		$this->load->view('site/layout', $this->data);	

	}
	function view(){
		// lấy thông tin tin tức
		$id = intval($this->uri->rsegment(3));
		$bvinfo = $this->news_model->get_info($id);
		if(!$bvinfo){redirect();}
		$this->data['baivietinfo'] = $bvinfo;
		// Lấy thông tin danh mục
		$catalog = $this->catalognew_model->get_info($bvinfo->catalog_id);
		$this->data['catalog'] = $catalog;
		// lấy tin tức cùng loại
		$inputcl['where'] = array('catalog_id'=> $bvinfo->catalog_id, 'id !=' =>$id,'kieubaiviet' => 0);
		$inputcl['limit'] = array(5, 0);
		$spcungloai = $this->news_model->get_list($inputcl);
		$this->data['spcungloai'] = $spcungloai;
		// Seo ======================================================
		$url = base_url($bvinfo->url.'-t'.$bvinfo->id);
		if($this->ngonngu == 'en'){
			$url = base_url('en/'.$bvinfo->url_en.'-t'.$bvinfo->id);
		}
		$title = ($bvinfo->title)?$bvinfo->title:$bvinfo->name;
		if($this->ngonngu == 'en'){
			$title = ($bvinfo->title_en)?$bvinfo->title_en:$bvinfo->name_en;
		}
		$description = ($bvinfo->description)?$bvinfo->description:$bvinfo->name;
		if($this->ngonngu == 'en'){
			$description = ($bvinfo->description_en)?$bvinfo->description_en:$bvinfo->name_en;
		}
		$keywords = ($bvinfo->keyword)?$bvinfo->keyword:$bvinfo->name;
		if($this->ngonngu == 'en'){
			$keywords = ($bvinfo->keyword_en)?$bvinfo->keyword_en:$bvinfo->name_en;
		}
		$this->data['url_vi'] = site_url($bvinfo->url.'-t'.$bvinfo->id);
		$this->data['url_en'] = site_url('en/'.$bvinfo->url_en.'-t'.$bvinfo->id);
		$this->data['url'] = $url;
		$this->data['title'] = $title;
		$this->data['description'] = $description;
		$this->data['keywords'] = $keywords;
		$this->data['image_seo'] = ($bvinfo->image_link)?base_url('uploads/images/news/'.$bvinfo->image_link):'';

		// Danh Sách Danh Muc Sản phẩm
		$inputcatsp['where'] = array('parent_id' => 69);
		$this->db->order_by('id', 'desc');
		$this->db->limit(16, 0);
		$listcatsp = $this->catalog_model->get_list($inputcatsp);
		$this->data['listcatsp'] = $listcatsp;

		
		// Breadcrumb
		if($this->ngonngu != 'en'){
			$this->mybreadcrumb->add('Trang chủ', base_url());
			if($bvinfo->kieubaiviet==0){
				$this->mybreadcrumb->add($catalog->name, base_url($catalog->url.'-tt'.$catalog->id));
			}
			$this->mybreadcrumb->add($bvinfo->name, site_url($bvinfo->url.'-t'.$bvinfo->id));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}
		if($this->ngonngu == 'en'){
			$this->mybreadcrumb->add('Home', base_url('en'));
			if($bvinfo->kieubaiviet==0){
				$this->mybreadcrumb->add($catalog->name_en, base_url('en/'.$catalog->url_en.'-tt'.$catalog->id));
			}
			$this->mybreadcrumb->add($bvinfo->name_en, site_url('en/'.$bvinfo->url_en.'-t'.$bvinfo->id));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}

		$this->data['temp'] = 'site/tintuc/view';
		$this->load->view('site/layout', $this->data);
	}
}
