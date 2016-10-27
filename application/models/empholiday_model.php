<?php
class Empholiday_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

        public function get_holiday()
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
        public function add_holiday($data)
        {
             $this->db->insert('alpp_transactions', $data);
             return true;
        }
        public function update($id, $data)
        {   
                $this->db->where('id',$id);
                $this->db->update('alpp_transactions',$data);
                return true;
            
        }
       public function delete($id)
        {
                 $this->db->where('id', $id);
                 $this->db->delete('alpp_transactions');  
        }
        public function get_single_holiday($id=0)
    {
        $querydb1 = $this->db->select('*')->from("alpp_transactions")
                ->where('id',$id);
                //->where('status','<>','1')
                //->where('date(added_on)', date("Y-m-d"));
                //if($con_id){
                    //$this->db->where('con_id', $con_id);
                //}
        $q = $querydb1->get();
        if( $q->num_rows() > 0 ) {
            $result = $q->result();
            return $result[0];
        } else {
            return false;
        }   
    }
        
}


