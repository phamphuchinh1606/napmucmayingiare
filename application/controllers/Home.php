<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Home extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('catalog_model');
		$this->load->model('catalognew_model');
		$this->load->model('product_model');
		$this->load->model('news_model');
		$this->load->model('logodoitac_model');
		$this->load->helper('form');
	}
	function index(){

		// Bài gioi thiệu
		$this->db->cache_on();
		$gioithieu = $this->news_model->get_info($this->infosetting->id_gioithieu);
		$this->db->cache_off();
		if($gioithieu){
			$this->data['gioithieu'] = $gioithieu;
		}

		// Danh Sách Danh Mục Sản phẩm
		$inputdmnbsp['where'] = array('status' => 1, 'noibat' => 1);
		$this->db->order_by('noibat', 'asc');
		$this->db->order_by('id', 'asc');
		$listcatsp = $this->catalog_model->get_list($inputdmnbsp);
		$this->data['listcatsp'] = $listcatsp;

		$listspbycat = array();
		if(isset($listcatsp) && $listcatsp):
			foreach($listcatsp  as $key => $row):
				// Sản phẩm theo danh muc
				$inputsp['where'] = array('status' => 1, 'catalog_id' => $row->id);
				$this->db->order_by('created', 'desc');
				$listsp_custom = $this->product_model->get_list($inputsp);
				$listspbycat[$row->id][$key] = $listsp_custom;
				$listspbycat[$row->id]['cat_name'] = $row->name;
				$listspbycat[$row->id]['cat_id'] = $row->id;
				$listspbycat[$row->id]['cat_url'] = $row->url;
				$listspbycat[$row->id]['image_link'] = $row->image_link;
			endforeach;
		endif;
		$this->data['listspbycat'] = $listspbycat;
		
		


		// Sản phẩm nổi bật
		$inputsp['where'] = array('status' => 1, 'new' => 1);
		$this->db->order_by('new', 'asc');
		$this->db->order_by('created', 'desc');
		$this->db->limit(30, 0);
		$listsp = $this->product_model->get_list($inputsp);
		$this->data['listsp'] = $listsp;
		
		
		// Sản phẩm khuyến mãi
		$inputspkm['where'] = array('status' => 1, 'noibat' => 1, 'catalog_id' => 182);
		$this->db->order_by('created', 'desc');
		$this->db->limit(30, 0);
		$listspkm = $this->product_model->get_list($inputspkm);
		$this->data['listspkm'] = $listspkm;

		// Bài giới thiệu
		$gioithieu = $this->news_model->get_info(150);
		if($gioithieu){
			$this->data['gioithieu'] = $gioithieu;
		}

		
		
		//$this->db->cache_on();
		$this->db->where('status', 1);
		$this->db->where('noibat', 1);
		$this->db->where('kieubaiviet', 0);
		$this->db->where('timer <=', now());
		$this->db->where_in('catalog_id', 24);
		$this->db->order_by('timer', 'desc');
		$this->db->limit(3, 0);
		$list_block1_moi = $this->db->get('news')->result();
		$this->data['list_block1_moi'] = $list_block1_moi;
		
		
		
		//dich vu trang chu
		$this->db->where('status', 1);
		$this->db->where('noibat', 1);
		$this->db->where('kieubaiviet', 0);
		$this->db->where('timer <=', now());
		$this->db->where_in('catalog_id', 40);
		$this->db->order_by('timer', 'desc');
		$this->db->limit(6, 0);
		$list_services = $this->db->get('news')->result();
		$this->data['list_services'] = $list_services;
		
		
		//tin tức mới trang chu
		$this->db->where('status', 1);
		$this->db->where('noibat', 1);
		$this->db->where('kieubaiviet', 0);
		$this->db->where('timer <=', now());
		$this->db->where_in('catalog_id', 24);
		$this->db->order_by('timer', 'desc');
		$this->db->limit(4, 0);
		$list_news = $this->db->get('news')->result();
		$this->data['list_news'] = $list_news;
		
		
		//tin khuyến mãi trang chu
		$this->db->where('status', 1);
		$this->db->where('noibat', 1);
		$this->db->where('kieubaiviet', 0);
		$this->db->where('timer <=', now());
		$this->db->where_in('catalog_id', 41);
		$this->db->order_by('timer', 'desc');
		$this->db->limit(4, 0);
		$list_news_sale = $this->db->get('news')->result();
		$this->data['list_news_sale'] = $list_news_sale;
		

		


		//$this->db->cache_on();
		$this->db->where('status', 1);
		$this->db->where('noibat', 1);
		$this->db->where('kieubaiviet', 0);
		$this->db->where('timer <=', now());
		$this->db->where_in('catalog_id', 24);
		$this->db->order_by('timer', 'desc');
		$this->db->limit(6, 3);
		$list_block2_moi = $this->db->get('news')->result();
		$this->data['list_block2_moi'] = $list_block2_moi;
		
		

		// video xem nhiều
		$this->db->cache_on();
		$video_xemnhieu = $this->news_model->get_info($this->infosetting->id_video_xemnhieu);
		$this->db->cache_off();
		if($video_xemnhieu){
			$this->data['video_xemnhieu'] = $video_xemnhieu;
		}


		// logo đối tác
		//$this->db->cache_on();
		$this->db->order_by('id', 'asc');
		$this->db->limit(12, 0);
		$listdoitac = $this->logodoitac_model->get_list();
		$this->db->cache_off();
		$this->data['listdoitac'] = $listdoitac;



		// Y kiến khách hàng
		// $list_ykien = $this->ykien_model->get_list();
		// $this->data['list_ykien'] = $list_ykien;

		// Block video
		// $this->db->cache_on();
		// $blockvideo = $this->catalognew_model->get_info($this->infosetting->id_video);
		// $this->db->cache_off();
		// if($blockvideo){
		// 	$catalog_subs_video = $this->catalognew_model->get_sub_full($blockvideo);
		// 	if($catalog_subs_video){
		// 		//// them khuc nay
		// 		$this->db->cache_on();
		// 		$this->db->where('status', 1);
		// 		$this->db->where('noibat', 1);
		// 		$this->db->where_in('catalog_id', $catalog_subs_video);
		// 		$this->db->order_by('created', 'desc');
		// 		$this->db->limit(10, 0);
		// 		$list_video = $this->db->get('news')->result();
		// 		$this->data['list_video'] = $list_video;
		// 		$this->data['blockvideo'] = $blockvideo;
		// 	}
		// }


		// // Block 1
		// $this->db->cache_on();
		// $block1 = $this->catalognew_model->get_info($this->infosetting->id_block1);
		// $this->db->cache_off();
		// if($block1){
		// 	$catalog_subs_block1 = $this->catalognew_model->get_sub_full($block1);
		// 	if($catalog_subs_block1){
		// 		$this->db->cache_on();
		// 		$this->db->where('status', 1);
		// 		$this->db->where('noibat', 1);
		// 		$this->db->where('kieubaiviet', 0);
		// 		$this->db->where('timer <=', now());
		// 		$this->db->where_in('catalog_id', $catalog_subs_block1);
		// 		$this->db->order_by('sort_order', 'asc');
		// 		$this->db->limit(3, 0);
		// 		$list_block1 = $this->db->get('news')->result();
		// 		$this->data['list_block1'] = $list_block1;
		// 		$this->data['block1'] = $block1;
		// 	}
		// }

		// // Block 2
		// $this->db->cache_on();
		// $block2 = $this->catalognew_model->get_info($this->infosetting->id_block2);
		// $this->db->cache_off();
		// if($block2){
		// 	$catalog_subs_block2 = $this->catalognew_model->get_sub_full($block2);
		// 	if($catalog_subs_block2){
		// 		//// them khuc nay
		// 		$this->db->cache_on();
		// 		$this->db->where('status', 1);
		// 		$this->db->where('noibat', 1);
		// 		$this->db->where_in('catalog_id', $catalog_subs_block2);
		// 		$this->db->order_by('sort_order', 'asc');
		// 		$this->db->limit(3, 0);
		// 		$list_block2 = $this->db->get('news')->result();
		// 		$this->data['list_block2'] = $list_block2;
		// 		$this->data['block2'] = $block2;
		// 	}
		// }

        
		// SEO =================================================
		$infoseo = $this->setting_model->get_info(1);

		$url = base_url();
		if($this->ngonngu == 'en'){
			$url = base_url('en');
		}
		$title = ($infoseo->title_home)?$infoseo->title_home:'Trang chủ';
		if($this->ngonngu == 'en'){
			$title = ($infoseo->title_home_en)?$infoseo->title_home_en:'Home';
		}
		$description = ($infoseo->des_home)?$infoseo->des_home:'Trang chủ';
		if($this->ngonngu == 'en'){
			$description = ($infoseo->des_home_en)?$infoseo->des_home_en:'Home';
		}
		$keywords = ($infoseo->key_home)?$infoseo->key_home:'Trang chủ';
		if($this->ngonngu == 'en'){
			$keywords = ($infoseo->key_home_en)?$infoseo->key_home_en:'Home';
		}
		$this->data['url_vi'] = base_url();
		$this->data['url_en'] = base_url('en');
		$this->data['url'] = base_url();
		$this->data['title'] = $title;
		$this->data['description'] = $description;
		$this->data['keywords'] = $keywords;
		$this->data['image_seo'] = ($infoseo->image_home)?base_url('uploads/images/logo-banner/'.$infoseo->image_home):'';

		$this->data['temp'] = 'site/home/index';
		$this->load->view('site/layout', $this->data);
	}
}