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
        $this->load->view('admin/login');
    }
    public function dologin() 
    {
        
        $this->form_validation->set_rules('email', 'Email', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
                redirect("login");
        }
        
        $email= $this->input->post('email');
        $password = $this->input->post('password');
        $type = '4';
        $result = array('email' => $email, 'password' => $password, '4' => $type);
        
        $user = $this->login_model->isAdmin($result);
    
        if ($user)
        {
          
          $admindata = array(
			'session_id' => $user->emp_id,
			'session_name' => $user->emp_name,
			'session_email' => $user->emp_email,
                        'session_status' => $user->emp_type,
                        'session_islogged' => true
			);
          $this->session->set_userdata($admindata);
          redirect("/");
        } 
        else 
        {
            $this->session->set_userdata(array(
                'session_msg' => "Invalid Login. ",
                'session_msg_type' => 'error',
                'session_islogged' => false
            ));
            redirect("login");
        }
    }
    public function logout() 
    {
            $this->load->library('session');
            $this->session->sess_destroy();
            $this->session->set_userdata(array(
                       'session_msg' => " You Have Logged Out successfully... ",
                       'session_msg_type' => 'success'
                        ));
            redirect("login");
    }
       
}
