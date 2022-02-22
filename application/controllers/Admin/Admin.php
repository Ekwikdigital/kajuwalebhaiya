<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->load->library('form_validation');
		
		$this->load->model('Common_model');
		$this->check_login();
	}
	public function check_login() {
		if(!$this->session->userdata('session_adminId'))
		{
			redirect('admin');
		}
	}	
	public function Admin_dashboard() 
	{	
		$this->load->view('Admin/index');		
	} 
	public function profile()
	{
		$adminId=$this->session->userdata('session_adminId');
		$results['admininfo']=$data=$this->Common_model->getsingle('admin',array('id'=>$adminId));
		$results=[];
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile number', 'required|regex_match[/^[0-9]{10}$/]');
		
	    $config['upload_path'] = 'images/profile/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);
		if ($this->input->post('submit') && $this->form_validation->run() == TRUE) 
		{
		    
		    if ($this->upload->do_upload('profile')) 
			{
				$uploadData = $this->upload->data();
				$image = $uploadData['file_name'];
			}
			else
			{
			    $image=$data->profile;	
			}
			$update_array = array(
				'username' => $this->input->post('username'),
				'profile' => $image,
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				
			);
        
			$where_array=array('id'=>$adminId);  
			$update=$this->Common_model->update_entry('admin',$update_array,$where_array);  
			if($update)
	            {
					$this->session->set_flashdata('success', 'Success! Profile updated successfully.');
					redirect('profile');
				}
				else
				{
				   $this->session->set_flashdata('error', 'Error!  something went wrong.');
				   redirect('profile');
				}
			
		}
		$this->load->view('Admin/profile',$results);
	}

	public function dochange_password() {
		$session_user=$this->session->userdata('session_adminId');
		$where_array=array('id'=>$session_user);  
		$data=$this->Common_model->getRows('admin',$session_user);
		if($data['password']==$this->input->post('oldpassword'))
		{
			$userdata['password']=$this->input->post('newpassword');
			$result=$this->Common_model->update_entry('admin',$userdata,$where_array);
			$this->session->set_flashdata('success', 'Success! Password has been changed successfully.');
			$res['result']=1;
			
		}
		else 
		{
			$res['result']=0;
		}
		echo json_encode($res);
	}
	public function change_password()
	{
		$this->load->view('Admin/change_password');	
	}
	public function categories()
	{
		$result['listing']=$this->Common_model->alldataorder('category','desc','cid');
		if($result['listing']==''){
			$result['listing']  =array();     
		}
		$this->load->view('Admin/product_category',$result);	
	}
	
	public function logout() {
		$this->session->unset_userdata('session_adminId');
		return redirect('admin');
	}  
	public function customers()
    {
        $result['listing']=$this->Common_model->alldataorder('users','desc','id');
		if($result['listing']==''){
			$result['listing']  =array();     
		}
        $this->load->view('Admin/customers',$result);
    }
    public function orders()
    {
        $result['listing']=$this->Common_model->alldataorder('orders','desc','o_id');
		if($result['listing']==''){
			$result['listing']  =array();     
		}
        $this->load->view('Admin/orders',$result);
    }
    public function transactions()
    {
        $this->load->view('Admin/transactions');
    }
    public function reviews()
    {
        $result['listing']=$this->Common_model->alldataorder('reviews','desc','id');
		if($result['listing']==''){
			$result['listing']  =array();     
		}
        $this->load->view('Admin/reviews',$result);
    }
    public function review_submit($id)
	{
	    if($this->input->post('u_review')=='')
		{
		    $json['msg1'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 1;
		}
        else if($this->input->post('u_rate')=='')
		{
		    $json['msg2'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 2;
		}
		else
		{
		    $update_array = array(
				'u_review' => $this->input->post('u_review'),
				'u_rate' => $this->input->post('u_rate'),
				
			);
        
			$where_array=array('id'=>$id);  
			$update=$this->Common_model->update_entry('reviews',$update_array,$where_array);
			            if($update)
			            {
			                $this->session->set_flashdata('success', 'Success! Updated successfully.');
			                $json['status'] = 0;
			            }
			            else
			            {
			                $json['status'] = 4;
			            }
		    
		}
		echo json_encode($json);
	}
	public function delete_review($id)
	{
	    $result=$this->Common_model->delete(array('id'=>$id),'reviews');
		if($result)
		{
			$this->session->set_flashdata('success', 'Success! Deleted Successfully.');
			
		}
		else 
		{
			$this->session->set_flashdata('error', 'Error! Something went wrong, Try again.');
			
		}
		return redirect('reviews');
	}
	public function delete_order($id)
    {
        $result=$this->common_model->delete(array('o_id'=>$id),'orders');
		if($result)
		{
			$this->session->set_flashdata('success', 'Success! Deleted Successfully.');
			
		}
		else 
		{
			$this->session->set_flashdata('error', 'Error! Something went wrong, Try again.');
			
		}
		return redirect('orders');
    }
    public function delete_user($id)
    {
        $result=$this->common_model->delete(array('id'=>$id),'users');
		if($result)
		{
			$this->session->set_flashdata('success', 'Success! Deleted Successfully.');
			
		}
		else 
		{
			$this->session->set_flashdata('error', 'Error! Something went wrong, Try again.');
			
		}
		return redirect('customers');
    }
    	function invoice($id)
	{

		$data['orders']=$this->common_model->get_single_data('orders',array('o_id'=>$id));
		$this->load->view('Admin/invoice',$data);


	}
}