<?php include ("include/header.php") ?>
<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en" class="responsive">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Search - <?php echo $_REQUEST['search']; ?></title>
</head>
<body class="product-category-63045                  no-box-type-7        border-width-0 body-other    body-header-type- product-category">
            <style>
                body{
    background:url(images/whiteleave.jpeg);
  }
                    @media (max-width: 767px){
#mobile-menu-icon{
    z-index:1;
}

}
        @media (max-width: 992px){
#mobile-menu-icon{
  z-index:1;
}
}
.sidenav {
  height: 120%;
  width: 0;
  position: fixed;
  z-index: 500;
  top: 0;
  left: 0;
  background-color: #fff;
  overflow: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: black;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
@media only screen and (min-width: 1200px) {
  #mobile-menu-icon {display:none;}
}
@media (max-width: 767px)
{
.apply-btn-container button, .filter-menu-icon button {
    width:100%;
}
}
        </style> 
          <?php $cat_ids=$_REQUEST['search']; ?>
 <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php $head = $this->common_model->get_cat_all(); 
    foreach($head as $h)
    {
        $sub = $this->common_model->get_subcategory($h['cid']); 
  ?>
<li class="nav-item dropdown" style="list-style:none;font-size:17px;">
    <?php if(sizeof($sub)>0){  ?>
         <a href="<?php echo base_url('products/'.$h['cat_id']); ?>" style="font-size:17px;"><?php echo $h['cat_name']; ?></a>
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" style="font-size:17px;margin-top: -36px;margin-left: 185px;visibility: visible;opacity: 1;">  <i class="fa fa-plus" id="pluses<?php echo $h['cid']; ?>" onclick="return myFunction(<?php echo $h['cid']; ?>)" style="color:black;"></i>
    <i class="fa fa-minus" id="minus<?php echo $h['cid']; ?>" onclick="return myFunction1(<?php echo $h['cid']; ?>)" style="display:none;color:black;"></i>
        </a>
        <div class="dropdown-menu" id="menudrop<?php echo $h['cid']; ?>" aria-labelledby="navbarDropdown" style="min-width: 250px;display:none;">
           <?php foreach($sub as $s) { ?> 
          <a class="dropdown-item" href="<?php echo base_url('allproduct/'.$s['cat_sub_id']); ?>" style="font-size:17px;"><?php echo $s['sub_cat_name']; ?></a>
          <?php } ?>
        </div>
    <?php }else{ ?>
    <a href="<?php echo base_url('products/'.$h['cat_id']); ?>" style="font-size:17px;"><?php echo $h['cat_name']; ?>
        </a>
    <?php } ?>
      </li>
      <?php } ?>
</div>
<div id="mobile-menu-icon"><span style="font-size:30px;cursor:pointer;color:black" onclick="openNav()">&#9776;</span>

<script>
function myFunction(id) { 
          $('#minus'+id).show();
           $('#pluses'+id).hide();
           $('#menudrop'+id).show();
        } 
        function myFunction1(id)
        {
            $('#minus'+id).hide();
           $('#pluses'+id).show();
           $('#menudrop'+id).hide();
        }
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
 document.getElementById('mobile-menu-icon').style.visibility = 'hidden'; 
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById('mobile-menu-icon').style.visibility = 'visible'; 
}
</script>
</div>
<div class="container-fluid splug-container">
    <!-- breadcrum section -->
    <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>image/resize-164310701455515656KWBpngtransparent1.png" style="width:20px;height:20px;"></a></li>
                <li>Search</li>
            </ul>
            <div class="message"></div>
    <!-- breadcrum section -->
    <div id="splug-content" class="row mobile-category-ajax">
        <!-- left bar section -->
                                <aside id="column-left" class="col-sm-3 mob-category-filter ">
                    <div class="filter-sec">
         
<style>

