<?php include ("include/header.php") ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Category</title>

  <!-- Google Font: Source Sans Pro -->
<?php 
 
if ($get_last_record) {
   $get_last_record=$get_last_record[0]; 
$product_idd= $get_last_record->cat_id;
} else {
   $product_idd= '12030';
}
?>
</head>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
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
                <label for="inputName">Category Id</label>
                <input type="text" id="cat_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="cat_id" class="form-control" value="<?php echo $category['cat_id']; ?>">
                <span style="color: red;">(Last product id values is : <?php echo $product_idd; ?>)</span></span>
                <span style="color: red;"><?php echo form_error('cat_id'); ?>  </span>
              </div>
              <div class="form-group">
                <label for="inputDescription">Category Name</label>
                <input type="text" id="cat_name" name="cat_name" class="form-control" value="<?php echo $category['cat_name']; ?>">
                <span style="color: red;"><?php echo form_error('cat_name'); ?>  </span>
              </div>
              <div class="form-group">
                <label for="inputDescription">Category Image(310*186)</label>
                <input type="file" name="cat_image" <?php if($category['cat_image']==''){?> required <?php } ?> class="form-control" accept=".png, .jpg, .jpeg">
                <span style="color: red;"><?php echo form_error('cat_image'); ?>  </span>
                <?php if($category['cat_image']!=''){ ?>
				<img src="<?php echo base_url(); ?>category/<?php echo $category['cat_image']; ?>" style="vertical-align:middle; margin-top: 11px;" width="80" height="80" > 
				<?php } ?>
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Status</label>
                <input type="checkbox" name="cat_status" value="1" <?php if($category['cat_status']==1){ ?>checked <?php } ?> id="cat_status">
                <label for="inputProjectLeader" style="margin-left:50px;">Popular</label>
                <input type="checkbox" name="cat_popular" value="1" <?php if($category['cat_popular']==1){ ?>checked <?php } ?> id="cat_popular">
              </div>
              <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url('categories') ?>" class="btn btn-secondary float-right">Cancel</a>
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


