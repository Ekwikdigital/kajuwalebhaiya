<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {
	
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
	public function index()
	{
		$result['listing']=$this->Common_model->get_product();
		if($result['listing']==''){
			$result['listing']  =array();     
		}
		$this->load->view('Admin/product_list',$result);
	}
	public function add_product() 
	{	$data['get_last_record'] =  $this->Mod_admin->get_last_record();
 		$data['category']=$this->Common_model->get_data('category',array('cat_status'=>1));
 		$data['sub']=$this->Common_model->get_data('sub_category',array('sub_cat_status'=>1));
		
		$this->load->view('Admin/add_product',$data);		
	} 
	public function add_submit()
	{
	            $today= date('Y-m-d h:i:s');	
       	if($this->input->post('p_status')==1)
	    {
	        $checked=1;
	    }
	    else
	    {
	        $checked=0;
	    }

	    if($this->input->post('top_sell')==1)
	    {
	        $top=1;
	    }
	    else
	    {
	        $top=0;
	    }

	    if($this->input->post('popular')==1)
	    {
	        $popular=1;
	    }
	    else
	    {
	        $popular=0;
	    }
		if(!empty($_FILES['thumbnail_image']['name']))
		{
			$path = $_FILES['thumbnail_image']['name'];
	 		$ext = pathinfo($path, PATHINFO_EXTENSION);
			$img =substr(sha1(time()), 0, 8).substr(md5(microtime()), 0, 8).'.'.$ext;
			$targetFile = './thumbnail/' . $img;
			if(move_uploaded_file($_FILES["thumbnail_image"]["tmp_name"], $targetFile))
			{
			    $imgs=$img;
			}
		}
		if(sizeof($_FILES['files']['name']) == 0)
		{
		    $insert_arr = array(
							    'p_name' => $this->input->post('p_name'),
								'product_id'=>$this->input->post('product_id'),
								'p_create_date' => $today,
								'product_cat' => $this->input->post('product_cat'),
								'product_sub_cat'=>$this->input->post('product_sub_cat'),
								'p_quantity' => $this->input->post('p_quantity'),
								//'p_actual_price' => $price,
								'p_discount' => $this->input->post('p_discount'),
								'p_image' => $imgs,
								'p_status'=>$checked,
								'p_description' => $this->input->post('p_description'),
								'top_sell' => $top,
								'popular' => $popular,
								'p_brand' => $this->input->post('p_brand'),
								'p_package_wt' =>$this->input->post('p_package_wt'),
								'p_speciality' => $this->input->post('p_speciality'),
								'p_about' => $this->input->post('p_about'),
								'p_origin' => $this->input->post('p_origin'),
								'type'=>1
							);
		}
		else
		{
		    foreach ($_FILES['files']['name'] as $name => $value)  
		    { 
		        $file_name = explode(".", $_FILES['files']['name'][$name]); 
		     
		            $new_name = substr(sha1(time()), 0, 8).substr(md5(microtime()), 0, 8) . '.' . $file_name[1];  
		            $sourcePath = $_FILES['files']['tmp_name'][$name];  
		            $targetPath = "./thumbnail/multi/".$new_name;  
		            $multiple_image[]=$new_name; 
		            if(move_uploaded_file($sourcePath, $targetPath))  
		            {  
		             echo  $multiple_imagee=implode(",",$multiple_image);
		            }  
		    }
		    $insert_arr = array(
							    'p_name' => $this->input->post('p_name'),
								'product_id'=>$this->input->post('product_id'),
								'p_create_date' => $today,
								'product_cat' => $this->input->post('product_cat'),
								'product_sub_cat'=>$this->input->post('product_sub_cat'),
								'p_quantity' => $this->input->post('p_quantity'),
								//'p_actual_price' => $price,
								'p_discount' => $this->input->post('p_discount'),
								'p_image' => $imgs,
								'product_multi_img' => $multiple_imagee,
								'p_status'=>$checked,
								'p_description' => $this->input->post('p_description'),
								'top_sell' => $top,
								'popular' => $popular,
								'p_brand' => $this->input->post('p_brand'),
								'p_package_wt' =>$this->input->post('p_package_wt'),
								'p_speciality' => $this->input->post('p_speciality'),
								'p_about' => $this->input->post('p_about'),
								'p_origin' => $this->input->post('p_origin'),
								'type'=>1
							);
		}
		
	  /*  $pp=$this->input->post('p_price');
		$pp1=$this->input->post('p_discount');
		if($pp1==''){
			$price1=number_format($pp);
			$price=str_replace(',', '', $price1);
		}
		else{
		 $dis = 100 - $pp1;
		   $dis1 = '0.'.$dis;
		   $price1= $pp * $dis1;
		  $price2= number_format($price1);
		  $price=str_replace(',', '', $price2);

		}*/


		        	
			           $result=$this->Common_model->insertData('product',$insert_arr);	
			            
			            $p_weight = $this->input->post('p_weight');
			            $p_price = $this->input->post('p_price');
			            
			            for($i=0; $i < count($p_weight); $i++){
						$pages_data = array(
								'product_id' => $result,
								'price' => $p_price[$i],
								'weight' => $p_weight[$i],
								'type' => 1,

						);

					$prices = $this->common_model->insertData('product_price',$pages_data);
				    }
			            if($result)
			            {
							$this->session->set_flashdata('success', 'Success! Product added successfully.');
								redirect("products");
						}
						else
						{
						   $this->session->set_flashdata('error', 'Error!  something went wrong.');
						   redirect("add_product");
						}
	}
	public function edit_product($id)
	{
		$result['get_last_record'] =  $this->Mod_admin->get_last_record();
		$result['product']=$this->Common_model->get_single_data('product',array('pid'=>$id));
		$result['category']=$this->Common_model->get_data('category',array('cat_status'=>1));
		$result['sub']=$this->Common_model->get_data('sub_category',array('sub_cat_status'=>1));
		$result['price']=$this->Common_model->get_data('product_price',array('product_id'=>$id,'type'=>1));
		$this->load->view('Admin/edit_product',$result);
		
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
	public function deleteimage(){
      $deleteid=$this->input->post('pid');
  	  echo $query=$this->Mod_admin->deleteimg($deleteid); 
 
    }
    public function deletecmultiimageea($id)
    {
	   	$image_name=$this->input->post('image');
	    echo $query=$this->Mod_admin->imageea($id,$image_name); 
    }
    public function edit_submit($id)
    {
    	if(!empty($_FILES['thumbnail_image']['name']))
		{
	    	$path = $_FILES['thumbnail_image']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);

			substr(sha1(time()), 0, 8).substr(md5(microtime()), 0, 8).'.'.$ext; 
			$img =substr(sha1(time()), 0, 8).substr(md5(microtime()), 0, 8).'.'.$ext;
			$targetFile = './thumbnail/' . $img;
			if(move_uploaded_file($_FILES["thumbnail_image"]["tmp_name"], $targetFile))
			{
			    $imgs=$img;
			}
		}	
		if(!empty($_FILES['files']['name'][0])){
		     foreach ($_FILES['files']['name'] as $name => $value)  
		      {  
		           $file_name = explode(".", $_FILES['files']['name'][$name]);  
		           $allowed_ext = array("jpg", "jpeg", "png", "gif", "jfif");  
		           if(in_array($file_name[1], $allowed_ext))  
		           {  
		                $new_name = substr(sha1(time()), 0, 8).substr(md5(microtime()), 0, 8) . '.' . $file_name[1];  
		                $sourcePath = $_FILES['files']['tmp_name'][$name];  
		                $targetPath = "./thumbnail/multi/".$new_name;  
		               $multiple_image[]=$new_name; 
		                if(move_uploaded_file($sourcePath, $targetPath))  
		                {  
		                  $queryy=$this->Mod_admin->chacke($id);

            		 	  $image_arry = explode(",",$queryy->product_multi_img); 
            
            		      $multiy=array_merge($image_arry, $multiple_image );
            		      $filtered_arrayy = array_filter($multiy); 
            		      $multiple_imagee=implode(",",$filtered_arrayy);
		                }                
		           }            
		      }

			  
		    }
		    else{
				$queryy=$this->Mod_admin->chacke($id);
				$image_arry = explode(",",$queryy->product_multi_img); 
				$filtered_arrayy = array_filter($image_arry);
				$multiple_imagee=implode(",",$filtered_arrayy);

		   }
		   	if($this->input->post('p_status')==1)
		    {
		        $checked=1;
		    }
		    else
		    {
		        $checked=0;
		    }
		    if($this->input->post('top_sell')==1)
		    {
		        $top=1;
		    }
		    else
		    {
		        $top=0;
		    }
		    if($this->input->post('popular')==1)
		    {
		        $popular=1;
		    }
		    else
		    {
		        $popular=0;
		    }
		/*	$pp=$this->input->post('p_price');
			$pp1=$this->input->post('p_discount');
			if($pp1==''){
				$price1=number_format($pp);
				$price=str_replace(',', '', $price1);
			}
			else{
			   $dis = 100 - $pp1;
			   $dis1 = '0.'.$dis;
			   $price1= $pp * $dis1;
			   $price2= number_format($price1);
			   $price=str_replace(',', '', $price2);
			}
			*/
			if($path!=''){
			$data = array(
			        'p_name'=>$this->input->post('p_name'),
			        'product_id'=>$this->input->post('product_id'),
			        'product_cat'=>$this->input->post('product_cat'),
			        'p_quantity' => $this->input->post('p_quantity'),
				    //'p_actual_price' => $price,
			        'p_description'=>$this->input->post('p_description'),
			        'p_discount'=>$this->input->post('p_discount'),
			        'p_image'=> $imgs,
			        'product_multi_img'=>$multiple_imagee,
			        'p_status'=>$checked,
			        'top_sell' => $top,
					'popular' => $popular,
					'p_brand' => $this->input->post('p_brand'),
					'p_package_wt' =>$this->input->post('p_package_wt'),
					'p_speciality' => $this->input->post('p_speciality'),
					'p_about' => $this->input->post('p_about'),
					'p_origin' => $this->input->post('p_origin')
			        );
			}
			else
			{
			$data = array(
			        'p_name'=>$this->input->post('p_name'),
			        'product_id'=>$this->input->post('product_id'),
			        'product_cat'=>$this->input->post('product_cat'),
			        //'p_actual_price'=>$price,
			        'p_quantity'=>$this->input->post('p_quantity'),
			        'p_discount'=>$this->input->post('p_discount'),
			        'p_description'=>$this->input->post('p_description'),
			        'product_multi_img'=>$multiple_imagee,
			        'p_status'=>$checked,
			        'top_sell' => $top,
					'popular' => $popular,
					'p_brand' => $this->input->post('p_brand'),
					'p_package_wt' =>$this->input->post('p_package_wt'),
					'p_speciality' => $this->input->post('p_speciality'),
					'p_about' => $this->input->post('p_about'),
					'p_origin' => $this->input->post('p_origin')
			    );

			}
			
			
			$delete=$this->Common_model->delete(array('product_id'=>$id,'type'=>1),'product_price');
			            $p_weight = $this->input->post('p_weight');
			            $weight_new=array_filter($p_weight);

			            $p_price = $this->input->post('p_price');
			            $price_new=array_filter($p_price);

			                for($i=0; $i < count($weight_new); $i++){
    						$pages_data = array(
    								'product_id' => $id,
    								'price' => $price_new[$i],
    								'weight' => $weight_new[$i],
    								'type' => 1,
    
    						);
		
                        $prices = $this->common_model->insertData('product_price',$pages_data);
				    }
			            
				    
			$where_array=array('pid'=>$id);  
		    $result=$this->Common_model->update_entry('product',$data,$where_array);  
			if($result)
			{
				$this->session->set_flashdata('success', 'Success! Product updated successfully.');
				redirect("products");
			} 
			else 
			{
				$this->session->set_flashdata('error', 'Error!  something went wrong.');
				redirect("edit_product/".$id);
			}
    }
    public function delete_product($id)
	{
		$result=$this->Common_model->delete(array('pid'=>$id),'product');
		if($result)
		{
			$this->session->set_flashdata('success', 'Success! Deleted Successfully.');
			
		}
		else 
		{
			$this->session->set_flashdata('error', 'Error! Something went wrong, Try again.');
			
		}
		return redirect('products');
	}

	public function deal_of_day()
	{
		$result['listing']=$this->Common_model->alldataorder('deal_of_day','desc','d_id');
		if($result['listing']==''){
			$result['listing']  =array();     
		}
		$this->load->view('Admin/deal_list',$result);
	}
	public function add_deal()
	{
		$this->load->view('Admin/add_deal');
	}
	public function add_deal_submit()
	{
	    $permitted_chars = '123456789';
        $d_order = substr(str_shuffle($permitted_chars), 0, 4);
        
		$today= date('Y-m-d h:i:s');
		if($this->input->post('d_status')==1)
	    {
	        $checked=1;
	    }
	    else
	    {
	        $checked=0;
	    }
		 	if($_FILES['d_image']['name']!='')
			{
				$config['upload_path']   = './images/deal/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';  
				$config['remove_spaces'] = TRUE; 	 
				$this->load->library('upload', $config);
				  
				$data = $this->upload->data(); 
				if($this->upload->do_upload('d_image'))
		        {
		            $data = $this->upload->data();    
		
		        }
		        else
		        {
		            $this->session->set_flashdata('error', $this->upload->display_errors());
	                $file_check = false;
		        }         
			}


		 		$insert_arr = array(
		 		    'd_order'=>$d_order,
					'd_image' => $data['file_name'],
					'd_create' => $today,
					'd_discount' => $this->input->post('d_discount'),
					'd_status'=>$checked
				);
			    $result=$this->Common_model->insertData('deal_of_day',$insert_arr);	
			    if($result)
			    {
					$this->session->set_flashdata('success', 'Success! Added successfully.');
					redirect("deal_of_day");
				}
				else
				{
					$this->session->set_flashdata('error', 'Error!  something went wrong.');
					redirect("add_deal");
				}
	}
	public function delete_deal($id)
	{
		$get_deal=$this->Common_model->get_single_data('deal_of_day',array('d_id'=>$id));
		$image=$get_deal['d_image'];
		$link=unlink('./images/deal/'.$image);

		$result=$this->Common_model->delete(array('d_id'=>$id),'deal_of_day');
		if($result)
		{
			$this->session->set_flashdata('success', 'Success! Deleted Successfully.');
			
		}
		else 
		{
			$this->session->set_flashdata('error', 'Error! Something went wrong, Try again.');
			
		}
		return redirect('deal_of_day');
	}
	public function deleteprice($id)
	{
	    echo $result=$this->Common_model->delete(array('p_id'=>$id),'product_price');
	}
	public function get_sub()
	{
	    $json['sub']='';
		$data_set=$this->Common_model->newgetRows('sub_category',array('cat_id'=>$_REQUEST['val']));
		if(!empty($data_set))
		{
				$json['sub'].= '<option value="">Select</option>';
		        foreach($data_set as $s){
        		$json['sub'] .= '<option value="'.$s['sid'].'">'.$s['sub_cat_name'].'</option>';
        		}
        
        		}
        		else
        		{
        			$json['sub'] .= '<option value="">No sub categories</option>';
        		}
	
		        echo json_encode($json);
	}


}