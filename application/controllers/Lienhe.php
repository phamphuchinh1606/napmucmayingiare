<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lienhe extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('lienhe_model');
		$this->load->model('setting_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('captcha');
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$messagelh = $this->session->flashdata('messagelh');
		$this->data['messagelh'] = $messagelh;
	}

	public function index(){
		$emailnhan = $this->setting_model->get_info(1)->emailnhan;
		$tieude = 'Cần tư vấn';
		if($this->input->post()){
			$this->form_validation->set_rules('hoten', '', 'required');
			$this->form_validation->set_rules('diachi', '', 'required');
			$this->form_validation->set_rules('phone', '', 'required|numeric');
			$this->form_validation->set_rules('email', '', 'required|valid_email');
			$this->form_validation->set_rules('captcha','captcha','callback_validation_captcha');
			// khi nhap lieu chinh xac
			if($this->form_validation->run()){
				$noidung = 'Họ và tên: '.$this->input->post('hoten').'<br/>'.'Số điện thoại: '.$this->input->post('phone').'<br/>'.'Email: '.$this->input->post('email').'<br/>'.'Địa chỉ: '.$this->input->post('diachi').'<br/>'.'Ghi chú thêm: '.$this->input->post('ghichu');
				$data = array(
					'address' => $this->input->post('diachi'),
					'name' => $this->input->post('hoten'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'content' => $this->input->post('ghichu'),
					'created' => now(),
					'module' => 1,
				);
				if($this->lienhe_model->create($data)){
					$this->session->set_flashdata('message', "Gửi thông tin thành công. Chúng tôi sẽ liện hệ lại với bạn trong thời gian sớm nhất");
				}else{
					$this->session->set_flashdata('message', 'Không gửi được, thử lại sau');
				}
				//Cấu hình gui mail
	            $config['protocol']='smtp';
	            $config['smtp_host']='ssl://smtp.googlemail.com';
	            $config['smtp_port']='465';
	            $config['smtp_timeout']='30';
	            $config['smtp_user']='suamayvanphongitt@gmail.com';
	            $config['smtp_pass']='fhozcqfzqfjhpamd';
	            $config['charset']='utf-8';
	            $config['newline']="\r\n";
	            $config['wordwrap'] = TRUE;
	            $config['mailtype'] = 'html';
	            $this->email->initialize($config);
	            $this->email->from($user_email, base_url());
	            $this->email->to($emailnhan);
	            $this->email->subject($tieude);
	            $this->email->message($noidung);
				//thuc hien gui
				if (!$this->email->send()){
				    $error = $this->email->print_debugger();
				    $this->session->set_flashdata('message', $error);
				}else{
				    $this->session->set_flashdata('message', 'Gửi thông tin thành công. Chúng tôi sẽ liện hệ lại với bạn trong thời gian sớm nhất');
				}
				if($this->ngonngu != 'en'){
					redirect(site_url('lien-he'));
				}
				if($this->ngonngu == 'en'){
					redirect(site_url('en/contact'));
				}
			}
		}
	    $infolienhe = $this->setting_model->get_info(1);
	    $this->data['infolienhe'] = $infolienhe;
		// SEO =================================================
		$title = ($infolienhe->title_pagelh)?$infolienhe->title_pagelh:'Liên hệ';
		if($this->ngonngu == 'en'){
			$title = ($infolienhe->title_pagelh_en)?$infolienhe->title_pagelh_en:'Contact';
		}
		$description = ($infolienhe->des_pagelh)?$infolienhe->des_pagelh:'Liên hệ';
		if($this->ngonngu == 'en'){
			$description = ($infolienhe->des_pagelh_en)?$infolienhe->des_pagelh_en:'Contact';
		}
		$keywords = ($infolienhe->key_pagelh)?$infolienhe->key_pagelh:'Liên hệ';
		if($this->ngonngu == 'en'){
			$keywords = ($infolienhe->key_pagelh_en)?$infolienhe->key_pagelh_en:'Contact';
		}
		$url = site_url('lien-he');
		if($this->ngonngu == 'en'){
			$url = site_url('en/contact');
		}
		$this->data['url_vi'] = site_url('lien-he');
		$this->data['url_en'] = site_url('en/contact');
		$this->data['url'] = $url;
		$this->data['title'] = $title;
		$this->data['description'] = $description;
		$this->data['keywords'] = $keywords;
		$this->data['image_seo'] = ($infolienhe->image_pagelh)?base_url('uploads/images/logo-banner/'.$infolienhe->image_pagelh):'';
		// Breadcrumb ======================================
		if($this->ngonngu != 'en'){
			$this->mybreadcrumb->add('Trang chủ', base_url());
			$this->mybreadcrumb->add('Liên hệ', base_url('lien-he'));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}
		if($this->ngonngu == 'en'){
			$this->mybreadcrumb->add('Home', base_url());
			$this->mybreadcrumb->add('Contact', base_url('en/contact'));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}
		$vals = array(
		    'img_path' => './uploads/captcha/',
		    'img_url' => base_url('uploads/captcha/'),
		    'img_width' => 180,
		    'img_height' => 40,
		    'expiration' => 0,
		    'word_length' => 6,
		    'font_size' => 25,
		    'pool' => '0123456789',
			'img_id' => 'Imageid',
		);
		$captcha = create_captcha($vals);
		$this->session->set_userdata('captcha', $captcha);

		$this->data['temp'] = 'site/lienhe/index';
		$this->load->view('site/layout', $this->data);
	}
	function validation_captcha(){
		$post_captcha = $this->input->post('captcha');
		$sess_captcha = $this->session->userdata('captcha');
		$word_captcha = $sess_captcha['word'];
		if($post_captcha == $word_captcha){
			return true;
		}
		if($this->ngonngu != 'en'){
			$this->form_validation->set_message(__FUNCTION__, 'Mã kiểm tra không đúng');
		}
		if($this->ngonngu == 'en'){
			$this->form_validation->set_message(__FUNCTION__, 'Captcha invalid');
		}
		return false; 
	}
	public function dknt(){
		$emailnhan = $this->infosetting->emailnhan;
		if($this->input->post()){
			// khi nhap lieu chinh xac
			$namedangky = $this->input->post('namedangky');
			$phonedangky = $this->input->post('phonedangky');
			$emaildangky = $this->input->post('emaildangky');
			$sanphamdangky = $this->input->post('sanphamdangky');

			$noidung = 'Họ tên: '.$namedangky.'<br />'.'Số điện thoại: '.$phonedangky.'<br />'.'Email: '.$emaildangky. '<br />'.'Sản Phẩm: '.$sanphamdangky;
			$data = array(
					'name' => $namedangky,
					'phone' => $phonedangky,
					'email' => $emaildangky,
					'content' => $sanphamdangky,
					'created' => now(),
					'module' => 2
				);
			$this->lienhe_model->create($data);
			// Cấu hình gui mail
            $config['protocol']='smtp';
            $config['smtp_host']='ssl://smtp.googlemail.com';
            $config['smtp_port']='465';
            $config['smtp_timeout']='30';
            $config['smtp_user']='suamayvanphongitt@gmail.com';
            $config['smtp_pass']='fhozcqfzqfjhpamd';
            $config['charset']='utf-8';
            $config['newline']="\r\n";
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from($emaildangky, base_url());
            $this->email->to($emailnhan);
            $this->email->subject($namedangky);
            $this->email->message($noidung);
			//thuc hien gui
			if(!$this->email->send()){
			    $error = $this->email->print_debugger();
			    echo $error;
			}else{
			    echo 'Đăng ký email thành công. Successful email signup.';
			}
		}
	}
	
}
