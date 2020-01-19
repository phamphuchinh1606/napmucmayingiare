<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class MY_Controller extends CI_Controller {
    // Biến $data gui du lieu sang bên view
    public $data = Array();
    function __construct(){	
        parent::__construct();
		/*ob_start();*/
        $controller = $this->uri->segment(1);
        switch ($controller){
            case 'admin':
            {
            	$this->load->model('setting_model');
	            $this->db->cache_on();
	            $infosetting = $this->setting_model->get_info(1);
	            $this->infosetting = $infosetting;
	            $this->db->cache_off();
	            $this->data['infosetting'] = $infosetting;
	            
				$message = $this->session->flashdata('message');
				$this->data['message'] = $message;
                //xu ly trang admin
                $this->load->helper('admin');
                $this->_check_login();
                break;
            }
            default:
            {
            	$ngay = getdate();
            	$this->data['ngay'] = $ngay;
            	$this->load_lang();
            	$this->ngonngu = $this->uri->segment(1);

            	// Load tổng giỏ hàng
				$this->load->library('cart');
				$this->data['total_items'] = $this->cart->total_items();
				
            	//load model
            	$this->load->model('catalog_model');
            	$this->load->model('ykien_model');
            	$this->load->model('product_model');
		        $this->load->model('catalognew_model');
		        $this->load->model('news_model');
		        $this->load->model('bannerqc_model');
		        $this->load->model('hotrotructuyen_model');
		        $this->load->model('slide_model');
		        $this->load->model('menu_model');
		        $this->load->model('setting_model');
		        $this->load->model('logodoitac_model');
		        $this->load->model('pricesearch_model');
		        $this->load->model('color_model');
		        $this->load->model('side_model');

		        $ipykien['order'] = array('sort_order', 'asc');
				$ykien = $this->ykien_model->get_list($ipykien);
				if($ykien){
					$this->data['ykien'] = $ykien;
				}

	            // setting thong tin header, footer
	            $this->db->cache_on();
	            $infosetting = $this->setting_model->get_info(1);
	            $this->infosetting = $infosetting;
	            $this->db->cache_off();
	            $this->data['infosetting'] = $infosetting;


	            // Danh Sách Danh Mục Sản phẩm
				$inputcatsp['where'] = array('parent_id' => 0);
				$this->db->order_by('id', 'asc');
				$listcatsp = $this->catalog_model->get_list($inputcatsp);
				$this->data['listcatmenu'] = $listcatsp;





				// Sản phẩm nổi bật
				$inputsptb['where'] = array('status' => 1, 'noibat' => 1);
				$this->db->order_by('noibat', 'asc');
				$this->db->order_by('created', 'desc');
				$this->db->limit(10, 0);
				$listsptb = $this->product_model->get_list($inputsptb);
				$this->data['listsptb'] = $listsptb;

				// Bài xem nhiều
				$this->db->cache_on();
				$xemnhieu = $this->news_model->get_info($this->infosetting->id_xemnhieu);
				$this->db->cache_off();
				if($xemnhieu){
					$this->data['xemnhieu'] = $xemnhieu;
				}

				// Side bar 1
				$this->db->cache_on();
				$infotintuc1 = $this->catalognew_model->get_info($this->infosetting->id_sidebar1);
				$this->db->cache_off();
				if($infotintuc1){
					$catalog_subs_sidebar1 = $this->catalognew_model->get_sub_full($infotintuc1);
					if($catalog_subs_sidebar1){
						$this->db->cache_on();
						$this->db->where('status', 1);
						$this->db->where('kieubaiviet', 0);
						$this->db->where('timer <=', now());
						$this->db->where_in('catalog_id', $catalog_subs_sidebar1);
						$this->db->order_by('sort_order', 'asc');
						$this->db->limit(10, 0);
						$tt_left1 = $this->db->get('news')->result();
						$this->data['tt_left1'] = $tt_left1;
						$this->data['infotintuc1'] = $infotintuc1;
					}
				}

				// Side bar 2
				$this->db->cache_on();
				$infotintuc2 = $this->catalognew_model->get_info($this->infosetting->id_sidebar2);
				$this->db->cache_off();
				if($infotintuc2){
					$catalog_subs_sidebar2 = $this->catalognew_model->get_sub_full($infotintuc2);
					if($catalog_subs_sidebar2){
						$this->db->cache_on();
						$this->db->where('status', 1);
						$this->db->where('kieubaiviet', 0);
						$this->db->where('timer <=', now());
						$this->db->where_in('catalog_id', $catalog_subs_sidebar2);
						$this->db->order_by('sort_order', 'asc');
						$this->db->limit(10, 0);
						$tt_left2 = $this->db->get('news')->result();
						$this->data['tt_left2'] = $tt_left2;
						$this->data['infotintuc2'] = $infotintuc2;
					}
				}


		        // load giá tìm kiếm block left
		        $inputprice['order'] = array('sort_order','asc');
		        $pricesearch = $this->pricesearch_model->get_list($inputprice);
		        $this->data['pricesearch'] = $pricesearch;

		        // load color block left
		        $inputcolor['order'] = array('sort_order','asc');
		        $color = $this->color_model->get_list($inputcolor);
		        $this->data['color'] = $color;

	            // load block left
		        $this->db->cache_on();
		        $inputsidecha['order'] = array('sort_order', 'asc');
		        $inputsidecha['where'] = array('parent_id' => 0);
		        $side = $this->side_model->get_list($inputsidecha);
		        $this->db->cache_off();
		        $this->data['side'] = $side;
				
		        // load ảnh asd menu trái
		        $this->db->cache_on();
		        $inputqc['order'] = array('sort_order', 'asc');
		        $bannerqc = $this->bannerqc_model->get_list($inputqc);
		        $this->db->cache_off();
		        $this->data['bannerqc'] = $bannerqc;

		     

	            // load slide
				//$this->db->cache_on();
				$inputslide['order'] = array('sort_order', 'asc');
				$slide_list = $this->slide_model->get_list($inputslide);
				$this->db->cache_off();
				$this->data['slide_list'] = $slide_list;

	            // Load menu
	            //$this->db->cache_on();
	            $inputmenu['order'] = array('sort_order', 'asc');
	            $inputmenu['where'] = array('parent_id' => 0);
	            $menucha = $this->menu_model->get_list($inputmenu);
	            $this->db->cache_off();
	            $this->data['menucha'] = $menucha;

	            // load logo doi tac
				$this->db->cache_on();
				$inputdoitac['order'] = array('sort_order', 'asc');
				$logodoitac = $this->logodoitac_model->get_list($inputdoitac);

				$this->db->cache_off();
				$this->data['logodoitac'] = $logodoitac;

				// load ho tro truc tuyen trang chu
				//$this->db->cache_on();
				$inputhotrotructuyen = array();
				$inputhotrotructuyen['order'] = array('sort_order', 'asc');
				$hotrotructuyen = $this->hotrotructuyen_model->get_list($inputhotrotructuyen);
				$this->db->cache_off();
				$this->data['hotrotructuyen'] = $hotrotructuyen;

            /*------------------------- THỐNG KÊ TRUY CẬP -------------------------	*/
            /*Truyen bien thong ke + thêm cho khác hàng. */
			$this->load->model('thongketruycap_model');
			$thongke = $this->thongketruycap_model->get_info(1);
			$this->data['thongke'] = $thongke;

			$muoiphut = 600;
			$now = time();
			$records = 1000;
			$locktime = $now - 600; // 10 phut
			$day = date('d');
			$month = date('m');
			$year = date('Y');
			$daystart = mktime(0,0,0,$month,$day,$year);
			$monthstart = mktime(0,0,0,$month,1,$year);
			// weekstart
			$weekday = date('w');
			$weekday--;
			if ($weekday < 0){
				$weekday = 7;
			}
			$weekday = $weekday * 24*60*60;
			$weekstart = $daystart - $weekday;
			$yesterdaystart = $daystart - (24*60*60);
			$ip = $_SERVER['REMOTE_ADDR'];
			$session_id = session_id();
			// add them user khi thoi gian vao he thong + 15 phut > thoi gian hien tai
			// cach 1
			if(!$this->session->userdata($session_id)){
				$useradd = array('ip_address' => $ip, 'last_activity' => $now, 'sessions' => $session_id);
				$this->db->insert('ci_sessions', $useradd);
				$this->db->trans_complete();
				$id_session = $this->db->insert_id();
				$this->session->set_userdata($session_id, $id_session);
			}
			// end cach 1

			// Tổng truy cập
			$this->db->select("COUNT(*) AS 'TOTAL'");
			$sql = $this->db->get('ci_sessions');
			$all = $sql->row_array();
			$all_visitors = $all['TOTAL'];
			$this->data['all_visitors'] = $all['TOTAL'];

			// Truy cập hom nay
			$this->db->select('*'); 
			$this->db->where('last_activity >', $daystart);
			$query1 = $this->db->count_all_results('ci_sessions');
			$today_visitors = $query1;
			$this->data['today_visitors'] = $today_visitors;

			// Truy cập hom qua
			$this->db->select("count(*) as 'yesterdayrec'");  
			$this->db->where('last_activity >', $yesterdaystart);
			$this->db->where('last_activity <', $daystart);
			$query2 = $this->db->get('ci_sessions');
			$yesrec   = $query2->row_array();
			$yesterday_visitors = $yesrec['yesterdayrec'];			
			$this->data['yesterday_visitors'] = $yesterday_visitors;

			// Truy cập tuan nay 
			$this->db->select("count(*) as 'weekrec'");  
			$this->db->where('last_activity >=', $weekstart);
			$query3 = $this->db->get('ci_sessions');
			$weekrec   = $query3->row_array();
			$week_visitors = $weekrec['weekrec'];
			$this->data['week_visitors'] = $week_visitors;

			// Truy cập hàng tháng
			$this->db->select("count(*) as 'monthrec'");  
			$this->db->where('last_activity >=', $monthstart);
			$query4 = $this->db->get('ci_sessions');
			$monthrec   = $query4->row_array();
			$month_visitors = $monthrec['monthrec'];
			$this->data['month_visitors'] = $month_visitors;

			// Xóa truy cap khi vuot quá so luong cho phép
// 			$temp = $all_visitors - $records;
// 			if ($temp >= 0){
// 					$this->db->empty_table('ci_sessions');
// 					$updatetotal = $thongke->totalkh + $records;
// 					$datatotal = array('totalkh' => $updatetotal);
// 					$this->thongketruycap_model->update(1, $datatotal);
// 			}

		// ------------------------ ĐANG ONLINE ---------------------------
			// nếu quá 10 phút mà ko thấy session này làm việc thì tiến hành xóa
			$this->db->where('time <', $locktime);
			$this->db->delete('user_online');

			$this->db->select('*');  
			$this->db->where('session', $session_id);
			$count = $this->db->count_all_results('user_online');
			if($count == 0){
				$data = array('session' => $session_id,'time' => $now,'ip' => $ip);
				$this->db->insert('user_online', $data);
			} else {
				$data = array('time' => $now);
				$this->db->where('session', $session_id);
				$query5 = $this->db->update('user_online', $data);
			}
				$this->db->select('*');  
				$count_user_online = $this->db->count_all_results('user_online');
				$count_user_online = $count_user_online;
				$this->data['count_user_online'] = $count_user_online;
	            }
	        }
	    }

    	/* Kiểm tra trạng thái đăng nhập của admin*/
		private function _check_login(){
		 	$controller = $this->uri->rsegment(1);
		 	// cho ve dang chữ thường khong in hoa
		 	$controller = strtolower($controller);
		 	$login = $this->session->userdata('login');
		 	// nếu chua có session login và truy vào url cấp 1 controller khác login
		 	if(!$login && $controller != 'login'){
		 		redirect(admin_url('login'));
		 	}
		 	if($login && $controller == 'login'){
		 		redirect(admin_url('home'));
		 	}elseif (!in_array($controller, array('login', 'home'))){
		 		$admin_id = $this->session->userdata('quyen_id');
		 		$admin_root = $this->config->item('root_admin');
		 		if($admin_id != $admin_root){
		 			// kiem tra quyen
		 			$quyen_admin = $this->session->userdata('quyen');
		 			$controller = $this->uri->rsegment(1);
		 			$action = $this->uri->rsegment(2);
		 			$check = true;
		 			if(!isset($quyen_admin->{$controller})){
		 				$check = false; 
		 			}
		 			$quyen_action = $quyen_admin->{$controller};
		 			if(!in_array($action, $quyen_action)){
		 				$check = false; 
		 			}
		 			if($check == false){
		 				$this->session->set_flashdata('message', 'Bạn không có quyền này - Vui lòng liên hệ Admin cao nhất để được hỗ trợ');
		 				redirect(base_url('admin'));
		 			}
		 		}
		 	}
		}

		/** session ngon ngu*/
		// private function load_lang(){
		//    	if($this->session->userdata('lang') == "vi" || $this->session->userdata('lang') == ""){
		//        $this->config->set_item('language','vi');
		//        $this->session->set_userdata("lang",'vi');
		//        $this->lang->load('lang', 'vi');
		//    	}
		//    	if($this->session->userdata('lang') == "en"){
		//        $this->config->set_item('language','en');
		//        $this->session->set_userdata("lang",'en');
		//        $this->lang->load('lang', 'en');   
		//     }
		// }
		private function load_lang(){
			$getlang = $this->uri->segment(1);
	    	//$this->session->set_userdata("lang", $getlang);
		   	if($this->uri->segment(1) != "en"){
		       $this->config->set_item('language','vi');
		       $this->lang->load('lang', 'vi');
		   	}
		   	if($this->uri->segment(1) == "en"){
		       $this->config->set_item('language','en');
		       $this->lang->load('lang', 'en');   
		    }
		}

}
