<link rel="shortcut icon" href="image/logoss.png" type="image/x-icon"/>
<?php include ("include/header.php") ?>


<style>

.box-no-advanced .next, .box-no-advanced .prev {
    top: 0.5%;
}

 @media only screen and (max-width: 768px) {
  /* For mobile phones: */
  .camera_slider {
    margin-top:15px;
  }
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
#column_left .box-no-advanced .products .product .sale, #column_left .box-no-advanced .products .product .new{ display: block;}
body{
  background-image:url(images/whiteleave.jpeg);
  /* background-color:white; */
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

  .container
  {
      padding-left:15px;
      padding-right:15px;
     }
     .banners
     {
        display: flex;
    justify-content: space-evenly;
}

     }
.close:hover {
  color: white;
}
.close
{
    color:white;
}
  * {
  -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.zoom {
  padding: 50px;
  /*background-color: green;*/
  transition: all 0.3s;
 /*width: 200px;
  height: 200px;*/
  margin: 0 auto;
  overflow: hidden;
  

} 

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
@media (max-width: 480px) {
  .image-box {
margin-bottom:15px;
margin-left: 0 !important;
  }
}
@media (max-width: 660px){
	.image-box {
		margin-left: 0 !important;
	}
}
.image-box {
    /* width:400px;
    height:350px; */
    overflow: hidden;
    border-radius: 15px;
    margin:15px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    transition: all 0.3s;
}
.image-box img {
    width:410px;
    height:360px;
    display: block;

    /* border-radius: 15px; */
}

.image-box:hover  {
  box-shadow: 5px 5px 15px black;
    transform: scale(1.05);
}
@media (hover: none) {
.image-box:hover img{ transform: none; }
}
.image-box1:hover{
    -moz-box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      -webkit-box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transform: scale(1.1);
}
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
 .banners {
    margin-left:10px;
    margin-right:10px;
  }
}
#popup a.close {
    position: absolute;
    cursor: pointer;
    z-index: 9;
}
#popup .modal-body {
    padding: 0;
}
#popup .modal-content {
    border: none;
    border-radius: 10px;
    overflow: hidden;
}
#popup button.close {
    position: absolute;
    z-index: 8;
    right: 10px;
    top: 5px;
    font-size: 25px;
    color: #000;
    opacity: 1;
}
@media (min-width: 768px){
    .modal-dialog {
        width: 400px;
        margin: 30px auto;
    }
}

.card {
    background: none repeat scroll 0 0 #FFFFFF;
    text-align: center;
    width: 80% !important;
    border-radius: 15px;
    box-shadow: 3px 3px 5px 5px  rgb(113 113 113 / 20%);
    margin-left:35px;
    margin-right:35px;
  }


.price1 {
  color: #006400;
  font-size: 22px;
  padding: 17px;
}

.card .buttons {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #006400;
  text-align: center;
  cursor: pointer;
  width: 100%;
  border-bottom-left-radius: 15px;
  border-bottom-right-radius: 15px;
  font-size: 18px;
  margin-bottom: 0px;
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
    margin-top: -50px;
}
select:not(:-internal-list-box) {
    overflow: visible !important;
}

.zoom:hover {
  transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}


@media (hover: none) {
 .zoom:hover { transform: none; }
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
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }
}
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}
    @media only screen and (min-width: 1200px) {
        .box-no-advanced .next, .box-no-advanced .prev {
    margin-top: 3px;
}
}
#column_left .box-no-advanced .products .product .sale, #column_left .box-no-advanced .products .product .new{ display: block;}
.testimonial{
    padding: 70px 30px 50px;
    margin: 50px 30px 30px;
    box-shadow: 3px 3px 5px 5px  rgb(113 113 113 / 20%);
    position: relative;
    border-radius:15px;
    background-color:#fff;
    height:auto;
    margin-bottom:60px;
    margin-top:60px;
}
@media only screen and (min-width: 1200px) {
  .testimonial {margin-left:25%;width:50%;}
}
.testimonial .pic{
    width: 110px;
    height: 110px;
    border-radius: 50%;
    box-shadow: 3px 3px 5px 5px  rgb(113 113 113 / 20%);
    overflow: hidden;
    margin: 0 auto;
    position: absolute;
    top: -50px;
    left: 0;
    right: 0;
}
.testimonial .pic img{
    width: 100%;
    height: auto;
}
.testimonial .description{
    font-size: 15px;
    color: #5e595b;
    line-height: 27px;
    text-align: center;
    margin: 0;
    position: relative;
}
.testimonial .description:before{
    font-family: "Font Awesome 5 Free"; font-weight: 900;
    font-size: 25px;
    color: #d7d7d7;
    position: absolute;
    top: 0;
    left: -2px;
}
.testimonial .title{
    display: inline-table;
    padding: 10px;
    margin: 0 auto;
    background: #fff;
    box-shadow: 3px 3px 5px 5px  rgb(113 113 113 / 20%);
    font-size: 20px;
    font-weight: 700;
    color: #c7373c;
    letter-spacing: 1px;
    text-transform: uppercase;
    position: absolute;
    bottom: -22px;
    left: 0;
    right: 0;
}
.title1
{
    display: inline-table;
    margin: 0 auto;
    position: absolute;
   left: 0;
    right: 0; 
}
@media screen and (max-height: 769px) {
.title1
{
    display: inline-table;
    position: absolute;
   left: 30px;
    right: 30px; 
}

.testimonial .post{
    font-size: 15px;
    color: #671a36;
}
 
@media only screen and (max-width: 479px){
    .testimonial{ padding: 70px 10px 30px; }
    .testimonial .description:before{ top: -20px }
    .testimonial .title{ font-size: 12px; }
    .testimonial .post{ font-size: 11px; }
}


.icon-responsive{
  display: flex;
}
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}

.center {
margin-left: auto;
  margin-right: auto;
}
</style>
<title>Kajuwalebhaiya</title>
<body>
  <div id="slider" class="fixed">
    <div class="background-slider"></div>
    <div class="background">
      <div class="shadow"></div>
      <div class="pattern">
                <div class="fullwidth" id="camera_1">
  <div class="camera_slider">
    <div class="spinner"></div>
     <div class="camera_wrap carousel-inner" id="camera_wrap_1" style="overflow: hidden; margin: auto; height: px; max-width: px;">
        <div   style="width:100%;"><a href="#" class="">                                                    
          <img src="images/fresh.png" data-src="images/fresh.png"  title="Slider" alt="Slider"
                                                         class="lload img-responsive" width="100%" height="550">
          </a>                                                
        </div>
        <div   style="width:100%;">
          <a href="#" class="">                                                    
            <img src="images/loader1920x575bfbf.gif?width=&amp;height=&amp;mode=fill&amp;fill=solid&amp;fill-color=FFFFFF" data-src="images/fresh2.png" title="Slider" alt="Slider" class="lload img-responsive" width="100%" height="550">
          </a>    
        </div>
        <div   style="width:100%;">
          <a href="#" class="">                                                    
            <img src="images/loader1920x575bfbf.gif?width=&amp;height=&amp;mode=fill&amp;fill=solid&amp;fill-color=FFFFFF" data-src="images/fresh.png" title="Slider" alt="Slider" class="lload img-responsive" width="100%" height="550">
          </a>                                                
        </div>
        <div   style="width:100%;">
          <a href="#" class="">                                                    
            <img src="images/loader1920x575bfbf.gif?width=&amp;height=&amp;mode=fill&amp;fill=solid&amp;fill-color=FFFFFF" data-src="images/fresh2.png" title="Slider" alt="Slider" class="lload img-responsive" width="100%" height="550">
          </a>
        </div>
        <div style="width:100%;">
          <a href="#" class="">                                                    
            <img src="images/loader1920x575bfbf.gif?width=&amp;height=&amp;mode=fill&amp;fill=solid&amp;fill-color=FFFFFF" data-src="images/fresh.png" 
            title="Slider" alt="Slider" class="lload img-responsive" width="100%" height="550">
          </a>                                                
        </div>
        <div style="width:100%;">
          <a href="#" class="">                                                    
            <img src="images/loader1920x575bfbf.gif?width=&amp;height=&amp;mode=fill&amp;fill=solid&amp;fill-color=FFFFFF" data-src="images/fresh2.png" 
            title="Slider" alt="Slider" class="lload img-responsive" width="100%" height="550">
          </a>                                                
        </div>
        </div>
  </div>
