<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Deletecache extends MY_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('admin');
	}
	function index(){
		$link = './application/cache/cachedata';
		//$handle = opendir($link);
		    //while (($file = readdir($handle))!== FALSE) 
		    //{
		   	 //@unlink($link .'/'.$file);
		        //Leave the directory protection alone
		        //if ($file != '.htaccess' && $file != 'index.html')
		        //{	
		           
		        //}
		    //}
		//closedir($handle);
		remove_directory($link, TRUE);
		$this->session->set_flashdata('message', 'XÓA CACHE THÀNH CÔNG');
		redirect('admin');
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->load->view('admin/main', $this->data);
	}
	
}