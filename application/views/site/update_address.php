
<?php include ("include/header.php") ?>
<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en" class="responsive">
<!--<![endif]-->
<head>
    <title>Update Address</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body class="checkout-cart no-box-type-7 border-width-0 body-other    body-header-type- checkout-cart">

							<!--	<div class="cart-text text-center">
<p>Selected best Dry Fruits, Nuts & Raw Seeds At Min. 50% Off <a href="" target="_blank"><font color="#ffffff"><u>Click here to add.</u></font></a> 
</p>
</div> -->
   <style>
     body{
    background:url(../images/whiteleave.jpeg);
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
    .empty-cart{margin-top: 30px !important;text-align:center;}
    .tick-icon i {width: 70px;height: 70px;border: 3px solid #9e9e9e;border-radius: 50%;line-height: 65px;text-align: center;font-size: 30px;color: #9e9e9e;}
    .empty-cart p {margin-top: 15px;margin-bottom: 27px;font-size: 16px;}
    </style>
<style>
.cart-text{
padding: 10px 15px 2px 15px;
    background:  #E22127;
    color: #ffffff;
}
.cart-text p {
    font-size: 15px;
}
.checkout-success .cart-text.text-center {
    display: none;
}
</style>							</div>
		</div>
        <style>
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
        margin-left:13px;
        margin-right:13px;
}

     }
}


        </style>  
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