.more-item span.show-btn{
   cursor: pointer
}
.more-item.show-less-menu {
    border-top: 0px ! important;
}
.box-category #accordion-category, .box-category #accordion-category ul{
    margin: 0;
    padding: 0;
    list-style: none;
}
.box-category #accordion-category li.panel{
    border: 0;
    box-shadow: none;
    margin-bottom: 5px;
}
.box-category #accordion-category ul li {
    padding: 5px 10px;
}
.box-no-advanced.box-with-categories .box-heading{
    text-align: center;
}
.accordion-toggle.category-toggle-icon.collapsed, .accordion-toggle.category-toggle-icon {
    float: right;
    text-decoration: none;
    font-size: 20px;
}
.accordion-toggle.category-toggle-icon.collapsed .minus{
    display: none
}
.accordion-toggle.category-toggle-icon.collapsed .plus{
    display: block;
}
.accordion-toggle.category-toggle-icon .plus{
    display: none;
}
.accordion-toggle.category-toggle-icon .minus{
    display: block;
    font-size: 30px;
}

</style>

        <div class="filter-sec">
        <div class="panel panel-default box-filter">
      <div class="list-group" >
    <!-- <div class="panel-heading">Refine Search</div> -->
    <input type="hidden" id="last_selected_filter_group" value="" />
                                    
         <a class="list-group-item filter-name discounts " style="font-size:18px;font-weight:500;color:black">Discounts</a>
                 <form method="get" action="<?php echo base_url('search?search='.$cat_ids); ?>?filter=price=top&order=desc">                                                  
        <div class="list-group-item filter-box-container discounts discounts_filterBox " filter-group="discounts">

      <div id="filter-group4" class="" ><?php $discount = $_GET['discount']; ?>
                              <div class="checkbox  discounts_checkBox" data-filter-group="4">
                                     <input type="text" name="search" value="<?php echo $cat_ids; ?>">
        <label>
         
                        <input id="discounts10andabove" type="checkbox" name="discount[]" value="10% and above"  <?php if($discount[0]=='10% and above' || $discount[1]=='10% and above' || $discount[2]=='10% and above' || $discount[3]=='10% and above'){ ?>checked<?php }?>>  
                                                       10% and above <span class="filter_cnt"></span>
                                           <span class="f-count">(10)</span>
        </label>
          </div>
                    <div class="checkbox  discounts_checkBox" data-filter-group="4">
        <label>
                        <input id="discounts20andabove" type="checkbox" name="discount[]" value="20% and above" <?php if($discount[0]=='20% and above' || $discount[1]=='20% and above' || $discount[2]=='20% and above' || $discount[3]=='20% and above'){ ?>checked<?php }?> >  
                                                       20% and above <span class="filter_cnt"></span>
                                           <span class="f-count">(13)</span>
        </label>
          </div>
                    <div class="checkbox  discounts_checkBox" data-filter-group="4">
        <label>
                        <input id="discounts30andabove" type="checkbox" name="discount[]" value="30% and above"  <?php if($discount[0]=='30% and above' || $discount[1]=='30% and above' || $discount[2]=='30% and above' || $discount[3]=='30% and above'){ ?>checked<?php }?>>  
                                                       30% and above <span class="filter_cnt"></span>
                                           <span class="f-count">(11)</span>
        </label>
          </div>
                    <div class="checkbox  discounts_checkBox" data-filter-group="4">
        <label>
                        <input id="discounts40andabove" type="checkbox" name="discount[]" value="40% and above" <?php if($discount[0]=='40% and above' || $discount[1]=='40% and above' || $discount[2]=='40% and above' ||$discount[3]=='40% and above'){ ?>checked<?php }?> >  
                                                       40% and above <span class="filter_cnt"></span>
                                           <span class="f-count">(1)</span>
        </label>
          </div>
                                  <div class="clearfix"></div>
                              </div>          
        </div>
    
                              </div>
        </div>
        <div class="panel-footer text-right apply-filter">
          
            <a href="<?php echo base_url('search?search='.$cat_ids); ?>" ><button type="button" class="cancel-filter btn">Clear All</button></a>
            <button type="submit" id="button-filter" class="btn btn-primary">Apply Filter</button>
        </div>
