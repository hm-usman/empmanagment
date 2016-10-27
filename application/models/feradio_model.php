<?php
class Feradio_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

        public function get_feradio_list()
        {
		$query = $this->db->get('alpp_holidays_type');
		return $query->result_array();
	}
}