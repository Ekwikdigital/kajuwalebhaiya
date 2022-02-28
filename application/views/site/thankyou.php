<?php include ("include/header.php") ?>
<title>Thank You</title>
<style>
  body{
    background:url(images/whiteleave.jpeg);
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
    @media only screen and (min-width: 1200px) {
  #mobile-menu-icon {display:none;z-index:1;}
  .tab{width:20%;}
  .tabcontent
      {
          width: 80%;margin-left:10px;
      }
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
</style>
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
<div id="mobile-menu-icon"><span style="font-size:30px;cursor:pointer;color:black;z-index:1" onclick="openNav()">&#9776;</span>

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
</div>
<div class="container">

    <div class="row">                
    <div id="content" class="col-sm-12">      
   <h1 style="color:#6da552;text-align:center">Thank You, Payment Successful!!</h1>
   <?php require_once('application/libraries/Instamojo.php');
    $api = new Instamojo\Instamojo('d1970c786593490ffc5830dd1839af68', 'aa09fc7f60e3ff3cfa0e32cb0da59380','https://www.instamojo.com/api/1.1/');
     $PAYID = $_GET["payment_request_id"];
        
    try {
        $response = $api->paymentRequestStatus($PAYID);
        
        echo "<pre>";
        echo "<h4 style='text-align:center;margin-top:30px;'>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>" ;
        echo "<h4 style='text-align:center'>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h4>" ;
        echo "<h4 style='text-align:center'>Payment Email: " . $response['payments'][0]['buyer_email'] . "</h4>" ;
        echo "<h4 style='text-align:center'>Payment Mobile: " . $response['payments'][0]['buyer_phone'] . "</h4>" ;
        echo "<h4 style='text-align:center'>Payment Status: " . $response['payments'][0]['status'] . "</h4>" ;
         echo "</pre>";
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }
    ?>



</div>
    </div>
</div>
 
<?php include ("include/footer.php") ?>