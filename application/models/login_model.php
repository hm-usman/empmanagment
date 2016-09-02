<?php
class Login_model extends CI_Model
{

     public function isAdmin($logindata)
    {
        
        
        $this->db->select('*')->from("alpp_emp")->where('emp_email',$logindata['email'])->where('emp_password',$logindata['password']);
         
        $q = $this->db->get();
        if( $q->num_rows() > 0 ) 
            {
                    $result = $q->result();
                    return $result[0];
            }
            else 
            {
            return false;	
            }
    }
}