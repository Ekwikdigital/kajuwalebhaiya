<?php include ("include/header.php") ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/pages/tables/data.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Dec 2021 05:49:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Pack of Two</title>

  <!-- Google Font: Source Sans Pro -->

</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pack of Two</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Pack of Two</li>
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
              <div class="card-header">
                <h3 class="card-title"></h3>
                <a href="<?php echo base_url('add-pack-two'); ?>"><input type="submit" value="Add New Product" class="btn btn-success float-right"></a>
              </div>
              <div class="row">
        <div class="col-12">
          
        </div>
      </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>Sr</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    
                    <th>Discount</th>
                    <th>Description </th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($listing as $key=>$list) {
                                    
                    ?>
                  <tr>
                    <td><?php  echo $key+1; ?></td>
                    <td><?php  echo $list['pack_product_id']; ?></td>
                    <td><?php  echo $list['pack_name']; ?></td>
                    <td><?php $get_category=$this->Common_model->get_single_data('category',array('cid'=>$list['product_cat'])); echo $get_category['cat_name']; ?></td>

                    <td><?php echo $list['pack_discount']; ?></td>
                                        <td><?php echo $list['pack_description']; ?></td>
                    <td><?php  echo $list['pack_create_date']; ?></td>
                    <td><a class="btn btn-info btn-sm" href="<?php echo base_url('edit-pack-two/'.$list['pack_id']); ?>">
                      <i class="fas fa-pencil-alt"></i>Edit</a>
                      <a class="btn btn-danger btn-sm" href="<?php echo site_url('Admin/Packed/delete_product/'.$list['pack_id']); ?>" onclick="return confirm('Are you sure! you want to delete this product?');" style="margin-top:2px;"><i class="fas fa-trash"></i>Delete</a>
                      
                  </td>
                  </tr>
                <?php } ?>
                  </tbody>
                  <tfoot>
                 <th>Sr</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    
                    <th>Discount</th>
                    <th>Description </th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tfoot>
                </table>
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
<script>
 $(function() {
// setTimeout() function will be fired after page is loaded
// it will wait for 5 sec. and then will fire
// $("#successMessage").hide() function
    
    $(".alert").hide(8000);

});
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      "buttons": ["csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

<!-- Mirrored from adminlte.io/themes/v3/pages/tables/data.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Dec 2021 05:49:39 GMT -->
</html>
