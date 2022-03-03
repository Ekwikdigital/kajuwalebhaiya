<?php include ("include/header.php") ?>
<title>Change Password</title>
<head><style>
* {box-sizing: border-box}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  width: 20%;
  height: 400px;
  background-color: #fff;
}
body{
    background:url(images/whiteleave.jpeg);
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
        <li><a href="javascript:void(0)" style="font-size:20px;">Change Password</a></li>
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
       <div class="message"><div class="alert alert-success cart-added-success-message"><?php echo $this->session->flashdata('error'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      if($this->session->flashdata('success'))
      {
        ?>
        <div class="message"><div class="alert alert-success cart-added-success-message"><?php echo $this->session->flashdata('success'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      ?>
                                           <?php 
      if($this->session->flashdata('error1'))
      {
        ?>
      <div class="message">  <div class="alert alert-success cart-added-success-message"><?php echo $this->session->flashdata('error1'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      if($this->session->flashdata('success1'))
      {
        ?>
      <div class="message"> <div class="alert alert-success cart-added-success-message"><?php echo $this->session->flashdata('success1'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      ?>
        <fieldset>
          <h2>Change Password</h2>
          <p></p><hr/>
          <form method="POST" onsubmit="return changePassword();" id="change_passoword" action="">
              <div class="err_msg"></div>
          <div class="form-group required">
            <label class="col-sm-12 control-label" for="input-firstname" style="font-size:15px;font-weight: 400;">Old Password </label>
            <div class="col-sm-6">
              <input type="password" name="oldpassword" value="" style="font-size:15px;font-weight: 400;" placeholder="Old Password" id="first_name" class="form-control firstname" />
              <div class="msg"></div>
                          </div>
          </div>
          <br>
          <br>
           <div class="form-group required">
            <label class="col-sm-12 control-label" for="input-lastname" style="font-size:15px;margin-top: 17px;font-weight: 400;">New Password</label>
            <div class="col-sm-6">
              <input type="password" name="newpassword" required value="" style="font-size:15px;font-weight: 400;" placeholder="New Password" id="newpassword" class="form-control lastname" />
              <div class="msg1"></div>
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-12 control-label" for="input-lastname" style="font-size:15px;margin-top: 17px;font-weight: 400;">Confirm Password</label>
            <div class="col-sm-6">
              <input type="password" name="repassword" value="" required placeholder="Confim Password" style="font-size:15px;font-weight: 400;" id="repassword" class="form-control"/>
              <div class="msg2"></div>
              
                          </div>
          </div>

          <div class="form-group">
            <label class="col-sm-12 control-label" for="input-telephone"></label>
            <div class="col-sm-6">
               <div class="pull-left backbuton" style="float:left;margin-bottom:10px;"><input type="submit" value="Update" class="btn btn-primary" style="margin-right:10px;margin-top:10px;background-color:#006400;"/></div>
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
function changePassword(){
  $('.msg1').html('');
  $('.msg2').html('');
  var newpassword = $('#newpassword').val();
  var repassword = $('#repassword').val();
  var formdata = $('#change_passoword').serialize();
  
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
     url  : '<?php echo base_url(); ?>home/dochange_password',
     dataType:'json',
     success : function(data){
      $('.btn-loads').prop('disabled',false);
       $('.fs_prop').hide();
       if(data.result==1){
location.reload();
        return false;
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
<script type="text/javascript">

setTimeout(function () {
                    $('.message').fadeOut('slow');
                    }, 1500);
</script>
<?php include ("include/footer.php") ?>