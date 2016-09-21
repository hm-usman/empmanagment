<?php
class Employee extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('session');
                if($this->session->userdata('session_islogged') != TRUE) {
                    redirect('login', 'refresh');
            }
                $this->load->model('employee_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['alpp_emp'] = $this->employee_model->get_emp();
                
                $this->load->view('admin/layout/header', $data);
                $this->load->view('admin/employeelist', $data);
                $this->load->view('admin/layout/footer', $data);
        }
        public function create_employee()
        {
            $post_data = json_decode(file_get_contents("php://input"));          
            $data = array(
		'emp_file' => $post_data->emp_file,
		'emp_name' => $post_data->emp_name,
                'emp_cellnum' => $post_data->emp_cellnum,
                'emp_department' => $post_data->emp_department,
                'emp_current_contract' => $post_data->emp_current_contract,
                'emp_email' => $post_data->emp_email,
                'emp_password' => $post_data->emp_password,
                'emp_status' => $post_data->emp_status,
                'emp_type' => $post_data->emp_type
                );
            $this->employee_model->add($data);
        }
        public function update($emp_id=0)
        {
            $this->output->enable_profiler(TRUE);
            $post_data = json_decode(file_get_contents("php://input"));          
            $data = array(
		'emp_file' => $post_data->emp_file,
		'emp_name' => $post_data->emp_name,
                'emp_cellnum' => $post_data->emp_cellnum,
                'emp_department' => $post_data->emp_department,
                'emp_current_contract' => $post_data->emp_current_contract,
                'emp_email' => $post_data->emp_email,
                'emp_password' => $post_data->emp_password,
                'emp_status' => $post_data->emp_status,
                'emp_type' => $post_data->emp_type
                );
            $this->employee_model->update($emp_id,$data);
        }
        public function delete($emp_id=0)
        {
            $post_data = json_decode(file_get_contents("php://input"));
             echo json_encode($this->employee_model->delete($emp_id));
            //$data['alpp_emp'] = $this->employee_model->delete($emp_id);
            
        }
        
        public function get_single_emp($emp_id=0)
        {
                header('Access-Control-Allow-Origin: *');
                header("Content-Type: application/json");
                echo json_encode($this->employee_model->get_single_emp($emp_id));
                
                
        }
        public function get_all_emp()
        {
                header('Access-Control-Allow-Origin: *');
                header("Content-Type: application/json");
                echo json_encode($this->employee_model->get_emp());
                
                
        }
}