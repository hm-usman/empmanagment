<?php
class Employee extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('form');
                $this->load->helper('url');
                $this->load->library('form_validation');
                $this->load->library('session');
                if($this->session->userdata('session_islogged') != TRUE) {
                    //redirect('login', 'refresh');
            }
                $this->load->model('employee_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                //$data['alpp_emp'] = $this->employee_model->get_emp();
                //echo "yyy";
                //$this->load->view('admin/layout/header', $data);
                $this->load->view('admin/employeelist');
                //$this->load->view('admin/layout/footer', $data);
        }
        public function create_employee()
        {
//            $post_data = json_decode(file_get_contents("php://input")); 
            $_POST = json_decode(file_get_contents("php://input"), true);
           // print_r($_POST);
             //       return ; 
            $this->form_validation->set_rules('emp_file', 'Emp_file', 'required');
            $this->form_validation->set_rules('emp_name', 'Emp_name', 'required');
            $this->form_validation->set_rules('emp_cellnum', 'Emp_cellnum', 'required');
            $this->form_validation->set_rules('emp_department', 'Emp_department', 'required');
            $this->form_validation->set_rules('emp_current_contract', 'Emp_current_contract', 'required');
            $this->form_validation->set_rules('emp_email', 'Emp_email', 'required');
            $this->form_validation->set_rules('emp_password', 'Emp_password', 'required');
            $this->form_validation->set_rules('emp_status', 'Emp_status', 'required');
            $this->form_validation->set_rules('emp_type', 'Emp_type', 'required');
            
		if ($this->form_validation->run() == FALSE)
                {
                    echo 'validation failed';
                }
                else
                {

                          
                    //print_r($post_data);
                    //return ; 
                    //$post_data;
                    $data = array(
                        'emp_file' => $_POST['emp_file'],
                        'emp_name' => $_POST['emp_name'],
                        'emp_cellnum' => $_POST['emp_cellnum'],
                        'emp_department' => $_POST['emp_department'],
                        'emp_current_contract' => $_POST['emp_current_contract'],
                        'emp_email' => $_POST['emp_email'],
                        'emp_password' => $_POST['emp_password'],
                        'emp_status' => $_POST['emp_status'],
                        'emp_type' => $_POST['emp_type']
                        );
                    $this->employee_model->addemp($data);
                }
              }
        public function update($emp_id=0)
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
        public function get_emp_notes($emp_id=0)
        {
            header('Access-Control-Allow-Origin: *');
            header("Content-Type: application/jason");
            echo jason_encode($this->employee_model->get_emp_notes($id));
        }
        public function holidays()
        {
             header('Access-Control-Allow-Origin: *');
            header("Content-Type: application/jason");
            echo jason_encode($this->employee_model->holidays());
            
        }
}