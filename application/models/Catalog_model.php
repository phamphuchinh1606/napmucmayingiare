<?php
Class Catalog_model extends MY_Model{
	var $table = 'catalog';

    function menuconcosanpham($id){
        #Create where clause
        $this->db->select('catalog_id');
        $this->db->from('product');
        $this->db->where('status', 1);
        $where_clause = $this->db->get_compiled_select();

        $this->db->where('parent_id', $id);
        $this->db->where('status', 1);
        $this->db->where("id in ($where_clause)",null, false);
        $this->db->order_by("sort_order", "asc");
        return $this->db->get($this->table)->result();
    }
}