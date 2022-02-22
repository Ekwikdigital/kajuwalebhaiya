           <style type="text/css">
       .footer .pattern a {
    color: #000;
}
.footer .pattern :hover {
    color: #fc6956;
}
.footer .text-center {
    color: #000 !important;
}

@media (max-width: 767px){
.footer ul {
        background-color: #fff;
        color:black;
}
.footer ul li a {
    color: black !important;
}
.footer h4 {
        background-color: #fff;
}
  .footer ul {
        padding: 0px 10px 10px 10px;
        border: 2px solid black;
        display: none;
    }

}

#scrollUp i {
    font-size: 25px;
    color: #ffffff;
    transform: rotate(-45deg);
    background-color: Tomato;
}
.fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
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
  <!-- FOOTER-->
  <div class="footer full-width">
    <div class="background-footer"></div>
    <div class="background">
      <div class="shadow"></div>
      <div class="pattern">
        <div>         
          
     <div class="advanced-grid advanced-grid-111437040 Footer " style="margin-top: 0px;margin-left: 0px;margin-right: 0px;margin-bottom: 0px;">
      <div>               
        <div class="container" style="background-color: white;">
          <div style="padding-top: 15px;padding-left: 0px;padding-bottom: 15px;padding-right: 0px;">
            <div class="row">
                <div class="col-sm-3">
                  <h4 style="color: #000;font-weight: bold;">Information
                      <i class="glyphicon glyphicon-plus"></i>
                      <i class="glyphicon glyphicon-minus"></i>
                      </h4>
<ul>
    <li><a href="<?php echo base_url('about-us'); ?>">About Us </a></li>
    <li><a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a></li>
    <li><a href="<?php echo base_url('terms-condition'); ?>">Terms & Conditions</a></li>
</ul>
 </div>
 <div class="col-sm-3">
  <h4 style="color: #000;font-weight: bold;">My Account
<i class="glyphicon glyphicon-plus"></i>
<i class="glyphicon glyphicon-minus"></i>
</h4>
<ul>
    <li>
        <?php if($this->session->userdata('u_id')){ ?><a href="<?php echo base_url('account'); ?>">My Account</a><?php }else{ ?><a href="<?php echo base_url('login'); ?>">My Account</a><?php } ?>
        </li>
    <li><?php if($this->session->userdata('u_id')){ ?><a href="<?php echo base_url('my-orders'); ?>">Order History</a><?php }else{ ?><a href="<?php echo base_url('login'); ?>">Order History</a><?php } ?></li>
</ul>
 </div>
<div class="col-sm-3">
<h4 style="color: #000;font-weight: bold;">Categories
<i class="glyphicon glyphicon-plus"></i>
<i class="glyphicon glyphicon-minus"></i>
</h4>
<ul>
    <?php $categories=$this->common_model->get_all_catgories(); ?>
    <?php if($categories){ 
        foreach($categories as $c){
    ?>
    <li><a href="<?php echo base_url('products/'.$c['cat_id']); ?>"><?php echo $c['cat_name']; ?></a></li>
    <?php } } ?>
 </ul>    
</div>
<div class="col-sm-3" >
   <h4 style="color: #000;font-weight: bold;">Customer Care
   <i class="glyphicon glyphicon-plus"></i>
<i class="glyphicon glyphicon-minus"></i>

</h4>
<ul>
   <p style="color: #000;">For any queries related to your order or general issues, please call us at: <br>
<a href="tel:+91 6543002134"><i class="fa fa-phone" style="color: #000;"></i> +91 6543002134</p>   </a>   
<p style="color: #000;">Timing: 10:30 AM to 8 PM</p> 
<p style="color: #000;">(Monday to Saturday)</p>
 </ul> 

