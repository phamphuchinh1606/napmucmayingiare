<?php
Class Product_model extends MY_Model{

	var $table = 'product';

	function menucon($id){
		$this->db->where('parent_id', $id);
		return $this->db->get('product')->result();
	}

}