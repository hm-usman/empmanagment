<?php
class Empholiday extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
                $this->load->library('session');
                if($this->session->userdata('session_islogged') != TRUE) {
                    //redirect('login', 'refresh');
            }
		$this->load->model('empholiday_model');
	}

	public function index()
	{
		//$data['alpp_transactions'] = $this->empholiday_model->get();
                
                //$this->load->view('admin/layout/header', $data);
                $this->load->view('admin/empholiday');
                //$this->load->view('admin/layout/footer', '$data');
                //redirect('employee', 'refresh' );
	}

	public function single($emp_id)
	{
               
                $data['alpp_transactions'] = $this->empholiday_model->single($emp_id);                
                
                $this->load->view('admin/layout/header', $data);
                $this->load->view('admin/empholiday', $data);
                $this->load->view('admin/layout/footer', '$data');
	}
        public function add_holiday()
        {
                $post_data = json_decode(file_get_contents("php://input"));          
            //print_r($post_data);
            //return ; 
            //$post_data;
            $data = array(
		'amount' => $post_data->amount,
		'date' => $post_data->date,
                'trans_type' => $post_data->trans_type,
                'status' => $post_data->status
                );
            $this->empholiday_model->add_holiday($data);
        }
         public function delete($id=0)
        {
             $post_data = json_decode(file_get_contents("php://input"));
             echo json_encode($this->empholiday_model->delete($id));
        }
        public function update_holiday($id=0)
        {
            $post_data = json_decode(file_get_contents("php://input"));          
           // print_r($post_data);
            //return ; 
            //$post_data;
            $data = array(
		'amount' => $post_data->amount,
		'date' => $post_data->date,
                'trans_type' => $post_data->trans_type,
                'status' => $post_data->status
                );
            $this->empholiday_model->update($id,$data);   
        }
        public function get_all_holiday()
        {
                header('Access-Control-Allow-Origin: *');
                header("Content-Type: application/json");
                echo json_encode($this->empholiday_model->get_holiday());       
        }
        public function get_single_holiday($id=0)
        {
                header('Access-Control-Allow-Origin: *');
                header("Content-Type: application/json");
                echo json_encode($this->empholiday_model->get_single_holiday($id));       
        }
        public function GetBalanceDetail()
        {
            $this->db->select("SELECT distinct(alpp_transactions.id) as id,
                   end_month_data as entered_on_date,
                   trans_type,
                   alpp_transactions.emp_id as emp_id, 
                   alpp_transactions.amount as days, 
                   `date` as entry_date,
                   '0' as leave_type,
                   status");
            $this->db->from('alpp_transaction');
            $this->db->join('alpp_emp','alpp_emp.emp_id=alpp_transaction.emp_id');
            $this->db->where('status','=',0);
            $this->db->where('emp_id','=',$emp_id);
            $query1=$this->db->get()->result();
            
            $this->db->select("distinct(alpp_leave.leave_id) as id, 
                   alpp_leave.leave_datetime as entered_on_date,
                   'L' as trans_type,
                   leave_emp_id as emp_id, 
                   leave_duration as days, 
                   leave_datetime as entry_date,
                   leave_balance_type as leave_type,
                   leave_approval as status");
            $this->db->from('alpp_transactions');
            $this->db->join('alpp_leave','alpp_leave.leave_emp_id = alpp_transactions.emp_id');
            $this->db->where('leave_approval','=',2);
            $this->db->where('emp_id','=',$emp_id);
            $query2 = $this->db->get()->result();
            
            $query = array_merge($query1, $query2);

            return $query;
        }
}