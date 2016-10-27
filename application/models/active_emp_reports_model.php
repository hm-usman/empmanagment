<?php
class Active_emp_reports_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

        public function active_emp_reports()
        {
		$query = $this->db->get('alpp_holidays_type');
		return $query->result_array();
	}
}