<?php
class Inactive_emp_reports extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('session');
                if($this->session->userdata('session_islogged') != TRUE) {
                    //redirect('login', 'refresh');
            }
                $this->load->model('inactive_emp_reports_model');
                
        }

        public function index()
        {

                $this->load->view('admin/inactive_emp_reports');
        }
      
}