</div>
</div><div class="row">                                   
  <div class="col-sm-3">
    <ul class="social-icons">
 <li style="color:black;"> Get Social with us:</li>
    <li><a target="_blank" href="https://www.facebook.com/Kajuwalebhaiya/"><i class="fa fa-facebook"></i></a></li>
    <li><a target="_blank" href="https://www.instagram.com/kajuwalebhaiya/"><i class="fa fa-instagram"></i></a></li>
    <li><a target="_blank" href="https://www.youtube.com/channel/UC2vjY9nuSJGI798r63shseg"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
</ul> 
</div>
<div class="col-sm-9">
 <div class="paymentbrand-container">
<div class="paymentbrand-box"><h5 style="color:black">Payment Partners</h5></div>
<div id="paymentbrand">
<div class="owl-item">
<img src="<?php echo base_url(); ?>cdn.anscommerce.com/revamp/freecharge.png" alt="amazon logo">
</div>
<div class="owl-item">
<img src="<?php echo base_url(); ?>cdn.anscommerce.com/revamp/amazonpay.jpg" alt="amazon logo">
</div>
<div class="owl-item">
<img src="<?php echo base_url(); ?>cdn.anscommerce.com/revamp/BhimUPI.jpg" alt="amazon logo">
</div>
<div class="owl-item">
<img src="<?php echo base_url(); ?>cdn.anscommerce.com/revamp/google-pay.jpg" alt="amazon logo">
</div>
<div class="owl-item">
<img src="<?php echo base_url(); ?>cdn.anscommerce.com/revamp/Mastercard.png" alt="amazon logo">
</div>
<div class="owl-item">
<img src="<?php echo base_url(); ?>cdn.anscommerce.com/revamp/pytm.png" alt="amazon logo">
</div>
<div class="owl-item">
<img src="<?php echo base_url(); ?>cdn.anscommerce.com/revamp/PayZapp.jpg" alt="amazon logo">
</div>
<div class="owl-item">
<img src="<?php echo base_url(); ?>cdn.anscommerce.com/revamp/PhonePe.png" alt="amazon logo">
</div>
<div class="owl-item">
<img src="<?php echo base_url(); ?>cdn.anscommerce.com/revamp/Razorpay.jpg" alt="amazon logo">
</div>
<div class="owl-item">
<img src="<?php echo base_url(); ?>cdn.anscommerce.com/revamp/Rupay.jpg" alt="amazon logo">
</div>
<div class="owl-item">
<img src="<?php echo base_url(); ?>cdn.anscommerce.com/revamp/Visa.png" alt="amazon logo">
</div>
</div>
</div>               
 </div>
</div>

<div class="row" style="border-top:1px solid black;">                                   
  <div class="col-sm-12">
  <div class="text-center powered-by " style="color: #000;"><i class="fa fa-copyright"></i>Powered by <a href="https://iclickstech.com/" target="_blank">Infinite-E Clicks Technologies Pvt. Ltd.</a></div>

<a href="javascript:" id="return-to-top" style="background-color:Tomato;"><div id="scrollUp" style="display: block;">
            <i class="fa fa-rocket"></i>
        </div></a>

<style>

</style>
         
 </div>
</div>
                    </div>
               </div>
          </div>
          
               </div>
  </div>
      </div>
    </div>
  </div>
  
  
</div>
</div>

    
<link rel="preload" href="<?php echo base_url(); ?>javascript/font-awesome/css/Ans-font-awesome.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="<?php echo base_url(); ?>javascript/font-awesome/css/Ans-font-awesome.min.css"></noscript>

<link rel="stylesheet" href="<?php echo base_url(); ?>ajax/owl.carousel.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700" rel="preload" as="style">
<script src="<?php echo base_url(); ?>javascript/jquery/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>face/view/theme/ans-theme/javascript/jquery.elevateZoom-3.0.3.min5e1f.js?v=2" defer></script>
<script src="<?php echo base_url(); ?>javascript/bootstrap/js/ans-bootstrap.min.js" type="text/javascript" defer></script>


<script src="<?php echo base_url(); ?>face/view/javascript/common02db.js?v=1639917222" type="text/javascript" async></script>

