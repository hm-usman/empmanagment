<?php
class Empholiday_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

        public function get()
        {
		$query = $this->db->get('alpp_transactions');
		return $query->result_array();
	}
        public function single($emp_id) 
        {
                
                $this->db->where('emp_id', $emp_id);    
                $query = $this->db->get('alpp_transactions');
                return $query->result_array();
            
        }
        public function add()
        {
            $this->load->helper('url');
            $data = array(
                        'emp_id' => $this->input->post('emp_id'),
                        'amount' => $this->input->post('amount'),
                        'date' => $this->input->post('date'),
                        'trans_type' => $this->input->post('trans_type'),
                        'status' => $this->input->post('status')
                        );

             $this->db->insert('alpp_transactions', $data);
             return true;
        }
        public function update($id, $data)
        {   
                $this->load->helper('url');
                $data = array(
                        'emp_id' => $this->input->post('emp_id'),
                        'amount' => $this->input->post('amount'),
                        'date' => $this->input->post('date'),
                        'trans_type' => $this->input->post('trans_type'),
                        'status' => $this->input->post('status')
                        );

                $this->db->where('id',$id);
                $this->db->update('alpp_transactions',$data);
                return true;
            
        }
       public function delete($id)
        {
                 $this->db->where('id', $id);
                 $this->db->delete('alpp_transactions');  
        }
        
}


