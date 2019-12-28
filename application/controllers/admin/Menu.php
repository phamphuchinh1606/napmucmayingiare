<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Menu extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('menu_model');
		$this->load->model('news_model');
		$this->load->model('catalog_model');
		$this->load->model('catalognew_model');
		$this->load->library('form_validation');
		$this->load->helper('form');

		//lay danh muc menu cha
		$inputmenu['order'] = array('sort_order', 'asc');
		$inputmenu['where'] = array('parent_id' => 0);
		$menucha = $this->menu_model->get_list($inputmenu);
		$this->data['menucha'] = $menucha;

		//load catalognew ra danh muc
		$inputcatalog['order'] = array('sort_order', 'asc');
		$inputcatalog['where'] = array('parent_id' => 0);
		$catalogcha = $this->catalognew_model->get_list($inputcatalog);
		$this->data['catalogcha'] = $catalogcha;

		//load trang ra danh muc
		$inputtrang['order'] = array('sort_order', 'asc');
		$inputtrang['where'] = array('kieubaiviet' => 1);
		$trang = $this->news_model->get_list($inputtrang);
		$this->data['trang'] = $trang;
	}

	function index(){
		$inputmenu['order'] = array('sort_order', 'asc');
		$inputmenu['where'] = array('parent_id' => 0);
		$menucha = $this->menu_model->get_list($inputmenu);
		$this->data['menucha'] = $menucha;

		$this->data['temp'] = 'admin/menu/index';
		$this->load->view('admin/main', $this->data);
	}
	function load_menu_ajax(){
		$menu = array();
		$input = array();
		$idModule = $this->input->post('idModule');
		// Nếu là trang
		if($idModule == 0){
			$input['order'] = array('sort_order', 'desc');
			$input['where'] = array('kieubaiviet' => 1);
			$menu = $this->news_model->get_list($input);
			foreach($menu as $row){
				if($this->infosetting->ngonngu != 0){
					echo "<option value='".$row->id."'>".$row->name.' ('.$row->name_en.')'."</option>";
				}else{
					echo "<option value='".$row->id."'>".$row->name."</option>";
				}
			}
		}
		// Nếu là danh mục bai viet
		if($idModule == 1){
			$input['order'] = array('sort_order', 'desc');
			$input['where'] = array('parent_id' => 0);
			$menu = $this->catalognew_model->get_list($input);
            foreach ($menu as $row){
	            if($this->infosetting->ngonngu != 0){
	            	echo "<option value='".$row->id."'>".$row->name.' ('.$row->name_en.')'."</option>";
					if(count($this->catalognew_model->menucon($row->id)) > 0){
	            		foreach ($this->catalognew_model->menucon($row->id) as $con){
						echo "<option value='".$con->id."'>--|".$con->name.' ('.$con->name_en.')'."</option>";
							if(count($this->catalognew_model->menucon($con->id)) > 0){
	            				foreach ($this->catalognew_model->menucon($con->id) as $con1){
	            				echo "<option value='".$con1->id."'>--|--|".$con1->name.' ('.$con1->name_en.')'."</option>";
	            				}
	            			}
	            		}
	            	}
	            }else{
	            	echo "<option value='".$row->id."'>".$row->name."</option>";
					if(count($this->catalognew_model->menucon($row->id)) > 0){
	            		foreach ($this->catalognew_model->menucon($row->id) as $con){
						echo "<option value='".$con->id."'>--|".$con->name."</option>";
							if(count($this->catalognew_model->menucon($con->id)) > 0){
	            				foreach ($this->catalognew_model->menucon($con->id) as $con1){
	            				echo "<option value='".$con1->id."'>--|--|".$con1->name."</option>";
	            				}
	            			}
	            		}
	            	}
	            }
        	}
		}
		// Nếu là danh mục sản phẩm
		if($idModule == 2){
			$input['order'] = array('sort_order', 'desc');
			$input['where'] = array('parent_id' => 0);
			$menu = $this->catalog_model->get_list($input);
            foreach ($menu as $row){
				if($this->infosetting->ngonngu != 0){
	            	echo "<option value='".$row->id."'>".$row->name.' ('.$row->name_en.')'."</option>";
					if(count($this->catalog_model->menucon($row->id)) > 0){
	            		foreach ($this->catalog_model->menucon($row->id) as $con){
						echo "<option value='".$con->id."'>--|".$con->name.' ('.$con->name_en.')'."</option>";
							if(count($this->catalog_model->menucon($con->id)) > 0){
	            				foreach ($this->catalog_model->menucon($con->id) as $con1){
	            				echo "<option value='".$con1->id."'>--|--|".$con1->name.' ('.$con1->name_en.')'."</option>";
	            				}
	            			}
	            		}
	            	}
            	}else{
	            	echo "<option value='".$row->id."'>".$row->name."</option>";
					if(count($this->catalog_model->menucon($row->id)) > 0){
	            		foreach ($this->catalog_model->menucon($row->id) as $con){
						echo "<option value='".$con->id."'>--|".$con->name."</option>";
							if(count($this->catalog_model->menucon($con->id)) > 0){
	            				foreach ($this->catalog_model->menucon($con->id) as $con1){
	            				echo "<option value='".$con1->id."'>--|--|".$con1->name."</option>";
	            				}
	            			}
	            		}
	            	}
            	}

        	}
		}
	}
	function add(){
		if($this->input->post()){
			if($this->input->post('name_menu1') == '' || $this->input->post('lienket') == ''){
				$this->form_validation->set_rules('module_menu', 'Module Menu', 'required');
				$this->form_validation->set_rules('name_menu', 'Tên Menu', 'required');
				if($this->form_validation->run()){
					$module_menu = $this->input->post('module_menu');
					$name_menu = $this->input->post('name_menu');
					$parent_id = $this->input->post('parent_id');
					$sort_order = $this->input->post('sort_order');
					$name = '';
					$name_en = '';
					$url = '';
					$url_en = '';
					$link_id = '';
					if($module_menu == 0){
						$trang = $this->news_model->get_info($name_menu);
						$name = $trang->name;
						$name_en = $trang->name_en;
						$url = $trang->url.'-t'.$trang->id;
						$url_en = $trang->url_en.'-t'.$trang->id;
						$link_id = $trang->id;
					}
					if($module_menu == 1){
						$catalognew = $this->catalognew_model->get_info($name_menu);
						$name = $catalognew->name;
						$name_en = $catalognew->name_en;
						$url = $catalognew->url.'-tt'.$catalognew->id;
						$url_en = $catalognew->url_en.'-tt'.$catalognew->id;
						$link_id = $catalognew->id;
					}
					if($module_menu == 2){
						$catalog = $this->catalog_model->get_info($name_menu);
						$name = $catalog->name;
						$name_en = $catalog->name_en;
						$url = $catalog->url.'-c'.$catalog->id;
						$url_en = $catalog->url_en.'-c'.$catalog->id;
						$link_id = $catalog->id;
					}
					$data = array(
						'name' => $name,
						'name_en' => $name_en,
						'url' => $url,
						'url_en' => $url_en,
						'parent_id' => $parent_id,
						'sort_order' => intval($sort_order),
						'link_id' =>$link_id,
						'module_menu' => $module_menu,
						);
					if($this->menu_model->create($data)){
						$this->session->set_flashdata('message', 'Thêm menu thành công');
					}else{
						$this->session->set_flashdata('message', 'Không thêm được menu');
					}
					redirect(admin_url('menu'));
				}
			}else{
				$this->form_validation->set_rules('name_menu1', 'Tên', 'required');
				$this->form_validation->set_rules('lienket', 'Kiên kết', 'required');
				if($this->infosetting->ngonngu != 0){
					$this->form_validation->set_rules('name_menu1_en', 'Tên', 'required');
					$this->form_validation->set_rules('lienket_en', 'Link', 'required');
				}
				if($this->form_validation->run()){
					$data = array(
						'name' => $this->input->post('name_menu1'),
						'name_en' => $this->input->post('name_menu1_en'),
						'url' => $this->input->post('lienket'),
						'url_en' => $this->input->post('lienket_en'),
						'parent_id' => $this->input->post('parent_id'),
						'sort_order' => intval($this->input->post('sort_order')),
						'module_menu' => 3,
					);
					if($this->menu_model->create($data)){
						$this->session->set_flashdata('message', 'Thêm menu thành công');
					}else{
						$this->session->set_flashdata('message', 'Không thêm được menu');
					}
					redirect(admin_url('menu'));
				}	
			}
		}
		$this->data['temp'] = 'admin/menu/add';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}

	function edit(){
		$id = intval($this->uri->rsegment('3'));
		$info = $this->menu_model->get_info($id);
		if(!$info){
			$this->session->set_flashdata('message', 'Menu này không tồn tại hoặc đã bị xóa');
			redirect(admin_url('menu'));
		}
		$this->data['info'] = $info;
		if($this->input->post()){
			$data = array(
				'name' => $this->input->post('name'),
				'name_en' => $this->input->post('name_en'),
				'parent_id' => $this->input->post('parent_id'),
				'sort_order' => intval($this->input->post('sort_order')),
				);
			if($this->menu_model->update($id, $data)){
				$this->session->set_flashdata('message', 'Cập nhật menu thành công');
			}else{
				$this->session->set_flashdata('message', 'Không cập nhật được menu');
			}
			// chuyển tới trang danh sách admin và thông báo bằng biến message 
			redirect(admin_url('menu/edit/'.$id));
		}

		$this->data['temp'] = 'admin/menu/edit';
		$this->load->view('admin/main', $this->data);
		$this->db->cache_delete_all();
	}

	function delete(){
		$id = $this->uri->rsegment('3');
		$id = intval($id);
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa menu thành công');
		redirect(admin_url('menu'));
		$this->db->cache_delete_all();
	}
	
	function del_all(){
		$ids = $this->input->post('ids');
		foreach($ids as $id){
			$this->_del($id, false);
		}
		$this->db->cache_delete_all();
	}
	
	private function _del($id, $redirect = true){

		$info = $this->menu_model->get_info($id);
		if(!$info)
		{
			$this->session->set_flashdata('message', 'Menu không tồn tại');
			if($redirect){
				redirect(admin_url('menu'));
			}else{
				return false;
			}
		}
		// kiem tra menu có menu con hay k;
		if(count($this->menu_model->menucon($info->id))>0){
			$this->session->set_flashdata('message', 'Menu '.$info->name.' này có chứa Menu con. Bạn cần xóa Menu con trước');
			if($redirect){
				
				redirect(admin_url('menu'));
			}else{
				return false;
			}
		}
		$this->menu_model->delete($id);
		$this->db->cache_delete_all();
	}
}