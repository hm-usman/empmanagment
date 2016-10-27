<?php
class Retired_emp_reports extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('session');
                if($this->session->userdata('session_islogged') != TRUE) {
                    //redirect('login', 'refresh');
            }
                $this->load->model('emp_reports_model');
                
        }

        public function index()
        {

                $this->load->view('admin/retired_emp_reports');
        }
      
}