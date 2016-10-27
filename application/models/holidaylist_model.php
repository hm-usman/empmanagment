<?php
class Holidaylist_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

        public function get_holiday_list()
        {
		$query = $this->db->get('alpp_holidays_type');
		return $query->result_array();
	}
}