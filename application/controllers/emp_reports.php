<?php
class Emp_reports extends CI_Controller {

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

                $this->load->view('admin/emp_reports');
        }
         public function get_all_emp()
        {
                header('Access-Control-Allow-Origin: *');
                header("Content-Type: application/json");
                echo json_encode($this->emp_reports_model->get_emp());
        }
         public function get_active_emp()
        {
                header('Access-Control-Allow-Origin: *');
                header("Content-Type: application/json");
                echo json_encode($this->emp_reports_model->active_emp());
        }
                 public function get_inactive_emp()
        {
                header('Access-Control-Allow-Origin: *');
                header("Content-Type: application/json");
                echo json_encode($this->emp_reports_model->inactive_emp());
        }
                 public function get_retaired_emp()
        {
                header('Access-Control-Allow-Origin: *');
                header("Content-Type: application/json");
                echo json_encode($this->emp_reports_model->retaired_emp());
        }
}