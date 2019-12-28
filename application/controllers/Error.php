<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Error extends MY_Controller {

	function __construct(){
		parent::__construct();
	}
	function index(){
		redirect(base_url());
	}
}