<?php include ("include/header.php") ?>
<title>Manage Address</title>
<head><style>

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
* {box-sizing: border-box}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  width: 20%;
  height: 400px;
  background-color: #fff;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 15px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #f1f1f1;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #f1f1f1;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 80%;
  border-left: none;
  height: auto;
  background-color: #fff;
  margin-bottom:20px;
}
.breadcrumb-navigation {
            padding: 20px 15px;
            background-color: #fff;
            margin-top:20px;
   
        }
  
        .breadcrumb-navigation>li {
            display: inline;
        }
  
        .breadcrumb-navigation>li>a {
            color: #026ece;
            text-decoration: none;
        }
 
        .breadcrumb-navigation li+li:before {
            padding: 4px;
            font-size:20px;
            content: "/";
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
@media screen and (max-height: 768px) {
  .tab {margin-left: -40px;}
  .breadcrumb-navigation
      {
          width:100%;margin-left: -20px;
      }
      .tabcontent
      {
          width: 100%;margin-left: -20px;
          border-left:1px solid #ccc;
      }
}
@media screen and (max-height: 450) {
  .tab {margin-left: -20px;}
  .breadcrumb-navigation
      {
          width:100%;margin-left: -20px;
          
      }
      .tabcontent
      {
          width: 100%;margin-left: -20px;
          border-left:1px solid #ccc;
      }
}
@media screen and (max-height: 769px) {
  .tab {margin-left: -20px;width: 100%;}
      .breadcrumb-navigation
      {
          width:100%;
          margin-left: -20px;
      }
      .tabcontent
      {
          width: 100%;margin-left: -20px;
          border-left:1px solid #ccc;
      }
  }
 
}
.page-fullWidthComponent .country_code_edit {
    border: 1.5px solid #d6d6d6;
    border-radius: 0;
}

