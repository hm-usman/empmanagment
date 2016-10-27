<?php
class Emp_reports_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

        public function get_emp() {
                $query = $this->db->get('alpp_emp');
                return $query->result_array(); 
    }
    public function active_emp()
    {
                $query1 = $this->db->get_where('alpp_emp', 'emp_status = 0');
                return $query1->result_array();   
    }
        public function inactive_emp()
    {
                $query2 = $this->db->get_where('alpp_emp', 'emp_status = 1');
                return $query2->result_array();   
    }
        public function retaired_emp()
    {
                $query3 = $this->db->get_where('alpp_emp', 'emp_status = 2');
                return $query3->result_array();   
    }
}