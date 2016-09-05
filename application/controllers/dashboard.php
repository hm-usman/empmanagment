<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
	{
            parent::__construct();
            $this->load->library('session');
            if($this->session->userdata('session_islogged') != TRUE) {
                    redirect('login', 'refresh');
            }
  	}
	
	public function index()
	{  
            $this->load->view("admin/layout/header.php");
            $this->load->view('admin/dashboard');
            $this->load->view('admin/layout/footer.php'); 
	}  
}