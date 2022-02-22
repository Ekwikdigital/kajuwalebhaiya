<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Common_model extends CI_Model
{
   function login($email,$password)
   {
		$q = $this->db->query("SELECT * FROM students where s_password='".$password."' AND s_email='".$email."' ");
		$result = $q->result();
		return $result;    
    }	
	 /*---GET SINGLE RECORD---*/
     public function getRows($table,$id = null){
        if(!empty($id)){
            $this->db->where('id',$id);
            $query = $this->db->get($table);
            return $query->row_array();
        }else{
            $query = $this->db->get($table);
            return $query->result_array();
        }
    }
     public function getCart($table,$id = null){
        if(!empty($id)){
            $this->db->where('user_id',$id);
            $query = $this->db->get($table);
            return $query->row_array();
        }else{
            $query = $this->db->get($table);
            return $query->result_array();
        }
    }
    function newgetRows($table,$id=null,$orderby=null,$ordercol=null,$orwhere=null){
    if($id) {
      $this->db->where($id);
    }
    if($orwhere){
            $this->db->or_where($orwhere);
        }
    if($orderby) {
      if($ordercol) {
        $ord='ASC';
      } else {
        $ord='desc';
      }
      $this->db->order_by($orderby, $ord);
    }
        $query = $this->db->get($table);
    if($query->num_rows()) {
      return $query->result_array();
    } else {
      return array();
    }
  }
  public function update($table,$data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update($table, $data, array('id'=>$id));
      //echo $this->db->last_query(); die;
            return $update?true:false;
        }
    else
    {
      
            return false;
        }
    }
    function update_entry($table_name, $data, $where) {
        return $this->db->update($table_name, $data, $where);
    }
    public function get_single_data($table,$id=null){
        if($id) {
            $this->db->where($id);
        }
        $query = $this->db->get($table);
        if($query->num_rows()) {    
            return $query->row_array();
        } else {
            return false;
        }
    }
    function getsingle($table, $where)
    {
        $q = $this->db->get_where($table, $where);
        return $q->row();
    }
	 /*<!--INSERT RECORD FROM SINGLE TABLE-->*/
    function insertData($table, $dataInsert)
    {
        $this->db->insert($table, $dataInsert);
        return $this->db->insert_id();
    }	
	 /*<!--UPDATE RECORD FROM SINGLE TABLE-->*/
    function updateData($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
        return;
    }
	 /*<!--DELETE RECORD FROM SINGLE TABLE-->*/
    function deleteData($table, $where)
    {
        //$this->db->delete('mytable', array('id' => $id));
        $this->db->delete($table, $where);
        return;
    }
    public function get_data($table,$where,$o_c=null,$o_v=null) {
        if($where!=""){
            $this->db->where($where);
        }

        if($o_c && $o_v) {
            $this->db->order_by($o_c,$o_v);
        }

        $obj=$this->db->get($table);
        
        $data = array();
        if($obj->num_rows() > 0) {
            $data = $obj->result_array();
        }
        return $data; 
    }
    public function delete($where,$table) {
        $this->db->where($where);
        $obj=$this->db->delete($table);
        return $obj;  
    }
	 /*<!--GET ALL RECORD FROM SINGLE TABLE WITHOUT CONDITION-->*/
    function getAllrecord($table)
    {
        $this->db->select('*');
        $q = $this->db->get($table);
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
            return $data;
        }
    }
	/*---GET MULTIPLE RECORD---*/
  public function admin_login($data)
  {
    $this->db->where('email',$data['email']);
    $this->db->where('password',$data['password']);
        $query = $this->db->get('admin');
    if($query->num_rows())
    {   
      return $query->row_array();  
    }
    else 
    {   
      return false;
    }
  }
    function getAllwhere($table, $where)
    {
        $this->db->select('*');
        $q = $this->db->get_where($table, $where);
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
            return $data;
        }
    }
	function getAllwhere_field($table, $where,$filed)
    {
        $this->db->select($filed);
        $q = $this->db->get_where($table, $where);
        $num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
            return $data;
        }
    }
	function total_students()
    {
    	$q=$this->db->query("SELECT * from students where s_status='1'");
    	$result=$q->num_rows();
    	return $result;
    }
	function total_teachers()
	{
		$q=$this->db->query("SELECT * from teacher where t_status='1'");
    	$result=$q->num_rows();
    	return $result;
	}
	function total_courses()
	{
		$q=$this->db->query("SELECT * from courses where course_status='1' and course_deleted='0'");
    	$result=$q->num_rows();
    	return $result;
	}
	function fetch_data($table, $condition, $pkey, $sort, $limit, $page) 
	{
		$offset = ($page == 1) ? 0 : $limit*($page - 1);
		$this->db->select('*');
		$this->db->from($table);
		if($condition)
		{
			$this->db->where($condition);
		}
		$this->db->limit($limit, $offset);
		$this->db->order_by($pkey, $sort);
		$query = $this->db->get();
		if ($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}
	function record_count($table,$where='') 
	{		
		$this->db->from($table);
		if($where!=''){
		$this->db->where($where);
		}
		return $this->db->count_all_results();		
	}
        function alldataorder($table,$order_by,$orderby_field) {
         
        if (!empty($order_by) && !empty($orderby_field)) 
        {
            $this->db->order_by($orderby_field, $order_by);
        }
        $query = $this->db->get($table);
        return $query->result_array();
    }
	function getAllwhere_pagination($table,$limit,$start,$where='',$order="",$type="")
    {
        $this->db->select('*'); 
		$this->db->from($table);
		if($where!=''){
			$this->db->where($where);
		}
		if($order!="")
		{
			$this->db->order_by($order, $type);
		}
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result(); 
    }
	function all_courses()
	{
		$q = $this->db->query("SELECT * FROM courses where course_status='1' AND course_deleted='0'");
		$result = $q->result();
		return $result;    
    }
	
	function fetch_course($id,$limit="")
    {
        $q = $this->db->query("SELECT * from courses where s_id=".$id." and c_status=1 order by c_id desc limit $limit");
		return $q->result_array();
    }
    function fetch_load_course($id,$sid)
    {
        $q = $this->db->query("SELECT * FROM courses WHERE c_id < ".$id." and s_id=".$sid." ORDER BY c_id DESC");
        $result=$q->num_rows();
        return $result;
    }
    function fetch_all_course($id,$sid,$showLimit)
    {
        $q = $this->db->query("SELECT * FROM courses WHERE c_id < ".$id." and s_id=".$sid." ORDER BY c_id DESC limit ".$showLimit."");
        return $q->result_array();
    }
    function fetch_kids_skills()
    {
        $q = $this->db->query("SELECT * FROM skills WHERE s_status=1 and s_option=1 or s_option=3");
        return $q->result_array();
    }
    function get_users_email($id,$email)
    {
        $q = $this->db->query("SELECT * FROM users WHERE email='".$email."' and id!=".$id."");
        $result=$q->num_rows();
        return $result;
    }
    function get_users_tele($id,$tele)
    {
        $q = $this->db->query("SELECT * FROM users WHERE telephone='".$tele."' and id!=".$id."");
        $result=$q->num_rows();
        return $result;
    }
    function get_categories_top()
    {
        $q = $this->db->query("SELECT * FROM category where cat_status = 1 ORDER By cid ASC LIMIT 5");
        return $q->result_array();
    }
    function get_categories_bottom()
    {
        $q = $this->db->query("SELECT * FROM `category` where cat_status = 1 ORDER By cid ASC LIMIT 5 OFFSET 5");
        return $q->result_array();
    }
    function get_subcategory($catid)
    {
        $q = $this->db->query("SELECT * FROM `sub_category` where cat_id=$catid and sub_cat_status=1 ORDER By sid desc");
        return $q->result_array();
    }
    function get_top_pack()
    {
        $q = $this->db->query("SELECT * FROM `pack_of_two` where pack_status=1 order by pack_id DESC limit 3 offset 3;");
        return $q->result_array();
    }
	function get_bottom_pack()
	{
	    $q = $this->db->query("SELECT * FROM `pack_of_two` where pack_status=1 order by pack_id DESC limit 3");
        return $q->result_array();
	}
	function get_all_price($id)
	{
	    $q = $this->db->query("SELECT * FROM product_price WHERE product_id=$id and type=2 order by p_id asc");
        return $q->result_array();
	}
	function get_cat_weight($id,$type)
	{
	    $q = $this->db->query("SELECT * FROM product_price WHERE product_id=$id and type=$type order by p_id asc");
        return $q->result_array();
	}
	function get_product_price($id)
	{
	    $q = $this->db->query("SELECT * FROM product_price WHERE product_id=$id and type=1 order by p_id asc");
        return $q->result_array();
	}
	function get_cat_price($id,$type)
	{
	    $q = $this->db->query("SELECT * FROM `product_price` where product_id=$id and type=$type order by p_id asc limit 1");
        return $q->result_array();
	}
	function get_price($id)
	{
	    $q = $this->db->query("SELECT * FROM `product_price` where product_id=$id and type=2 order by p_id asc limit 1");
        return $q->result_array();
	}
	function get_prices($id)
	{
	    $q = $this->db->query("SELECT * FROM `product_price` where product_id=$id and type=1 order by p_id asc limit 1");
        return $q->result_array();
	}
	function get_packed_product()
	{
	    $q = $this->db->query("SELECT * FROM `pack_of_two` order by pack_id DESC;");
        return $q->result_array();
	}
	function get_product()
	{
	    $q = $this->db->query("SELECT * FROM `product` order by pid DESC;");
        return $q->result_array();
	}
	function get_bottom_top()
	{
	    $q = $this->db->query("SELECT * FROM product WHERE p_status = 1 and top_sell=1 ORDER BY pid DESC limit 3");
	    return $q->result_array();
	}
	function get_top()
	{
	    $q = $this->db->query("SELECT * FROM `product` where p_status=1 and top_sell=1 order by pid DESC limit 3 offset 3");
	    return $q->result_array();
	    
	}
	function get_bottom_popular()
	{
	    $q = $this->db->query("SELECT * FROM product WHERE p_status = 1 and popular=1 ORDER BY pid DESC limit 3");
	    return $q->result_array();
	}
	function get_top_popular()
	{
	    $q = $this->db->query("SELECT * FROM `product` where p_status=1 and popular=1 order by pid DESC limit 3 offset 3");
	    return $q->result_array();
	}
	function get_popular_categories()
	{
	    $q = $this->db->query("select * from category where cat_status = 1 and cat_popular = 1 order by cid  DESC limit 4");
	    return $q->result_array();
	}
	function get_all_catgories()
	{
	    $q = $this->db->query("select * from category where cat_status = 1 order by cid ASC limit 5");
	    return $q->result_array();
	}
	function get_all_sub_product($sid)
	{
	    $q = $this->db->query("SELECT * FROM product WHERE product_sub_cat=$sid and p_status=1 UNION SELECT * FROM pack_of_two WHERE product_sub_cat=$sid and pack_status=1 order by pid DESC");
	    return $q->result_array();
	}
	function get_discount_sub_product($id)
	{
	    $q = $this->db->query("(SELECT * FROM `product` WHERE `product_sub_cat` = $id and p_status=1 and p_discount!=0 ORDER BY `p_discount` DESC) UNION SELECT * FROM pack_of_two WHERE product_sub_cat=$id and pack_status=1 and pack_discount!=0");
	    return $q->result_array();
	}
	function get_pop_sub_product($cid)
	{
	    $q = $this->db->query("(SELECT * FROM `product` WHERE `product_sub_cat` = $cid and p_status=1 and popular=1 ORDER BY `pid` DESC) UNION SELECT * FROM pack_of_two WHERE product_sub_cat=$cid and pack_status=1 and pack_popular=1;");
	    return $q->result_array();
	}
	function get_above_sub_discount($cid,$start)
	{
	    $q = $this->db->query("(SELECT * FROM `product` WHERE `product_sub_cat` = $cid and p_status=1 and p_discount >= $start ORDER BY `pid` DESC) UNION SELECT * FROM pack_of_two WHERE product_sub_cat=$cid and pack_status=1 and pack_discount >= $start");
	    return $q->result_array();
	}
	function get_discount_sub_products($cid,$start,$end)
	{
	    $q = $this->db->query("(SELECT * FROM `product` WHERE `product_sub_cat` = $cid and p_status=1 and p_discount BETWEEN $start AND $end ORDER BY `pid` DESC) UNION SELECT * FROM pack_of_two WHERE product_sub_cat=$cid and pack_status=1 and pack_discount BETWEEN $start AND $end");
	    return $q->result_array();
	}
	function get_all_cat_product($cid)
	{
	    $q = $this->db->query("SELECT * FROM product WHERE product_cat=$cid and p_status=1 UNION SELECT * FROM pack_of_two WHERE product_cat=$cid and pack_status=1 order by pid DESC");
	    return $q->result_array();
	}
	public function get_cat_packtwo($cat,$pproduct_id)
	{
	    $q = $this->db->query("SELECT * FROM pack_of_two WHERE product_cat=$cat and pack_status=1 and pack_product_id!=$pproduct_id order by pack_id DESC limit 7");
	    return $q->result_array();
	}
	public function get_cat_productdetail($cat,$pproduct_id)
	{
	    $q = $this->db->query("SELECT * FROM product WHERE product_cat=$cat and p_status=1 and product_id!=$pproduct_id order by pid DESC limit 7");
	    return $q->result_array();
	}
	function get_discount_cat_product($cid)
	{
	    $q = $this->db->query("(SELECT * FROM `product` WHERE `product_cat` = $cid and p_status=1 and p_discount!=0 ORDER BY `p_discount` DESC) UNION SELECT * FROM pack_of_two WHERE product_cat=$cid and pack_status=1 and pack_discount!=0");
	    return $q->result_array();
	}
	function get_discountproducts($cid,$start,$end)
	{
	    $q = $this->db->query("(SELECT * FROM `product` WHERE `product_cat` = $cid and p_status=1 and p_discount BETWEEN $start AND $end ORDER BY `pid` DESC) UNION SELECT * FROM pack_of_two WHERE product_cat=$cid and pack_status=1 and pack_discount BETWEEN $start AND $end");
	    return $q->result_array();
	}
	function get_above_discount($cid,$start)
	{
	    $q = $this->db->query("(SELECT * FROM `product` WHERE `product_cat` = $cid and p_status=1 and p_discount > $start ORDER BY `pid` DESC) UNION SELECT * FROM pack_of_two WHERE product_cat=$cid and pack_status=1 and pack_discount > $start");
	    return $q->result_array();
	}
	function get_pop_cat_product($cid)
	{
	    $q = $this->db->query("(SELECT * FROM `product` WHERE `product_cat` = $cid and p_status=1 and popular=1 ORDER BY `pid` DESC) UNION SELECT * FROM pack_of_two WHERE product_cat=$cid and pack_status=1 and pack_popular=1;");
	    return $q->result_array();
	}
	function get_user_cart($id)
	{
	    $q = $this->db->query("SELECT * FROM cart WHERE user_id=$id and buy=0 order by id desc");
	    return $q->result_array();
	}
	function getusercart($id)
	{
	    $q = $this->db->query("SELECT * FROM cart WHERE user_id=$id and buy=1 order by id desc limit 1");
	    return $q->result_array();
	}
	function get_sum_price($id)
	{
	    $q = $this->db->query("SELECT SUM(replace(price, ',', '')) as price FROM cart where user_id=$id and buy=0");
	    return $q->result_array();
	}
	function getsumprice($id)
	{
	    $q = $this->db->query("SELECT SUM(replace(price, ',', '')) as price FROM cart where user_id=$id and buy=1 order by id desc limit 1");
	    return $q->result_array();
	}
	function get_sum_discount($id)
	{
	    $q = $this->db->query("SELECT SUM(discount) as discount FROM cart where user_id=$id");
	    return $q->result_array();
	}
	function get_user_address($id)
	{
	     $q = $this->db->query("SELECT * FROM address where user_id=$id");
	    return $q->result_array();
	}
	function get_user_orders($id)
	{
	    $q = $this->db->query("SELECT * FROM orders where user_id=$id");
	    return $q->result_array();
	}
	function get_all_testimonial()
	{
	    $q = $this->db->query("SELECT * FROM reviews order by id desc limit 6");
	    return $q->result_array();
	}
	function get_average_review($pid)
	{
	    $q = $this->db->query("SELECT AVG(u_rate) as rates FROM reviews WHERE p_id=$pid");
	    return $q->result_array();
	}
	function get_discount_product($deal)
	{
	    $q = $this->db->query("SELECT * FROM product WHERE p_discount=$deal and p_status=1 UNION SELECT * FROM pack_of_two WHERE pack_discount=$deal and pack_status=1 order by pid DESC");
	    return $q->result_array();
	}
	function get_total_orders()
	{
	    $q = $this->db->query("SELECT COUNT(*) as count FROM `orders`");
	    return $q->result_array();
	    
	}
	function get_total_users()
	{
	    $q = $this->db->query("SELECT COUNT(*) as count FROM `users`");
	    return $q->result_array();
	}
	function get_total_products()
	{
	    $q = $this->db->query("SELECT COUNT(*) as total FROM product WHERE p_status=1");
	    return $q->result_array();
	}
	function get_total_review()
	{
	     $q = $this->db->query("SELECT COUNT(*) as total FROM reviews");
	     return $q->result_array();
	}
	function getrows_search($search)
	{
	    $q = $this->db->query("SELECT * FROM product WHERE p_name like '%".$search."%' and p_status=1 UNION SELECT * FROM pack_of_two WHERE pack_name like '%".$search."%' and pack_status=1 order by pid DESC");
	     return $q->result_array();
	}
	function get_discountsearch($search,$start,$end)
	{
	    $q = $this->db->query("SELECT * FROM product WHERE p_name like '%".$search."%' and p_status=1 and p_discount BETWEEN $start AND $end UNION SELECT * FROM pack_of_two WHERE pack_name like '%".$search."%' and pack_status=1 and pack_discount BETWEEN $start AND $end order by pid DESC");
	     return $q->result_array();
	}
		function get_discountabove($search,$start)
	{
	    $q = $this->db->query("SELECT * FROM product WHERE p_name like '%".$search."%' and p_status=1 and p_discount >= $start UNION SELECT * FROM pack_of_two WHERE pack_name like '%".$search."%' and pack_status=1 and pack_discount>= $start order by pid DESC");
	     return $q->result_array();
	}
	function get_cat_all()
	{
	    $q = $this->db->query("SELECT * FROM category where cat_status = 1 ORDER By cid ASC");
	    return $q->result_array();
	}
	function get_product_review($pid)
	{
	    $q = $this->db->query("SELECT * FROM reviews where p_id = $pid ORDER By id DESC limit 3");
	     return $q->result_array();
	}
	function get_total_reviews($pid)
	{
	    $q = $this->db->query("SELECT COUNT(*) as total FROM reviews where p_id = $pid ORDER By id DESC");
	     return $q->result_array();
	}
	function fetch_review_num($id,$pid)
    {
        $q = $this->db->query("SELECT * FROM reviews WHERE id < ".$id." and p_id = $pid ORDER BY id DESC");
        $result=$q->num_rows();
        return $result;
    }
    function fetch_all_review($id,$showLimit,$pid)
    {
        $q = $this->db->query("SELECT * FROM reviews WHERE id < ".$id."  and p_id = $pid ORDER BY id DESC limit ".$showLimit."");
        return $q->result_array();
    }

}