</div>

                </div>
    </div>
  </div>
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
<div id="mobile-menu-icon"><span style="font-size:30px;cursor:pointer;color:black;z-index:1" onclick="openNav()">&#9776;</span>

</div>
<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="close" onclick="setCookie('close-popup-bh', 1, .15);" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-body">
            <a href="#"><img src="images/popup.png" width="100%" alt="" /></a>
        </div>
    </div>
  </div>
</div>
    <ul class="breadcrumb" style="display: none;"></ul>
                        <?php 
      if($this->session->flashdata('error'))
      {
        ?>
       <div class="messages"><div class="alert alert-success cart-added-success-message"><?php echo $this->session->flashdata('error'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      if($this->session->flashdata('success'))
      {
        ?>
       <div class="messages"> <div class="alert alert-success cart-added-success-message"><?php echo $this->session->flashdata('success'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      ?>
                                           <?php 
      if($this->session->flashdata('error1'))
      {
        ?>
       <div class="messages"> <div class="alert alert-success cart-added-success-message"><?php echo $this->session->flashdata('error1'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      if($this->session->flashdata('success1'))
      {
        ?>
     <div class="messages">  <div class="alert alert-success cart-added-success-message"><?php echo $this->session->flashdata('success1'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      ?>
    <div class="message"></div>
    <div class="main-content fixed home">
            <div class="background-content"></div>
            <div class="background">
                    <div class="shadow"></div>
                    <div class="pattern">
                            <div class="container">
                                                                        
                                                <div class="row">
                                            <div class="col-sm-12">
<?php $deal = $this->common_model->newgetRows('deal_of_day','','d_id','','d_status=1');  
if($deal)
{
?>
<div class="deals-heading" style="font-weight:bold;text-transform:uppercase;width:max-contant;">Deal Of The Week </div> 
<div class="row banners banners-with-padding-30">
    
<?php 
    foreach($deal as $d)
    { ?>
        <div class=" image-box">
          <a href="<?php echo base_url('deal-of-the-week/'.$d['d_order']); ?>">
          <img class="img-responsive" src="<?php echo base_url('images/deal/'.$d['d_image']); ?>" alt="Image">
          </a>
        </div>
    <?php }

?>
</div>
<?php } ?>
        <?php 
        $pack = $this->common_model->get_bottom_pack();
        
        $pack1 = $this->common_model->get_top_pack();  
        if($pack)
        {
        ?> 
        
<div class="box clearfix box-with-products with-scroll box-no-advanced" style="margin-top:25px;">
<?php if($pack1){ ?>
<a class="next" href="#myCarousel55678779" id="myCarousel55678779_next" style="background-color:transparent;"><span></span></a>
  <a class="prev" href="#myCarousel55678779" id="myCarousel55678779_prev" style="background-color:transparent;"><span></span></a>
  
  <script type="text/javascript">
  window.addEventListener('load', function() { 
  $(document).ready(function() {
    var owl55678779 = $(".box #myCarousel55678779 .carousel-inner");
    
    $("#myCarousel55678779_next").click(function(){
        owl55678779.trigger('owl.next');
        return false;
      });
    $("#myCarousel55678779_prev").click(function(){
        owl55678779.trigger('owl.prev');
        return false;
    });
    owl55678779.owlCarousel({
                  autoPlay: 5000, //Set AutoPlay to 5 seconds
           
             
                 autoplayTimeout: 5000,
        autoplaySpeed: 5000,
      slideSpeed : 500,
        singleItem:true,
        stopOnHover:true
  
  
             });
  });
  });
  </script>
  <?php } 
  if($this->session->userdata('u_id'))
            {
                $carts = $this->common_model->get_user_cart($this->session->userdata['u_id']);
                if($carts){
            ?>
            <input type="hidden" value="<?php echo count($carts); ?>" name="cart_value" id="cart_value">
            <?php } } ?>
     <div class="container" >
  <div class="box-heading" style="font-weight:bold;text-transform:uppercase;padding-bottom: 31px;line-height:0;width: 101.5%;padding-top: 26px;">Pack of two</div>
  <div class="strip-line"></div>
  <div class="clear"></div>
  <div class="box-content products">
    <div class="box-product">
      <div id="myCarousel55678779" class="carousel slide">
        <!-- Carousel items -->
        <div class="carousel-inner">
                    <?php if($pack){ ?>
                      <div class="active item"><div class="product-grid">
                            <div class="row">    
                                <?php foreach($pack as $p){  ?>
                                    <div class="col-sm-4 col-xs-6 zoom box" style="border:none">
<div class="product-layout product-item product-grid">
        <div class="product-thumb size-option">
       <div class="card">
           <?php $inps= preg_replace('/[^A-Za-z0-9\-]/', ' ', $p['pack_name']);
                        $name=str_replace(' ', '-', strtolower($inps));
                        $new = $name.'-'.$p['pack_product_id'];  ?>
       <a href="<?php echo base_url('product/'.$p['pack_product_id']); ?>"> <h1 style="font-size: 15px;font-weight: bold;text-transform: uppercase;color:#006400;padding: 25px;height:90px"><?php echo $p['pack_name']; ?></h1></a>
 <a href="<?php echo base_url('product/'.$p['pack_product_id']); ?>"> <img src="<?php echo base_url('thumbnail/'.$p['pack_image']); ?>" style="max-width: 100%;margin:-35px;height: 220px;"></a>
  
 <button type="button" class="wishlist-icon wishlist-add-390089" style="display: none;" data-toggle="tooltip" title="Add to Wish List" onclick=""><i class="fa fa-heart"></i></button>
  <p class="p1"></p>
         <?php $prices = $this->common_model->get_all_price($p['pack_id']); ?>
        <select checked="checked" name="mySelect" id="add<?php echo $p['pack_id']; ?>" onchange="return leaveChange($(this).val(),<?php echo $p['pack_id']; ?>)">
        <?php foreach($prices as $pr)
              { ?>
                <option value="<?php echo $pr['weight']; ?>"><?php echo $pr['weight']; ?></option>
            <?php } ?>
        </select>
        <div class="rating-star" style="margin-top:10px;">
            <?php for($i=1;$i<=5;$i++){ 
                            if($p['review']){  
                                if($i<=$p['review']) { ?>  
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
								<?php } else { ?>
								    <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
								<?php }  } else { ?> 
									<i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
						<?php } } ?>
            
     
        </div>
           <p class="price<?php echo $p['pack_id']; ?>" style="margin-top:10px;">
               <?php 
                $price = $this->common_model->get_price($p['pack_id']); 
                
                $old_price=$price[0]['price'];
                $discount=$p['pack_discount'];
                if($discount==0)
                {
                    $price1=number_format($old_price);
                   // $new_price=str_replace(',', '', $price1);
                ?>
                
                <span class="price-new" style="color: #006400" id="demo"><i class="fa fa-inr rs-sym"></i> <?php echo $price1; ?> </span>
                <?php } else{
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                  ?>
                  <span class="price-new" style="color: #006400" id="demo"><i class="fa fa-inr rs-sym"></i> <?php echo $price2; ?> </span>
                <span class="price-old" id="new"><i class="fa fa-inr rs-sym"></i> <?php echo number_format($old_price); ?></span>
                <span>
                    <span class="sale sale-percentage"><?php echo $discount; ?>% Off</span>
                </span>
                <?php } ?>
                
            </p>
            <?php  
                    $price = $this->common_model->get_price($p['pack_id']); 
                    $old_price=$price[0]['price'];
                    $discount=$p['pack_discount'];
                    if($discount==0)
                    {
                        $price1=number_format($old_price);
                    ?>
                    <input type="hidden" name="weight" id="weight<?php echo $p['pack_id']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                    <input type="hidden" name="price" id="price<?php echo $p['pack_id']; ?>" value="<?php echo $price1; ?>">
                    <?php } else{
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                    ?>
                            <input type="hidden" name="weight" id="weight<?php echo $p['pack_id']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                  <input type="hidden" name="price" id="price<?php echo $p['pack_id']; ?>" value="<?php echo $price2; ?>">
                  
                    <?php 
                    }
                  ?>
                  <input type="hidden" name="image" id="image<?php echo $p['pack_id']; ?>" value="<?php echo base_url('thumbnail/'.$p['pack_image']); ?>">
                  <input type="hidden" name="type" id="type<?php echo $p['pack_id']; ?>" value="2">
            <p>
            <?php

                $carts = $this->common_model->get_single_data('cart',array('product_id'=>$p['pack_product_id'],'user_id'=>$this->session->userdata['u_id'],'buy'=>0)); 
                
                    if($carts){ ?>
                        <div class="viewww<?php echo $p['pack_id']; ?>"></div>
                        <a href="<?php echo base_url('shopping-cart'); ?>"><button class="buttons" class="views<?php echo $p['pack_id']; ?>">View Cart </button> </a>
                    <?php } else if(!$this->session->userdata['u_id']){ ?>
                    <a href="<?php echo base_url('login'); ?>"><button class="buttons" id="cart_button">Add to Cart </button></a>
                    <?php } else{ ?>
                    <div class="viewww<?php echo $p['pack_id']; ?>"><button class="buttons" id="cart_button<?php echo $p['pack_product_id']; ?>" onclick="return addcart(<?php echo $p['pack_product_id']; ?>,'<?php echo $p['pack_name']; ?>','<?php echo $p['pack_id']; ?>');">Add to Cart </button></div>
                     <?php } ?>
           
            </p>
        </div>
        </div>
        </div>
                        
            </div> 
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($pack1){ ?>
                     <div class="item"><div class="product-grid">
                            <div class="row">    
                                <?php foreach($pack1 as $p){  ?>
                                    <div class="col-sm-4 col-xs-6 zoom box" style="border:none">
<div class="product-layout product-item product-grid">
        <div class="product-thumb size-option">
       <div class="card">
           <?php $inps= preg_replace('/[^A-Za-z0-9\-]/', ' ', $p['pack_name']);
                        $name=str_replace(' ', '-', strtolower($inps));
                        $new = $name.'-'.$p['pack_product_id'];  ?>
       <a href="<?php echo base_url('product/'.$p['pack_product_id']); ?>"> <h1 style="font-size: 15px;font-weight: bold;text-transform: uppercase;color: #006400;padding: 25px;height:90px"><?php echo $p['pack_name']; ?></h1></a>
 <a href="<?php echo base_url('product/'.$p['pack_product_id']); ?>"> <img src="<?php echo base_url('thumbnail/'.$p['pack_image']); ?>" style="max-width: 100%;margin:-35px;height: 220px;"></a>
  
 <button type="button" class="wishlist-icon wishlist-add-390089" style="display: none;" data-toggle="tooltip" title="Add to Wish List" onclick=""><i class="fa fa-heart"></i></button>
  <p class="p1"></p>
         <?php $prices = $this->common_model->get_all_price($p['pack_id']); ?>
        <select checked="checked" name="mySelect" id="add<?php echo $p['pack_id']; ?>" onchange="return leaveChange($(this).val(),<?php echo $p['pack_id']; ?>)">
        <?php foreach($prices as $pr)
              { ?>
                <option value="<?php echo $pr['weight']; ?>"><?php echo $pr['weight']; ?></option>
            <?php } ?>
        </select>
        <div class="rating-star" style="margin-top:10px;">
             <?php for($i=1;$i<=5;$i++){ 
                            if($p['review']){  
                                if($i<=$p['review']) { ?>  
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
								<?php } else { ?>
								    <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
								<?php }  } else { ?> 
									<i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
						<?php } } ?>
        </div>
           <p class="price<?php echo $p['pack_id']; ?>" style="margin-top:10px;">
               <?php 
                $price = $this->common_model->get_price($p['pack_id']); 
                
                $old_price=$price[0]['price'];
                $discount=$p['pack_discount'];
                if($discount==0)
                {
                    $price1=number_format($old_price);
                   // $new_price=str_replace(',', '', $price1);
                ?>
                <span class="price-new" style="color: #006400;font-size:14px;" id="demo"><i class="fa fa-inr rs-sym"></i> <?php echo $price1; ?> </span>
                <?php } else{
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                  ?>
                  <span class="price-new" style="color: #006400;font-size:14px;" id="demo"><i class="fa fa-inr rs-sym"></i> <?php echo $price2; ?> </span>
                <span class="price-old" id="new" style="font-size:14px;"><i class="fa fa-inr rs-sym"></i> <?php echo number_format($old_price); ?></span>
                <span>
                    <span class="sale sale-percentage" style="font-size:14px;"><?php echo $discount; ?>% Off</span>
                </span>
                <?php } ?>
            </p>
            <?php  
                    $price = $this->common_model->get_price($p['pack_id']); 
                    $old_price=$price[0]['price'];
                    $discount=$p['pack_discount'];
                    if($discount==0)
                    {
                        $price1=number_format($old_price);
                    ?>
                    <input type="hidden" name="weight" id="weight<?php echo $p['pack_id']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                    <input type="hidden" name="price" id="price<?php echo $p['pack_id']; ?>" value="<?php echo $price1; ?>">
                    <?php } else{
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                    ?>
                            <input type="hidden" name="weight" id="weight<?php echo $p['pack_id']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                  <input type="hidden" name="price" id="price<?php echo $p['pack_id']; ?>" value="<?php echo $price2; ?>">
                  
                    <?php 
                    }
                  ?>
                  <input type="hidden" name="image" id="image<?php echo $p['pack_id']; ?>" value="<?php echo base_url('thumbnail/'.$p['pack_image']); ?>">
                  <input type="hidden" name="type" id="type<?php echo $p['pack_id']; ?>" value="2">
            <p>
             <?php

                $carts = $this->common_model->get_single_data('cart',array('product_id'=>$p['pack_product_id'],'user_id'=>$this->session->userdata['u_id'],'buy'=>0)); 
                
                    if($carts){ ?>
                        <div class="viewww<?php echo $p['pack_id']; ?>"></div>
                        <a href="<?php echo base_url('shopping-cart'); ?>"><button class="buttons" class="views<?php echo $p['pack_id']; ?>">View Cart </button> </a>
                    <?php } else if(!$this->session->userdata['u_id']){ ?>
                    <a href="<?php echo base_url('login'); ?>"><button class="buttons" id="cart_button">Add to Cart </button></a>
                    <?php } else{ ?>
                    <div class="viewww<?php echo $p['pack_id']; ?>"><button class="buttons" id="cart_button<?php echo $p['pack_product_id']; ?>" onclick="return addcart(<?php echo $p['pack_product_id']; ?>,'<?php echo $p['pack_name']; ?>','<?php echo $p['pack_id']; ?>');">Add to Cart </button></div>
                     <?php } ?>
             </p>
        </div>
        </div>
        </div>
            </div> 
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
    </div>
    </div>
  </div>
  </div>
</div>
<?php } ?>

        <?php 
            $top = $this->common_model->get_bottom_top(); //print_r($top); 
            $top1 = $this->common_model->get_top();
            if($top){
        ?>
<div class="box clearfix box-with-products with-scroll box-no-advanced" style="margin-top:25px;background-image: url(image/);">
    <?php if($top1)
    {
        ?>
        
<a class="next" href="#myCarousel798077681" id="myCarousel798077681_next" style="background-color:transparent;"><span></span></a>
  <a class="prev" href="#myCarousel798077681" id="myCarousel798077681_prev" style="background-color:transparent;"><span></span></a>
  
  <script type="text/javascript">
  window.addEventListener('load', function() { 
  $(document).ready(function() {
    var owl79807768 = $(".box #myCarousel798077681 .carousel-inner");
    
    $("#myCarousel798077681_next").click(function(){
        owl79807768.trigger('owl.next');
        return false;
      });
    $("#myCarousel798077681_prev").click(function(){
        owl79807768.trigger('owl.prev');
        return false;
    });
    owl79807768.owlCarousel({
                  autoPlay: 5000, //Set AutoPlay to 5 seconds
           
             
                 autoplayTimeout: 5000,
        autoplaySpeed: 5000,
      slideSpeed : 500,
        singleItem:true,
        stopOnHover:true
  
  
             });
  });
  });
  </script>
<?php
    } ?>
     <div class="container">
  <div class="box-heading" style="font-weight:bold;text-transform:uppercase;padding-bottom: 31px;line-height:0;width: 101.5%;padding-top: 26px;">Top selling</div>
  <div class="strip-line"></div>
  <div class="clear"></div>
  <div class="box-content products">
    <div class="box-product">
      <div id="myCarousel798077681" class="carousel slide">
        <!-- Carousel items -->
        <div class="carousel-inner">
            <?php if($top){ ?>
                      <div class="active item"><div class="product-grid">
                          <div class="row">  
                          <?php foreach($top as $t){ ?>
                                    <div class="col-sm-4 col-xs-6 zoom box" style="border:none">
                        <input type="hidden" name="list" value="relatedproducts">  
                        <div class="product-layout product-item product-grid">
                                <div class="product-thumb size-option">
                               <div class="card">
                               <a href="<?php echo base_url('product-detail/'.$t['product_id']); ?>"> <h1 style="font-size: 15px;font-weight: bold;text-transform: uppercase;color: #006400;padding: 25px;height:90px"><?php echo $t['p_name']; ?></h1></a>
                         <a href="<?php echo base_url('product-detail/'.$t['product_id']); ?>"> <img src="<?php echo base_url('thumbnail/'.$t['p_image']); ?>"  style="max-width: 100%;margin:-35px;height: 220px;"></a>
                          
                         <button type="button" class="wishlist-icon wishlist-add-390089" style="display: none;" data-toggle="tooltip" title="Add to Wish List" onclick=""><i class="fa fa-heart"></i></button>
                          <p class="p1"></p>
                           <?php $prices = $this->common_model->get_product_price($t['pid']); ?>
                        <select checked="checked" name="mySelect" id="add<?php echo $t['pid']; ?>" onchange="return myfunc($(this).val(),<?php echo $t['pid']; ?>)">
                        <?php foreach($prices as $pr)
                              { ?>
                                <option value="<?php echo $pr['weight']; ?>"><?php echo $pr['weight']; ?></option>
                            <?php } ?>
                        </select>
                           <div class="rating-star" style="margin-top:10px;">
                               <?php for($i=1;$i<=5;$i++){ 
                            if($t['review']){  
                                if($i<=$t['review']) { ?>  
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
								<?php } else { ?>
								    <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
								<?php }  } else { ?> 
									<i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
						<?php } } ?>
                                                    </div>
               
                                <p class="price<?php echo $t['pid']; ?>" style="margin-top:10px;">
                                  <?php 
                $price = $this->common_model->get_prices($t['pid']); 
                
                $old_price=$price[0]['price'];
                 $discount=$t['p_discount'];
                if($discount==0)
                {
                    $price1=number_format($old_price);
                   // $new_price=str_replace(',', '', $price1);
                ?>                             
                
                <span class="price-new" style="color: #006400;font-size:14px;" id="demo"><i class="fa fa-inr rs-sym"></i> <?php echo $price1; ?> </span>
                <?php } else{
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                  ?>
                  <span class="price-new" style="color: #006400;font-size:14px;" id="demo"><i class="fa fa-inr rs-sym"></i> <?php echo $price2; ?> </span>
                <span class="price-old" id="new" style="font-size:14px;"><i class="fa fa-inr rs-sym"></i> <?php echo number_format($old_price); ?></span>
                <span>
                    <span class="sale sale-percentage" style="font-size:14px;"><?php echo $discount; ?>% Off</span>
                </span>
                <?php } ?>                                                          
                    </p>
                    <?php  
                    $price = $this->common_model->get_prices($t['pid']); 
                    $old_price=$price[0]['price'];
                    $discount=$t['p_discount'];
                    if($discount==0)
                    {
                        $price1=number_format($old_price);
                    ?>
                    <input type="hidden" name="weight" id="weights<?php echo $t['pid']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                    <input type="hidden" name="price" id="prices<?php echo $t['pid']; ?>" value="<?php echo $price1; ?>">
                    <?php } else{
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                    ?>
                            <input type="hidden" name="weight" id="weights<?php echo $t['pid']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                  <input type="hidden" name="price" id="prices<?php echo $t['pid']; ?>" value="<?php echo $price2; ?>">
                  
                    <?php 
                    }
                  ?>
                  <input type="hidden" name="image" id="images<?php echo $t['pid']; ?>" value="<?php echo base_url('thumbnail/'.$t['p_image']); ?>">
                  <input type="hidden" name="types" id="types<?php echo $t['pid']; ?>" value="1">
                          <p>
                               <?php

                $carts = $this->common_model->get_single_data('cart',array('product_id'=>$t['product_id'],'user_id'=>$this->session->userdata['u_id'],'buy'=>0)); 
                
                    if($carts){ ?>
                        <div class="viewww<?php echo $t['pid']; ?>"></div>
                        <a href="<?php echo base_url('shopping-cart'); ?>"><button class="buttons" style="background-color: #006400;" class="views<?php echo $t['pid']; ?>">View Cart </button> </a>
                    <?php } else if(!$this->session->userdata['u_id']){ ?>
                    <a href="<?php echo base_url('login'); ?>"><button class="buttons" style="background-color: #006400;" id="cart_button">Add to Cart </button></a>
                    <?php } else{ ?>
                     <div class="viewww<?php echo $t['pid']; ?>"><button class="buttons" id="cart_button<?php echo $t['product_id']; ?>" style="background-color: #006400;" onclick="return add_top(<?php echo $t['product_id']; ?>,'<?php echo $t['p_name']; ?>','<?php echo $t['pid']; ?>');">Add to Cart </button></div>
                     <?php } ?>
  
                        </div>
                        
                                </div>
                                </div>
                                                
                        <style>
                        #column_left .box-no-advanced .products .product .sale, #column_left .box-no-advanced .products .product .new{ display: block;}
                        </style>                                    
            </div> 
                            <?php } ?>
                                  </div></div></div>
                        <?php } ?>
                        <?php if($top1){ ?>
                                  <div class="item">
                                      <div class="product-grid"><div class="row">     
                                           <?php foreach($top1 as $t){ ?>
                                    <div class="col-sm-4 col-xs-6 zoom box" style="border:none">
                        <input type="hidden" name="list" value="relatedproducts">  
                        <div class="product-layout product-item product-grid">
                                <div class="product-thumb size-option">
                               <div class="card">
                               <a href="<?php echo base_url('product-detail/'.$t['product_id']); ?>"> <h1 style="font-size: 15px;font-weight: bold;text-transform: uppercase;color: #006400;padding: 25px;height:90px"><?php echo $t['p_name']; ?></h1></a>
                         <a href="<?php echo base_url('product-detail/'.$t['product_id']); ?>"> <img src="<?php echo base_url('thumbnail/'.$t['p_image']); ?>"  style="max-width: 100%;margin:-35px;height: 220px;"></a>
                          
                         <button type="button" class="wishlist-icon wishlist-add-390089" style="display: none;" data-toggle="tooltip" title="Add to Wish List" onclick=""><i class="fa fa-heart"></i></button>
                          <p class="p1"></p>
                           <?php $prices = $this->common_model->get_product_price($t['pid']); //echo $this->db->last_query();  ?>
                        <select checked="checked" name="mySelect" id="add<?php echo $t['pid']; ?>" onchange="return myfunc($(this).val(),<?php echo $t['pid']; ?>)">
                        <?php foreach($prices as $pr)
                              { ?>
                                <option value="<?php echo $pr['weight']; ?>"><?php echo $pr['weight']; ?></option>
                            <?php } ?>
                        </select>
                           <div class="rating-star" style="margin-top:10px;">
                                                     <?php for($i=1;$i<=5;$i++){ 
                            if($t['review']){  
                                if($i<=$t['review']) { ?>  
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
								<?php } else { ?>
								    <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
								<?php }  } else { ?> 
									<i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
						<?php } } ?>
                                                    </div>
               
                                <p class="price<?php echo $t['pid']; ?>" style="margin-top:10px;">
                                  <?php 
                $price = $this->common_model->get_prices($t['pid']); 
                
                $old_price=$price[0]['price'];
                 $discount=$t['p_discount'];
                if($discount==0)
                {
                    $price1=number_format($old_price);
                   // $new_price=str_replace(',', '', $price1);
                ?>                             
                
                <span class="price-new" style="color: #006400;font-size:14px;" id="demo"><i class="fa fa-inr rs-sym"></i> <?php echo $price1; ?> </span>
                <?php } else{
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                  ?>
                  <span class="price-new" style="color: #006400;font-size:14px;" id="demo"><i class="fa fa-inr rs-sym"></i> <?php echo $price2; ?> </span>
                <span class="price-old" id="new" style="font-size:14px;"><i class="fa fa-inr rs-sym"></i> <?php echo number_format($old_price); ?></span>
                <span>
                    <span class="sale sale-percentage" style="font-size:14px;"><?php echo $discount; ?>% Off</span>
                </span>
                <?php } ?>    
                <?php  
                    $price = $this->common_model->get_prices($t['pid']); 
                    $old_price=$price[0]['price'];
                    $discount=$t['p_discount'];
                    if($discount==0)
                    {
                        $price1=number_format($old_price);
                    ?>
                    <input type="hidden" name="weight" id="weight<?php echo $t['pid']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                    <input type="hidden" name="price" id="price<?php echo $t['pid']; ?>" value="<?php echo $price1; ?>">
                    <?php } else{
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                    ?>
                            <input type="hidden" name="weight" id="weight<?php echo $t['pid']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                  <input type="hidden" name="price" id="price<?php echo $t['pid']; ?>" value="<?php echo $price2; ?>">
                  
                    <?php 
                    }
                  ?>
            <input type="hidden" name="image" id="images<?php echo $t['pid']; ?>" value="<?php echo base_url('thumbnail/'.$t['p_image']); ?>">
            <input type="hidden" name="types" id="types<?php echo $t['pid']; ?>" value="1">
                                                                                                  
                </p>
                          <p><?php  
                    $price = $this->common_model->get_prices($t['pid']); 
                    $old_price=$price[0]['price'];
                    $discount=$t['p_discount'];
                    if($discount==0)
                    {
                        $price1=number_format($old_price);
                    ?>
                    <input type="hidden" name="weight" id="weights<?php echo $t['pid']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                    <input type="hidden" name="price" id="prices<?php echo $t['pid']; ?>" value="<?php echo $price1; ?>">
                    <?php } else{
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                    ?>
                            <input type="hidden" name="weight" id="weights<?php echo $t['pid']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                  <input type="hidden" name="price" id="prices<?php echo $t['pid']; ?>" value="<?php echo $price2; ?>">
                  
                    <?php 
                    }
                  ?>
                  <input type="hidden" name="image" id="images<?php echo $t['pid']; ?>" value="<?php echo $t['p_image']; ?>">
                          <p>
          <?php

                $carts = $this->common_model->get_single_data('cart',array('product_id'=>$t['product_id'],'user_id'=>$this->session->userdata['u_id'],'buy'=>0)); 
                
                    if($carts){ ?>
                        <div class="viewww<?php echo $t['pid']; ?>"></div>
                        <a href="<?php echo base_url('shopping-cart'); ?>"><button class="buttons" style="background-color: #006400;" class="views<?php echo $t['pid']; ?>">View Cart </button> </a>
                    <?php } else if(!$this->session->userdata['u_id']){ ?>
                    <a href="<?php echo base_url('login'); ?>"><button class="buttons" style="background-color: #006400;" id="cart_button">Add to Cart </button></a>
                    <?php } else{ ?>
                     <div class="viewww<?php echo $t['pid']; ?>"><button class="buttons" id="cart_button<?php echo $t['product_id']; ?>" style="background-color: #006400;" onclick="return add_top(<?php echo $t['product_id']; ?>,'<?php echo $t['p_name']; ?>','<?php echo $t['pid']; ?>');">Add to Cart </button></div>
                     <?php } ?>
             </p>
                        </div>
                        
                                </div>
                                </div>
                                                
                        <style>
                        #column_left .box-no-advanced .products .product .sale, #column_left .box-no-advanced .products .product .new{ display: block;}
                        </style>                                    
            </div> 
                            <?php } ?>               
             
                    </div></div></div>  
                    <?php } ?>
                    </div>
    </div>
    </div>
  </div>
  </div>
</div>
<?php } ?>

 <?php 
            $popular = $this->common_model->get_bottom_popular(); //print_r($top); 
            $popular1 = $this->common_model->get_top_popular();
            if($popular){
        ?>
<div class="box clearfix box-with-products with-scroll box-no-advanced" style="margin-top:25px;background-image: url(image/);">
    <!-- Carousel nav -->
    <?php if($popular1){ ?>
  <a class="next" href="#myCarousel79807768" id="myCarousel79807768_next" style="background-color:transparent;"><span></span></a>
  <a class="prev" href="#myCarousel79807768" id="myCarousel79807768_prev" style="background-color:transparent;"><span></span></a>
  
  <script type="text/javascript">
  window.addEventListener('load', function() { 
  $(document).ready(function() {
    var owl79807768 = $(".box #myCarousel79807768 .carousel-inner");
    
    $("#myCarousel79807768_next").click(function(){
        owl79807768.trigger('owl.next');
        return false;
      });
    $("#myCarousel79807768_prev").click(function(){
        owl79807768.trigger('owl.prev');
        return false;
    });
    owl79807768.owlCarousel({
                  autoPlay: 5000, //Set AutoPlay to 5 seconds
           
             
                 autoplayTimeout: 5000,
        autoplaySpeed: 5000,
      slideSpeed : 500,
        singleItem:true,
        stopOnHover:true
  
  
             });
  });
  });
  </script>
<?php } ?>
     <div class="container">
  <div class="box-heading" style="font-weight:bold;text-transform:uppercase;padding-bottom: 31px;line-height:0;width: 101.5%;padding-top: 26px;0">Popular Searches</div>
  <div class="strip-line"></div>
  <div class="clear"></div>
  <div class="box-content products">
    <div class="box-product">
      <div id="myCarousel79807768" class="carousel slide">
        <!-- Carousel items -->
        <div class="carousel-inner">
            <?php if($popular){ ?>
                      <div class="active item"><div class="product-grid">
                          <div class="row">  
                          <?php foreach($popular as $pl){ ?>
                          <div class="col-sm-4 col-xs-6 zoom box" style="border:none">
                            <input type="hidden" name="list" value="relatedproducts">  
                            <div class="product-layout product-item product-grid">
                                    <div class="product-thumb size-option">
                                   <div class="card">
                                   <a href="<?php echo base_url('product-detail/'.$pl['product_id']); ?>"> <h1 style="font-size: 15px;font-weight: bold;text-transform: uppercase;color: #006400;padding: 25px;height:90px"><?php echo $pl['p_name']; ?></h1></a>
                             <a href="<?php echo base_url('product-detail/'.$pl['product_id']); ?>"> <img src="<?php echo base_url('thumbnail/'.$pl['p_image']); ?>" style="max-width: 100%;margin:-35px;height: 220px;"></a>
                              
                             <button type="button" class="wishlist-icon wishlist-add-390089" style="display: none;" data-toggle="tooltip" title="Add to Wish List" onclick=""><i class="fa fa-heart"></i></button>
                              <p class="p1"></p>
                              <?php $prices = $this->common_model->get_product_price($pl['pid']); //echo $this->db->last_query();  ?>
                        <select checked="checked" name="mySelect" id="add<?php echo $pl['pid']; ?>" onchange="return popular($(this).val(),<?php echo $pl['pid']; ?>)">
                        <?php foreach($prices as $pr)
                              { ?>
                                <option value="<?php echo $pr['weight']; ?>"><?php echo $pr['weight']; ?></option>
                            <?php } ?>
                        </select>
                     
                               <div class="rating-star" style="margin-top:10px;">
                                                   <?php for($i=1;$i<=5;$i++){ 
                            if($pl['review']){  
                                if($i<=$pl['review']) { ?>  
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
								<?php } else { ?>
								    <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
								<?php }  } else { ?> 
									<i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
						<?php } } ?>
                                                        </div>
                                  <p class="price<?php echo $pl['pid']; ?>" style="margin-top:10px;">
                                  <?php 
                $price = $this->common_model->get_prices($pl['pid']); 
                
                $old_price=$price[0]['price'];
                 $discount=$pl['p_discount'];
                if($discount==0)
                {
                    $price1=number_format($old_price);
                   // $new_price=str_replace(',', '', $price1);
                ?>                             
                
                <span class="price-new" style="color: #006400;font-size:14px;" id="demo"><i class="fa fa-inr rs-sym"></i> <?php echo $price1; ?> </span>
                <?php } else{
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                  ?>
                  <span class="price-new" style="color: #006400;font-size:14px;" id="demo"><i class="fa fa-inr rs-sym"></i> <?php echo $price2; ?> </span>
                <span class="price-old" id="new" style="font-size:14px;"><i class="fa fa-inr rs-sym"></i> <?php echo number_format($old_price); ?></span>
                <span>
                    <span class="sale sale-percentage" style="font-size:14px;"><?php echo $discount; ?>% Off</span>
                </span>
                <?php } ?>                                                          
            </p>  
                              <p>
                         <?php  
                    $price = $this->common_model->get_prices($pl['pid']); 
                    $old_price=$price[0]['price'];
                    $discount=$pl['p_discount'];
                    if($discount==0)
                    {
                        $price1=number_format($old_price);
                    ?>
                    <input type="hidden" name="weight" id="weightp<?php echo $pl['pid']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                    <input type="hidden" name="price" id="pricep<?php echo $pl['pid']; ?>" value="<?php echo $price1; ?>">
                    <?php } else{
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                    ?>
                            <input type="hidden" name="weight" id="weightp<?php echo $pl['pid']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                  <input type="hidden" name="price" id="pricep<?php echo $pl['pid']; ?>" value="<?php echo $price2; ?>">
                  
                    <?php 
                    }
                  ?>
                  <input type="hidden" name="image" id="imagep<?php echo $pl['pid']; ?>" value="<?php echo base_url('thumbnail/'.$pl['p_image']); ?>">
                  <input type="hidden" name="typep" id="typep<?php echo $pl['pid']; ?>" value="1">
                          <p>
                              
                              <?php

                $carts = $this->common_model->get_single_data('cart',array('product_id'=>$pl['product_id'],'user_id'=>$this->session->userdata['u_id'],'buy'=>0)); 
                
                    if($carts){ ?>
                        <div class="viewww<?php echo $pl['pid']; ?>"></div>
                        <a href="<?php echo base_url('shopping-cart'); ?>"><button class="buttons" style="background-color: #006400;" class="views<?php echo $pl['pid']; ?>">View Cart </button> </a>
                    <?php } else if(!$this->session->userdata['u_id']){ ?>
                    <a href="<?php echo base_url('login'); ?>"><button class="buttons" style="background-color: #006400;" id="cart_button">Add to Cart </button></a>
                    <?php } else{ ?>
                    <div class="viewww<?php echo $pl['pid']; ?>"><button class="buttons" id="cart_button<?php echo $pl['product_id']; ?>" style="background-color: #006400;" onclick="return add_popular(<?php echo $pl['product_id']; ?>,'<?php echo $pl['p_name']; ?>','<?php echo $pl['pid']; ?>');">Add to Cart </button></div>
                     <?php } ?>
              
                                  </p>
                            </div>
                            
                                    </div>
                                    </div>
                                                    
                            <style>
                            #column_left .box-no-advanced .products .product .sale, #column_left .box-no-advanced .products .product .new{ display: block;}
                            </style>                                    
            </div> 
                            <?php } ?>
                                  </div></div></div>
                                  <?php } ?>
                                  <?php if($popular1){ ?>
                                  <div class="item">
                                      <div class="product-grid">
                                          <div class="row">  
                          <?php foreach($popular1 as $pl){ ?>
                          <div class="col-sm-4 col-xs-6 zoom box" style="border:none">
                            <input type="hidden" name="list" value="relatedproducts">  
                            <div class="product-layout product-item product-grid">
                                    <div class="product-thumb size-option">
                                   <div class="card">
                                   <a href="<?php echo base_url('product-detail/'.$pl['product_id']); ?>"> <h1 style="font-size: 15px;font-weight: bold;text-transform: uppercase;color: #006400;padding: 25px;height:90px"><?php echo $pl['p_name']; ?></h1></a>
                             <a href="<?php echo base_url('product-detail/'.$pl['product_id']); ?>"> <img src="<?php echo base_url('thumbnail/'.$pl['p_image']); ?>" style="max-width: 100%;margin:-35px;height: 220px;"></a>
                              
                             <button type="button" class="wishlist-icon wishlist-add-390089" style="display: none;" data-toggle="tooltip" title="Add to Wish List" onclick=""><i class="fa fa-heart"></i></button>
                              <p class="p1"></p>
                              <?php $prices = $this->common_model->get_product_price($pl['pid']); //echo $this->db->last_query();  ?>
                        <select checked="checked" name="mySelect" id="add<?php echo $pl['pid']; ?>" onchange="return popular($(this).val(),<?php echo $pl['pid']; ?>)">
                        <?php foreach($prices as $pr)
                              { ?>
                                <option value="<?php echo $pr['weight']; ?>"><?php echo $pr['weight']; ?></option>
                            <?php } ?>
                        </select>
                     
                               <div class="rating-star" style="margin-top:10px;">
                                                         <?php for($i=1;$i<=5;$i++){ 
                            if($pl['review']){  
                                if($i<=$pl['review']) { ?>  
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
								<?php } else { ?>
								    <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
								<?php }  } else { ?> 
									<i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
						<?php } } ?>
                                                        </div>
                                  <p class="price<?php echo $pl['pid']; ?>" style="margin-top:10px;">
                                  <?php 
                $price = $this->common_model->get_prices($pl['pid']); 
                
                $old_price=$price[0]['price'];
                 $discount=$pl['p_discount'];
                if($discount==0)
                {
                    $price1=number_format($old_price);
                   // $new_price=str_replace(',', '', $price1);
                ?>                             
                
                <span class="price-new" style="color: #006400;font-size:14px;" id="demo"><i class="fa fa-inr rs-sym"></i> <?php echo $price1; ?> </span>
                <?php } else{
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                  ?>
                  <span class="price-new" style="color: #006400;font-size:14px;" id="demo"><i class="fa fa-inr rs-sym"></i> <?php echo $price2; ?> </span>
                <span class="price-old" id="new" style="font-size:14px;"><i class="fa fa-inr rs-sym"></i> <?php echo number_format($old_price); ?></span>
                <span>
                    <span class="sale sale-percentage" style="font-size:14px;"><?php echo $discount; ?>% Off</span>
                </span>
                <?php } ?>                                                          
            </p>  
                              <p><?php  
                    $price = $this->common_model->get_prices($pl['pid']); 
                    $old_price=$price[0]['price'];
                    $discount=$pl['p_discount'];
                    if($discount==0)
                    {
                        $price1=number_format($old_price);
                    ?>
                    <input type="hidden" name="weight" id="weightp<?php echo $pl['pid']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                    <input type="hidden" name="price" id="pricep<?php echo $pl['pid']; ?>" value="<?php echo $price1; ?>">
                    <?php } else{
                    $price1 = $old_price - ($old_price * $discount / 100);
                    $price2= number_format($price1);
                    //$new_price=str_replace(',', '', $price2);
                    ?>
                            <input type="hidden" name="weight" id="weightp<?php echo $pl['pid']; ?>" value="<?php echo $prices[0]['weight']; ?>">
                  <input type="hidden" name="price" id="pricep<?php echo $pl['pid']; ?>" value="<?php echo $price2; ?>">
                  
                    <?php 
                    }
                  ?>
                  <input type="hidden" name="image" id="imagep<?php echo $pl['pid']; ?>" value="<?php echo base_url('thumbnail/'.$pl['p_image']); ?>">
                  <input type="hidden" name="typep" id="typep<?php echo $pl['pid']; ?>" value="1">
                          <p>
           <?php

                $carts = $this->common_model->get_single_data('cart',array('product_id'=>$pl['product_id'],'user_id'=>$this->session->userdata['u_id'],'buy'=>0)); 
                
                    if($carts){ ?>
                        <div class="viewww<?php echo $pl['pid']; ?>"></div>
                        <a href="<?php echo base_url('shopping-cart'); ?>"><button class="buttons" style="background-color: #006400;" class="views<?php echo $pl['pid']; ?>">View Cart </button> </a>
                    <?php } else if(!$this->session->userdata['u_id']){ ?>
                    <a href="<?php echo base_url('login'); ?>"><button class="buttons" style="background-color: #006400;" id="cart_button">Add to Cart </button></a>
                    <?php } else{ ?>
                    <div class="viewww<?php echo $pl['pid']; ?>"><button class="buttons" id="cart_button<?php echo $pl['product_id']; ?>" style="background-color: #006400;" onclick="return add_popular(<?php echo $pl['product_id']; ?>,'<?php echo $pl['p_name']; ?>','<?php echo $pl['pid']; ?>');">Add to Cart </button></div>
                     <?php } ?> </p>
                            </div>
                            
                                    </div>
                                    </div>
                                                    
                            <style>
                            #column_left .box-no-advanced .products .product .sale, #column_left .box-no-advanced .products .product .new{ display: block;}
                            </style>                                    
            </div> 
                            <?php } ?>
                                  </div>
                                    </div>
                                </div>  
                    <?php } ?>
                    </div>
    </div>
    </div>
  </div>
  </div>
</div>
<?php } ?>

    <?php $popular_cat = $this->common_model->get_popular_categories(); ?>

    <div class="box clearfix box-with-products with-scroll box-no-advanced" style="margin-top:25px;">
        <div class="box-heading" style="font-weight:bold;text-transform:uppercase;padding-bottom: 31px;line-height:0;width: 101.5%;padding-top: 26px;">Popular Categories</div>
     <div class="row home-tilbanner">
    <div class="col-xs-12">
            <h3 style="font-weight:bold;text-transform:uppercase;"></h3>
    </div>
    <div class="clearfix"></div>
            <?php foreach($popular_cat as $pt){ ?>
                <div class="col-xs-6 col-sm-3 zoom box">
                   <a href="<?php echo base_url('products/'.$pt['cat_id']); ?>" class="">
                           <img src="<?php echo base_url('category/'.$pt['cat_image']); ?>" class="img-responsive" style="border-radius: 50%;max-width: 310px;max-height:660px;">
                            <span></span>
                   </a>    
                </div>
            <?php } ?>
    </div>
    </div>
 <div id="slider" class="fixed">
    <div class="background-slider"></div>
    <div class="box clearfix box-with-products with-scroll box-no-advanced" style="margin-top:25px;">
 
  <div class="box-heading" style="font-weight:bold;text-transform:uppercase;padding-bottom: 31px;line-height:0">Testimonials</div>
    </div>
    <div class="background">
      <div class="shadow"></div>
      <div class="pattern">
                <div class="fullwidth" id="camera_11">
  <div class="camera_slider">
    <div class="spinner"></div>
 <div class="camera_wrap carousel-inner owl-carousel owl-theme" id="camera_wrap_11" style="overflow: initial;background-image: url(images/bac/fresh2.jpeg);width: 100%;margin: auto;height: 389px;opacity: 1;display: block;">
       <div class="testimonial">
                    <div class="pic">
                        <img src="<?php echo base_url(); ?>images/users.png" alt="">
                    </div>
                    <p class="description">
                        <i class="fa fa-quote-left" aria-hidden="true" style="font-size:35px;color:#DCDCDC;margin-right:7px;"></i> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>
                    <span class="star_r title1">
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
						            <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
						            <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
								    <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>

                             </span>
                
                    
                    <h3 class="title">William</h3>
                </div>
                <div class="testimonial">
                    <div class="pic">
                        <img src="<?php echo base_url(); ?>images/users.png" alt="">
                    </div>
                    <p class="description">
                        <i class="fa fa-quote-left" aria-hidden="true" style="font-size:35px;color:#DCDCDC;margin-right:7px;"></i> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>
                    <span class="star_r title1">
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
						            <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
						            <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
								    <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>

                             </span>
                
                    
                    <h3 class="title">William</h3>
                </div>
                <div class="testimonial">
                    <div class="pic">
                        <img src="<?php echo base_url(); ?>images/users.png" alt="">
                    </div>
                    <p class="description">
                        <i class="fa fa-quote-left" aria-hidden="true" style="font-size:35px;color:#DCDCDC;margin-right:7px;"></i> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>
                    <span class="star_r title1">
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
						            <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
						            <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
								    <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>

                             </span>
                
                    
                    <h3 class="title">William</h3>
                </div>
                <div class="testimonial">
                    <div class="pic">
                        <img src="<?php echo base_url(); ?>images/users.png" alt="">
                    </div>
                    <p class="description">
                        <i class="fa fa-quote-left" aria-hidden="true" style="font-size:35px;color:#DCDCDC;margin-right:7px;"></i> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>
                    <span class="star_r title1">
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
						            <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
						            <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
								    <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>

                             </span>
                
                    
                    <h3 class="title">William</h3>
                </div>
                <div class="testimonial">
                    <div class="pic">
                        <img src="<?php echo base_url(); ?>images/users.png" alt="">
                    </div>
                    <p class="description">
                        <i class="fa fa-quote-left" aria-hidden="true" style="font-size:35px;color:#DCDCDC;margin-right:7px;"></i> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                    </p>
                    <span class="star_r title1">
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
						            <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
						            <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
								    <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>

                             </span>
                
                    
                    <h3 class="title">William</h3>
                </div>
             
             
        
        </div>
  </div>
</div>


            </div>
    </div>
  </div>

 <div class="container">
     <div class="brandlogo">
   <h3 style="font-wight:bold;">Our Presence</h3>
   <div id="brandlogo" style="">
      <div class="owl-item">
         <img src="cdn.anscommerce.com/revamp/431-4312204_logo-transparent-big-bazaar-logo-png-clipart.png" alt="amazon logo" />
      </div>
 <div class="owl-item" style="padding:5px;">
         <img src="cdn.anscommerce.com/revamp/amzon.png" alt="amazon logo" />
      </div>
      <div class="owl-item">
         <img src="cdn.anscommerce.com/revamp/Dmart.png" alt="amazon logo" />
      </div>
      <div class="owl-item">
         <img src="cdn.anscommerce.com/revamp/Ezmall.png" alt="amazon logo" />
      </div>
      <div class="owl-item">
         <img src="cdn.anscommerce.com/revamp/flipcart.png" alt="amazon logo" />
      </div>
      <div class="owl-item">
         <img src="cdn.anscommerce.com/revamp/Naaptol.png" alt="amazon logo" />
      </div>
      <div class="owl-item">
         <img src="cdn.anscommerce.com/revamp/pytm.png" alt="amazon logo" />
      </div>
      <div class="owl-item">
         <img src="cdn.anscommerce.com/revamp/Reliance1.jpg" alt="amazon logo" />
      </div>
      <div class="owl-item">
         <img src="cdn.anscommerce.com/revamp/Walmart.png" alt="amazon logo" />
      </div>
      <div class="owl-item">
         <img src="cdn.anscommerce.com/revamp/Snapdeal_.png" alt="amazon logo" />
      </div>
   </div>
</div>
</div><div class="cameras-columns">
     <div class="row icon-responsive">
          <div class="col-sm-4">
               <img src="images/icon1.png" alt="Free shipping" style="width: 120px;height: 100px;margin-top: -25px;   filter:saturate(10);" class="img-responsive">
               <div class="right" >
                    <h6 style="color: black;">COD AVAILABLE</h6>
                    <p style="color: black;">In Selected Areas</p>
               </div>
          </div>
        
          <div class="col-sm-4">
               <img src="images/icon2.png" style="width: 120px;height: 100px;margin-top: -25px;" alt="Money" class="img-responsive">
               <div class="right">
                    <h6 style="color: black;">QUALITY ASSURED</h6>
                    <p style="color: black;">100% Original</p>
               </div>
          </div>


          
          <div class="col-sm-4">
               <img src="images/icon3.png" style="width: 120px;height: 100px;margin-top: -25px;" alt="Support" class="img-responsive">
               <div class="right">
                    <h6 style="color: black;">SECURE PAYMENT</h6>
                    <p style="color: black;">Through SSL Payment Gateway</p>


          </div>
          </div>
     </div>
</div>                                            </div>
                                    </div>
                                    
                                    <div class="row">       
                                      <div class="col-md-12">
                                          <div class="row">
                                            <div class="col-md-12">
                                               </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="row"> 
                                            <div class="col-sm-12"> 
                                             </div>
                                    </div>
                                   </div>
                    </div>
            </div>
    </div>

<?php include ("include/footer.php") ?>
<script type="text/javascript">

  window.addEventListener('load', function() { 
    //JQuery-Ans    
 var camera_slider = $("#camera_wrap_11");
            camera_slider.owlCarousel({
            slideSpeed : 300,
            lazyLoad : true,
            singleItem: true,
            autoPlay: "3000",
            stopOnHover: true,
            navigation: true,
                        navigationText: false
        });
         $("#camera_11 .spinner").fadeOut(200);
    $("#camera_wrap_11").css({"height":"auto", "overflow": "initial"});
 });
/* 
$(window).load(function() { 
  $("#camera_1 .spinner").fadeOut(200);
  $("#camera_wrap_1").css("height", "auto");
});*/ 
</script> 
<script>
setTimeout(function () {
                    $('.messages').fadeOut('slow');
                    }, 1500);
function leaveChange(val,id) {
    $.ajax({
			url:base_url+'home/get_price/'+id,
			type:"POST",
			dataType:'json',
			data:{'val':val},
			success:function(datas)
			{
		     $('.price'+id).html(datas.sub);
		     $('#price'+id).val(datas.price);
		     $('#weight'+id).val(val);
			}
	});
	return false;
}

function myfunc(val,id)
{
    $.ajax({
			url:base_url+'home/get_price_top/'+id,
			type:"POST",
			dataType:'json',
			data:{'val':val},
			success:function(datas)
			{
		     $('.price'+id).html(datas.sub);
		     $('#prices'+id).val(datas.price);
		     $('#weights'+id).val(val);
			}
	});
	return false;
}
function popular(val,id)
{
    $.ajax({
			url:base_url+'home/get_price_popular/'+id,
			type:"POST",
			dataType:'json',
			data:{'val':val},
			success:function(datas)
			{
		     $('.price'+id).html(datas.sub);
		     $('#pricep'+id).val(datas.price);
		     $('#weightp'+id).val(val);
			}
	});
	return false;
}
function addcart(pid,name,id)
{
    var carts = $('#cart_value').val();
    var weight = $('#weight'+id).val();
    var price = $('#price'+id).val();
    var image = $('#image'+id).val();
     var type = $('#type'+id).val();

    $.ajax({
			url:base_url+'Cart',
			type:"POST",
			dataType:'json',
			data:{'carts':carts,'pid':pid,'weight':weight,'price':price,'image':image,'name':name,'type':type},
			success:function(datas)
			{
		    $('.cart-count').html(datas.sub);
		    $('#cart_value').val(datas.cart);
		    $('.viewww'+id).html(datas.btn);
		    $('.message').html(datas.alert);
		     setTimeout(function () {
                    $('.message').fadeOut('slow');
                    }, 1500);
		   
			}
	});
	return false;
}
function add_top(pid,name,id)
{
        var carts = $('#cart_value').val();
    var weight = $('#weights'+id).val();
    var price = $('#prices'+id).val();
    var image = $('#images'+id).val();
    var type = $('#types'+id).val();

    $.ajax({
			url:base_url+'Cart/top_cart',
			type:"POST",
			dataType:'json',
			data:{'carts':carts,'pid':pid,'weight':weight,'price':price,'image':image,'name':name,'type':type},
			success:function(datas)
			{
		    $('.cart-count').html(datas.sub);
		    $('#cart_value').val(datas.cart);
		    $('.viewww'+id).html(datas.btn);
		    $('.message').html(datas.alert);
		     setTimeout(function () {
                    $('.message').fadeOut('slow');
                    }, 1500);

			}
	});
	return false;
}
function add_popular(pid,name,id)
{
    var carts = $('#cart_value').val();
    var weight = $('#weightp'+id).val();
    var price = $('#pricep'+id).val();
    var image = $('#imagep'+id).val();
    var type = $('#typep'+id).val();

    $.ajax({
			url:base_url+'Cart/popular_cart',
			type:"POST",
			dataType:'json',
			data:{'carts':carts,'pid':pid,'weight':weight,'price':price,'image':image,'name':name,'type':type},
			success:function(datas)
			{
		    $('.cart-count').html(datas.sub);
		    $('#cart_value').val(datas.cart);
		    $('.viewww'+id).html(datas.btn);
		    $('.message').html(datas.alert);
		     setTimeout(function () {
                    $('.message').fadeOut('slow');
                    }, 1500);

			}
	});
	return false;
}

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
</script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
    $(document).ready(function() { 
    window.onload = init_images;
    });
    });
</script>
<script type="text/javascript">
 window.addEventListener('load', function() { 
    //JQuery-Ans    
 var camera_slider = $("#camera_wrap_1");
            camera_slider.owlCarousel({
            slideSpeed : 300,
            lazyLoad : true,
            singleItem: true,
            autoPlay: "3000",
            stopOnHover: true,
            navigation: true,
                        navigationText: false
        });
         $("#camera_1 .spinner").fadeOut(200);
    $("#camera_wrap_1").css({"height":"auto", "overflow": "initial"});
 });
 
/* 
$(window).load(function() { 
  $("#camera_1 .spinner").fadeOut(200);
  $("#camera_wrap_1").css("height", "auto");
});*/ 
</script> 

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
 document.getElementById('mobile-menu-icon').style.visibility = 'hidden'; 
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById('mobile-menu-icon').style.visibility = 'visible'; 
}
</script>

<script type="text/javascript">
window.addEventListener('load', function() {
    var cookie = getCookie('close-popup-bh');
    if (cookie == null) {
        $('#popup').modal('show');
    };
});
</script>
<script>
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:1,
        itemsDesktop:[1000,1],
        itemsDesktopSmall:[979,1],
        itemsTablet:[768,1],
        pagination:true,
        stopOnHover:true,
        navigation:true,
        navigationText:["",""],
        autoPlay:true
    });
});
</script>
</body>

</html>