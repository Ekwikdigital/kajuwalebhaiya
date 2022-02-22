<?php include ("include/header.php") ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Deal</title>

  <!-- Google Font: Source Sans Pro -->

</head>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add deal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Deal</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
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
          <div class="card card-primary">
            <div class="card-body">
            <form role="form" action="<?php echo base_url('Admin/Product/add_deal_submit'); ?>" method="post" id="vendorFormVal" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputName">Deal Image</label>
                <input type="file" id="d_image" name="d_image" class="form-control" required value="<?php echo set_value('d_image'); ?>">
                
                <span style="color: red;"><?php echo form_error('d_image'); ?>  </span>
              </div>
              <div class="form-group">
                <label for="inputName">Discount</label>
                <input type="text" id="d_discount" name="d_discount" class="form-control" required value="<?php echo set_value('d_discount'); ?>">
                
                <span style="color: red;"><?php echo form_error('d_discount'); ?>  </span>
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Status</label>
                <input type="checkbox" name="d_status" value="1" checked id="d_status">
              </div>
              <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url('deal_of_day') ?>" class="btn btn-secondary float-right">Cancel</a>
          <input type="submit" value="Add" class="btn btn-success float-right" style="margin-right: 8px;">
        </div>
      </div>
  </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>


