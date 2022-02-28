<?php include ("include/header.php") ?>
<title>Reset Password</title>
<script src="<?php echo base_url(); ?>face/view/theme/ans-theme/javascript/custom_registration02db.js?v=1639917222" type="text/javascript" defer></script>
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
    .login-google.login-button {
    padding-left: 14px;
    padding-top: 6px;
}

.login-google .abcRioButtonContents {
    float: left;
    text-transform: uppercase;
    font-weight: 500;
    color: #696b79;
    margin-top: 2px;
}
.login-button {
    vertical-align: text-bottom;
    margin: 0 auto;
    max-width: 165px;
    padding-left: 15%;
    position: relative;
    font-size: 13px;
    font-weight: 500;
    color: #696b79;
    height: 50px;
    border: 1px solid #bfc0c6;
    background-color: #fff;
    border-radius: 5px;
    text-align: left;
    width: 49%;
    display: inline-block;
}
.abcRioButtonContentWrapper {
    height: 100%;
    width: 100%;
}
.abcRioButtonContents {
    font-family: Roboto,arial,sans-serif;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: .21px;
    margin-left: 6px;
    margin-right: 6px;
    vertical-align: top;
}
</style>
<div class="container" style="width:100%;background-color: #fbfbfb">
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
    <div class="row">
	<div class="col-sm-6 col-sm-offset-3">
	    <div class="register-wraps forgot-page"><br><br>
	     <?php 
      if($this->session->flashdata('error1'))
      {
        ?>
        <p class="alert alert-danger" style="margin-top:20px;"><?php echo $this->session->flashdata('error1'); ?></p>
        <?php
      }
      if($this->session->flashdata('success1'))
      {
        ?>
        <p class="alert alert-success" style="margin-top:20px;"><?php echo $this->session->flashdata('success1'); ?></p>
        <?php
      }
      ?>
	         <div class="err_msg"></div>
		<br>
	          <form method="POST" onsubmit="return changePassword();" id="change_passoword" action="">

		    <fieldset>
		      <legend style="font-size:25px;font-weight:bold;text-align:center"><?php echo $this->session->userdata('reset'); ?>Reset your password</legend>
		      <div class="form-group required">
			<label class="col-sm-12" for="input-email" style="font-size:15px;">Password</label>
			<div class="clearfix"></div>
			<div class="col-sm-12">
			 <input type="password" name="newpassword" required value="" style="font-size:15px;font-weight: 400;" placeholder="New Password" id="newpassword" class="form-control lastname" />
			 <input type="hidden" id="segment" value="<?php echo $this->uri->segment(2); ?>" >
			 <div class="msg1"></div>
			</div>
		      </div><br>
		      <br>
		      <div class="form-group required">
			<label class="col-sm-12" for="input-email" style="font-size:15px;">Confirm Password</label>
			<div class="clearfix"></div>
			<div class="col-sm-12">
			 <input type="password" name="repassword" value="" required placeholder="Confim Password" style="font-size:15px;font-weight: 400;" id="repassword" class="form-control"/>
			  <div class="msg2"></div>
			</div>
		      </div>
		      
              		    </fieldset>
		    <div class="clearfix" style="margin-top:20px;margin-left:5px;">
                        <input type="hidden" name="token" value="mGkuAK2TIdiyyL1NcEGGUjCMYtn6SCan" />
			<input type="submit" value="Continue"  class="btn btn-primary submit_btn" />
		    </div>
                    <div class="buttons clearfix pull-left"><a href="<?php echo base_url('login') ?>" class="back-btn" style="color:blue;font-size:15px;text-align:center"><i class="fa fa fa-angle-left"></i> Back to Login</a></div>
		</form>
	    </div> 
	</div>
    </div> 
</div>
    </div>
</div>
<script>
    function changePassword(){
  $('.msg1').html('');
  $('.msg2').html('');
  var newpassword = $('#newpassword').val();
  var repassword = $('#repassword').val();
  var formdata = $('#change_passoword').serialize();
  var seg=$('#segment').val();
  
  var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
  
  if(!newpassword.match(decimal)) 
  { 
    $('.msg1').html('<span style="color:red;">Password should be at between 8 and 20 characters in length and should include at least one upper case letter, one lower case letter, one number, and one special character!</span>');
    $('#newpassword').focus();
    return false;
  }
  else if(newpassword!= repassword){
    $('.msg2').html('<span style="color:red;">Password confirmation does not match password!</span>');
    $('#repassword').focus();
    return false;
  }
  else{
     $.ajax({
     type : 'post',
     data : formdata,
     url  : '<?php echo base_url(); ?>home/resetpass/'+seg,
     dataType:'json',
     success : function(data){
      $('.btn-loads').prop('disabled',false);
       $('.fs_prop').hide();
       if(data.result==1){
         window.location.href = base_url+'login';
      }
      else{
        $('.err_msg').html('<p class="alert alert-danger">Error! Invalid Current password.</p>');
         return false;
      }       
     }
  });
  return false;
  }
 
} 
</script>
<?php include ("include/footer.php") ?>