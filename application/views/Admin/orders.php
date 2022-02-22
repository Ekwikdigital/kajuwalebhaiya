<?php include ("include/header.php") ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/pages/tables/data.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Dec 2021 05:49:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Orders</title>

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
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
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
                    <th>Order ID</th>
                    <th>Payment ID</th>
                    <th>Product Name</th>
                    <th>Amount</th>
                    <th>Quantity</th>
                    <th>Weight</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Mobile No.</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Invoice</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      foreach($listing as $key=>$list) {
                         $address = $this->common_model->get_single_data('address',array('user_id'=>$list['user_id']));
                    ?>
                  <tr>
                    <td><?php  echo $key+1; ?></td>
                    <td><?php echo $list['order_id']; ?></td>
                    <td><?php echo $list['pay_id']; ?></td>
                    <td><?php echo $list['product_name']; ?></td>
                    <td><i class="fa fa-inr rs-sym"></i> <?php echo $list['amount']; ?></td>
                    <td><?php echo $list['quantity']; ?></td>
                    <td><?php echo $list['weight']; ?></td>
                    <td><?php echo $address['firstname'].' '.$address['lastname']; ?></td>
                    <td><?php if($address['address_1']){ echo $address['address_1'].', '.$address['city'].', '.$address['state'].', '.$address['country'].', '.$address['postcode']; }else{ echo $address['address_2'].', '.$address['city'].', '.$address['state'].', '.$address['country'].', '.$address['postcode']; } ?></td>
                    <td><?php echo $address['telephone']; ?></td>
                    <td><?php echo $list['creation_date']; ?></td>
                    <td>Paid</td>
                    <td><a class="btn btn-success btn-sm" href="<?php echo site_url('Admin/Admin/invoice/'.$list['o_id']); ?>" ><i class="fas fa-file-invoice"></i> Invoice</a></td>
                    <td><a class="btn btn-danger btn-sm" href="<?php echo site_url('Admin/Admin/delete_order/'.$list['o_id']); ?>" onclick="return confirm('Are you sure! you want to delete this?');"><i class="fas fa-trash"></i>Delete</a></td>
                   
                  </tr>
                   <?php } ?>
                  </tbody>
                  <tfoot>
                  <th>Sr</th>
                    <th>Order ID</th>
                    <th>Payment ID</th>
                    <th>Product Name</th>
                    <th>Amount</th>
                    <th>Quantity</th>
                    <th>Weight</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Mobile No.</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Invoice</th>
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
