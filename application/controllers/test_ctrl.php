<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_ctrl extends CI_Controller {
//    public function __construct()
//	{
//            parent::__construct();
//            $this->load->library('session');
//            if($this->session->userdata('sess_ci_admin_islogged') != true ) {
//                    redirect('login_ctrl', 'refresh');
//            }
//  	}
	
    public function index()
    {  
       // echo "fff";
        //$this->load->view("user/layout/dashboard_header.php");
        $this->load->model("question_model");
        $question['list'] = $this->question_model->question_list();
        echo "<pre>";
        print_r($question);
        echo "</pre>";
        //$this->load->view('user/test',$question);
        //$this->load->view('user/layout/footer.php');
    }
    public function test(){
         $this->load->view("user/layout/dashboard_header.php");
            $this->load->model("result_model");
            $result['list'] = $this->result_model->result_list();
            $this->load->view('user/result',$result);
            $this->load->view('user/layout/footer.php');
    }
    
    public function  result()
        {
            $this->load->view("user/layout/dashboard_header.php");
            $this->load->model("result_model");
            $result['list'] = $this->result_model->result_list();
            $this->load->view('user/result',$result);
            $this->load->view('user/layout/footer.php');
             
        }
        public function  del_test()
        {
        $id = $this->uri->segment(3);
        $this->load->model("result_model");
        $this->result_model->delete_result_id($id);
        $this->result();
        }  
      public function  check_test()
        {
            $correct=$wrong=0;
             if($this->input->post('submit'))
            {
                 $total_question=$this->input->post('all');
                for($i=1; $i<=$total_question; $i++)
                    {
                    $q=$this->input->post('q'.$i);
                    $ans=$this->input->post('answer'.$i);
                    echo "Quesion= ".$q;
                    echo "Answer= ".$ans."<br>";
                    if($q==$ans)
                        $correct++;
                    else
                        $wrong++;
                    }
                    echo "Correct= ".$correct;
                    echo "Wrong= ".$wrong;
                    $result=array(
                        'user_id'=>1,
                        'correct'=>$correct,
                        'Wrong'=>$wrong
                    );

                    $this->load->model("result_model");
                    $this->result_model->add_result($result);
                      redirect('test_ctrl/result');    
            }
        }   

}