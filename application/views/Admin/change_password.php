<?php include ("include/header.php") ?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Hospital - Change Password</title>
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
                               <?php 
      if($this->session->flashdata('error'))
      {
        ?>
        <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
        <?php
      }
      if($this->session->flashdata('success'))
      {
        ?>
        <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
        <?php
      }
      ?>
            <div class="card">
            
              <!-- /.card-header -->
              <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                            <div class="card-body">
                                         <form method="POST" onsubmit="return changePassword();" id="change_passoword" action="">
                                   <div class="err_msg"></div>
                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label for="inputEmail4">Old Password</label>
                                            <input type="password" class="form-control" name="oldpassword" value="" id="oldpassword">
                                            <span style="color: red;"><?php echo form_error('oldpassword'); ?>  </span>
                                        </div>
                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label for="inputPassword4">New Password</label>
                                            <input type="password" required class="form-control" name="newpassword" id="newpassword">
                                            <span style="color: red;"><?php echo form_error('newpassword'); ?>  </span>
                                        </div>
                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label for="inputPassword4">Confirm Password</label>
                                            <input type="password" required class="form-control" name="repassword" id="repassword">
                                            <span style="color: red;"><?php echo form_error('repassword'); ?>  </span>
                                        </div>
                                        </div>
                                    
                                    <div class="row">
        <div class="col-7">
          <input type="submit" value="Update" class="btn btn-primary float-right">
        </div>
      </div>

                                </form>
                            </div>
                        </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->
<!-- jQuery -->

<!-- Page specific script -->

</body>
<script>
 $(function() {
// setTimeout() function will be fired after page is loaded
// it will wait for 5 sec. and then will fire
// $("#successMessage").hide() function
    
    $(".alert").hide(8000);

});
</script>
  
<!-- Mirrored from demo.dashboardpack.com/analytic-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Dec 2021 05:59:38 GMT -->
</html>

<script>
 $(function() {
// setTimeout() function will be fired after page is loaded
// it will wait for 5 sec. and then will fire
// $("#successMessage").hide() function
    
    $(".alert").hide(8000);

});
</script>
<script>
function changePassword(){
  $('.err_msg').html('');
  var newpassword = $('#newpassword').val();
  var repassword = $('#repassword').val();
  var formdata = $('#change_passoword').serialize();
  if(newpassword.length<6)
  {
    $('.err_msg').html('<p class="alert alert-danger">Error! Passwords must be atleast 6 characters long.</p>');
    $('#newpassword').focus();
    return false;
  }
  else if(newpassword!= repassword){
    $('.err_msg').html('<p class="alert alert-danger">Error! Password and confirm password should be same.</p>');
    $('#repassword').focus();
    return false;
  }
  else{
     $.ajax({
     type : 'post',
     data : formdata,
     url  : '<?php echo base_url(); ?>Admin/Admin/dochange_password',
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
