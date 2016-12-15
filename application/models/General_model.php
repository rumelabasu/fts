<?php
class General_model extends CI_Model {

	public function __construct()
    {
	  parent::__construct();
	}
//insert data
 public function insert_data($table_name,$data)
    {
		$this->db->insert($table_name,$data);
	    $insert_id = $this->db->insert_id();
	    return  $insert_id;
    }
//update data	
	public function update_data($table_name,$data,$condition)
    {
	    $this->db->update($table_name, $data,$condition); 
	    return $this->db->affected_rows();
		 
    }
//delete data
 public function delete_data($table_name,$condition)
    {
		return $this->db->delete($table_name,$condition);
	}
//view all data
 public function view_all_data($table_name)
    {   
	    $query = $this->db->get($table_name);
		return $query->result_array();
	}
	
	//view data
 public function view_data($table_name,$condition) 
    {   
	    $this->db->where($condition); 
	    $query = $this->db->get($table_name);
		return $query->result_array();
	}


		//view_data_order
 public function view_data_order($table_name,$condition,$title,$type) 
    {   
	    $this->db->where($condition); 
	    $this->db->order_by($title,$type); 
	    $query = $this->db->get($table_name);
		return $query->result_array();
	}

  
}
?>