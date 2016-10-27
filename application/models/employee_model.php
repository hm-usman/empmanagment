<?php

class Employee_model extends CI_model{
    
    public function __construct() {
        
        $this->load->database();
    }
    public function get_emp() {
                $query = $this->db->get('alpp_emp');
                return $query->result_array();
        
    }
    
    public function get_single_emp($emp_id=0)
    {
        $querydb1 = $this->db->select('*')->from("alpp_emp")
                ->where('emp_id',$emp_id);
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
    public function addemp($data)
    {
            $this->db->insert('alpp_emp', $data);
        
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
    public function get_emp_notes($id=0)
    {
                $this->db->get('alpp_emp_notes', $id);
        
    }
    public function holidays()
    {
        $this->db->select('alpp_transactions.trans_type');
        $this->db->from('alpp_transaction');
        $this->db->join('alpp_emp','alpp_emp.emp_id=alpp_transaction.emp_id');
        $query3=$this->db->get();
        $data=$query3->result_array();

        
    }
    
 
}