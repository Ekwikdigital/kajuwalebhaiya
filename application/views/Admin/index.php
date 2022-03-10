<?php include ("include/header.php") ?>
<head><title>Kajuwalebhaiya - Admin</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"></head>

<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php $total_orders = $this->common_model->get_total_orders(); ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total_orders[0]['count']; ?></h3>

                <p>Total Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url('orders'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php $total_products = $this->common_model->get_total_products(); ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $total_products[0]['total']; ?></h3>

                <p>Total Products</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
              </div>
              <a href="<?php echo base_url('products'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php $total_users = $this->common_model->get_total_users(); ?>
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $total_users[0]['count']; ?></h3>

                <p>User Registered</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('customers'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
             <?php $total_reviews = $this->common_model->get_total_review(); ?>
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $total_reviews[0]['total']; ?></h3>

                <p>Total Reviews</p>
              </div>
              <div class="icon">
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
              <a href="<?php echo base_url('reviews'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>




        

</body>


<!-- Mirrored from demo.dashboardpack.com/analytic-html/index_3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Dec 2021 05:58:46 GMT -->
</html>

        <!-- 
                <style>
          .blog{
            height:400px;
            width: 100%;
            /* border:2px solid red; */
          }
          .form-group{
            display:flex;
            flex-direction:column;
          }
        </style>
        
        php tag aayega yeha
        
        $servername = "localhost";
        $username = "u775928650_ekwikdigital";
        $password = "Admin007@#digital";
        $database = "u775928650_kajuwalebhaiya";
        
        $conn = mysqli_connect($servername,$username,$password,$database);
        
        if(!$conn){
            die("sorry we failed to connect".mysqli_connect_error());
        }	
        
        $sql = "SELECT * FROM `blogs`";
        $result = mysqli_query($conn,$sql);
        
        
        ?>
        
        <section class="blog">
          <h1>This is for blog section</h1>
          <form action="blog" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="blogheading"> Blog Heading</label>
              <input type="text" name="blogheading" id="blogheading">
            </div>
            <div class="form-group">
              <label for="blogdesc"> Blog Description</label>
              <textarea name="blogdesc" id="blogdesc" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label for="blogimage"> Blog Image</label>
              <input type="file" name="blogimage" id="blogimage">
            </div>
            <input type="submit" name="submit" value="Post Blog" >
          </form>
        </section>
                <!-- /.row -->
                <!-- Main row -->
                <!-- /.row (main row) -->
              <!-- </div> -->
              <!-- /.container-fluid -->
            <!-- </section> -->
            <!-- /.content -->
          <!-- </div>
        </div> -->
        <!-- ./wrapper -->
        <!-- jQuery -->
        
        <!-- Page specific script -->
        
        <!-- <script src="./ckeditor/ckeditor.js"></script> -->
        <!-- <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
        <script>
           ClassicEditor
            .create(document.querySelector('#blogdesc'))
            .catch(error => {
              console.error(error)
            })
        </script>  -->