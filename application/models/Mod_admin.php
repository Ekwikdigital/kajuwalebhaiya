<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mod_admin extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function serviesorder($id){


        $this->db->select("*");

        $this->db->from('service_orders');


$this->db->where('order_ref_number',$id);
        $query = $this->db->get();
 
        return $query->result();

    }
    public function orderdetails($id){


        $this->db->select("*");

        $this->db->from('order_product');


$this->db->where('order_ref_number',$id);
        $query = $this->db->get();
 
        return $query->result();

    } 
     public function allservies(){


        $this->db->select("*");

        $this->db->from('services');
        $query = $this->db->get();

        return $query->result();

    }
    public function allp(){


        $this->db->select("*");

        $this->db->from('service_product');

        

        $query = $this->db->get();

        return $query->result();

    }
     public function orderdetaildds($id){


        $this->db->select("*");

        $this->db->from('orders_paytm');


$this->db->where('order_id',$id);
        $query = $this->db->get();
 
        return $query->result();

    }
     public function categoryone1($id){


        $this->db->select("*");

        $this->db->from('category');


$this->db->where('id',$id);
        $query = $this->db->get();

        return $query->row();

    }
    function product_insert($data) {
   

    $this->db->insert('product',$data);
    return ($this->db->affected_rows() != 1) ? false : true;
}

    public function get_last_record(){
    $query ="select * from product order by pid DESC limit 1";
$res = $this->db->query($query);
return $res->result();
}
public function get_last_record_pack()
{
  $query ="select * from pack_of_two order by pack_id DESC limit 1";
$res = $this->db->query($query);
return $res->result();
}

public function get_last_record_cat()
{
  $query ="select * from category order by cid DESC limit 1";
$res = $this->db->query($query);
return $res->result();
}
public function get_last_record_subcat()
{
  $query ="select * from sub_category order by sid DESC limit 1";
$res = $this->db->query($query);
return $res->result();
}


 public function categoryfetch(){


        $this->db->select("*");

        $this->db->from('category');

         $this->db->order_by("create_date", "DESC");

        $query = $this->db->get();

        return $query->result();

    }
     public function productfetch(){


        $this->db->select("*");

        $this->db->from('product');

         $this->db->order_by("creaction_date", "DESC");

        $query = $this->db->get();

        return $query->result();

    }
    
     public function productone($id){


        $this->db->select("*");

        $this->db->from('product');


$this->db->where('id',$id);
        $query = $this->db->get();

        return $query->result();

    }
 public function orderf($id){


        $this->db->select("*");

        $this->db->from('service_orders');


$this->db->where('order_ref_number',$id);
        $query = $this->db->get();

        return $query->result();

    }
public function get_all_p($id){


        $this->db->select("*");

        $this->db->from('order_product');


$this->db->where('order_ref_number',$id);
        $query = $this->db->get();

        return $query->result();

    }
  public function get_all_pp($id){


        $this->db->select("*");

        $this->db->from('orders_paytm');


$this->db->where('order_id',$id);
        $query = $this->db->get();

        return $query->result();

    }

   function product_update($data,$id){
$this->db->where('id', $id);
 $query = $this->db->update('product', $data);
  return $query;
}
  function deleteimg( $deleteid)  
      {  
        $query=$this->db->query("SELECT * FROM product where `pid`=$deleteid ");
        $query->row();
        $a=$query->row()->p_image;
        unlink("./thumbnail/".$a);
        
        $query=$this->db->query("UPDATE `product` SET `p_image`='' where `pid`=$deleteid ");
        if($query){
            return 1;

        }
        else{
            return 0;
        }
      }
      function deleteimgpack($deleteid)
      {
        $query=$this->db->query("SELECT * FROM pack_of_two where `pack_id`=$deleteid ");
        $query->row();
        $a=$query->row()->pack_image;
        unlink("./thumbnail/".$a);
        
        $query=$this->db->query("UPDATE `pack_of_two` SET `pack_image`='' where `pack_id`=$deleteid ");
        if($query){
            return 1;

        }
        else{
            return 0;
        }
      }
      function imageepack($id,$image_name)
      {
        $query=$this->db->query("SELECT * FROM pack_of_two where `pack_id`=$id");
        $query->row();
        $a=$query->row()->product_multi_img;
 
       unlink("./thumbnail/multi/".$image_name);

       $aa=explode(',',$a);
    $arr = array_merge(array_diff($aa, array($image_name)));
    $img=implode(',',$arr);
    $query=$this->db->query("UPDATE `pack_of_two` SET `product_multi_img`='$img' where `pack_id`=$id ");
        if($query){
          return 1;

        }
        else{
          return 0;
        }
      }

       function imageea($id,$image_name)   
      {  
        $query=$this->db->query("SELECT * FROM product where `pid`=$id");
        $query->row();
        $a=$query->row()->product_multi_img;
 
       unlink("./thumbnail/multi/".$image_name);

       $aa=explode(',',$a);
    $arr = array_merge(array_diff($aa, array($image_name)));
    $img=implode(',',$arr);
    $query=$this->db->query("UPDATE `product` SET `product_multi_img`='$img' where `pid`=$id ");
        if($query){
          return 1;

        }
        else{
          return 0;
        }
      } 
        function chacke($id) 
      {  
        $query=$this->db->query("SELECT * FROM product where `pid`=$id ");
        return $query->row();
      } 
      function chackepack($id)
      {
        $query=$this->db->query("SELECT * FROM pack_of_two where `pack_id`=$id ");
        return $query->row();
      }
}   