</form>

    </div>

<input type="hidden" id="filter_open_status" value="0" />
<style>
        @media (min-width: 767px) {
        .filter-sec .list-group-item.filter-box-container {
            display: block ;
        }
    }
</style>
<style>       
.more-item a {color: #00a3cc!important;}
.more-item {margin-left: 50px;list-style: none;}
.class-hide {display: none;}
.class-hide.class-show {display: block !important;}
.more-item {
    border-top: 1px solid #e7e7e7 !important;
    font-size: 12px;
    line-height: 40px;
    text-align: right;
    color: #003971;
    text-transform: lowercase;
    font-family: Arial,sans-serif;
    margin: 0px !important;
}
.more-item a{
    color: #003971 !important;
    padding: 0px;
}
.outer-more-filter { 
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
}
.filter-sec .list-group span.show-more {
    padding: 4px 12px;
    font-weight: 400;
    font-size: 13px;
    color: #5d5d5d;
    cursor: pointer;
}
.outer-class-hide {display : none !important; }
.outer-class-show {display: block}
@media(max-width:767px){
    .color-filter .color-item label {display : inline-block;vertical-align: middle;}
    .colour-filter-name {margin-left: 9px;vertical-align: middle;}
}
</style>
    <style>
.card {
    background: none repeat scroll 0 0 #FFFFFF;
    text-align: center;
    width: 100% !important;
    border-radius: 15px;
    box-shadow: 0 0 6px rgb(113 113 113 / 20%);
    margin-right: -30px;
  }


.price1 {
  color: #00e6b8;
  font-size: 22px;
  padding: 17px;
}

.card .buttons {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #00e6b8;
  text-align: center;
  cursor: pointer;
  width: 100%;
  border-bottom-left-radius: 15px;
  border-bottom-right-radius: 15px;
  font-size: 18px;
  margin-bottom: 0px;
}
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }
}
#featured-carousel select, .product-field-display select {
    float: none;
    margin: 10px auto 0 auto;
    width: 60%;
}
.addtocart-area select {
    height: 32px;
    font-size: 14px;
}
select {
    font-size: 12px;
    border: 1px solid #DDDDDD;
    height: 30px;
    padding: 5px;
    width: 130px;
    margin-top: 0px;
}
select:not(:-internal-list-box) {
    overflow: visible !important;
}
@media only screen and (min-width: 1200px) {
 .zoom:hover {
  transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
}
.box {
    padding: 0 17px 0 17px;
}
.p1 {
    margin: 0 0 10px;
    text-align: justify;
    padding: 10px;
    margin-top: 20px;
}

</style>
                                            </div>
                </aside>
                        <!-- left bar section -->
        <!-- right section -->
        <div id="content" class="col-sm-9">
            <div class="row s-mobileFilter">
    <div class="col-sm-6 col-xs-9">
        <div class="pull-left">
      <h1 class="product-title category-name">Search - <?php echo $_REQUEST['search']; ?></h1> 
      <span class="category-total-item"><?php echo count($products); if(count($products)>1){ ?> items<?php }else{ ?> item<?php } ?></span>
        </div>
    </div>
              </div>
            <input type="hidden" name="list" value="searchpage">
            <div class="row" id="ajax-product-list">
            <?php 
             if($this->session->userdata('u_id'))
            {
                $carts = $this->common_model->get_user_cart($this->session->userdata['u_id']);
                if($carts){
            ?>
            <input type="hidden" value="<?php echo count($carts); ?>" name="cart_value" id="cart_value">
            <?php } } 
            
            if($products){ 
                
                foreach($products as $p){ ?>
                
                <div class="product-layout product-item product-grid col-xs-6 col-md-4 col-lg-3 zoom box"  style="height:427px;margin-bottom:70px;">
                    <div class="product-thumb size-option splug-product-thumb">
                     <div class="card">
       <a href="<?php if($p['type']==1){ echo base_url('product-detail/'.$p['product_id']); } else { echo base_url('product/'.$p['product_id']);  }?>"> <h1 style="font-size: 15px;font-weight: bold;text-transform: uppercase;color: #00e6b8;padding: 25px;height:90px"><?php echo $p['p_name']; ?></h1></a>
 <a href="<?php if($p['type']==1){ echo base_url('product-detail/'.$p['product_id']); } else { echo base_url('product/'.$p['product_id']);  }?>"> <img src="<?php echo base_url('thumbnail/'.$p['p_image']); ?>" alt="Denim Jeans" style="max-width: 100%;margin:-35px;height: 220px;"></a>
  
 <button type="button" class="wishlist-icon wishlist-add-390089" style="display: none;" data-toggle="tooltip" title="Add to Wish List" onclick=""><i class="fa fa-heart"></i></button>
  <p class="p1"></p>
  <?php $prices = $this->common_model->get_cat_weight($p['pid'],$p['type']); ?>
   <select id="620" checked="checked" name="mySelect" id="mySelect<?php echo $p['pid']; ?>" onchange="return leaveChange($(this).val(),<?php echo $p['pid']; ?>,<?php echo $p['type']; ?>)">
        <?php foreach($prices as $pr)
              { ?>
                <option value="<?php echo $pr['weight']; ?>"><?php echo $pr['weight']; ?></option>
            <?php } ?></select>
             <div class="rating-star" style="margin-top:10px;">
            <i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
            <i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
            <i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
            <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
            <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
        </div>
           <p class="price<?php echo $p['pid']; ?>" style="margin-top:10px;">
              <?php 
                $price = $this->common_model->get_cat_price($p['pid'],$p['type']); 
                $old_price=$price[0]['price'];
                $discount=$p['p_discount'];
                if($discount==0)
                {
                    $price1=number_format($old_price);
                   // $new_price=str_replace(',', '', $price1);
                ?>   
                <span class="price-new" style="color: #00e6b8;font-size:14px;" id="demo"><i class="fa fa-inr rs-sym"></i> <?php echo $price1; ?> </span>
                <?php } else{
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                  ?>
                  <span class="price-new" style="color: #00e6b8;font-size:14px;" id="demo"><i class="fa fa-inr rs-sym"></i> <?php echo $price2; ?> </span>
                <span class="price-old" id="new" style="font-size:14px;"><i class="fa fa-inr rs-sym"></i> <?php echo number_format($old_price); ?></span>
                <span>
                    <span class="sale sale-percentage"><?php echo $discount; ?>% Off</span>
                </span>
                <?php } ?>
                </p>
                   <?php  
                    $price = $this->common_model->get_cat_price($p['pid'],$p['type']); 
                $old_price=$price[0]['price'];
                $discount=$p['p_discount'];
                if($discount==0)
                {
                    $price1=number_format($old_price);
                   // $new_price=str_replace(',', '', $price1);
                ?>
                    <input type="hidden" name="weight" id="weight<?php echo $p['product_id']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                    <input type="hidden" name="price" id="price<?php echo $p['product_id']; ?>" value="<?php echo $price1; ?>">
                   <?php } else{ 
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                  ?>
                            <input type="hidden" name="weight" id="weight<?php echo $p['product_id']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                  <input type="hidden" name="price" id="price<?php echo $p['product_id']; ?>" value="<?php echo $price2; ?>">
                  
                    <?php 
                    }
                  ?>
                  <input type="hidden" name="image" id="image<?php echo $p['product_id']; ?>" value="<?php echo base_url('thumbnail/'.$p['p_image']); ?>">    
                  <input type="hidden" name="type" id="type<?php echo $p['product_id']; ?>" value="<?php echo $p['type']; ?>">  
                                                                    
                    <p>
                <?php
                $carts = $this->common_model->get_single_data('cart',array('product_id'=>$p['product_id'],'user_id'=>$this->session->userdata['u_id'])); 
                
                    if($carts){ ?>
                        <div class="viewww<?php echo $p['product_id']; ?>"></div>
                        <a href="<?php echo base_url('shopping-cart'); ?>">
                            <button class="buttons" class="views<?php echo $p['pid']; ?>">View Cart</button></p></a>
                    <?php } else if(!$this->session->userdata['u_id']){ ?>
                        <a href="<?php echo base_url('login'); ?>"><button class="buttons" id="cart_button">Add to Cart </button></a>
                    <?php } else{ ?>
                        <div class="viewww<?php echo $p['product_id']; ?>"><button class="buttons" id="cart_button<?php echo $p['product_id']; ?>" onclick="return addcart(<?php echo $p['product_id']; ?>,'<?php echo $p['p_name']; ?>','<?php echo $p['pid']; ?>');">Add to Cart </button></div>
                    <?php } ?>
            </div>
                
                                            </div>
                </div> 
                
                <?php } }else{ ?>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <h1 style="text-align:center;font-size: 33px;">Sorry!! Could not find any match!!!</h1>
                <?php } ?>

                </div>
            <div class="row" style="display:none;">
                <div class="col-md-5"></div>
                    <div class="col-md-5">
                   <button class="btn btn-success">Load more</button> </div>   
            </div>
        </div>
    </div>
    <!-- right section -->
    <div class="filter-menu-icon">
                          <button class="filter-btn" style=""><i class="fa fa-sliders" aria-hidden="true"></i> filter</button>
      
    </div>
    <div class="apply-btn-container">
  <button class="cancel">cancel</button>
    </div>


</div>
<style>
.category-description > * {display : none;}
.category-description > *:nth-child(-n + 2) { display : block;}
.category-description .desc-more{ display : block !important;}
.desc-more {color: blue;margin-left: 10px;cursor: pointer;}
</style>
<link href="<?php echo base_url(); ?>face/view/theme/ans-theme/stylesheet/searchplug/common.css?v=1641476714" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>face/view/theme/ans-theme/javascript/searchplug/searchplug.js?v=1641476714" defer="defer"></script>
  
<?php include ("include/footer.php") ?>
<style>
.wishlist .product.product-thumb:hover .price {
    bottom: 0px;
}
.product-product #button-cart, .product-product #button-buy-now, .m-pdp .addtoCart-Btn {
      border: none;
}
.product-product #button-buy-now, .product-product #button-buy-now:hover {
    color: #ffffff;
    background: #54b03d;
}
.owl-wrapper-outer{ height:600px;}
.wishlist-link{ position: relative;}
span#wishlist-total{
    right: 0;
    background: #de201e;
}
@media (max-width: 992px) {
.responsive body ul.megamenu li .sub-menu .content .hover-menu .menu ul ul {
    display: none;
    }
}
@media (max-width: 767px) {
    #content .col-xs-6:nth-child(2n+1) {
        clear: left;
    }
}
</style>
           
  
  
</div>
</div>

<script>
function leaveChange(val,id,type) {
    $.ajax({
			url:base_url+'home/get_cat_price/'+id,
			type:"POST",
			dataType:'json',
			data:{'val':val,'type':type},
			success:function(datas)
			{
		     $('.price'+id).html(datas.sub);
		     $('#price'+id).val(datas.price);
		     $('#weight'+id).val(val);
			}
	});
	return false;
}

function addcart(pid,name,id)
{
    var carts = $('#cart_value').val();
    var weight = $('#weight'+pid).val();
    var price = $('#price'+pid).val();
    var image = $('#image'+pid).val();
    var type = $('#type'+pid).val();

    $.ajax({
			url:base_url+'Product/cat_Cart',
			type:"POST",
			dataType:'json',
			data:{'carts':carts,'pid':pid,'weight':weight,'price':price,'image':image,'name':name,'type':type},
			success:function(datas)
			{
		    $('.cart-count').html(datas.sub);
		    $('#cart_value').val(datas.cart);
		    $('.viewww'+pid).html(datas.btn);
		    $('.message').html(datas.alert);
		     setTimeout(function () {
                    $('.message').fadeOut('slow');
                    }, 1500);
		   
			}
	});
	return false;
}

</script>

      </body></html>

