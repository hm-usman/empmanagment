<?php
class Emp_monthly_reports_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

        public function emp_monthly_reports()
        {
		$query = $this->db->get('alpp_holidays_type');
		return $query->result_array();
	}
}