.country_code_edit {
    padding: 0px 8px;
    position: absolute;
    line-height: 32px;
    color: #777;
    background-color: #eee;
    border: 1px solid #ccc;
    border-radius: 4px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
@media only screen and (min-width: 1200px) {
  #mobile-menu-icon {display:none;}
  .tab{width:20%;}
  .tabcontent
      {
          width: 80%;margin-left:10px;
      }
}

.pull-left {
    float: left;
    margin-right: 10px;
}

</style></head>
        <body style="background-color: #fafafa;">
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


</div>

<div class="container-fluid" style="margin-left:40px;">
    

<div class="row"><div class="col-md-12">
  
    <ul class="breadcrumb-navigation">
    <div class="message"></div>
        <li><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>image/resize-164310701455515656KWBpngtransparent1.png" style="width:20px;height:20px;"></a></li>
        <li><a href="javascript:void(0)" style="font-size:20px;">Manage Address</a></li>
    </ul>
</div></div>
    
    <div class="row" style="margin-top:30px;">
        <div class="col-md-12">
            <div class="tab">
  <a href="<?php echo base_url("account"); ?>"><button class="tablinks <?php if($this->uri->segment(1)=='account'){ ?> active <?php } ?>" >Profile</button></a>
  <a href="<?php echo base_url("edit-password"); ?>"><button class="tablinks <?php if($this->uri->segment(1)=='edit-password'){ ?> active <?php } ?>">Change Password</button></a>
  <a href="<?php echo base_url("manage-address"); ?>"><button class="tablinks <?php if($this->uri->segment(1)=='manage-address'){ ?> active <?php } ?>" >Manage Address</button></a>
   <a href="<?php echo base_url("my-orders"); ?>"><button class="tablinks <?php if($this->uri->segment(1)=='my-orders'){ ?> active <?php } ?>">My Orders</button></a>
<a href="<?php echo base_url('Googlelogin/logout'); ?>"><button class="tablinks">Logout</button></a>
</div>

<div id="profile" class="tabcontent">
                                       <?php 
      if($this->session->flashdata('error'))
      {
        ?>
      <div class="message"> <div class="alert alert-success cart-added-success-message"><?php echo $this->session->flashdata('error'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      if($this->session->flashdata('success'))
      {
        ?>
       <div class="message"> <div class="alert alert-success cart-added-success-message"><?php echo $this->session->flashdata('success'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      ?>
                                           <?php 
      if($this->session->flashdata('error1'))
      {
        ?>
       <div class="message"> <div class="alert alert-success cart-added-success-message" style="z-index:1"><?php echo $this->session->flashdata('error1'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      if($this->session->flashdata('success1'))
      {
        ?>
      <div class="message"> <div class="alert alert-success cart-added-success-message" style="z-index:1"><?php echo $this->session->flashdata('success1'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      ?>
        <fieldset>
          <h2>Update Address</h2><hr/>
          <?php $address = $this->common_model->get_single_data('address',array('user_id'=>$this->session->userdata('u_id'))); ?>
         <form id="address_update" method="post" enctype="multipart/form-data">
          <div class="form-group required">
            <label class="col-sm-12 control-label" for="input-firstname" style="font-size:15px;font-weight: 400;">First Name </label>
            <div class="col-sm-8">
              <input type="text" name="firstname" value="<?php echo $address['firstname']; ?>" placeholder="First Name" id="input-firstname" class="form-control" />
              <div class="msg"></div>
                          </div>
          </div>
          <br>
          <br>
           <div class="form-group required">
            <label class="col-sm-12 control-label" for="input-lastname" style="font-size:15px;margin-top: 17px;font-weight: 400;">Last Name</label>
            <div class="col-sm-8">
               <input type="text" name="lastname" value="<?php echo $address['lastname']; ?>" placeholder="Last Name" id="input-lastname" class="form-control" />
              <div class="msg1"></div>
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-12 control-label" for="input-lastname" style="font-size:15px;margin-top: 17px;font-weight: 400;">Address 1</label>
            <div class="col-sm-8">
              <textarea name="address_1" class="form-control" rows="5"><?php echo $address['address_1']; ?></textarea>
                <div class="msg2"></div>
                          </div>
          </div>
          <div class="form-group">
            <label class="col-sm-12 control-label" for="input-lastname" style="font-size:15px;margin-top: 17px;font-weight: 400;">Address 2</label>
            <div class="col-sm-8">
              <textarea name="address_2" class="form-control" rows="5"><?php echo $address['address_2']; ?></textarea>
                          </div>
          </div>
           <div class="form-group required">
            <label class="col-sm-12 control-label" for="input-telephone" style="font-size:15px;margin-top: 17px;font-weight: 400;">Telephone</label>
            <div class="col-sm-8">
                <span class="country_code_edit" style="font-size:15px;font-weight: 400;">+91</span>
              <input type="tel" name="telephone" style="padding-left:52px;font-size:15px;font-weight: 400;" value="<?php echo $address['telephone']; ?>" placeholder="Telephone" id="input-telephone" class="form-control" maxlength="10" onkeypress="return isNumber(event);"/>
               <div class="msg6"></div>
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-12 control-label" for="input-lastname" style="font-size:15px;margin-top: 17px;font-weight: 400;">Post Code</label>
            <div class="col-sm-8">
              <input type="text" name="postcode" value="<?php echo $address['postcode']; ?>" placeholder="Post Code" maxlength="6" onkeypress="return isNumber(event);" id="input-postcode" class="form-control" />
               <div class="msg4"></div>
              
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-12 control-label" for="input-lastname" style="font-size:15px;margin-top: 17px;font-weight: 400;">City</label>
            <div class="col-sm-8">
              <input type="text" name="city" value="<?php echo $address['city']; ?>" placeholder="City" id="input-city" class="form-control" />
              <div class="msg3"></div>
              
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-12 control-label" for="input-lastname" style="font-size:15px;margin-top: 17px;font-weight: 400;">Country</label>
            <div class="col-sm-8">
                         <select name="country_id" id="input-country" class="form-control">
                                                <option value="India" selected="selected">India</option>
                                              </select>
              <div class="msg3"></div>
              
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-12 control-label" for="input-lastname" style="font-size:15px;margin-top: 17px;font-weight: 400;">Region / State</label>
            <div class="col-sm-8">
                <?php $states = $this->common_model->getRows('state'); ?>
                         <select name="state" id="input-zone" class="form-control">
                  <option value=""> --- Please Select --- </option>
                <?php foreach($states as $s){ ?>
                
                <option value="<?php echo $s['state_title']; ?>" <?php if($address['state']==$s['state_title']){ echo "selected"; } ?>><?php echo $s['state_title']; ?></option>
                <?php } ?>
              </select>
              <div class="msg5"></div>
              
                          </div>
          </div>
          <div class="form-group">
            <label class="col-sm-12 control-label" for="input-telephone"></label>
            <div class="col-sm-6">
               <div class="pull-left backbuton" style="float:left;margin-bottom:10px;"><input type="submit" value="Update" class="btn btn-primary" style="margin-right:10px;margin-top:10px;background-color:#006400;"/></div>
          <div class="pull-left">
            <input type="hidden" name="token" value="5eYWOOn1PaWREf7hIfB4XRCnFE9XzSuf" />
            
          </div>
                          </div>
          </div>
          </form>
</fieldset>
   
  
</div>

        </div>

</div>
</div>
</body>
</html>
<script>
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
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
 document.getElementById('mobile-menu-icon').style.visibility = 'hidden'; 
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById('mobile-menu-icon').style.visibility = 'visible'; 
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
<script type="text/javascript"><!--
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
setTimeout(function () {
                    $('.message').fadeOut('slow');
                    }, 1500);

</script>
<?php include ("include/footer.php") ?>