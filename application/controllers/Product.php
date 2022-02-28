<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller
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
		
	public function product($id)
	{
	    $result['detail'] = $this->common_model->get_single_data('pack_of_two',array('pack_product_id'=>$id));
	    $this->load->view('site/pack_two',$result);
    }
    function get_price($id)
	{
	    $val=$this->input->post('val');
	    $type=$this->input->post('type');
	    
	    $json['sub']='';
	    
        $price = $this->common_model->get_single_data('product_price',array('product_id'=>$id,'weight'=>$val,'type'=>$type));
        $old_price=$price['price'];
        if($type==1)
        {
             $product = $this->common_model->get_single_data('product ',array('pid'=>$id));
             $discount=$product['p_discount'];
        }
        else
        {
            $pack = $this->common_model->get_single_data('pack_of_two ',array('pack_id'=>$id));
            $discount=$pack['pack_discount'];
        }
        
        if($discount==0)
        {
            $price1=number_format($old_price);
            $json['sub']= '<span class="price-new" id="demo" style="font-size:20px;margin-left:10px;"><i class="fa fa-inr rs-sym"></i> '.$price1.' </span>';
            $json['price'] =$price1; 
        }
        else{
            $price1 = $old_price - ($old_price * $discount / 100);
            $price2= number_format($price1);
            $json['sub']='<span class="price-new" id="demo" style="font-size:20px;margin-left:10px;"><i class="fa fa-inr rs-sym"></i> '.$price2.' </span>';
            $json['sub'] .='<span class="price-old" id="new" style="font-size:20px;"><i class="fa fa-inr rs-sym"></i> '.number_format($old_price).'</span>';
            $json['sub'] .='<span class="sale sale-percentage" style="font-size:20px;z-index:-1">'.$discount.'% Off</span></span>';
            $json['price'] =$price2;
        }
		echo json_encode($json);
	}
	public function product_detail($id){
	    $result['detail'] = $this->common_model->get_single_data('product',array('product_id'=>$id));
		$this->load->view('site/product_detail',$result);
	}
	public function checkzipcode($post_data)
	{
	    $pincodes = $this->common_model->get_single_data('allindiapincode',array('pincode'=>$post_data));
	    if($pincodes)
	    {
	        $json['status']= 1;
	    }
	    else
	    {
	        $json['status']= 0;
	    }
	    echo json_encode($json);
	}
	public function sub_products($id)
	{
	    $result['sub_category'] = $this->common_model->get_single_data('sub_category',array('cat_sub_id'=>$id));
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
	            $result['products'] = $this->common_model->get_above_sub_discount($result['sub_category']['sid'],$start);
	        }
	        else
	        {
	             $result['products'] = $this->common_model->get_discount_sub_products($result['sub_category']['sid'],$start,$end1);
	        }
    	       

	    }
	    else if($sortby && $order)
	    {
	        if($sortby=='discount')
	        {
	            $result['products'] = $this->common_model->get_discount_sub_product($result['sub_category']['sid']);
	        }
	        else if($sortby=='top')
	        {
	            $result['products'] = $this->common_model->get_all_sub_product($result['sub_category']['sid']);
	        }
	        else if($sortby=='popular')
	        {
	            $result['products'] = $this->common_model->get_pop_sub_product($result['sub_category']['sid']);
	        }
	    }
	    else
	    {
	         $result['products'] = $this->common_model->get_all_sub_product($result['sub_category']['sid']);
	    }
	    
	    
	    $this->load->view('site/sub_products',$result);
	}
	public function add_cart(){
	    $pid = $this->input->post('pid');
	    $new=$this->input->post('carts');
	    $weight = $this->input->post('weight');
	    $price = $this->input->post('price');
	    $name= $this->input->post('name');
	    $image= $this->input->post('image');
	    $type =$this->input->post('type');
	    $qty = $this->input->post('qty');
	    $ids = $this->input->post('id');
        
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
    		    'quantity'=>$qty,
    		    'type'=>$type
			);
		}

		$result=$this->common_model->insertData('cart',$insert_arr);
		
		//$this->session->set_userdata('datas',$insert_arr);
        
		
	    $this->session->set_userdata('cart',$cart);
	    
	    //$this->session->set_userdata('ids',$pid);
	    
		$json['sub'] = '<span id="cart-total">'.$cart.'</span>';
		$json['btn'] = '<a href="'.base_url().'shopping-cart"><button type="button" id="button-cart" data-loading-text="Loading..." class="btn btn-primary addtoCart-Btn">View Cart</button> </a><button type="button" id="button-buy-now" data-loading-text="Loading..." class="btn btn-primary buy_now-Btn">BUY NOW</button>';
		$json['alert'] = '<div class="alert alert-success cart-added-success-message"><img src="'.$image.'" style="width:50px;height:50px;" class="img-responsive cart-alert-notification">You have added 1 product <a href="'.base_url().'shopping-cart" class="wishlist-view-link">View</a><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div>';
		$json['cart'] = $cart;

	
		echo json_encode($json);
}
function cat_Cart()
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
		
		//$this->session->set_userdata('datas',$insert_arr);
        
		
	    $this->session->set_userdata('cart',$cart);
	    
	    //$this->session->set_userdata('ids',$pid);
	    
		$json['sub'] = '<span id="cart-total">'.$cart.'</span>';
		$json['btn'] = '<a href="'.base_url().'shopping-cart"><button class="buttons">View Cart </button> </a>';
		$json['alert'] = '<div class="alert alert-success cart-added-success-message"><img src="'.$image.'" style="width:50px;height:50px;" class="img-responsive cart-alert-notification">You have added 1 product <a href="'.base_url().'shopping-cart" class="wishlist-view-link">View</a><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div>';
		$json['cart'] = $cart;

	
		echo json_encode($json);
}
	public function buy_now(){
	    $pid = $this->input->post('pid');
	    $new=$this->input->post('carts');
	    $weight = $this->input->post('weight');
	    $price = $this->input->post('price');
	    $name= $this->input->post('name');
	    $image= $this->input->post('image');
	    $type =$this->input->post('type');
	    $qty = $this->input->post('qty');
        
		//$cart=$new+1;
		
		$carts = $this->common_model->get_single_data('cart',array('product_id'=>$pid,'user_id'=>$this->session->userdata('u_id'),'buy'=>1));
		
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
    		    'quantity'=>$qty,
    		    'type'=>$type,
    		    'buy'=>1
			);
		}

		$result=$this->common_model->insertData('cart',$insert_arr);

		
		//$this->session->set_userdata('datas',$insert_arr);
        
		
	    $this->session->set_userdata('cart',$cart);
	    
		echo json_encode($json);
}
}