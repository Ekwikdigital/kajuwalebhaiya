<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_login extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		//$this->email->initialize($config);
		$this->load->library('form_validation');
		$this->load->model('Common_model');
		$this->check_login();
		$this->load->helper('url');
	}
	public function check_login() {
		if($this->session->userdata('session_adminId'))
		{
			redirect('dashboard');
		}
	}
	public function index()
	{	
		if(isset($_POST['login']) && ($_POST['login']=='login')){	
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		    $this->form_validation->set_rules('password', 'Password', 'required');
		    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		    $this->form_validation->set_message('required', 'Enter %s');

			if($this->form_validation->run() ==FALSE){
				$this->load->view('Admin/login'); 
			}
			else
			{
				$data_arr=array('email'=>$this->input->post('email'),'password'=>$this->input->post('password')); 
				$result=$this->Common_model->admin_login($data_arr);
				
				if($result){
					$this->session->set_userdata(array('session_adminId'=>$result['id'],'username'=>$result['username'],'email'=>$result['email']));
					return redirect('dashboard','refresh');
				}    
				else{
					$this->session->set_flashdata('error', 'Invalid Email or Password!');
					redirect('admin', 'refresh');
				}
			}
		
		} else {	
				$this->load->view('Admin/login');
		}  
		
	} 
}
?>