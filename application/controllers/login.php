<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
                $this->load->helper(array('form','url'));
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('login_model');
    }

    function index() 
    {
        //$this->load->view("admin/layout/header.php");
        $this->load->view('admin/login');
        //$this->load->view('admin/layout/footer.php');
    }
    public function dologin() {
        //$this->output->enable_profiler(TRUE);
        $this->form_validation->set_rules('email', 'Email', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE){
            
            redirect("login");
        }
        
        $email= $this->input->post('email');
        $password = $this->input->post('password');
        $result = array('email' => $email, 'password' => $password);
        
        $user = $this->login_model->isAdmin($result);
    
        if ($user)
        {
          
          $admindata = array(
			'session_id' => $user->emp_id,
			'session_name' => $user->emp_name,
			'session_email' => $user->emp_email,
			);
          $this->session->set_userdata($admindata);
          redirect("dashboard");
        } 
        else 
        {
            $this->session->set_userdata(array(
                'sess_ci_admin_msg' => "Invalid Login. ",
                'sess_ci_admin_msg_type' => 'error',
                'sess_ci_admin_islogged' => false
            ));
            redirect("login");
        }
    }
}
