<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends CI_Controller
{
	public function __construct() {
		parent::__construct(); 
		date_default_timezone_set('UTC');
		$this->load->model('common_model');
		error_reporting(0);
		$this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->library("cart");
        require_once('application/libraries/Instamojo.php');

	}
		
	public function index(){
	    $pid = $this->input->post('pid');
	    $new=$this->input->post('carts');
	    $weight = $this->input->post('weight');
	    $price = $this->input->post('price');
	    $name= $this->input->post('name');
	    $image= $this->input->post('image');
	    $type =$this->input->post('type');
        
        $carts = $this->common_model->get_user_cart($this->session->userdata['u_id']);
		
		$cart=count($carts)+1;
		
		$today= date('Y-m-d h:i:s');
		
		
		
		
		if($this->session->userdata('u_id'))
		{
		    $insert_arr = array(
    		    'product_id' => $pid,
    		    'price' => $price,
    		    'weight' => $weight,
    		    'product_name' => $name,
    		    'product_image' => $image,
    		    'date' => $today,
    		    'user_id' => $this->session->userdata('u_id'),
    		    'quantity'=>1,
    		    'type'=>$type
			);
		}

		$result=$this->common_model->insertData('cart',$insert_arr);
		
		//$this->session->set_userdata('datas',$insert_arr);
        
		
	    $this->session->set_userdata('cart',$cart);
	    
	    //$this->session->set_userdata('ids',$pid);
	    
		$json['sub'] = '<span id="cart-total">'.$cart.'</span>';
		$json['btn'] = '<a href="'.base_url().'shopping-cart"><button class="buttons">View Cart </button> </a>';
		$json['alert'] = '<div class="alert alert-success cart-added-success-message"><img src="'.$image.'" style="width:50px;height:50px;" class="img-responsive cart-alert-notification">You have added 1 product <a href="'.base_url().'shopping-cart" class="wishlist-view-link">View</a><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div>';
		$json['cart'] = $cart;

	
		echo json_encode($json);
}
public function viewcarts()
{
        print_r($this->session->userdata('datas'));
}
public function top_cart()
{
 
    $pid = $this->input->post('pid');
	    $new=$this->input->post('carts');
	    $weight = $this->input->post('weight');
	    $price = $this->input->post('price');
	    $name= $this->input->post('name');
	    $image= $this->input->post('image');
	    $type =$this->input->post('type');
        
		//$cart=$new+1;
		
		$today= date('Y-m-d h:i:s');
		
		$carts = $this->common_model->get_user_cart($this->session->userdata['u_id']);
		
		$cart=count($carts)+1;
		
		if($this->session->userdata('u_id'))
		{
		    $insert_arr = array(
    		    'product_id' => $pid,
    		    'price' => $price,
    		    'weight' => $weight,
    		    'product_name' => $name,
    		    'product_image' => $image,
    		    'date' => $today,
    		    'user_id' => $this->session->userdata('u_id'),
    		    'quantity'=>1,
    		    'type'=>$type
			);
		}
		$result=$this->common_model->insertData('cart',$insert_arr);
		
	    $this->session->set_userdata('cart',$cart);
		$json['sub'] = '<span id="cart-total">'.$cart.'</span>';
		$json['btn'] = '<a href="'.base_url().'shopping-cart"><button class="buttons" style="background-color: #FF7F50;">View Cart </button> </a>';
		$json['cart'] = $cart;
		$json['btn'] = '<a href="'.base_url().'shopping-cart"><button class="buttons" style="background-color: #FF7F50;">View Cart </button> </a>';
		$json['alert'] = '<div class="alert alert-success cart-added-success-message"><img src="'.$image.'" style="width:50px;height:50px;" class="img-responsive cart-alert-notification">You have added 1 product <a href="'.base_url().'shopping-cart" class="wishlist-view-link">View</a><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div>';
		echo json_encode($json);
}
public function popular_cart()
{
    $pid = $this->input->post('pid');
	    $new=$this->input->post('carts');
	    $weight = $this->input->post('weight');
	    $price = $this->input->post('price');
	    $name= $this->input->post('name');
	    $image= $this->input->post('image');
	    $type =$this->input->post('type');
        
		//$cart=$new+1;
		$carts = $this->common_model->get_user_cart($this->session->userdata['u_id']);
		
		$cart=count($carts)+1;
		
		$today= date('Y-m-d h:i:s');
		
		if($this->session->userdata('u_id'))
		{
		    $insert_arr = array(
    		    'product_id' => $pid,
    		    'price' => $price,
    		    'weight' => $weight,
    		    'product_name' => $name,
    		    'product_image' => $image,
    		    'date' => $today,
    		    'user_id' => $this->session->userdata('u_id'),
    		    'quantity'=>1,
    		    'type'=>$type
			);
		}
		$result=$this->common_model->insertData('cart',$insert_arr);
		
		
	    $this->session->set_userdata('cart',$cart);
		$json['sub'] = '<span id="cart-total">'.$cart.'</span>';
		$json['btn'] = '<a href="'.base_url().'shopping-cart"><button class="buttons" style="background-color: #006400;">View Cart </button> </a>';
		$json['alert'] = '<div class="alert alert-success cart-added-success-message"><img src="'.$image.'" style="width:50px;height:50px;" class="img-responsive cart-alert-notification">You have added 1 product <a href="'.base_url().'shopping-cart" class="wishlist-view-link">View</a><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div>';
		$json['cart'] = $cart;

	
		echo json_encode($json);
}
public function cart_list()
{
    if($this->session->userdata('u_id'))
    {
        $this->load->view('site/cart');
    }
    else
    {
        redirect('login');
    }
    
}
public function update_cart($id)
{
    $qty = $this->input->post('quantity');
    $price = $this->input->post('price');
    $pid = $this->input->post('product_id');
    $type = $this->input->post('type');
    $weight = $this->input->post('weight');
    
    if($type==1)
    {
        $product = $this->common_model->get_single_data('product',array('product_id'=>$pid));
    
        $ids = $product['pid'];
        $price = $this->common_model->get_prices($ids); 
                
                $old_price=$price[0]['price'];
                $discount=$product['p_discount'];
                if($discount==0)
                {
                    $price1=$old_price;
                    $discount1 = 0;
                  } else{ 
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $discount1 = $discount;
                     
                    }
    }
    else
    {
         $product = $this->common_model->get_single_data('pack_of_two',array('pack_product_id'=>$pid));
         $ids = $product['pack_id'];
         $price = $this->common_model->get_price($ids); 
                
                $old_price=$price[0]['price'];
                $discount=$product['pack_discount'];
                if($discount==0)
                {
                    $price1=$old_price;
                    $discount1 = 0;
                  } else{ 
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $discount1 = $discount;

                     
                    }
    }
    if($qty==1)
    {
        $new_priceq = number_format($price1);
    }
    else
    {
         $new_price = $qty*$price1;
         $new_priceq = number_format($new_price);
    }
   

                    $update_array = array(
							'price' => $new_priceq,
							'quantity'=>$qty,
							'discount' => $discount1,
							'old_price' => $old_price
					);  
					
					$where_array=array('id'=>$id); 

					$result=$this->common_model->update_entry('cart',$update_array,$where_array);
				
					if($result)
					{
					    $this->session->set_flashdata('success','Success! Your cart has been modified!');
			            redirect('shopping-cart');
					}
					else
					{
					    $this->session->set_flashdata('error','Error! Something went wrond. Please try again in a while!');
			            redirect('shopping-cart');
					}
    
}
public function delete_cart($pid)
{
  	 echo $result=$this->common_model->delete(array('id'=>$pid),'cart');
}
public function checkout()
{
    if($this->session->userdata('u_id'))
    {
        $result['states'] = $this->common_model->getRows('state'); 
        $this->load->view('site/checkout',$result);
    }
    else
    {
        redirect('login');
    }
}
public function updateaddress()
{
    if($this->session->userdata('u_id'))
    {
        $result['states'] = $this->common_model->getRows('state'); 
        $this->load->view('site/update_address',$result);
    }
    else
    {
        redirect('login');
    }
}
public function addressupdate()
{
    if($this->session->userdata('u_id'))
    {
        $result['states'] = $this->common_model->getRows('state'); 
        $this->load->view('site/address_update',$result);
    }
    else
    {
        redirect('login');
    }
}
public function cart_update($id)
{
    $qty = $this->input->post('quantity');
    $price = $this->input->post('price');
    $pid = $this->input->post('product_id');
    $type = $this->input->post('type');
    $weight = $this->input->post('weight');
    
    if($type==1)
    {
        $product = $this->common_model->get_single_data('product',array('product_id'=>$pid));
    
        $ids = $product['pid'];
        $price = $this->common_model->get_prices($ids); 
                
                $old_price=$price[0]['price'];
                $discount=$product['p_discount'];
                if($discount==0)
                {
                    $price1=$old_price;
                    $discount1 = 0;
                  } else{ 
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $discount1 = $discount;
                     
                    }
    }
    else
    {
         $product = $this->common_model->get_single_data('pack_of_two',array('pack_product_id'=>$pid));
         $ids = $product['pack_id'];
         $price = $this->common_model->get_price($ids); 
                
                $old_price=$price[0]['price'];
                $discount=$product['pack_discount'];
                if($discount==0)
                {
                    $price1=$old_price;
                    $discount1 = 0;
                  } else{ 
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $discount1 = $discount;

                     
                    }
    }
    if($qty==1)
    {
        $new_priceq = number_format($price1);
    }
    else
    {
         $new_price = $qty*$price1;
         $new_priceq = number_format($new_price);
    }
   

                    $update_array = array(
							'price' => $new_priceq,
							'quantity'=>$qty,
							'discount' => $discount1,
							'old_price' => $old_price
					);  
					
					$where_array=array('id'=>$id); 

					$result=$this->common_model->update_entry('cart',$update_array,$where_array);
				
					if($result)
					{
					    $this->session->set_flashdata('success','Success! Your cart has been modified!');
			            redirect('checkout');
					}
					else
					{
					    $this->session->set_flashdata('error','Error! Something went wrond. Please try again in a while!');
			            redirect('checkout');
					}
}
public function update($id)
{
    $qty = $this->input->post('quantity');
    $price = $this->input->post('price');
    $pid = $this->input->post('product_id');
    $type = $this->input->post('type');
    $weight = $this->input->post('weight');
    
    if($type==1)
    {
        $product = $this->common_model->get_single_data('product',array('product_id'=>$pid));
    
        $ids = $product['pid'];
        $price = $this->common_model->get_prices($ids); 
                
                $old_price=$price[0]['price'];
                $discount=$product['p_discount'];
                if($discount==0)
                {
                    $price1=$old_price;
                    $discount1 = 0;
                  } else{ 
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $discount1 = $discount;
                     
                    }
    }
    else
    {
         $product = $this->common_model->get_single_data('pack_of_two',array('pack_product_id'=>$pid));
         $ids = $product['pack_id'];
         $price = $this->common_model->get_price($ids); 
                
                $old_price=$price[0]['price'];
                $discount=$product['pack_discount'];
                if($discount==0)
                {
                    $price1=$old_price;
                    $discount1 = 0;
                  } else{ 
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $discount1 = $discount;

                     
                    }
    }
    if($qty==1)
    {
        $new_priceq = number_format($price1);
    }
    else
    {
         $new_price = $qty*$price1;
         $new_priceq = number_format($new_price);
    }
   

                    $update_array = array(
							'price' => $new_priceq,
							'quantity'=>$qty,
							'discount' => $discount1,
							'old_price' => $old_price
					);  
					
					$where_array=array('id'=>$id); 

					$result=$this->common_model->update_entry('cart',$update_array,$where_array);
				
					if($result)
					{
					    $this->session->set_flashdata('success','Success! Your cart has been modified!');
			            redirect('quickcheckout');
					}
					else
					{
					    $this->session->set_flashdata('error','Error! Something went wrond. Please try again in a while!');
			            redirect('quickcheckout');
					}
}
public function update_address()
{
    $postcode = $this->common_model->get_single_data('allindiapincode',array('pincode'=>$this->input->post('postcode')));
  $address = $this->common_model->get_single_data('address',array('user_id'=>$this->session->userdata('u_id')));
        if($this->input->post('firstname')=='')
		{
		    $json['msg'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 0;
		}
		else if($this->input->post('lastname')=='')
		{
		    $json['msg1'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 1;
		}
        else if($this->input->post('address_1')=='')
		{
		    $json['msg2'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 2;
		}
		else if($this->input->post('telephone')=='')
		{
			$json['msg6'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 7;
		}
		else if(!preg_match('/^[0-9]{10}+$/', $this->input->post('telephone')))
		{
			$json['msg6'] = '<span style="color:red;">Please enter valid mobile number.</span>';
			$json['status'] = 7;
		}
		else if($this->input->post('postcode')=='')
		{
		    $json['msg4'] = '<span style="color:red;">This field is required.</span>';
			$json['status'] = 4;
		}
		else if(!$postcode)
		{
		    $json['msg4'] = '<span style="color:red;">Delivery is not available for this pincode.</span>';
			$json['status'] = 4;
		}
		else if($this->input->post('city')=='')
		{
			      $json['msg3'] = '<span style="color:red;">This field is required.</span>';
				  $json['status'] = 3;
		}
		
		
		else if($this->input->post('state')=='')
		{
			$json['msg5'] = '<span style="color:red;">Please select a region / state!.</span>';
			$json['status'] = 5;
		}
		else
		{
		    if($address)
		    {
		        $update_array = array(
							'firstname' => $this->input->post('firstname'),
							'lastname'=>$this->input->post('lastname'),
							'address_1' => $this->input->post('address_1'),
							'address_2' => $this->input->post('address_2'),
							'city' => $this->input->post('city'),
							'postcode' => $this->input->post('postcode'),
							'state' => $this->input->post('state'),
							'country' => $this->input->post('country_id'),
							'telephone' => $this->input->post('telephone')
					);  
					
					$where_array=array('id'=>$this->session->userdata('u_id')); 

					$result=$this->common_model->update_entry('address',$update_array,$where_array);
					if($result)
						{
						    $this->session->set_flashdata('success', 'Success! Your address has been updated successfully!');
						    $json['status'] = 6;
						}
		    }
		    else
		    {
		        $today= date('Y-m-d h:i:s');
		   $insert_arr = array(
							'firstname' => $this->input->post('firstname'),
							'lastname'=>$this->input->post('lastname'),
							'address_1' => $this->input->post('address_1'),
							'address_2' => $this->input->post('address_2'),
							'city' => $this->input->post('city'),
							'postcode' => $this->input->post('postcode'),
							'state' => $this->input->post('state'),
							'country' => $this->input->post('country_id'),
							'created' => $today,
							'user_id' => $this->session->userdata('u_id'),
							'telephone' => $this->input->post('telephone')
					);  
					
						$result=$this->common_model->insertData('address',$insert_arr);
						if($result)
						{
						   $this->session->set_flashdata('success', 'Success! Your address has been added successfully!');
						    $json['status'] = 6;
						}
		    }
		   
						
		}
	
					echo json_encode($json);
}
public function orderconfirmation()
{
    if($this->session->userdata('u_id'))
    {
        $user = $this->common_model->get_single_data('users',array('id'=>$this->session->userdata('u_id')));
        $address = $this->common_model->get_single_data('address',array('user_id'=>$this->session->userdata('u_id')));
        $purpose = "Product Payment";
        $email = $user['email'];
        $telephone = $address['telephone'];
        
        $carts = $this->common_model->getusercart($this->session->userdata['u_id']); 
        
        $total = $this->common_model->getsumprice($this->session->userdata('u_id'));
        
        $amount = str_replace(",","",$carts[0]['price']); 
        
        require_once('application/libraries/Instamojo.php');
        
        $api = new Instamojo\Instamojo('d1970c786593490ffc5830dd1839af68', 'aa09fc7f60e3ff3cfa0e32cb0da59380','https://www.instamojo.com/api/1.1/');

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $purpose,
            "amount" => $amount,
            "buyer_name" => $address['firstname'].' '.$address['lastname'],
            "phone" => $telephone,
    		"email" => $email,
            "send_email" => true,
            "send_sms" => true,
            'allow_repeated_payments' => false,
            "redirect_url" => base_url().'thank-you',
            //"webhook" => "https://studentstutorial.com/instamojo/webhook.php"
            ));
        $pay_ulr = $response['longurl'];
        header("Location: $pay_ulr");
        exit();
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }     
    }
    else
    {
        redirect('login');
    }
}
public function confirm_order()
{
    if($this->session->userdata('u_id'))
    {
        $user = $this->common_model->get_single_data('users',array('id'=>$this->session->userdata('u_id')));
        $address = $this->common_model->get_single_data('address',array('user_id'=>$this->session->userdata('u_id')));
        $purpose = "Product Payment";
        $email = $user['email'];
        $telephone = $address['telephone'];
        
        $carts = $this->common_model->get_user_cart($this->session->userdata['u_id']); 
        
        $total = $this->common_model->get_sum_price($this->session->userdata('u_id'));

        $amount = $total[0]['price'];
        
        require_once('application/libraries/Instamojo.php');
        
        $api = new Instamojo\Instamojo('d1970c786593490ffc5830dd1839af68', 'aa09fc7f60e3ff3cfa0e32cb0da59380','https://www.instamojo.com/api/1.1/');

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $purpose,
            "amount" => $amount,
            "buyer_name" => $address['firstname'].' '.$address['lastname'],
            "phone" => $telephone,
    		"email" => $email,
            "send_email" => true,
            "send_sms" => true,
            'allow_repeated_payments' => false,
            "redirect_url" => base_url().'thankyou',
            //"webhook" => "https://studentstutorial.com/instamojo/webhook.php"
            ));
        $pay_ulr = $response['longurl'];
        header("Location: $pay_ulr");
        exit();
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }     
    }
    else
    {
        redirect('login');
    }
}
public function thanks()
{
    if($this->session->userdata('u_id'))
    {
        require_once('application/libraries/Instamojo.php');
        $api = new Instamojo\Instamojo('d1970c786593490ffc5830dd1839af68', 'aa09fc7f60e3ff3cfa0e32cb0da59380','https://www.instamojo.com/api/1.1/');
        $payid = $_GET["payment_request_id"];
        
        if($payid) 
        {
            $response = $api->paymentRequestStatus($payid);
            
            $get_order = $this->common_model->get_single_data('orders',array('pay_id'=>$response['payments'][0]['payment_id']));
            if(!$get_order)
            {
                $carts = $this->common_model->get_user_cart($this->session->userdata['u_id']); 
        
        $i=0;
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $order_ref_number = substr(str_shuffle($permitted_chars), 0, 12);
        $today= date('Y-m-d h:i:s');
        
        foreach ($carts as $key ) {
           $data1=array(
            'user_id'=>$this->session->userdata('u_id'),
            'order_id'=>$order_ref_number,
            'pay_id'=>$response['payments'][0]['payment_id'],
            'product_id'=>$carts[$i]['product_id'],
            'product_name'=>$carts[$i]['product_name'],
            'amount'=>$carts[$i]['price'],
            'weight'=>$carts[$i]['weight'],
            'quantity'=>$carts[$i]['quantity'],
            'product_image'=>$carts[$i]['product_image'],
            'status'=>'Credit',
            'creation_date'=>$today
               );
         $query = $this->common_model->insertData('orders',$data1);

          $idd= $carts[$i]['id'];
          $this->common_model->delete(array('id'=>$idd),'cart');
         $i++;
                
            }
            }

        }
        $this->load->view('site/thankyou');
    }
    else
    {
        redirect('login');
    }
}
public function thank_you()
{
    if($this->session->userdata('u_id'))
    {
        require_once('application/libraries/Instamojo.php');
        $api = new Instamojo\Instamojo('d1970c786593490ffc5830dd1839af68', 'aa09fc7f60e3ff3cfa0e32cb0da59380','https://www.instamojo.com/api/1.1/');
        $payid = $_GET["payment_request_id"];
        
        if($payid) 
        {
            $response = $api->paymentRequestStatus($payid);
            
            $get_order = $this->common_model->get_single_data('orders',array('pay_id'=>$response['payments'][0]['payment_id']));
            if(!$get_order)
            {
                $carts = $this->common_model->getusercart($this->session->userdata['u_id']); 
        
        $i=0;
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $order_ref_number = substr(str_shuffle($permitted_chars), 0, 12);
        $today= date('Y-m-d h:i:s');
        
        foreach ($carts as $key ) {
           $data1=array(
            'user_id'=>$this->session->userdata('u_id'),
            'order_id'=>$order_ref_number,
            'pay_id'=>$response['payments'][0]['payment_id'],
            'product_id'=>$carts[$i]['product_id'],
            'product_name'=>$carts[$i]['product_name'],
            'amount'=>$carts[$i]['price'],
            'weight'=>$carts[$i]['weight'],
            'quantity'=>$carts[$i]['quantity'],
            'product_image'=>$carts[$i]['product_image'],
            'status'=>'Credit',
            'creation_date'=>$today
               );
         $query = $this->common_model->insertData('orders',$data1);

          $idd= $carts[$i]['id'];
          $this->common_model->delete(array('id'=>$idd),'cart');
         $i++;
                
            }
            }

        }
        $this->load->view('site/thankyou');
    }
    else
    {
        redirect('login');
    }
}
public function quickcheckout()
{
    if($this->session->userdata('u_id'))
    {
        $result['states'] = $this->common_model->getRows('state'); 
        $this->load->view('site/quickcheckout',$result);
    }
    else
    {
        redirect('login');
    }
}
}