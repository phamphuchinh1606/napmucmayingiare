<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Setting extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('setting_model');
		$this->load->model('news_model');
		$this->load->model('catalognew_model');
		$this->load->library('form_validation');
		$this->load->library('upload_library');
		$this->load->helper('form');
	}
	// chinh sua 
	function index(){
		// load trang
		$inputtrang['where'] = array('kieubaiviet' => 1, 'status' => 1);
		$trang = $this->news_model->get_list($inputtrang);
		$this->data['trang'] = $trang;

		// load tin xem nhiều
		$inputxemnhieu['where'] = array('kieubaiviet' => 0, 'status' => 1, 'noibat' => 1);
		$xemnhieu = $this->news_model->get_list($inputxemnhieu);
		$this->data['xemnhieu'] = $xemnhieu;

		// load tin xem nhiều
		$inputvideoxemnhieu['where'] = array('kieubaiviet' => 0, 'status' => 1, 'noibat' => 1, 'linkvideo !=' => '');
		$video_xemnhieu = $this->news_model->get_list($inputvideoxemnhieu);
		$this->data['video_xemnhieu'] = $video_xemnhieu;

		// load danh muc bai viet
		$inputcatalognew['where'] = array('status' => 1, 'parent_id' => 0);
		$catalognew = $this->catalognew_model->get_list($inputcatalognew);
		$this->data['catalognew'] = $catalognew;

		// load danh muc bai viet video
		$inputcatalognewvideo['where'] = array('status' => 1, 'parent_id' => 0, 'module' => 'video');
		$catalognewvideo = $this->catalognew_model->get_list($inputcatalognewvideo);
		$this->data['catalognewvideo'] = $catalognewvideo;

		// lay thong tin san pham edit theo id
		$infost = $this->setting_model->get_info(1);
		if(!$infost){
			$this->session->set_flashdata('message', 'Không tồn tại thông tin này');
			redirect(admin_url('setting'));
		}
		$this->data['infost'] = $infost;
		if($this->input->post()){
			// lấy ten file anh minh hoa duoc upload
			$upload_path = './uploads/images/logo-banner';
			$upload_data = $this->upload_library->upload($upload_path, 'logo');
			$image_link = '';
			if(isset($upload_data['file_name'])){
				$image_link = $upload_data['file_name'];
			}	
			$upload_data1 = $this->upload_library->upload($upload_path, 'favico');
			$image_link1 = '';			
			if(isset($upload_data1['file_name'])){				
				$image_link1 = $upload_data1['file_name'];			
			}	
			$upload_data2 = $this->upload_library->upload($upload_path, 'image_home');
			$image_link2 = '';			
			if(isset($upload_data2['file_name'])){				
				$image_link2 = $upload_data2['file_name'];			
			}
			$upload_data3 = $this->upload_library->upload($upload_path, 'image_pagelh');
			$image_link3 = '';			
			if(isset($upload_data3['file_name'])){				
				$image_link3 = $upload_data3['file_name'];			
			}
			$upload_data4 = $this->upload_library->upload($upload_path, 'logo_en');
			$image_link4 = '';			
			if(isset($upload_data4['file_name'])){				
				$image_link4 = $upload_data4['file_name'];			
			}
			$upload_data5 = $this->upload_library->upload($upload_path, 'bannerqc1');
			$image_link5 = '';			
			if(isset($upload_data5['file_name'])){				
				$image_link5 = $upload_data5['file_name'];			
			}
			$upload_data6 = $this->upload_library->upload($upload_path, 'logo2');
			$image_link6 = '';
			if(isset($upload_data6['file_name'])){
				$image_link6 = $upload_data6['file_name'];
			}
			$upload_data7 = $this->upload_library->upload($upload_path, 'image_pagesp');
			$image_link7 = '';
			if(isset($upload_data7['file_name'])){
				$image_link7 = $upload_data7['file_name'];
			}
			$upload_data8 = $this->upload_library->upload($upload_path, 'bannerqc2');
			$image_link8 = '';			
			if(isset($upload_data8['file_name'])){				
				$image_link8 = $upload_data8['file_name'];			
			}
			$upload_data9 = $this->upload_library->upload($upload_path, 'bannerqc3');
			$image_link9 = '';			
			if(isset($upload_data9['file_name'])){				
				$image_link9 = $upload_data9['file_name'];			
			}
			$data = array(
				'id_sidebar1' => $this->input->post('id_sidebar1'),
				'id_sidebar2' => $this->input->post('id_sidebar2'),
				'id_xemnhieu' => $this->input->post('id_xemnhieu'),
				'id_video_xemnhieu' => $this->input->post('id_video_xemnhieu'),
				'id_gioithieu' => $this->input->post('id_gioithieu'),
				'id_video' => $this->input->post('id_video'),
				'id_block1' => $this->input->post('id_block1'),
				'id_block2' => $this->input->post('id_block2'),
				'id_block3' => $this->input->post('id_block3'),

				'video_gioithieu' => $this->input->post('video_gioithieu'),
				'name_video_gioithieu' => $this->input->post('name_video_gioithieu'),
				'name_video_gioithieu_en' => $this->input->post('name_video_gioithieu_en'),
				'intro_video_gioithieu' => $this->input->post('intro_video_gioithieu'),
				'intro_video_gioithieu_en' => $this->input->post('intro_video_gioithieu_en'),

				'tieude_block_sp' => $this->input->post('tieude_block_sp'),
				'tieude_block_sp_en' => $this->input->post('tieude_block_sp_en'),
				'intro_block_sp' => $this->input->post('intro_block_sp'),
				'intro_block_sp_en' => $this->input->post('intro_block_sp_en'),

				'tieude_block_tin' => $this->input->post('tieude_block_tin'),
				'tieude_block_tin_en' => $this->input->post('tieude_block_tin_en'),
				'intro_block_tin' => $this->input->post('intro_block_tin'),
				'intro_block_tin_en' => $this->input->post('intro_block_tin_en'),

				'tieude_ykien' => $this->input->post('tieude_ykien'),
				'tieude_ykien_en' => $this->input->post('tieude_ykien_en'),
				'intro_ykien' => $this->input->post('intro_ykien'),
				'intro_ykien_en' => $this->input->post('intro_ykien_en'),

				'tieude_block_dangky' => $this->input->post('tieude_block_dangky'),
				'tieude_block_dangky_en' => $this->input->post('tieude_block_dangky_en'),
				'intro_block_dangky' => $this->input->post('intro_block_dangky'),
				'intro_block_dangky_en' => $this->input->post('intro_block_dangky_en'),

				'tengoitat' => $this->input->post('tengoitat'),
				'tenquocte' => $this->input->post('tenquocte'),
				'tengoitat_en' => $this->input->post('tengoitat_en'),
				'tenquocte_en' => $this->input->post('tenquocte_en'),
				'emailnhan' => $this->input->post('emailnhan'),
				'website' => $this->input->post('website'),
				'sdt' => $this->input->post('sdt'),
				'email' => $this->input->post('email'),
				'diachi' => $this->input->post('diachi'),
				'address' => $this->input->post('address'),
				'sdt_en' => $this->input->post('sdt_en'),
				'email_en' => $this->input->post('email_en'),
				'thongtinlienhe' =>$this->input->post('thongtinlienhe'),
				'thongtinlienhe_en' =>$this->input->post('thongtinlienhe_en'),
				'tieudefooter1' => $this->input->post('tieudefooter1'),
				'tieudefooter2' => $this->input->post('tieudefooter2'),
				'tieudefooter3' => $this->input->post('tieudefooter3'),
				'tieudefooter4' => $this->input->post('tieudefooter4'),
				'tieudefooter5' => $this->input->post('tieudefooter5'),
				'tieudefooter6' => $this->input->post('tieudefooter6'),
				'tieudefooter1_en' => $this->input->post('tieudefooter1_en'),
				'tieudefooter2_en' => $this->input->post('tieudefooter2_en'),
				'tieudefooter3_en' => $this->input->post('tieudefooter3_en'),
				'tieudefooter4_en' => $this->input->post('tieudefooter4_en'),
				'tieudefooter5_en' => $this->input->post('tieudefooter5_en'),
				'tieudefooter6_en' => $this->input->post('tieudefooter6_en'),
				'footer1' => $this->input->post('footer1'),
				'footer2' => $this->input->post('footer2'),
				'footer3' => $this->input->post('footer3'),
				'footer4' => $this->input->post('footer4'),
				'footer5' => $this->input->post('footer5'),
				'footer6' => $this->input->post('footer6'),
				'footer1_en' => $this->input->post('footer1_en'),
				'footer2_en' => $this->input->post('footer2_en'),
				'footer3_en' => $this->input->post('footer3_en'),
				'footer4_en' => $this->input->post('footer4_en'),
				'footer5_en' => $this->input->post('footer5_en'),
				'footer6_en' => $this->input->post('footer6_en'),
				'map' => $this->input->post('map'),	
				'map_en' => $this->input->post('map_en'),								
				'facebook' => $this->input->post('facebook'),
				'youtube' => $this->input->post('youtube'),
				'google' => $this->input->post('google'),
				'skype' => $this->input->post('skype'),
				'linkedin' => $this->input->post('linkedin'),
				'script' => $this->input->post('script'),
				'title_home' => $this->input->post('title_home'),
				'des_home' => $this->input->post('des_home'),
				'key_home' => $this->input->post('key_home'),
				'title_home_en' => $this->input->post('title_home_en'),
				'des_home_en' => $this->input->post('des_home_en'),
				'key_home_en' => $this->input->post('key_home_en'),
				'title_pagelh' => $this->input->post('title_pagelh'),
				'des_pagelh' => $this->input->post('des_pagelh'),
				'key_pagelh' => $this->input->post('key_pagelh'),
				'title_pagelh_en' => $this->input->post('title_pagelh_en'),
				'des_pagelh_en' => $this->input->post('des_pagelh_en'),
				'key_pagelh_en' => $this->input->post('key_pagelh_en'),
				'title_pagesp' => $this->input->post('title_pagesp'),
				'des_pagesp' => $this->input->post('des_pagesp'),
				'key_pagesp' => $this->input->post('key_pagesp'),
				'title_pagesp_en' => $this->input->post('title_pagesp_en'),
				'des_pagesp_en' => $this->input->post('des_pagesp_en'),
				'key_pagesp_en' => $this->input->post('key_pagesp_en'),
				'dkthanhcong' => $this->input->post('dkthanhcong'),
				'dkthanhcong_en' => $this->input->post('dkthanhcong_en'),
				'linkqc1' => $this->input->post('linkqc1'),
				'linkqc2' => $this->input->post('linkqc2'),
				'linkqc3' => $this->input->post('linkqc3'),
				'ngonngu' => $this->input->post('ngonngu'),
			);
			if($image_link != '' && $image_link != '<'){
				$data['logo'] = $image_link;
			}			
			if($image_link1 != '' && $image_link1 != '<'){				
				$data['favico'] = $image_link1;			
			}
			if($image_link2 != '' && $image_link2 != '<'){				
				$data['image_home'] = $image_link2;			
			}
			if($image_link3 != '' && $image_link3 != '<'){				
				$data['image_pagelh'] = $image_link3;			
			}
			if($image_link4 != '' && $image_link4 != '<'){				
				$data['logo_en'] = $image_link4;			
			}
			if($image_link5 != '' && $image_link5 != '<'){				
				$data['bannerqc1'] = $image_link5;			
			}
			if($image_link6 != '' && $image_link6 != '<'){				
				$data['logo2'] = $image_link6;			
			}
			if($image_link7 != '' && $image_link7 != '<'){				
				$data['image_pagesp'] = $image_link7;			
			}
			if($image_link8 != '' && $image_link8 != '<'){				
				$data['bannerqc2'] = $image_link8;			
			}
			if($image_link9 != '' && $image_link9 != '<'){				
				$data['bannerqc3'] = $image_link9;			
			}
			if($this->setting_model->update(1, $data)){
				$this->session->set_flashdata('message', 'Cập nhật thành công');
			}
			else{
				$this->session->set_flashdata('message', 'Không cập nhật được');
			}
			redirect(admin_url('setting'));
		}
		$this->data['temp'] = 'admin/setting/index';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}
}