<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
	{
            parent::__construct();
            $this->load->model('employee_model');
            $this->load->library('session');
            if($this->session->userdata('session_islogged') != TRUE) {
                    //redirect('login', 'refresh');
            }
  	}
	
	public function index()
	{  
            //$this->load->view("admin/layout/header.php");
            $this->load->view('admin/dashboard');
            //$this->load->view('admin/layout/footer.php'); 
	}  
        public function active_emp()
        {
                //header('Access-Control-Allow-Origin: *');
                //header("Content-Type: application/json");
                //echo json_encode(
                        $this->employee_model->get_active_emp();
            
        }
}