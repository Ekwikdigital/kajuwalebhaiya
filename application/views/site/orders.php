<?php include ("include/header.php") ?>
<title>Order History</title>
<head>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<style>

body{
    background:url(../images/whiteleave.jpeg);
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
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-bottom:50px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #d92511;
  color: white;
}
* {box-sizing: border-box}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  width: 20%;
  height: 400px;
  background-color: #fff;
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
.empty-product {
    text-align: center;
    min-height: 100px;
    margin-top: 100px;
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
    
        <li><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>image/resize-164310701455515656KWBpngtransparent1.png" style="width:20px;height:20px;"></a></li>
        <li><a href="javascript:void(0)" style="font-size:20px;">Order History</a></li>
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
      <div class="message"> <div class="alert alert-success cart-added-success-message" style="z-index:1"><?php echo $this->session->flashdata('error'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      if($this->session->flashdata('success'))
      {
        ?>
       <div class="message"> <div class="alert alert-success cart-added-success-message" style="z-index:1"><?php echo $this->session->flashdata('success'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      ?>
                                           <?php 
      if($this->session->flashdata('error1'))
      {
        ?>
       <div class="message"> <div class="alert alert-success cart-added-success-message" style="z-index:1"><?php echo $this->session->flashdata('error1'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      if($this->session->flashdata('success1'))
      {
        ?>
     <div class="message">  <div class="alert alert-success cart-added-success-message" style="z-index:1"><?php echo $this->session->flashdata('success1'); ?><button type="button" class="close" data-dismiss="alert" style="color:white;display:block;">X</button></div></div>
        <?php
      }
      ?>
        <fieldset>
          <h2>Order History</h2><hr/>
          <?php $order = $this->common_model->get_user_orders($this->session->userdata('u_id')); 

          if($order){
          ?>
       <table id="customers">
                  <thead>
                  <tr>
                    <th>Sr</th>
                    <th>Order ID</th>
                     <th>Pay ID</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Amount</th>
                    <th>Quantity</th>
                    <th>Weight</th>
                    <th>Date</th>
                    <th>Invoice</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
              <?php
                      foreach($order as $key=>$list) {
                                    
                    ?>
                  <tr>
                    <td><?php  echo $key+1; ?></td>
                    <td><?php echo $list['order_id']; ?></td>
                     <td><?php echo $list['pay_id']; ?></td>
                    <td><?php echo $list['product_id']; ?></td>
                    <td><?php echo $list['product_name']; ?></td>
                    <td><i class="fa fa-inr rs-sym"></i> <?php echo $list['amount']; ?></td>
                    <td><?php echo $list['quantity']; ?></td>
                    <td><?php echo $list['weight']; ?></td>
                    <td><?php echo $list['creation_date']; ?></td>
                    <td><a class="btn btn-success btn-sm" href="<?php echo site_url('invoice/'.$list['o_id']); ?>" ><i class="fas fa-file-invoice"></i>Invoice</a></td>
                    <td><a class="btn btn-danger btn-sm" href="<?php echo site_url('Home/delete_order/'.$list['o_id']); ?>" onclick="return confirm('Are you sure! you want to delete this?');"><i class="fa fa-trash"></i>Delete</a></td>
                  </tr>
                  <?php } ?>
             
                  </tbody>
                 
                </table>
                <?php }else{ ?>
                <div class="empty-product"><p style="margin-top: 12px;">You have not made any orders yet!</p></div>
                <?php } ?>
</fieldset>
   
  
</div>

        </div>

</div>
</div>
</body>
</html>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script>
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
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
 document.getElementById('mobile-menu-icon').style.visibility = 'hidden'; 
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById('mobile-menu-icon').style.visibility = 'visible'; 
}
</script>

<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
  setTimeout(function () {
                    $('.message').fadeOut('slow');
                    }, 1500);
</script>
<script type="text/javascript"><!--
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>
<?php include ("include/footer.php") ?>