<script type="text/javascript" src="<?php echo base_url(); ?>face/view/theme/fastor/js/megamenu1bce.js?v=6" defer></script>
<script src="<?php echo base_url(); ?>ajax/owl.carousel.min.js" defer></script>

<script type="text/javascript" src="<?php echo base_url(); ?>face/view/theme/ans-theme/javascript/custom_code02db.js?v=1639917222" defer></script>


<script defer type="text/javascript" src="<?php echo base_url(); ?>face/view/theme/ans-theme/javascript/faces.js?v=1639917222" defer></script>
<script type="text/javascript">
window.addEventListener('load', function() { 
    $(window).bind("load", function() {
  $('.owl-wrapper-outer').css({"height" : "auto"});
    }); 
});
</script> 
<script type="text/javascript">
var responsive_design = 'yes';
</script>


<!-- owl-carousel end -->
<!-- product  -->
<script>
    $(document).ready(function() {
    /* pdp product slider */
    $("#product-image-slider").owlCarousel({
  navigation : true, 
  slideSpeed : 300,
  paginationSpeed : 400,
  navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  singleItem:true,
  lazyLoad: true
    });
    /* related product slider */
                 $("#relatedProducts").owlCarousel({
                navigation : true,
                navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                items : 5,
                loop:true,
                lazyLoad : true,
                itemsTablet: [600,2], //2 items between 600 and 0
                itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
              });
             
    $("#boughtTogether").owlCarousel({
      navigation : true,
      navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
      items : 5,
      loop:true,
      lazyLoad : true,
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
    });
    /* popover */
    $('[data-toggle="popover"]').popover({
      placement: 'top'      
   });
   
   $('body').on('click', function (e) {
        $('[data-toggle=popover]').each(function () {
            // hide any open popovers when the anywhere else in the body is clicked
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });
   
   /* color filter check */
    $('.color-name').on('click', function() {
        $( this ).siblings("label").trigger( "click" );
    });
 
  
/* mobile filter */
if ($(window).width() < 767) {
    
    $(".product-category .filter-sec .list-group-item.filter-name:eq(0)").addClass("active");
    $("a.list-group-item.filter-name.active").next().show()
    //var elementL = $("a.list-group-item.filter-name").length();
    
    var filterLength = $("a.list-group-item.filter-name").length;
    
    if(filterLength == 0) {
  $(".box-no-advanced.box-with-categories .box-heading").addClass("active");
  $(".box-content.box-category").show();
    }

    $("a.list-group-item.filter-name:first-child").addClass("active");
    
    $("a.list-group-item.filter-name").on("click", function(){
        $("a.list-group-item.filter-name").next(".list-group-item.filter-box-container").hide();
        $("a.list-group-item.filter-name").removeClass("active");
        $(".box-no-advanced.box-with-categories .box-heading").removeClass("active");
        $(".box-content.box-category").hide();
        $(this).addClass("active");
        $(this).next().toggle();
    });

    $(".box-no-advanced.box-with-categories .box-heading").on("click", function(){
  $(this).addClass("active");
  $("a.list-group-item.filter-name").removeClass("active");
  $(".box-content.box-category").show();
  $(".list-group-item.filter-box-container").hide();
    });
    
    $(".filter-menu-icon .filter-btn").on("click", function(){   
  $(".mob-category-filter").toggle();
  $('body').addClass('ovflow-stop');
  $(".filter-menu-icon").hide();
  $("#button-filter").text("Apply filter")
  $(".apply-filter").show();
  $(".sort-filter-popup").hide();
    });
    
    $(".apply-filter .cancel-filter").on("click", function(){
  $(".apply-filter").hide();
  $(".mob-category-filter").hide();
  $(".filter-menu-icon").show();
        $('body').removeClass('ovflow-stop');
    });
    
    $(".sort-btn").on("click", function(){  
  $(".sort-filter-popup").show();
    });
    
    $(".sort-filter-popup").on("click", function(){ 
  $(this).hide();
    });
    
    
  
}
 /* mobile filter */


      
    });     
</script> 
