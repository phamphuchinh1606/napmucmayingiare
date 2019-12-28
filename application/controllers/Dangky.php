<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dangky extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('dangky_model');
		$this->load->model('lienhe_model');
		$this->load->model('setting_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('captcha');
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
	}
	public function index(){
		
		if($this->input->post()){
			$this->form_validation->set_rules('hoten', 'Thông tin', 'required');
			$this->form_validation->set_rules('didong', 'Thông tin', 'required|numeric');
			$this->form_validation->set_rules('email', 'Thông tin', 'required|valid_email');
			$this->form_validation->set_rules('captcha','Captcha','callback_validation_captcha');
			// khi nhap lieu chinh xac
			if($this->form_validation->run()){
				$emailnhan = $this->setting_model->get_info(1)->emailnhan;
				$hoten = $this->input->post('hoten');
				$didong = $this->input->post('didong');
				$email = $this->input->post('email');

				$noidung = 'Họ tên: '.$hoten.'<br />'.'Số điện thoại: '.$didong.'<br />'.'Email: '.$email;
				$data = array(
					'name' => $hoten,
					'phone' => $didong,
					'email' => $email,
					'content' => 'Đăng Ký Thành Viên',
					'created' => now(),
					'module' => 2
				);
				if($this->lienhe_model->create($data)){
					$this->session->set_flashdata('message', "Gửi thông tin thành công. Chúng tôi sẽ liện hệ lại với bạn trong thời gian sớm nhất");
				}else{
					$this->session->set_flashdata('message', 'Không gửi được, thử lại sau');
				}

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
	            $this->email->from($email, base_url());
	            $this->email->to($emailnhan);
	            $this->email->subject($hoten);
	            $this->email->message($noidung);
				//thuc hien gui
				if (!$this->email->send()){
				    $error = $this->email->print_debugger();
				    $this->session->set_flashdata('message', $error);
				}else{
				    $this->session->set_flashdata('message', 'Gửi thông tin thành công. Chúng tôi sẽ liện hệ lại với bạn trong thời gian sớm nhất');
				}
				redirect(site_url('dang-ky'));
			}
		}



	    $infolienhe = $this->setting_model->get_info(1);
	    $this->data['infolienhe'] = $infolienhe;
		// SEO =================================================
		$title = 'Đăng ký thành viên';
		$description = 'Đăng ký thành viên';
		$keywords = 'Đăng ký thành viên';
		$url = site_url('dang-ky');
		if($this->ngonngu == 'en'){
			$url = site_url('en/registration');
		}
		$this->data['url_vi'] = site_url('dang-ky');
		$this->data['url_en'] = site_url('en/registration');
		$this->data['url'] = $url;
		$this->data['title'] = $title;
		$this->data['description'] = $description;
		$this->data['keywords'] = $keywords;
		$this->data['image_seo'] = '';
		// Breadcrumb ======================================
		$this->mybreadcrumb->add('Trang chủ', base_url());
		$this->mybreadcrumb->add('Đăng ký thành viên', base_url('dang-ky'));
		$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		
		// Captcha
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

		$this->data['temp'] = 'site/dangky/index';
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
}
