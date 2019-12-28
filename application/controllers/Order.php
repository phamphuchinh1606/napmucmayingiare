<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {
	function __construct(){
		
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('product_model');
		$this->load->model('transaction_model');
		$this->load->model('order_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->data['message']= $this->session->flashdata('message');
	}
	function checkout(){
		$cart = $this->cart->contents();
		$this->data['cart']= $cart;
		$total_items = $this->cart->total_items();
		if($total_items <= 0){redirect();}
		$tonghoadon = 0;
        foreach($cart as $row){
            if($this->ngonngu != 'en'){
              $tonghoadon += $row['subtotal'];
            }
            if($this->ngonngu == 'en'){
              $tonghoadon += $row['subtotal_en'];
            }
    	}
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Họ và tên', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
			$this->form_validation->set_rules('address', 'Địa chỉ', 'required');
			// khi nhap lieu chinh xac
			if($this->form_validation->run()){
				$user_name = $this->input->post('name');
				$user_email = $this->input->post('email');
				$user_phone = $this->input->post('phone');
				$user_diachi = $this->input->post('address');
				$other_name = $this->input->post('other_name');
				$other_email = $this->input->post('other_email');
				$other_phone = $this->input->post('other_phone');
				$other_diachi = $this->input->post('other_address');
				$company_name = $this->input->post('company_name');
				$company_diachi = $this->input->post('company_address');
				$company_mst = $this->input->post('company_mst');
				$message = $this->input->post('ghichu');
				$hinhthucthanhtoan = $this->input->post('groupradiocheckout');
				if($hinhthucthanhtoan == 1){
				    $hinhthucthanhtoan ="Trả Tiền Mặt Khi Nhận Hàng";
				}else{
				    $hinhthucthanhtoan="Chuyển Khoản Ngân Hàng";
				}
				$data = array(
					'user_name' => $user_name,
					'user_email' => $user_email,
					'user_phone' => $user_phone,
					'user_diachi' => $user_diachi,
					'other_name' => $other_name,
					'other_email' => $other_email,
					'other_phone' => $other_phone,
					'other_diachi' => $other_diachi,
					'company_name' => $company_name,
					'company_diachi' => $company_diachi,
					'company_mst' => $company_mst,
					'message' => $message,
					'status' => 0,
					'amount' => $tonghoadon,
					'hinhthucthanhtoan' => $hinhthucthanhtoan,
					'created' => now(),
				);
				$this->session->set_userdata($data);
				// Gui mail cho Hệ thống
				$namekhach = $user_name.' đã đặt hàng tại '.base_url();
				$tieude = $namekhach.' đã đặt hàng';
				$noidung = 	'<b>Thông tin khách hàng:</b> <br/>Họ và tên: '.$user_name.'<br/>'.
							'Số điện thoại: '.$user_phone.'<br/>'.
							'Email: '.$user_email.'<br/>'.
							'Địa chỉ: '.$user_diachi.'<br/>'.
							'Ngày đặt: '.get_hen_ngay(now()).'<br/><br/>';
				$thongtinkhac = '';
				if($other_name != '' || $other_email != '' || $other_phone != '' || $other_diachi != ''){
					$thongtinkhac = '<b>Địa chỉ nhận hàng:</b> <br/>';
					if($other_name != ''){
						$thongtinkhac .= 'Người nhận: '.$user_name.'<br/>';
					}
					if($user_phone != ''){
						$thongtinkhac .= 'Số điện thoại: '.$user_phone.'<br/>';
					}
					if($user_email != ''){
						$thongtinkhac .= 'Email: '.$user_email.'<br/>';
					}
					if($user_diachi != ''){
						$thongtinkhac .= 'Địa chỉ: '.$user_diachi.'<br/><br/>';
					}
				}
				$xuathoadon = '';
				if($company_name != '' || $company_diachi != '' || $company_mst != ''){
					$xuathoadon = '<b>Thông tin xuất hóa đơn:</b> <br/>';
					if($company_name != ''){
						$xuathoadon .= 'Công ty: '.$company_name.'<br/>';
					}
					if($company_diachi != ''){
						$xuathoadon .= 'Địa chỉ: '.$company_diachi.'<br/>';
					}
					if($company_mst != ''){
						$xuathoadon .= 'Mã số thuế: '.$company_mst.'<br/><br/>';
					}
				}
				$sanpham = '<b>Các mặt hàng đã đặt:</b> <br/>';
				foreach($cart as $row){
					if(!empty($row['size'])){
						$sanpham .= '<a href="'.site_url($row['url'].'-sp'.$row['id']).'">'.$row['name'].'</a>(Size '. $row['size'] .') X '.$row['qty'].' = '.number_format($row['subtotal']).' đ'.'<br/>';
					}else{
						$sanpham .= '<a href="'.site_url($row['url'].'-sp'.$row['id']).'">'.$row['name'].'</a> X '.$row['qty'].' = '.number_format($row['subtotal']).' đ'.'<br/>';
					}
				}
				$tongnoidung = $noidung.$thongtinkhac.$xuathoadon.$message.'<br/><br/>'.$sanpham.'Tổng hóa đơn: '.number_format($tonghoadon).' đ';
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
	            $this->email->from($user_email, base_url());
	            $this->email->to($this->infosetting->emailnhan);
	            $this->email->subject($namekhach);
	            $this->email->message($tongnoidung);
				//thuc hien gui
				$this->email->send();
				$this->transaction_model->create($data);
				$transaction_id = $this->db->insert_id();
				foreach($cart as $row){
	        		$data = array(
	        			'transaction_id' => $transaction_id,
	        			'product_id' => $row['id'],
	        			'qty' => $row['qty'],
	        			'data' => 'Size '.$row['size'],
	        			'amount' => $row['subtotal'],
	        			'status' => 0,
	        		);
	        		$this->order_model->create($data);
	    		}
	    		if($this->ngonngu != 'en'){
	    			redirect(site_url('order/cartdone'));
	    		}
	    		if($this->ngonngu == 'en'){
	    			redirect(site_url('en/order/cartdone'));
	    		}
			}
		}
		// SEO =================================================
		$url = base_url('order/checkout');
		if($this->ngonngu == 'en'){
			$url = base_url('en/order/checkout');
		}
		$title = 'Thông tin thanh toán';
		if($this->ngonngu == 'en'){
			$title = 'Billing Information';
		}
		$description = 'Thông tin thanh toán';
		if($this->ngonngu == 'en'){
			$description = 'Billing Information';
		}
		$keywords = 'Thông tin thanh toán';
		if($this->ngonngu == 'en'){
			$keywords = 'Billing Information';
		}
		$this->data['url_vi'] = base_url('order/checkout');
		$this->data['url_en'] = base_url('en/order/checkout');
		$this->data['url'] = $url;
		$this->data['title'] = $title;
		$this->data['description'] = $description;
		$this->data['keywords'] = $keywords;
		// Breadcrumb
		if($this->ngonngu != 'en'){
			$this->mybreadcrumb->add('Trang chủ', base_url());
			$this->mybreadcrumb->add('Giỏ hàng', base_url('cart'));
			$this->mybreadcrumb->add('Thông tin thanh toán', base_url('order/checkout'));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}
		if($this->ngonngu == 'en'){
			$this->mybreadcrumb->add('Home', base_url('en'));
			$this->mybreadcrumb->add('Cart', base_url('en/cart'));
			$this->mybreadcrumb->add('Billing Information', base_url('en/order/checkout'));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}

		$this->data['temp'] = 'site/order/checkout';
		$this->load->view('site/layout', $this->data);
		
	}
	function pay(){
		if($this->input->post()){
			// Gui mail về cho khách
			$emailkhach = $thongtinthanhtoan['user_email'];
			$namekhach = $thongtinthanhtoan['user_name'];
			$emailnhan = $this->setting_model->get_info(1)->email;
			$tieude = $namekhach.' đã đặt hàng';
			$noidung = 'Họ và tên: '.$namekhach.'<br/>'.'Số điện thoại: '.$thongtinthanhtoan['user_phone'].'<br/>'.'Email: '.$emailkhach.'<br/>'.'Ghi chú thêm: '.$thongtinthanhtoan['message'].'<br/>'.'Ngày đặt: '.get_hen_ngay($thongtinthanhtoan['created']).'<br/>'.'Hình thức thanh toán: '.$this->input->post('hinhthucthanhtoan').'<br/>'.'Tổng hóa đơn: '.number_format($thongtinthanhtoan['amount']).' đ';
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
            $this->email->from($emailkhach, $namekhach);
            $this->email->to($emailnhan);
            $this->email->subject($tieude);
            $this->email->message($noidung);
			//thuc hien gui
			$this->email->send();
			// End gui mail về cho khách
			$this->transaction_model->create($data);
			$transaction_id = $this->db->insert_id();
			foreach($cart as $row){
        		$data = array(
        			'transaction_id' => $transaction_id,
        			'product_id' => $row['id'],
        			'qty' => $row['qty'],
        			'amount' => $row['subtotal'],
        			'status' => 0,
        		);
        		$this->order_model->create($data);
    		}
    		$this->cart->destroy();
			$pttt = '';
			if($payment=='chuyenkhoan' || $payment=='tienmat'){
				if($payment=='chuyenkhoan'){
					$pttt = 'Chuyển khoản';
				}
				if($payment=='tienmat'){
					$pttt = 'Tiền mặt';
				}
				$this->session->set_flashdata('message', $pttt);
				// chuyển tới trang danh sách admin và thông báo bằng biến message 
				redirect(site_url('order/cartdone'));
			}elseif($payment == 'baokim'){
                $this->load->library('payment/baokim_payment');
                // chuyen sang cong thanh toan
                $this->baokim_payment->payment($transaction_id, $thongtinthanhtoan['amount']);
			}
		}
		// SEO =================================================
		$this->data['url'] = site_url();
		$this->data['title'] = 'Hình thức thanh toán';
		$this->data['description'] = '';
		$this->data['keywords'] = '';
		$this->data['image_seo'] = '';
		// Breadcrumb
		$this->mybreadcrumb->add('Trang chủ', base_url());
		$this->mybreadcrumb->add('Giỏ hàng', base_url('cart'));
		$this->mybreadcrumb->add('Hình thức thanh toán', base_url('order/pay'));
		$this->data['breadcrumb'] = $this->mybreadcrumb->render();

		$this->data['temp'] = 'site/order/pay';
		$this->load->view('site/layout', $this->data);
	}
	//* ========== Nhận thông tin tra ve từ bao kim -==================//
	function result(){
		$this->load->library('payment/baokim_payment');
		// id giao dịch
		$transaction_id = $this->input->post('order_id');
		// lấy thông tin giao dịch
		$transaction = $this->model->transaction_model->get_info($tran_id);
		if(!$transaction){
			redirect();
		}
		// gọi hàm kiểm tra trang thai thanh toán bên bảo kim
		$status = $this->baokim_payment->result($transaction_id, $transaction->amount);
		if($status == true){
			// trạng thái đã thanh toán
			$data = array();
			$data['status'] = 1;
			$this->model->transaction_model->update($transaction_id, $data);
		}elseif($status = false){
			// cập nhật trang thai don hang la khong thanh toán
			$data = array();
			$data['status'] = 2;
			$this->model->transaction_model->update($transaction_id, $data);
		}
	}
	function cartdone(){
		$thongtindone = array(
			'user_name' => $this->session->userdata("user_name"),
			'user_email' => $this->session->userdata("user_email"),
			'user_phone' => $this->session->userdata("user_phone"),
			'user_diachi' => $this->session->userdata("user_diachi"),
			'other_name' => $this->session->userdata("other_name"),
			'other_email' => $this->session->userdata("other_email"),
			'other_phone' => $this->session->userdata("other_phone"),
			'other_diachi' => $this->session->userdata("other_diachi"),
			'company_name' => $this->session->userdata("company_name"),
			'company_diachi' => $this->session->userdata("company_diachi"),
			'company_mst' => $this->session->userdata("company_mst"),
			'message' => $this->session->userdata("message"),
			'created' => $this->session->userdata("created"),
		);
		$this->data['thongtindone'] = $thongtindone;

		// SEO =================================================
		$url = base_url('order/cartdone');
		if($this->ngonngu == 'en'){
			$url = base_url('en/order/cartdone');
		}
		$title = 'Đặt hàng thành công';
		if($this->ngonngu == 'en'){
			$title = 'Order Success';
		}
		$description = 'Đặt hàng thành công';
		if($this->ngonngu == 'en'){
			$description = 'Order Success';
		}
		$keywords = 'Đặt hàng thành công';
		if($this->ngonngu == 'en'){
			$keywords = 'Order Success';
		}
		$this->data['url_vi'] = base_url('order/cartdone');
		$this->data['url_en'] = base_url('en/order/cartdone');
		$this->data['url'] = $url;
		$this->data['title'] = $title;
		$this->data['description'] = $description;
		$this->data['keywords'] = $keywords;
		// Breadcrumb
		if($this->ngonngu != 'en'){
			$this->mybreadcrumb->add('Trang chủ', base_url());
			$this->mybreadcrumb->add('Giỏ hàng', base_url('cart'));
			$this->mybreadcrumb->add('Đặt hàng thành công', base_url('order/cartdone'));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}
		if($this->ngonngu == 'en'){
			$this->mybreadcrumb->add('Home', base_url('en'));
			$this->mybreadcrumb->add('Cart', base_url('en/cart'));
			$this->mybreadcrumb->add('Order Success', base_url('en/order/cartdone'));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}
		$cart = $this->cart->contents();
		$this->data['cart']= $cart;
		$total_items = $this->cart->total_items();
		if($total_items <= 0){
			if($this->ngonngu != 'en'){
				redirect(base_url('cart'));
			}
			if($this->ngonngu == 'en'){
				redirect(base_url('en/cart'));
			}
		}
		$this->cart->destroy();

		$this->data['temp'] = 'site/order/cartdone';
		$this->load->view('site/layout', $this->data);

	}
}