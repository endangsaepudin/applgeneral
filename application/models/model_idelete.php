<?php

class Model_idelete extends CI_Model{
	
    public function get_idelete_name($id){
		$this->db->where('id',$id);
		$query = $this->db->get('idelete');
		
		if($query->num_rows() == 1){
			return $query->row()->name;
		} else {
			return "Invalid Id";
		}
	}
}
?>