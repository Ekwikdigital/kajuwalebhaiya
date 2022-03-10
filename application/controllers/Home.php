<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct() {
		parent::__construct(); 
		date_default_timezone_set('UTC');
		$this->load->model('common_model');
		error_reporting(0);
		$this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper('security');

	}
		
	public function index(){
		$this->load->view('site/home');
	}
	public function home()
	{
	    $this->load->view('site/home1');
	}
	public function about()
	{
	    $this->load->view('site/about');
	}
	public function privacy()
	{
	    $this->load->view('site/privacy');
	}
	public function termscondition()
	{
	    $this->load->view('site/termsconditions');
	}
	public function register()
	{
	    $this->load->view('site/register');
	}
	public function blog()
	{
	    $this->load->view('site/blog');
	}
	public function blogpost()
	{
	    $this->load->view('site/blogpost');
	}
	public function blogupload()
	{
	    $this->load->view('site/blogupload');
	}

	function invoice($id)
	{

		$data['orders']=$this->common_model->get_single_data('orders',array('o_id'=>$id));
		$this->load->view('site/invoice',$data);


	}
	public function register_user()
	{
	    $user = $this->common_model->get_single_data('users',array('email'=>$this->input->post('email')));
	   // print_r($user);
	    $tele = $this->common_model->get_single_data('users',array('telephone'=>$this->input->post('telephone')));
        
        if($this->input->post('first_name')=='')
		{
		    $json['msg3'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 5;
		}
		else if($this->input->post('last_name')=='')
		{
		    $json['msg4'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 6;
		}
        else if($this->input->post('email')=='')
		{
		    $json['msg'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 1;
		}
		else if(!$this->checkemail($this->input->post('email')))
		{
			      $json['msg'] = '<span style="color:red;">Please enter valid email address.</span>';
				  $json['status'] = 1;
		}
		else if($user)
		{
		    $json['msg'] = '<span style="color:red;">This email is already registered. Please try other.</span>';
			$json['status'] = 1;
		}
		else if($this->input->post('telephone')=='')
		{
			$json['msg1'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 2;
		}
		else if(!preg_match('/^[0-9]{10}+$/', $this->input->post('telephone')))
		{
			$json['msg1'] = '<span style="color:red;">Please enter valid mobile number.</span>';
			$json['status'] = 2;
		}
		else if($tele)
		{
		    $json['msg1'] = '<span style="color:red;"><span style="color:red;">This mobile number is already registered. Please try other.</span></span>';
			$json['status'] = 2;
		}
		else if($this->input->post('password')=='')
		{
			$json['msg2'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 3;
		}
		else
		{
		    $today= date('Y-m-d h:i:s');
		        		$insert_arr = array(
		        		        'first_name' => $this->input->post('first_name'),
		        		        'last_name' => $this->input->post('last_name'),
							    'email' => $this->input->post('email'),
								'telephone'=>$this->input->post('telephone'),
								'created' => $today,
								'password'=>md5($this->input->post('password'))
							);
			            $result=$this->common_model->insertData('users',$insert_arr);	
			            if($result)
			            {
			                $this->session->set_flashdata('success1', 'Success! Your account has been registered successfully');
        	            	$this->session->set_userdata('u_id',$result);
        	            	$this->session->set_userdata('u_firstname',$this->input->post('first_name'));
        	            	$this->session->set_userdata('u_lastname',$this->input->post('last_name'));
        					$this->session->set_userdata('u_email',$this->input->post('email'));
        					$this->session->set_userdata('u_telephone',$this->input->post('telephone'));
        					
        					$from_email = "billing@kajuwalebhaiya.com"; 
                            $to_email = $this->input->post('email');
                            
                    		$this->email->set_header('MIME-Version', '1.0; charset=utf-8'); //must add this line
                            $this->email->set_header('Content-type', 'text/html');
                    		$subject ='Welcome to Kajuwalebhaiya';
        	
        		            $body = '<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f7f7f7" style="max-width:800px;margin:auto;padding:12px;font-family:arial;color:#565a5c;background-color:#f5f5f5;border:1px solid #e8e8e8">
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <img src="'.base_url().'image/resize-164310701455515656KWBpngtransparent1.png" title="Kajuwalebhaiya" alt="Kajuwalebhaiya" class="CToWUd">
                                            <hr style="border:none;border-bottom:1px solid #bbbbbb;margin-top:15px">
                                        </td>
                                    </tr>
                                    <tr>
                                    
                                        <td>
                                            <h4 style="color:#222222;font-size:16px">Hello <span>'.$this->input->post('first_name').' '.$this->input->post('last_name').'</span>,</h4>                    
                                            <p style="font-size:14px;color:#222222">Thanks for creating your account on Kajuwalebhaiya. You can access your account area to views orders, edit profile, change your password and more at : <a href="'.base_url().'account" target="_blank">'.base_url().'account</a></p>                        
                                            <p style="font-size:14px">Best Regards,<br>Team Kajuwalebhaiya</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>';
                            $this->email->from($from_email, 'Kajuwalebhaiya'); 
                            $this->email->to($to_email);
                            $this->email->subject($subject); 
                 
                 
                            // $body = $this->load->view('site/email',$data,true);
                             $this->email->message($body);  
                             //Send mail 
                             if($this->email->send()) 
                             {
                                  $json['status'] = 4;
                             }
                             $json['status'] = 4;
				        }
						else
						{
						   $json['status'] = 0;
						}
		}
	
					echo json_encode($json);
	}
	public function login()
	{
	    $this->load->view('site/login');
	}
	public function login_user()
	{
		if($this->input->post('email')=='')
		{
		    $json['msg'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 1;
		}
		else if(!$this->checkemail($this->input->post('email')))
		{
			      $json['msg'] = '<span style="color:red;">Please enter valid email address.</span>';
				  $json['status'] = 1;
		}
		else if($this->input->post('password')=='')
		{
			$json['msg1'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 2;
		}
		else
		{
		    $data = $this->common_model->get_single_data('users',array('email'=>$this->input->post('email'),'password'=>md5($this->input->post('password'))));
    		if($data)
    		{
    			$this->session->set_userdata('loggedIn',true);
        		$this->session->set_userdata('u_id',$data['id']);
        		$this->session->set_userdata('email',$data['email']);
        		$json['status'] = 3;
			    $this->session->set_flashdata('success1', 'Success! Login successful.');
    		}
    		else
    		{
    			$json['status']=0;
    		}
		   
		}
		
		echo json_encode($json);
	}
	public function account()
	{
		if(!$this->session->userdata('u_id'))
		{
			redirect('');
		}
		else
		{
		    $data['user'] = $this->common_model->get_single_data('users',array('id'=>$this->session->userdata('u_id')));
		    $this->load->view('site/account',$data);
		}
	    
	}
	public function checkemail($str) {
         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
   }
	public function edit_user()
	{
	    $user = $this->common_model->get_users_email($this->session->userdata('u_id'),$this->input->post('email'));
	    $tele = $this->common_model->get_users_tele($this->session->userdata('u_id'),$this->input->post('telephone'));
        if($this->input->post('first_name')=='')
		{
			$json['msg'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 0;
		}
		else if($this->input->post('last_name')=='')
		{
			$json['msg1'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 1;
		}
		else if($this->input->post('email')=='')
		{
		    $json['msg2'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 2;
		}
		else if(!$this->checkemail($this->input->post('email')))
		{
			      $json['msg2'] = '<span style="color:red;">Please enter valid email address.</span>';
				  $json['status'] = 2;
		}
		else if($user>0)
		{
		    $json['msg2'] = '<span style="color:red;">This email is already registered. Please try other.</span>';
			$json['status'] = 2;
		}
		else if($this->input->post('telephone')=='')
		{
			$json['msg3'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 3;
		}
		else if(!preg_match('/^[0-9]{10}+$/', $this->input->post('telephone')))
		{
			$json['msg3'] = '<span style="color:red;">Please enter valid mobile number.</span>';
			$json['status'] = 3;
		}
		else if($tele>0)
		{
		    $json['msg3'] = '<span style="color:red;">This mobile number is already registered. Please try other.</span>';
			$json['status'] = 3;
		}
		else
		{
	
		    if($_FILES['picture']['name']!=''){
		        $config['upload_path']   = './images/user_profile/';
    			$config['allowed_types'] = 'gif|jpg|png|jpeg';  
    			$config['remove_spaces'] = TRUE; 
    			$this->load->library('upload', $config);
    			if($this->upload->do_upload('picture'))
    	        {
    	            $data = $this->upload->data();
    	            $files = base_url().'images/user_profile/'.$data['file_name'];
    	            
    	        }
		    }
    	        
				
    	        $update_array = array(
							'first_name' => $this->input->post('first_name'),
							'last_name'=>$this->input->post('last_name'),
							'email'=>$this->input->post('email'),
							'telephone'=>$this->input->post('telephone'),
							'gender'=>$this->input->post('gender')
					);  
					if($_FILES['picture']['name']!='')
    				{
    						$update_array['picture']=$files;
    				}
					

					$where_array=array('id'=>$this->session->userdata('u_id'));  
					$result=$this->common_model->update_entry('users',$update_array,$where_array);
					if($result)
					{
							$json['status'] = 4;
							$this->session->set_flashdata('success', 'Success!  Updated successfully.');
					} 
					else 
					{
						$json['status'] = 4;
						$this->session->set_flashdata('error', 'Something went wrong. Please try again!');
					}
    	        
		        
		   
		}
		
		echo json_encode($json);
	        
	}
	public function change_password()
	{
	    if(!$this->session->userdata('u_id'))
		{
			redirect('');
		}
		else
		{
		    $this->load->view('site/change_password');
		}
	     
	}
	public function dochange_password() {
		$session_user=$this->session->userdata('u_id');
		$where_array=array('id'=>$session_user);  
		$data=$this->common_model->get_single_data('users',array('id'=>$session_user));
        
        if($data['oauth_uid']!='')
        {
            $userdata['password']=md5($this->input->post('newpassword'));
			$result=$this->common_model->update_entry('users',$userdata,$where_array);
			$this->session->set_flashdata('success1', 'Success! Password has been updated successfully.');
			$res['result']=1;
        }
        
		else if($data['password']==md5($this->input->post('oldpassword')))
		{
			$userdata['password']=md5($this->input->post('newpassword'));
			$result=$this->common_model->update_entry('users',$userdata,$where_array);
			$this->session->set_flashdata('success1', 'Success! Password has been updated successfully.');
			$res['result']=1;
			
		}
		else 
		{
			$res['result']=0;
		}
		echo json_encode($res);
	}
	public function all_products($id)
	{
	    $result['category'] = $this->common_model->get_single_data('category',array('cat_id'=>$id));
	    
	    $sortby = $_REQUEST['sortby']; 
	    $order = $_REQUEST['order'];
	    $price = $_REQUEST['price'];
	    $discount = $_GET['discount'];
	    $first = reset($discount);
        $last = end($discount);
        $start = substr($first, 0, 2);
        $end = substr($last, 0, 2);
        $end1 = $end+10;
        
	    if($discount)
	    {
	        if($start==40)
	        {
	            $result['products'] = $this->common_model->get_above_discount($result['category']['cid'],$start);
	        }
	        else
	        {
	            $result['products'] = $this->common_model->get_discountproducts($result['category']['cid'],$start,$end1);
	        }
    	        
    	  //  echo $this->db->last_query();
	    }
	    else if($sortby && $order)
	    {
	        if($sortby=='discount')
	        {
	            $result['products'] = $this->common_model->get_discount_cat_product($result['category']['cid']);
	        }
	        else if($sortby=='top')
	        {
	            $result['products'] = $this->common_model->get_all_cat_product($result['category']['cid']);
	        }
	        else if($sortby=='popular')
	        {
	            $result['products'] = $this->common_model->get_pop_cat_product($result['category']['cid']);
	        }
	    }
	    else
	    {
	         $result['products'] = $this->common_model->get_all_cat_product($result['category']['cid']);
	    }
	    
	   
	    //echo $this->db->last_query();
	    $this->load->view('site/cat_products',$result);
	}
	public function forgot()
	{
	    $this->load->view('site/forgot_password');
	}
	public function forgot_pass()
	{
	    if($this->input->post('email')=='')
		{
		    $json['msg'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 1;
		}
		else if(!$this->checkemail($this->input->post('email')))
		{
			      $json['msg'] = '<span style="color:red;">Please enter valid email address.</span>';
				  $json['status'] = 1;
		}
		else
		{
		    $data = $this->common_model->get_single_data('users',array('email'=>$this->input->post('email')));
    		if($data)
    		{
    		    
    		    $from_email = "billing@kajuwalebhaiya.com"; 
                $to_email = $this->input->post('email');
                
        		$this->email->set_header('MIME-Version', '1.0; charset=utf-8'); //must add this line
                $this->email->set_header('Content-type', 'text/html');
        		$subject ='Kajuwalebhaiya - Password Reset Request';
        		
        		$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $ref_number = substr(str_shuffle($permitted_chars), 0, 8);
                     
                $where_array=array('id'=>$data['id']);
                $userdata['reset'] = $ref_number;
                     
                $result=$this->common_model->update_entry('users',$userdata,$where_array);
        		
        		$body = '<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f7f7f7" style="max-width:800px;margin:auto;padding:12px;font-family:arial;color:#565a5c;background-color:#f5f5f5;border:1px solid #e8e8e8">
            <tbody>
                <tr>
                    <td align="center">
                        <img src="'.base_url().'image/resize-164310701455515656KWBpngtransparent1.png" title="Kajuwalebhaiya" alt="Kajuwalebhaiya" class="CToWUd">
                        <hr style="border:none;border-bottom:1px solid #bbbbbb;margin-top:15px">
                    </td>
                </tr>
                <tr>
                
                    <td>
                        <h4 style="color:#222222;font-size:16px">Hello <span>'.$data['first_name'].' '.$data['last_name'].'</span>,</h4>                    
                        <p style="font-size:14px;color:#222222">A new password has been requested from your Kajuwalebhaiya account, please click the following button to rest your password:</p>                        
                        <div style="padding:15px 0px;text-align:center"><a href="'.base_url().'reset-password/'.$userdata['reset'].'" style="color:#fff;background:#006400;text-decoration:none;border-radius:2px;padding:10px 40px;margin:15px auto;width:120px;font-family:arial;margin-top:40px" target="_blank"><b>Reset Password</b></a></div>
                        <p style="font-size:14px">Best Regards,<br>Team Kajuwalebhaiya</p>
                    </td>
                </tr>
            </tbody>
        </table>';
                $this->email->from($from_email, 'Kajuwalebhaiya'); 
                 $this->email->to($to_email);
                 $this->email->subject($subject); 
                 
                 
                // $body = $this->load->view('site/email',$data,true);
                 $this->email->message($body);  
                 //Send mail 
                 if($this->email->send()) 
                 {
                     $this->session->set_userdata('user_id',$data['id']);
                     $this->session->set_flashdata('success1', 'Success! An email with a reset password link has been sent to your email address.');
                     $json['status'] = 2;
                     $json['user_id']=$data['id'];
                 }
    		}
    		else
    		{
    			$json['status']=0;
    		}
		   
		}
		
		echo json_encode($json);
	}
	public function reset_password($reset)
	{
	    $data=$this->common_model->get_single_data('users',array('id'=>$this->session->userdata('user_id')));
	    if($data)
		{
			if($data['reset'] == $reset)
			{
			    $this->load->view('site/reset_password');
			}
			else
			{
			    $this->session->set_flashdata('error1','Password code link is invalid or has been used previously!');
			    redirect('login');
			    
			}
		}
	    
	}
	public function resetpass($reset)
	{
	    if($reset)
		{
		    $where_array=array('id'=>$this->session->userdata('user_id'));  
		
		    $data=$this->common_model->get_single_data('users',array('id'=>$this->session->userdata('user_id')));
		    if($data)
			{
                    if($data['reset'] == $reset)
					{
					    if($data['oauth_uid']!='')
                        {
                            $userdata['password']=md5($this->input->post('newpassword'));
                            $userdata['reset'] = '';
						   // $userdata['user_reset'] = 1;
                            
                			$result=$this->common_model->update_entry('users',$userdata,$where_array);
                			
                			$this->session->set_flashdata('success1', 'Success! Password has been updated successfully.');
                			$res['result']=1;
                        }
                        
                		else if($data['password']==md5($this->input->post('oldpassword')))
                		{
                			$userdata['password']=md5($this->input->post('newpassword'));
                			$userdata['reset'] = '';
						    //$userdata['user_reset'] = 1;
                            
                			$result=$this->common_model->update_entry('users',$userdata,$where_array);
                			$this->session->set_flashdata('success1', 'Success! Password has been updated successfully.');
                			$res['result']=1;
                			
                		}
                		else 
                		{
                			$res['result']=0;
                		}
					    
					}
					else
					{
						$this->session->set_flashdata('error1','User not authorized or link is expired!');
						$res['result']=1;
					}
				
			}
			else
			{
			    $res['result']=0;
			}
		}
		echo json_encode($res);

        
	}
	public function submit_review()
	{
	    if($this->session->userdata('u_id'))
	    {
	        $user_id=$this->session->userdata('u_id');
	    }
	    else
	    {
	        $user_id=0;
	    }
	    $product_id=$this->input->post('product_id');
	    $product_type=$this->input->post('product_type');
	    if($this->input->post('u_name')=='')
		{
		    $json['msg'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 0;
		}
		else if($this->input->post('u_review')=='')
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
		    $today= date('Y-m-d h:i:s');
		        		$insert_arr = array(
		        		        'p_id' => $this->input->post('product_id'),
		        		        'u_name' => $this->input->post('u_name'),
							    'u_review' => $this->input->post('u_review'),
								'u_rate'=>$this->input->post('u_rate'),
								'date' => $today,
								'type'=> $product_type,
								'user_id'=>$user_id
							);
			            $result=$this->common_model->insertData('reviews',$insert_arr);
			            
			                
                	    $review = $this->common_model->get_average_review($product_id);
                	    
                	    $update_array = array(
							'review' => $review[0]['rates'],
					    );  
					    if($product_type==1)
					    {
					        $where_array=array('product_id'=>$product_id);  
					        $result=$this->common_model->update_entry('product',$update_array,$where_array);
					    }
					    else
					    {
					        $where_array=array('pack_product_id'=>$product_id);  
					        $result=$this->common_model->update_entry('pack_of_two',$update_array,$where_array);
					    }
					    
                	    
			            if($result)
			            {
			                $json['status'] = 3;
			            }
			            else
			            {
			                $json['status'] = 4;
			            }
		    
		}
		echo json_encode($json);
	}
	public function get_prices($id)
	{
	    $val=$this->input->post('val');
	    
	    $json['sub']='';
	    
        $price = $this->common_model->get_single_data('product_price',array('product_id'=>$id,'weight'=>$val));
        
        $pack = $this->common_model->get_single_data('product ',array('pid'=>$id));
        
        $old_price=$price['price'];
        $discount=$pack['p_discount'];
        
        if($discount==0)
        {
            $price1=number_format($old_price);
            $json['sub']= '<span class="price-new" style="color: #006400;font-size:14px" id="demo"><i class="fa fa-inr rs-sym"></i> '.$price1.' </span>';
             $json['price'] =$price1;
        }
        else{
            $price1 = $old_price - ($old_price * $discount / 100);
            $price2= number_format($price1);
            $json['sub']='<span class="price-new" style="color: #006400;font-size:14px" id="demo"><i class="fa fa-inr rs-sym"></i> '.$price2.' </span>';
            $json['sub'] .='<span class="price-old" style="font-size:14px" id="new"><i class="fa fa-inr rs-sym"></i> '.number_format($old_price).'</span>';
            $json['sub'] .='<span style="font-size:14px"><span class="sale sale-percentage">'.$discount.'% Off</span></span>';
            $json['price'] =$price2;
        }
		echo json_encode($json);
	}
	public function get_price($id)
	{
	    $val=$this->input->post('val');
	    
	    $json['sub']='';
	    
        $price = $this->common_model->get_single_data('product_price',array('product_id'=>$id,'weight'=>$val));
        
        $pack = $this->common_model->get_single_data('pack_of_two ',array('pack_id'=>$id));
        
        $old_price=$price['price'];
        $discount=$pack['pack_discount'];
        
        if($discount==0)
        {
            $price1=number_format($old_price);
            $json['sub']= '<span class="price-new" style="color: #006400;font-size:14px" id="demo"><i class="fa fa-inr rs-sym"></i> '.$price1.' </span>';
             $json['price'] =$price1;
        }
        else{
            $price1 = $old_price - ($old_price * $discount / 100);
            $price2= number_format($price1);
            $json['sub']='<span class="price-new" style="color: #006400;font-size:14px" id="demo"><i class="fa fa-inr rs-sym"></i> '.$price2.' </span>';
            $json['sub'] .='<span class="price-old" style="font-size:14px" id="new"><i class="fa fa-inr rs-sym"></i> '.number_format($old_price).'</span>';
            $json['sub'] .='<span style="font-size:14px"><span class="sale sale-percentage">'.$discount.'% Off</span></span>';
            $json['price'] =$price2;
        }
		echo json_encode($json);
	}
	function get_price_top($id)
	{
	    $val=$this->input->post('val');
	    
	    $json['sub']='';
	    
        $price = $this->common_model->get_single_data('product_price',array('product_id'=>$id,'weight'=>$val));
        
        $pack = $this->common_model->get_single_data('product ',array('pid'=>$id));
        
        $old_price=$price['price'];
        $discount=$pack['p_discount'];
        
        if($discount==0)
        {
            $price1=number_format($old_price);
            $json['sub']= '<span class="price-new" style="color: #FF7F50;font-size:14px" id="demo"><i class="fa fa-inr rs-sym"></i> '.$price1.' </span>';
            $json['price'] =$price1;
        }
        else{
            $price1 = $old_price - ($old_price * $discount / 100);
            $price2= number_format($price1);
            $json['sub']='<span class="price-new" style="color: #FF7F50;font-size:14px" id="demo"><i class="fa fa-inr rs-sym"></i> '.$price2.' </span>';
            $json['sub'] .='<span class="price-old" style="font-size:14px" id="new"><i class="fa fa-inr rs-sym"></i> '.number_format($old_price).'</span>';
            $json['sub'] .='<span style="font-size:14px"><span class="sale sale-percentage">'.$discount.'% Off</span></span>';
            $json['price'] =$price2;
        }
		echo json_encode($json);
	}
	function get_price_popular($id)
	{
	    $val=$this->input->post('val');
	    
	    $json['sub']='';
	    
        $price = $this->common_model->get_single_data('product_price',array('product_id'=>$id,'weight'=>$val));
        
        $pack = $this->common_model->get_single_data('product ',array('pid'=>$id));
        
        $old_price=$price['price'];
        $discount=$pack['p_discount'];
        
        if($discount==0)
        {
            $price1=number_format($old_price);
            $json['sub']= '<span class="price-new" style="color: #006400;font-size:14px" id="demo"><i class="fa fa-inr rs-sym"></i> '.$price1.' </span>';
        }
        else{
            $price1 = $old_price - ($old_price * $discount / 100);
            $price2= number_format($price1);
            $json['sub']='<span class="price-new" style="color: #006400;font-size:14px" id="demo"><i class="fa fa-inr rs-sym"></i> '.$price2.' </span>';
            $json['sub'] .='<span class="price-old" style="font-size:14px" id="new"><i class="fa fa-inr rs-sym"></i> '.number_format($old_price).'</span>';
            $json['sub'] .='<span style="font-size:14px"><span class="sale sale-percentage">'.$discount.'% Off</span></span>';
        }
		echo json_encode($json);
	}
	function get_cat_price($id)
	{
	    $val=$this->input->post('val');
	    $type = $this->input->post('type');
	    
	    $json['sub']='';
	    
        $price = $this->common_model->get_single_data('product_price',array('product_id'=>$id,'weight'=>$val,'type'=>$type));
        if($type==1)
        {
            $pack = $this->common_model->get_single_data('product ',array('pid'=>$id));
            
            $old_price=$price['price'];
            $discount=$pack['p_discount'];
            
            if($discount==0)
            {
                $price1=number_format($old_price);
                $json['sub']= '<span class="price-new" style="color: #006400;font-size:14px" id="demo"><i class="fa fa-inr rs-sym"></i> '.$price1.' </span>';
                $json['price'] =$price1;
            }
            else{
                $price1 = $old_price - ($old_price * $discount / 100);
                $price2= number_format($price1);
                $json['sub']='<span class="price-new" style="color: #006400;font-size:14px" id="demo"><i class="fa fa-inr rs-sym"></i> '.$price2.' </span>';
                $json['sub'] .='<span class="price-old" style="font-size:14px" id="new"><i class="fa fa-inr rs-sym"></i> '.number_format($old_price).'</span>';
                $json['sub'] .='<span style="font-size:14px"><span class="sale sale-percentage">'.$discount.'% Off</span></span>';
                $json['price'] =$price2;
            }
        }
        else
        {
            $pack = $this->common_model->get_single_data('pack_of_two ',array('pack_id'=>$id));
            
            $old_price=$price['price'];
            $discount=$pack['pack_discount'];
            
            if($discount==0)
            {
                $price1=number_format($old_price);
                $json['sub']= '<span class="price-new" style="color: #006400;font-size:14px" id="demo"><i class="fa fa-inr rs-sym"></i> '.$price1.' </span>';
                $json['price'] =$price1;
            }
            else{
                $price1 = $old_price - ($old_price * $discount / 100);
                $price2= number_format($price1);
                $json['sub']='<span class="price-new" style="color: #006400;font-size:14px" id="demo"><i class="fa fa-inr rs-sym"></i> '.$price2.' </span>';
                $json['sub'] .='<span class="price-old" style="font-size:14px" id="new"><i class="fa fa-inr rs-sym"></i> '.number_format($old_price).'</span>';
                $json['sub'] .='<span style="font-size:14px"><span class="sale sale-percentage">'.$discount.'% Off</span></span>';
                $json['price'] =$price2;
            }
        }
        
        
        
        
        
		echo json_encode($json);
	}
	public function manage_address()
	{
	    if($this->session->userdata('u_id'))
	    {
	        $this->load->view('site/address');
	    }
	    else
	    {
	        redirect('login');
	    }
	}
	public function my_orders()
	{
	    if($this->session->userdata('u_id'))
	    {
	        $this->load->view('site/orders');
	    }
	    else
	    {
	        redirect('login');
	    }
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
		return redirect('my-orders');
    }
    public function search()
    {
        $search = $_REQUEST['search']; 
        
        
      //  htmlentities(addslashes($search), ENT_NOQUOTES);
      /*  if(preg_replace('/[^A-Za-z0-9\-]/#<script(.*?)>(.*?)</script>#is', '', $search))
        {
            $this->load->view('site/search');
        }
        else
        {
            
        }*/

       // preg_replace('#<script(.*?)>(.*?)</script>#is/[^A-Za-z0-9\-]/', '', $search);
       // $data = $this->security->xss_clean($search);
        
      
       // $data = $this->security->xss_clean($search);
       // print_r($data);
      
        //$str = "<h1>GeeksforGeeks</h1>";
 
        //$newstr = filter_var($search,FILTER_SANITIZE_STRING);
             
      //  echo $newstr;
       // echo htmlentities($search);

        
        $sortby = $_REQUEST['sortby']; 
	    $order = $_REQUEST['order'];
	    $price = $_REQUEST['price'];
	    $discount = $_GET['discount'];
	    $first = reset($discount);
        $last = end($discount);
        $start = substr($first, 0, 2);
        $end = substr($last, 0, 2);
        $end1 = $end+10;
        
        if($discount)
	    {
	        if($start==40)
	        {
	            $result['products'] = $this->common_model->get_discountabove($search,$start);
	        }
	        else
	        {
	            $result['products'] = $this->common_model->get_discountsearch($search,$start,$end1);
	        }
    	        
    	  //  echo $this->db->last_query();
	    }
	    else if($search)
	    {
	         $result['products']=$this->common_model->getrows_search($search);
	    }
          $this->load->view('site/search',$result);
    }
    public function deal($id)
    {
        $deal = $this->common_model->get_single_data('deal_of_day',array('d_order'=>$id));

	    $result['products'] = $this->common_model->get_discount_product($deal['d_discount']);
	    //echo $this->db->last_query();
	    $this->load->view('site/deal_products',$result);
    }
    public function load_more_reviews($id,$pid)
    {
        if($this->session->userdata('u_id'))
        {
            $users = $this->common_model->get_single_data('users',array('id'=>$this->session->userdata['u_id']));
        }
        
        $result=$this->common_model->fetch_review_num($id,$pid);
    	$totalRowCount = $result;
    	$showLimit = 3;
    	
    	$reviews = $this->common_model->fetch_all_review($id,$showLimit,$pid);
    	?>
    	
    	<div class="rev">
    	    
    	    <?php 
    	        foreach ($reviews as $r) { $postID=$r['id']; 
    	        $users_details = $this->common_model->get_single_data('users',array('id'=>$r['user_id'])); 
    	        ?>
    	        <div class="containerr">
    	          <?php if($users_details['picture']!=''){ ?>
                    <img src="<?php echo $users_details['picture']; ?>" alt="Avatar" style="width:90px">
                    <?php }else{ ?>
                    <img src="<?php echo base_url(); ?>images/users.png" alt="Avatar" style="width:90px">
                    <?php } ?>
                  <p style="text-transform:uppercase;font-weight:bold;"><span><?php echo $r['u_name']; ?></span></p>
                  <p style="color:#ffaa17;"><?php $date=date_create($r['date']);
                  echo date_format($date,"d F, Y"); ?> at <?php echo date_format($date,"g:i a"); ?></p>
                  <p><?php for($i=1;$i<=5;$i++){ 
                            if($r['u_rate']){  
                                if($i<=$r['u_rate']) { ?>  
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
								<?php } else { ?>
								    <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
								<?php }  } else { ?> 
									<i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
						<?php } } ?>
                      <br>
                      
                     <?php echo $r['u_review']; ?>
              
                  
                  </p>
                  
                 
                </div>
                <?php } ?>
    	    </div>
    	    <?php 
    	//echo $postID;
    	if($totalRowCount > $showLimit)
    	{	
    	    ?>
    	    <div class="show_more_main" style="margin: 25px 150px;" id="show_more_main<?php echo $postID; ?>">
        <div class="center">
          <button class="btn btn-primary btn-denger" id="<?php echo $postID; ?>"><span id="<?php echo $postID; ?>" class="readon hvr-ripple-out readon-btn uppercase show_more" title="Load more">Show More</span><span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span></button>
        </div>
        </div>
    	    
    	    <?php
    	}
        
    }
}	