<?php
class Empholiday extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
                $this->load->library('session');
                if($this->session->userdata('session_islogged') != TRUE) {
                    redirect('login', 'refresh');
            }
		$this->load->model('empholiday_model');
	}

	public function index()
	{
		//$data['alpp_transactions'] = $this->empholiday_model->get();
                
                //$this->load->view('admin/layout/header', $data);
                //$this->load->view('admin/empholiday', $data);
                //$this->load->view('admin/layout/footer', '$data');
                redirect('employee', 'refresh' );
	}

	public function single($emp_id)
	{
               
                $data['alpp_transactions'] = $this->empholiday_model->single($emp_id);                
                
                $this->load->view('admin/layout/header', $data);
                $this->load->view('admin/empholiday', $data);
                $this->load->view('admin/layout/footer', '$data');
	}
        public function add()
        {
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->empholiday_model->add();
        }
         public function delete($id)
        {
            $data['alpp_transactions'] = $this->empholiday_model->delete($id);
            redirect('empholiday/single', 'refresh');
        }
        public function update($id, $data)
        {
            $this->output->enable_profiler(TRUE);
            $this->empholiday_model->update($id,$data);   
        }
}