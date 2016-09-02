<?php
class Result_model extends CI_Model
{
    function __construct() {
        parent::__construct();
      	$this->load->database();
    }
    function result_list()
    {
        $this -> db -> select('*')-> from('result');
        $query = $this -> db -> get();
        if($query -> num_rows() > 0)    {
          return $query->result();
        }
        else
        {
          return false;
        }
    }
      function delete_result_id($id){
        $this->db->where('id', $id);
        $this->db->delete('result');   
    }
    public function add_result($result)
    {
        $this->db->insert('result', $result); 
        return $this->db->insert_id();
    }
}