<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {
	function __construct(){
		
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('product_model');
	}
	function addajax(){
		$id = $this->input->post('idspajax');
		$size = $this->input->post('size');
		$product = $this->product_model->get_info($id);
		if(!$product){redirect();}
		$qty = 1;
		$price = $product->price;
		if($product->price > 0 && $product->discount > 0){
			$price = $product->price - $product->discount;
		}
		$price_en = $product->price_en;
		if($product->price_en > 0 && $product->discount_en > 0){
			$price_en = $product->price_en - $product->discount_en;
		}
		$data = array(
			'id' => $product->id,
			'qty' => $qty,
			'name' => $product->name,
			'image_link' => $product->image_link,
			'price' => $price,
			'size' => $size,
			'discount' => $product->discount,
			'price_goc' => $product->price,
			'url' => $product->url,
			'name_en' => $product->name_en,
			'price_en' => $price_en,
			'discount_en' => $product->discount_en,
			'price_goc_en' => $product->price_en,
			'url_en' => $product->url_en,
		);		
		$this->cart->insert($data);	

		echo $this->cart->total_items();
	}
	function add(){
		$id = $this->uri->rsegment(3);
		$product = $this->product_model->get_info($id);
		if(!$product){redirect();}
		$qty = $this->input->post('quantity');
		$price = $product->price;
		if($product->price > 0 && $product->discount > 0){
			$price = $product->price - $product->discount;
		}
		$price_en = $product->price_en;
		if($product->price_en > 0 && $product->discount_en > 0){
			$price_en = $product->price_en - $product->discount_en;
		}
		$data = array(
			'id' => $product->id,
			'qty' => $qty,
			'name' => $product->name,
			'image_link' => $product->image_link,
			'price' => $price,
			'discount' => $product->discount,
			'price_goc' => $product->price,
			'url' => $product->url,
			'name_en' => $product->name_en,
			'price_en' => $price_en,
			'discount_en' => $product->discount_en,
			'price_goc_en' => $product->price_en,
			'url_en' => $product->url_en,
		);		
		$this->cart->insert($data);	
		if($this->ngonngu != 'en'){
			redirect(site_url('cart'));
		}
		if($this->ngonngu == 'en'){
			redirect(site_url('en/cart'));
		}
	}
	function index(){
		$cart = $this->cart->contents();
		//var_dump($cart);
		$total_items = $this->cart->total_items();
		// SEO =================================================
		$url = base_url('cart');
		if($this->ngonngu == 'en'){
			$url = base_url('en/cart');
		}
		$title = 'Giỏ hàng';
		if($this->ngonngu == 'en'){
			$title = 'Cart';
		}
		$description = 'Giỏ hàng của bạn';
		if($this->ngonngu == 'en'){
			$description = 'Your cart';
		}
		$keywords = 'Giỏ hàng';
		if($this->ngonngu == 'en'){
			$keywords = 'Cart';
		}
		$this->data['url_vi'] = base_url('cart');
		$this->data['url_en'] = base_url('en/cart');
		$this->data['url'] = $url;
		$this->data['title'] = $title;
		$this->data['description'] = $description;
		$this->data['keywords'] = $keywords;
		// Breadcrumb
		if($this->ngonngu != 'en'){
			$this->mybreadcrumb->add('Trang chủ', base_url());
			$this->mybreadcrumb->add('Giỏ hàng', base_url('cart'));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}
		if($this->ngonngu == 'en'){
			$this->mybreadcrumb->add('Home', base_url('en'));
			$this->mybreadcrumb->add('Cart', base_url('en/cart'));
			$this->data['breadcrumb'] = $this->mybreadcrumb->render();
		}

		$this->data['cart'] = $cart;
		$this->data['temp'] = 'site/cart/index';
		$this->load->view('site/layout', $this->data);
	}
	function update(){
		$cart = $this->cart->contents();
		foreach($cart as $key => $row){
			$total_qty = $this->input->post('soluong_'.$row['id']);
			$data=array();
			$data['rowid'] = $key;
			$data['qty'] = $total_qty;
			$this->cart->update($data);
		}
		if($this->ngonngu != 'en'){
			redirect(site_url('cart'));
		}
		if($this->ngonngu == 'en'){
			redirect(site_url('en/cart'));
		}
	}
	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);
		// Trường ho xoa 1 san pham nao do
		if($id > 0){
			$cart = $this->cart->contents();
			foreach($cart as $key=>$row){
				if($row['id'] == $id){
					$data=array();
					$data['rowid'] = $key;
					$data['qty'] = 0;
					$this->cart->update($data);
				}
			}
		}else{
			$this->cart->destroy();
		}
		if($this->ngonngu != 'en'){
			redirect(site_url('cart'));
		}
		if($this->ngonngu == 'en'){
			redirect(site_url('en/cart'));
		}
	}
}