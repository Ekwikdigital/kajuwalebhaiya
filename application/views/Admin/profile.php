<?php include ("include/header.php") ?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Kajuwalebhaiya - Profile</title>
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
                           <div class="col-md-10">
                            <div class="card-body">
                                <form id="main" method="post" action="" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $admininfo['username']; ?>" placeholder="Username">
                                            <span style="color: red;"><?php echo form_error('username'); ?>  </span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Eamil Id</label>
                                            <input type="text" class="form-control" value="<?php echo $admininfo['email']; ?>" id="email" name="email" placeholder="Email">
                                            <span style="color: red;"><?php echo form_error('email'); ?>  </span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Mobile</label>
                                            <input type="text" class="form-control" name="mobile" value="<?php echo $admininfo['mobile']; ?>" id="inputEmail4" placeholder="Email">
                                            <span style="color: red;"><?php echo form_error('mobile'); ?>  </span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Profile</label>
                                            <input type="file" class="form-control-file" name="profile" id="profile">
                                            <?php if($admininfo['profile']!=''){ ?><img src="<?php echo base_url('images/profile/'.$admininfo['profile']); ?>" width='100px' height='100px'>
                                               <?php } ?>
                                            <span style="color: red;"><?php echo form_error('profile'); ?>  </span>
                                        </div>
                                    </div>
                                                                <div class="row">
        <div class="col-8">
          <input type="submit" value="Update" name="submit" class="btn btn-primary float-right">
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