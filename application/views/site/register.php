<?php include ("include/header.php") ?>
<title>Account Register</title>
<script src="<?php echo base_url(); ?>face/view/theme/ans-theme/javascript/custom_registration02db.js?v=1639917222" type="text/javascript" defer></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
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
<div class="container" style="width:100%;background:url(../images/whiteleave.jpeg); ">
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
.account-with-otp .login-input-container, .login-input-container {
    margin: 0 0px 15px;
}

.input-icons i {
            position: absolute;
        }
          
        .input-icons {
            width: 100%;
            margin-bottom: 10px;
        }
          
        .icon {
                padding: 7px;
    color: black;
    min-width: 50px;
    text-align: center;
    margin-left: 334px;
        }
         @media only screen and (max-width: 768px) {
 .icon {
                padding: 7px;
    color: black;
    min-width: 50px;
    text-align: center;
    margin-left: 280px;
}
          
        .input-field {
            width: 100%;
            padding: 10px;
            text-align: center;
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
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 center-column content-with-background" id="content">
                                                                                        <div class ="row">
                        <div class="login-wrap">
                                                <div class="login-box">
                            <div class="text-center">
                                <p class="login-title"><span id="label_message">Signup with</p>
                            </div>
                            <div class="login-third-party-login">
                                                                <div class="login-button-container">
                                  
                                    <button class="login-google login-button" style="display: none">
                                        <span class="header-sprite login-gplus-logo"></span>
                                        <!-- react-text: 14 -->GOOGLE<!-- /react-text -->
                                    </button>
                                   <a href="<?=base_url()?>googlelogin/login"> <div class="g-signin2 login-google login-button" data-onsuccess="onSignIn" data-gapiscan="true" data-onload="true"><div style="height:36px;width:120px;" class="abcRioButton abcRioButtonLightBlue"><div class="abcRioButtonContentWrapper"><div class="abcRioButtonIcon" style="padding:8px"><div style="width:18px;height:18px;" class="abcRioButtonSvgImageWithFallback abcRioButtonIconImage abcRioButtonIconImage18"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 48 48" class="abcRioButtonSvg"><g><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path><path fill="none" d="M0 0h48v48H0z"></path></g></svg></div></div><span style="font-size:13px;line-height:34px;margin-top:-32px;margin-left:45px;" class="abcRioButtonContents"><span id="not_signed_inud3a2f6xuajg">Sign in</span></span></div></div></div></a>
                                                                          				     <p class="or">OR</p>
                                                                      </div>
                                                                                                 <!-- login start -->
                                <div class="login">
    </div>

    
        <input type="hidden" name="redirect" value="login.html" />
    </div>
                                <div class="create-Account account-with-otp">
    <form id="registers" method="post" enctype="multipart/form-data">
<div class="err_msg"></div>
        <div class="login-input-container" id="registration">
		<span class="addon-icon email-icon" style="z-index:0"></span>
                <input  type="text" name="first_name" value="" placeholder="First name" id="input-registration-email" class="form-control addon-field" />
                 <div class="msg3"></div>
            </div>
            <div class="login-input-container" id="registration">
		<span class="addon-icon email-icon" style="z-index:0"></span>
                <input  type="text" name="last_name" value="" placeholder="Last Name" id="input-registration-email" class="form-control addon-field" />
                 <div class="msg4"></div>
            </div>
        <div class="login-input-container" id="registration">
		<span class="addon-icon email-icon" style="z-index:0"></span>
                <input  type="email" name="email" value="" placeholder="Your Email Address" id="input-registration-email" class="form-control addon-field" />
                 <div class="msg"></div>
            </div>
            <div class="form-group">
		<span class="addon-icon mobile-icon" style="z-index:0"></span>
                <span class="country_code" style="padding-left: 38px;">+91</span>
                <input  style="padding-left: 65px;" name="telephone" type="tel" maxlength="10" value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Mobile Number" id="input-registration-telephone" class="form-control" />
                <div class="msg1"></div>
                            </div>
            <div class="form-group">
                <div class="input-icons">
                <i class="bi bi-eye-slash icon" id="togglePassword">
              </i>
                <span class="addon-icon password-icon"></span>
		<input type="password" autocomplete="off" name="password" value="" placeholder="Choose Password" id="password" class="form-control addon-field"/>
		<div class="msg2"></div>
            </div>
                
                            </div>
                    </div>
                 <div class="row">
            <div class="col-sm-12 register-btn text-center">
                <input type="submit" value="REGISTER" class="btn btn-danger btn-den submit_btn" style="margin:0px;height:42px;"/>
            </div>
                        <div class="col-sm-12 link-related-login text-center">
                <span class="login-info-text">ALREADY REGISTERED?</span> <a href="<?php echo base_url('login'); ?>" class="already-account">LOG IN</a>
            </div> 

        </div>
        

                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#registers").submit(function (event) {
    var password = $('#password').val();
     var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
  
  if(!password.match(decimal)) 
  { 
    $('.msg2').html('<span style="color:red;">Password should be at between 8 and 20 characters in length and should include at least one upper case letter, one lower case letter, one number, and one special character!</span>');
    $('#password').focus();
    return false;
  }
  else
  {
    $('.msg2').html('');
      	$.ajax({
		type:'POST',
		url:base_url+'home/register_user',
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
			if(resp.status==4){
				window.location.href = base_url+'account';
			}
			else if(resp.status==1){
			    $('.msg1').html('');
				$('.msg3').html('');
				$('.msg4').html('');
				$('.msg2').html('');
				$('.msg').html(resp.msg);
				$('.submit_btn').html('REGISTER');
				$('.submit_btn').prop('disabled',false);
			}
			else if(resp.status==2){
				$('.msg').html('');
				$('.msg3').html('');
				$('.msg4').html('');
				$('.msg2').html('');
				$('.msg1').html(resp.msg1);
				
				$('.submit_btn').html('REGISTER');
				$('.submit_btn').prop('disabled',false);
			}
			else if(resp.status==3){
				$('.msg').html('');
				$('.msg1').html('');
				$('.msg3').html('');
				$('.msg4').html('');
				$('.msg2').html(resp.msg2);
				$('.submit_btn').html('REGISTER');
				$('.submit_btn').prop('disabled',false);
			}
			else if(resp.status==5){
				$('.msg').html('');
				$('.msg1').html('');
				$('.msg2').html('');
				$('.msg4').html('');
				$('.msg3').html(resp.msg3);
				$('.submit_btn').html('REGISTER');
				$('.submit_btn').prop('disabled',false);
			}
			else if(resp.status==6){
				$('.msg').html('');
				$('.msg1').html('');
				$('.msg2').html('');
				$('.msg3').html('');
				$('.msg4').html(resp.msg4);
				$('.submit_btn').html('REGISTER');
				$('.submit_btn').prop('disabled',false);
			}
			else if(resp.status==0)
			{
			    $('.err_msg').html('<p class="alert alert-danger">Error! Invalid Email of Password.</p>');
		    	$('.submit_btn').html('REGISTER');
				$('.submit_btn').prop('disabled',false);
			}
			
		}
	});
  }

	return false;
});
</script>
<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    </script>
<?php include ("include/footer.php") ?>