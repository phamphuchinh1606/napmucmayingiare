<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Craw extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('catalog_model');
		$this->load->model('catalognew_model');
		$this->load->model('product_model');
		$this->load->model('news_model');
	}
	function index(){
		
	}
}