<div class="container-fluid">
    <?php if($this->session->userdata('u_id')){
        $carts = $this->common_model->get_user_cart($this->session->userdata['u_id']); 
        if($carts){
    ?>
     <?php 
      if($this->session->flashdata('error'))
      {
        ?>
        <div class="message"><div class="alert alert-success cart-added-success-message"><?php echo $this->session->flashdata('error'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        
        <?php
      }
      if($this->session->flashdata('success'))
      {
        ?>
       <div class="message">  <div class="alert alert-success cart-added-success-message"><?php echo $this->session->flashdata('success'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      ?>
  
           <div id="content" class="row cartPage custom-cart-page">
               
      <div class="col-sm-1"></div>         
	<div class="col-sm-10 cart-left">
	        <ul class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>image/resize-164310701455515656KWBpngtransparent1.png" style="width:20px;height:20px;"></a></li>
         <li><a href="<?php echo base_url('shopping-cart'); ?>">Shopping Cart</a></li>
        <li>Update Address</li>
      </ul>
	    <?php $address = $this->common_model->get_single_data('address',array('user_id'=>$this->session->userdata('u_id'))); ?>
 <h3 class="header-type-text">Billing Address</h3>
	    <div class="cart-left-container" style="border-right:none;">
		    <div class="cart-info">
			 <form id="address_update" method="post" enctype="multipart/form-data">
			     <div class="err_msg"></div>
        <fieldset>
            <div class="row">
          <div class="form-group required">
              <div class="col-md-6">
                  <label class="col-sm-12" for="input-firstname">First Name <span style="color:red">*</span></label>
            <div class="col-sm-12">
              <input type="text" name="firstname" value="<?php echo $address['firstname']; ?>" placeholder="First Name" id="input-firstname" class="form-control" />
              <div class="msg"></div>
                          </div>
              </div>
              <div class="col-md-6">
                  <label class="col-sm-12" for="input-firstname">Last Name <span style="color:red">*</span></label>
            <div class="col-sm-12">
              <input type="text" name="lastname" value="<?php echo $address['lastname']; ?>" placeholder="Last Name" id="input-lastname" class="form-control" />
              <div class="msg1"></div>
                          </div>
              </div>
            
          </div>
          </div>
           <div class="row" style="margin-top:15px;">
           <div class="form-group required">
              <div class="col-md-6">
                  <label class="col-sm-12" for="input-firstname">Address 1 <span style="color:red">*</span></label>
            <div class="col-sm-12">
                <textarea name="address_1" class="form-control" rows="5"><?php echo $address['address_1']; ?></textarea>
                <div class="msg2"></div>
              
                          </div>
              </div>
              <div class="col-md-6">
                  <label class="col-sm-12" for="input-firstname">Address 2</label>
            <div class="col-sm-12">
                <textarea name="address_2" class="form-control" rows="5"><?php echo $address['address_2']; ?></textarea>

                          </div>
              </div>
          </div></div>
           <div class="row" style="margin-top:15px;">
            <div class="form-group required">
                <div class="col-md-6">
                  <label class="col-sm-12" for="input-firstname">Mobile No. <span style="color:red">*</span></label>
            <div class="col-sm-12">
              <input type="text" name="telephone" value="<?php echo $address['telephone']; ?>" placeholder="Mobile number" id="input-telephone" class="form-control" onkeypress="return isNumber(event);"/>
              <div class="msg6"></div>
                          </div>
              </div>

              <div class="col-md-6">
                  <label class="col-sm-12" for="input-firstname">Post Code <span style="color:red">*</span></label>
            <div class="col-sm-12">
               <input type="text" name="postcode" value="<?php echo $address['postcode']; ?>" placeholder="Post Code" maxlength="6" onkeypress="return isNumber(event);" id="input-postcode" class="form-control" />
               <div class="msg4"></div>
            </div>
              </div>
          </div>
          </div>
           <div class="row" style="margin-top:15px;">
              <div class="form-group required">
                                <div class="col-md-6">
                  <label class="col-sm-12" for="input-firstname">City <span style="color:red">*</span></label>
            <div class="col-sm-12">
              <input type="text" name="city" value="<?php echo $address['city']; ?>" placeholder="City" id="input-city" class="form-control" />
              <div class="msg3"></div>
                          </div>
              </div>
              <div class="col-md-6">
                  <label class="col-sm-12" for="input-firstname">Country <span style="color:red">*</span></label>
            <div class="col-sm-12">
              <select name="country_id" id="input-country" class="form-control">
                                                <option value="India" selected="selected">India</option>
                                              </select>
                          </div>
              </div>
             
          </div>
          </div>
          <div class="row" style="margin-top:15px;">
              <div class="form-group required">
                   <div class="col-md-6">
                  <label class="col-sm-12" for="input-firstname">Region / State <span style="color:red">*</span></label>
            <div class="col-sm-12">
               <select name="state" id="input-zone" class="form-control">
                  <option value=""> --- Please Select --- </option>
                <?php foreach($states as $s){ ?>
                
                <option value="<?php echo $s['state_title']; ?>" <?php if($address['state']==$s['state_title']){ echo "selected"; } ?>><?php echo $s['state_title']; ?></option>
                <?php } ?>
              </select>
              <div class="msg5"></div>
                          </div>
              </div>
                  </div>
            </div>
                  </fieldset>
        <div class="buttons clearfix">
          <div class="pull-right">
            <input type="submit" value="<?php if($address){ ?>Update<?php }else{?>Add<?php } ?>" class="btn btn-primary submit_btn"  class="pull-right"/>
           <a href="<?php echo base_url('checkout'); ?>" <button type="button" class="btn btn-primary"  class="pull-right" style="background: black;"/>Continue</button></a>
            
          </div>
        </div>
      </form>
		    </div>
	
		
	<!--	<div class="wishlist-jump">
		    <a href=""><i class="fa fa-heart-o"></i> ADD MORE FROM WISHLIST <i class="fa fa-angle-right pull-right"></i></a>
		</div> -->
	    </div>

	</div>
<div class="col-sm-1"></div> 
	
    </div>
    <?php }  else{ ?>
     <div class="empty-cart">
        <div class="tick-icon">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
        <p>Your shopping cart is empty!</p>
        <div class="buttons">
            <div><a href="<?php echo base_url(); ?>" class="btn btn-primary">Continue</a></div>
        </div>
    </div>
    <?php } } ?>
      
                
             
    </div>
    <script>
    function remove(pid)
	{
	    var answer = confirm ("Are you sure you want to remove this product?");
		if (answer)
		{
		    $.ajax({
                type: "POST",
               
               url: "<?php echo base_url('cart/delete_cart/')?>"+pid,
                data: {pid:pid},
                success: function (response) {
                if (response == 1) {
                    location.reload();
                  }
                  
                }
            });
            return false;
		}
	}
	$("#address_update").submit(function (event) {
      	$.ajax({
		type:'POST',
		url:base_url+'Cart/update_address',
		 data: new FormData(this),
		dataType: 'JSON',
        processData: false,
        contentType: false,
        cache: false,
		beforeSend:function(){       
			$('.submit_btn').html('<i class="fa fa-spin fa-spinner"></i> Processing...');
			$('.submit_btn').prop('disabled',true);
			$('.msg').html('');
		},
		success:function(resp){
			if(resp.status==6){
		        location.reload();
			}
			else if(resp.status==0){
				$('.msg').html(resp.msg);
				$('.submit_btn').html('CONTINUE');
				$('.submit_btn').prop('disabled',false);
			}
			else if(resp.status==1){
				$('.msg1').html(resp.msg1);
				$('.msg').html('');
				$('.submit_btn').html('CONTINUE');
				$('.submit_btn').prop('disabled',false);
			}
			else if(resp.status==2){
				$('.msg2').html(resp.msg2);
				$('.msg1').html('');
				$('.submit_btn').html('CONTINUE');
				$('.submit_btn').prop('disabled',false);
			}
			else if(resp.status==7)
			{
			    $('.msg6').html(resp.msg6);
			    $('.msg').html('');
			    $('.msg1').html('');
			    $('.msg2').html('');
				$('.submit_btn').html('CONTINUE');
				$('.submit_btn').prop('disabled',false);
			}
			else if(resp.status==4){
				$('.msg4').html(resp.msg4);
				$('.msg').html('');
			    $('.msg1').html('');
			    $('.msg2').html('');
				$('.msg6').html('');
				$('.submit_btn').html('CONTINUE');
				$('.submit_btn').prop('disabled',false);
			}
			else if(resp.status==3){
				$('.msg3').html(resp.msg3);
				$('.msg').html('');
				$('.msg1').html('');
				$('.msg6').html('');
				$('.msg4').html('');
				$('.submit_btn').html('CONTINUE');
				$('.submit_btn').prop('disabled',false);
			}
			
			
			else if(resp.status==5)
			{
			    $('.msg5').html(resp.msg5);
			    $('.msg').html('');
			    $('.msg1').html('');
			    $('.msg2').html('');
				$('.msg3').html('');
				$('.msg6').html('');
			    $('.msg4').html('');
				$('.submit_btn').html('CONTINUE');
				$('.submit_btn').prop('disabled',false);
			}
			
			
		}
	});
 

	return false;
});
</script>
<style>
.collapse { display: block;}
#collapse-shipping, div#collapse-voucher, .panel-default>.panel-heading, #accordion .panel-default:nth-child(3), #accordion .panel-default:nth-child(4){ display: none;}
.panel+.panel.voucher-container { display: block ! important; position: relative;}
.panel+.panel.loyality-container { display: block ! important; position: relative;}
.voucher-container .panel-heading{ display: none;}
div#collapse-voucher{ display: block}
#accordion .panel-default #collapse-voucher label.col-sm-2.control-label { width: 100%; padding: 0px 0px 0px 0px;}
.voucher-container label.col-sm-2.control-label{ width: 100%; font-size: 0; position: relative;padding-right: 0;}
.voucher-container { content: "Use eGift Voucher";color: #999;font-size: 14px;position: absolute;top: -26px;}
.voucher-container .form-control { box-shadow: none;padding: 6px 10px;}
.voucher-container .input-group-btn .btn { border-radius: 0 4px 4px 0 !important;background: #333;padding: 5px 30px;font-size: 12px;}
.voucher-container  label.col-sm-2.control-label:before{ content: "Enter your eGift voucher here";color: #999;font-size: 12px;}
#accordion .voucher-container:before, #accordion .panel-default.voucher-container:before, #accordion .panel-default.coupon-container:before{ display: none;}
.clearfix h2, .clearfix p{ display: none;}
.panel-default>.panel-heading+.panel-collapse>.panel-body{ border: 0;position: relative; padding: 0;}
.panel-group .panel{ border: 1px dashed #e7e7e7;padding: 5px 5px;margin: 0px 10px;border-radius: 4px; box-shadow: none;}
label[for="input-coupon"], label[for="input-cashback"] { position: absolute;z-index: 9;width: 250px;left: 0;top: -28px;color: #999;font-size: 12px;font-weight: 400;text-transform: uppercase;}
.panel-group .panel+.panel { margin-top: 35px;}
.panel+.panel.loyality-container { margin-top:30px; }
.panel-body { padding: 5px 5px;}
#input-coupon { padding-left: 35px;border: 0;box-shadow: none;}
#button-coupon{ border-radius: 4px !important;background: #333;padding: 5px 8px;}
#accordion .panel-default #collapse-coupon .panel-body .input-group:before{ content: " ";position: absolute;z-index: 9;width: 35px;height: 40px;line-height: 40px;background: url(https://cdn.staticans.com/temp/ans-themes-icon/sprite-icons2.png);background-position: -262px -15px;left: 0;}
#accordion .panel-default:nth-child(1) label.radio-inline{ padding-left: 0px;color: #999;}
#accordion .panel-default:nth-child(1) label.radio-inline input[name="cashback"]{ float: left; margin-right: 10px;}
.wishlist-jump{ margin-bottom: 35px;}
#collapse-cashback .input-group.col-sm-9{ width: 100%;}
#collapse-cashback .input-group.col-sm-9 .col-sm-10{ width: 100%; padding: 0px 0px 0px 5px;}
#collapse-cashback .input-group.col-sm-9 .col-sm-10 .radio-inline input[name="cashback"]{ position: absolute; left: 0; top:0; text-indent: 30px;}
#collapse-cashback .input-group.col-sm-9 .col-sm-10 .radio-inline { padding-left: 20px;}
.custom-cart-page .cart-wrap .clearfix{ padding-top: 15px;}
.checkout-cart .wishlist-icon.active i{ color: #e97a1e; }
.promotions .collapse{ display: none; }
.custom-cart-page .cart-wrap .promotions { padding: 15px 15px; }
@media (max-width: 992px) {
    #accordion .panel-default:nth-child(3)  label.col-sm-2.control-label{ padding: 0;}
}
@media (max-width: 767px) {
    #accordion .panel-default:nth-child(3)  label.col-sm-2.control-label{ padding: 0;}
    .panel.panel-default.coupon-container{ margin-bottom: 0!important; }
    .custom-cart-page .cart-wrap #accordion{ margin-bottom: 0px; }
}
</style>


	
</div>
</div>

<script>
setTimeout(function () {
                    $('.message').fadeOut('slow');
                    }, 1500);
$('input[name=shipping_address]').click(function () {
    if (this.id == "shipping-address-existing") {
        $("#shipping-existing").show('slow');
        $("#shipping-new").hide('slow');
    } else {
        $("#shipping-new").show('slow');
        $("#shipping-existing").hide('slow');
    }
});

</script>

</body></html>
<?php include ("include/footer.php") ?>