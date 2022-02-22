<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->load->library('form_validation');
		$this->load->model('Mod_admin');
		
		$this->load->model('Common_model');
		$this->check_login();
	}
	public function check_login() {
		if(!$this->session->userdata('session_adminId'))
		{
			redirect('admin');
		}
	}	
	public function add_category() 
	{	$data['get_last_record'] =  $this->Mod_admin->get_last_record_cat();
		$this->form_validation->set_rules('cat_id', 'Category Id', 'trim|required');
		$this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');
		
		if(!empty($_FILES['cat_image']['name']))
		{
			$path = $_FILES['cat_image']['name'];
	 		$ext = pathinfo($path, PATHINFO_EXTENSION);
			$img =substr(sha1(time()), 0, 8).substr(md5(microtime()), 0, 8).'.'.$ext;
			$targetFile = './category/' . $img;
			if(move_uploaded_file($_FILES["cat_image"]["tmp_name"], $targetFile))
			{
			    $imgs=$img;
			}
		}
        $today= date('Y-m-d h:i:s');	
        		if($this->input->post('cat_status')==1)
	            {
	            	$checked=1;
	            }
	            else
	            {
	            	$checked=0;
	            }
	            
	            if($this->input->post('cat_popular')==1)
        	    {
        	        $popular=1;
        	    }
        	    else
        	    {
        	        $popular=0;
        	    }
        	    
	            if($this->form_validation->run() == TRUE) 
				{
		        		$insert_arr = array(
							    'cat_id' => $this->input->post('cat_id'),
								'cat_name'=>$this->input->post('cat_name'),
								'create_date' => $today,
								'cat_image' => $imgs,
								'cat_status'=>$checked,
								'cat_popular'=>$popular
							);
			            $result=$this->Common_model->insertData('category',$insert_arr);	
			            if($result)
			            {
							$this->session->set_flashdata('success', 'Success! Category added successfully.');
							redirect("categories");
						}
						else
						{
						   $this->session->set_flashdata('error', 'Error!  something went wrong.');
						   redirect("add_category");
						}
					}
		$this->load->view('Admin/add_category',$data);		
	} 
	public function edit_category($id)
	{
		$result['get_last_record'] =  $this->Mod_admin->get_last_record_cat();
		$this->form_validation->set_rules('cat_id', 'Category Id', 'trim|required');
		$this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');
		if(!empty($_FILES['cat_image']['name']))
		{
			$path = $_FILES['cat_image']['name'];
	 		$ext = pathinfo($path, PATHINFO_EXTENSION);
			$img =substr(sha1(time()), 0, 8).substr(md5(microtime()), 0, 8).'.'.$ext;
			$targetFile = './category/' . $img;
			if(move_uploaded_file($_FILES["cat_image"]["tmp_name"], $targetFile))
			{
			    $imgs=$img;
			}
		}
		if($this->input->post('cat_status')==1)
	            {
	            	$checked=1;
	            }
	            else
	            {
	            	$checked=0;
	            }
	            
	            if($this->input->post('cat_popular')==1)
        	    {
        	        $popular=1;
        	    }
        	    else
        	    {
        	        $popular=0;
        	    }

	            if($this->form_validation->run() == TRUE) 
				{
				    if($path!=''){
					$update_array = array(
							'cat_id' => $this->input->post('cat_id'),
								'cat_name'=>$this->input->post('cat_name'),
								'cat_image' => $imgs,
								'cat_status'=>$checked,
								'cat_popular'=>$popular
					); 
				    }
				    else
				    {
				        $update_array = array(
				        'cat_id' => $this->input->post('cat_id'),
								'cat_name'=>$this->input->post('cat_name'),
								'cat_status'=>$checked,
								'cat_popular'=>$popular
								); 
				    }

					$where_array=array('cid'=>$id);  
					$result=$this->Common_model->update_entry('category',$update_array,$where_array);  
					if($result)
					{
							$this->session->set_flashdata('success', 'Success! Category updated successfully.');
							redirect("categories");
					} 
					else 
					{
						$this->session->set_flashdata('error', 'Error!  something went wrong.');
						   redirect("edit_category");
					}
				}

		$result['category']=$this->Common_model->get_single_data('category',array('cid'=>$id));
		$this->load->view('Admin/edit_category',$result);
		
	}
	public function delete_category($id)
	{
		$result=$this->Common_model->delete(array('cid'=>$id),'category');
		if($result)
		{
			$this->session->set_flashdata('success', 'Success! Deleted Successfully.');
			
		}
		else 
		{
			$this->session->set_flashdata('error', 'Error! Something went wrong, Try again.');
			
		}
		return redirect('categories');
	}
	public function sub_category()
	{
	    $result['listing']=$this->Common_model->alldataorder('sub_category','desc','sid');
		if($result['listing']==''){
			$result['listing']  =array();     
		}
		$this->load->view('Admin/sub_category',$result);
	}
	public function add_subcategory()
	{
	    $data['get_last_record'] =  $this->Mod_admin->get_last_record_subcat();
	    $data['category']=$this->Common_model->get_data('category',array('cat_status'=>1));
		$this->form_validation->set_rules('product_cat', 'Category', 'trim|required');
		$this->form_validation->set_rules('cat_sub_id', 'Category Id', 'trim|required');
		$this->form_validation->set_rules('sub_cat_name', 'Sub Category Name', 'trim|required');
        $today= date('Y-m-d h:i:s');	
        		if($this->input->post('sub_cat_status')==1)
	            {
	            	$checked=1;
	            }
	            else
	            {
	            	$checked=0;
	            }
	            if($this->form_validation->run() == TRUE) 
				{
		        		$insert_arr = array(
							    'cat_id' => $this->input->post('product_cat'),
								'cat_sub_id'=>$this->input->post('cat_sub_id'),
								'sub_cat_name'=>$this->input->post('sub_cat_name'),
								'create_date' => $today,
								'sub_cat_status'=>$checked
							);
			            $result=$this->Common_model->insertData('sub_category',$insert_arr);	
			            if($result)
			            {
							$this->session->set_flashdata('success', 'Success! Sub Category added successfully.');
							redirect("sub-categories");
						}
						else
						{
						   $this->session->set_flashdata('error', 'Error!  something went wrong.');
						   redirect("add-sub-categoryy");
						}
					}
		$this->load->view('Admin/add_subcategory',$data);
	}
	public function edit_subcategory($id)
	{
	    $result['get_last_record'] =  $this->Mod_admin->get_last_record_subcat();
	    $result['category']=$this->Common_model->get_data('category',array('cat_status'=>1));
		$this->form_validation->set_rules('cat_id', 'Category Id', 'trim|required');
		$this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');
		if($this->input->post('cat_status')==1)
	            {
	            	$checked=1;
	            }
	            else
	            {
	            	$checked=0;
	            }

	            if($this->form_validation->run() == TRUE) 
				{
					$update_array = array(
							'cat_id' => $this->input->post('cat_id'),
							'cat_name'=>$this->input->post('cat_name'),
							'cat_status'=>$checked
					); 

					$where_array=array('cid'=>$id);  
					$result=$this->Common_model->update_entry('category',$update_array,$where_array);  
					if($result)
					{
							$this->session->set_flashdata('success', 'Success! Category updated successfully.');
							redirect("sub-categories");
					} 
					else 
					{
						$this->session->set_flashdata('error', 'Error!  something went wrong.');
						   redirect("edit_category");
					}
				}

		$result['sub']=$this->Common_model->get_single_data('sub_category',array('sid'=>$id));
		$this->load->view('Admin/edit_sub_category',$result);
	}
	public function delete_subcategory($id)
	{
	    $result=$this->Common_model->delete(array('sid'=>$id),'sub_category');
		if($result)
		{
			$this->session->set_flashdata('success', 'Success! Deleted Successfully.');
			
		}
		else 
		{
			$this->session->set_flashdata('error', 'Error! Something went wrong, Try again.');
			
		}
		return redirect('sub-categories');
	}


}