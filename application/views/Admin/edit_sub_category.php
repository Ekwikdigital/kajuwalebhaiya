
<?php include ("include/header.php") ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Sub Category</title>

  <!-- Google Font: Source Sans Pro -->
<?php 
 
if ($get_last_record) {
   $get_last_record=$get_last_record[0]; 
$product_idd= $get_last_record->cat_sub_id;
} else {
   $product_idd= '3110001';
}
?>
</head>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Sub Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Sub Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-body">
            <form role="form" action="" method="post" id="vendorFormVal" enctype="multipart/form-data">
                <div class="form-group">
                <label for="inputDescription">Select Category</label>
                <select type="text" name="product_cat" id="product_cat" required  class="form-control" >
				<option value=''>Select</option>
				<?php foreach($category as $c){?>
				<option value='<?php echo $c['cid'];?>' <?php if($sub['cat_id']==$c['cid']){ echo 'selected'; } ?>><?php echo $c['cat_name'];?></option>
				<?php } ?>
			</select>
			<span style="color: red;"><?php echo form_error('product_cat'); ?>  </span>
              </div>
              <div class="form-group">
                <label for="inputName">Sub Category Id</label>
                <input type="text" id="cat_sub_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="cat_sub_id" class="form-control" value="<?php echo $sub['cat_sub_id']; ?>">
                <span style="color: red;">(Last product id values is : <?php echo $product_idd; ?>)</span></span>
                <span style="color: red;"><?php echo form_error('cat_sub_id'); ?>  </span>
              </div>
              <div class="form-group">
                <label for="inputDescription">Sub Category Name</label>
                <input type="text" id="sub_cat_name" name="sub_cat_name" class="form-control" value="<?php echo $sub['sub_cat_name']; ?>">
                <span style="color: red;"><?php echo form_error('sub_cat_name'); ?>  </span>
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Status</label>
                <input type="checkbox" name="sub_cat_status" value="1" <?php if($sub['sub_cat_status']==1){ ?>checked <?php } ?> id="sub_cat_status">
              </div>
              <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url('sub-categories') ?>" class="btn btn-secondary float-right">Cancel</a>
          <input type="submit" value="Update" class="btn btn-success float-right" style="margin-right: 8px;">
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


