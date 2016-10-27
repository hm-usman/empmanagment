<?php
class Feradio extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('session');
                if($this->session->userdata('session_islogged') != TRUE) {
                    //redirect('login', 'refresh');
            }
                $this->load->model('feradio_model');
                
        }

        public function index()
        {

                $this->load->view('admin/feriado_legal_cron');
        }
      
}