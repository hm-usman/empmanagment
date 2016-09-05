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
       
        public function update()
        {
                    $this->output->enable_profiler(TRUE);
                    $emp_id= $this->input->post('emp_id');
            $data = array(
		'emp_file' => $this->input->post('emp_file'),
		'emp_name' => $this->input->post('emp_name'),
                'emp_cellnum' => $this->input->post('emp_cellnum'),
                'emp_department' => $this->input->post('emp_department'),
                'emp_current_contract' => $this->input->post('emp_current_contract'),
                'emp_email' => $this->input->post('emp_email'),
                'emp_password' => $this->input->post('emp_password'),
                'emp_status' => $this->input->post('emp_status'),
                'emp_type' => $this->input->post('emp_type')
                );
            $this->employee_model->update($emp_id,$data);
            //redirect('employee', 'refresh');
        }
        public function delete($emp_id)
        {
            $data['alpp_emp'] = $this->employee_model->delete($emp_id);
            redirect('employee', 'refresh');
        }
}