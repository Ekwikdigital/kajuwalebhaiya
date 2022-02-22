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
     <style>
         .ratings {
  display: flex;
  width: 70%;
  justify-content: center;
  overflow: hidden;
  flex-direction: row-reverse;
  height: 37px;
  position: relative;
}

.ratings-0 {
  filter: grayscale(100%);
}

.ratings > input {
  display: none;
}

.ratings > label {
  cursor: pointer;
  width: 40px;
  height: 40px;
  margin-top: auto;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 76%;
  transition: .3s;
}
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}

.ratings > input:checked ~ label,
.ratings > input:checked ~ label ~ label {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
}


.ratings > input:not(:checked) ~ label:hover,
.ratings > input:not(:checked) ~ label:hover ~ label {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
}
}

     </style>    
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
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Customer Name</th>
                    <th>Review</th>
                    <th>Rating</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      foreach($listing as $key=>$list) {
                          if($list['type']==1){ 
                              $product = $this->common_model->get_single_data('product',array('product_id'=>$list['p_id']));
                              $name = $product['p_name'];
                          }
                          else
                          {
                              $product = $this->common_model->get_single_data('pack_of_two',array('pack_product_id'=>$list['p_id']));
                              $name = $product['pack_name'];
                          }
                    ?>
                  <tr>
                    <td><?php  echo $key+1; ?></td>
                    <td><?php echo $list['p_id']; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $list['u_name']; ?></td>
                    <td><?php echo $list['u_review']; ?></td>
                    <td style="width: 103px;">
                     <div class="rating-star" style="margin-top:10px;"> 
                        <?php for($i=1;$i<=5;$i++){ 
                            if($list['u_rate']){  
                                if($i<=$list['u_rate']) { ?>  
									<i class="fa fa-star font-12" aria-hidden="true" style="color:orange"></i>
								<?php } else { ?>
								    <i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
								<?php }  } else { ?> 
									<i class="fa fa-star font-12" aria-hidden="true" style="color:lightgrey"></i>
						<?php } } ?>
                    </div>
                    </td>
                    <td><?php echo $list['date']; ?></td>
                    <td><a href="#" data-target="#edit_review<?php echo $list['id']; ?>" data-toggle="modal"><button class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>Edit</button></a>
                      <a class="btn btn-danger btn-sm" href="<?php echo site_url('Admin/Admin/delete_review/'.$list['id']); ?>" onclick="return confirm('Are you sure! you want to delete this review?');" style="margin-top:2px"><i class="fas fa-trash"></i>Delete</a></a></td>
                      
                      
    <div class="modal fade popup" id="edit_review<?php echo $list['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			
				<h4 class="modal-title" id="myModalLabel" style="text-align: left">Edit Review</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="err_msg"></div>
			<form method="post" id="marks_as_complete<?php echo $list['id']; ?>" onsubmit="return reviews(<?php echo $list['id']; ?>);">
				<div class="modal-body">
					<fieldset>
						<div class="form-group">
							<label>Feedback:</label>
							<textarea name="u_review" rows="5" id="input-review" class="form-control" minlength="25" maxlength="1000"><?php echo $list['u_review']; ?></textarea>
							<div class="msg1"></div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label>Rating:</label>
						        <div class="ratings">
                                  <input type="radio" name="u_rate" <?php if($list['u_rate']==5){ ?>checked <?php } ?> id="rating-5<?php echo $list['id']; ?>" value="5">
                                  <label for="rating-5<?php echo $list['id']; ?>"></label>
                                  <input type="radio" name="u_rate" <?php if($list['u_rate']==4){ ?>checked <?php } ?> id="rating-4<?php echo $list['id']; ?>" value="4">
                                  <label for="rating-4<?php echo $list['id']; ?>"></label>
                                  <input type="radio" name="u_rate" <?php if($list['u_rate']==3){ ?>checked <?php } ?> id="rating-3<?php echo $list['id']; ?>" value="3">
                                  <label for="rating-3<?php echo $list['id']; ?>"></label>
                                  <input type="radio" name="u_rate" id="rating-2<?php echo $list['id']; ?>" <?php if($list['u_rate']==2){ ?>checked <?php } ?> value="2">
                                  <label for="rating-2<?php echo $list['id']; ?>"></label>
                                  <input type="radio" name="u_rate" id="rating-1<?php echo $list['id']; ?>" <?php if($list['u_rate']==1){ ?>checked <?php } ?> value="1">
                                  <label for="rating-1<?php echo $list['id']; ?>"></label>
                                </div>
                                <div class="msg2"></div>
						</div>
					</fieldset>
				</div>
				<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary submit_btn" id="wrbtn">Submit<i class="fa fa-spinner fa-spin wrbtnloader" style="font-size:24px;display:none;"></i></button>
        </div>
			</form>
		</div>
	</div>
</div>
                    <?php } ?>
                  </tr>
                  </tbody>
                  <tfoot>
                  <th>Sr</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Customer Name</th>
                    <th>Review</th>
                    <th>Rating</th>
                    <th>Date</th>
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
        var base_url = '<?php echo base_url() ?>';
    </script>
<script>
  function reviews(pid)
  {
        $.ajax({
            type:'POST',
            url:base_url+'Admin/Admin/review_submit/'+pid,
            dataType: 'JSON',
            data:$('#marks_as_complete'+pid).serialize(),
             success:function(resp){
            if(resp.status==0){
			   location.reload();
			}
			else if(resp.status==1){
				$('.msg1').html(resp.msg1);
				$('.submit_btn').html('Submit');
				$('.submit_btn').prop('disabled',false);
			}
			else if(resp.status==2){
				$('.msg2').html(resp.msg2);
				$('.submit_btn').html('Submit');
				$('.submit_btn').prop('disabled',false);
			}
			else 
			{
			    $('.err_msg').html('<p class="alert alert-danger">Error! Something went wrong. Please try again</p>');
			}
            } 
        });
          return false;
  }

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
