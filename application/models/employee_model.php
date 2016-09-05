<?php

class Employee_model extends CI_model{
    
    public function __construct() {
        
        $this->load->database();
    }
    public function get_emp() {
                $query = $this->db->get('alpp_emp');
                return $query->result_array();
        
    }
   
    public function update($emp_id,$data)
    {
            $this->db->where('emp_id',$emp_id);
            $this->db->update('alpp_emp',$data);
    }
    public function delete($emp_id)
    {
                 $this->db->where('emp_id', $emp_id);
                 $this->db->delete('alpp_emp');  
    }
}