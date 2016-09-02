<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_ctrl extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(array('login_model'));
    }

    function index() 
    {
        $this->load->view("admin/layout/header.php");
        $this->load->view('admin/login');
        $this->load->view('admin/layout/footer.php');
    }
    public function login() {
        if ($this->session->userdata('sess_ci_admin_islogged') == 'true') {
            redirect("admin/dashboard");
        } 
        else 
            {
            $data['title'] = "Login";
            $this->load->view("admin/layout/header.php");
            $this->load->view('admin/login',$data);
            $this->load->view('admin/layout/footer.php');
        }
        
    }
    public function dologin() {

    
    $this->load->library('session');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');
    
    if ($this->form_validation->run() == FALSE){
        $this->session->set_userdata(array(
                'sess_ci_admin_msg' => "Invalid Login. ",
                'sess_ci_admin_msg_type' => 'error',
                'sess_ci_admin_islogged' => false
            ));
        redirect("login_ctrl");
    }
   
    
    $login['email'] = $this->input->post('username');
    $login['pass'] = $this->input->post('password');
    $result = $this->login_model->isAdmin($login);
    //print_r($result[0]);
    //exit;
    
    if ($result) 
        {                
        $this->session->set_userdata(array(
            'sess_ci_admin_iadminid' => $result->id,
            'sess_ci_admin_vName' => $result->username,
            'sess_ci_admin_vEmailaddress' => 'mhmmd.nauman@gmail.com',
            'sess_ci_admin_role' => 1,
            'sess_ci_admin_lock' => false,
            'sess_ci_admin_msg' => " Login Successfully. ",
            'sess_ci_admin_msg_type' => 'success',
            'sess_ci_admin_islogged' => true
        ));
        
        redirect("dashboard");
        } 
    else 
        {
            $this->session->set_userdata(array(
                'sess_ci_admin_msg' => "Invalid Login. ",
                'sess_ci_admin_msg_type' => 'error',
                'sess_ci_admin_islogged' => false
            ));
            redirect("login_ctrl");
        }

}

    public function logout() {

    $this->load->library('session');
        $this->session->sess_destroy();
        $this->session->set_userdata(array(
            'sess_ci_admin_msg' => " You Have Logged Out successfully... ",
            'sess_ci_admin_msg_type' => 'success'
        ));
        $this->index();

    }
}