<?php include("include/header.php") ?>
<style>
  body {
    background: url(images/whiteleave.jpeg);
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

  @media screen and (max-height: 450px) {
    .sidenav {
      padding-top: 15px;
    }

    .sidenav a {
      font-size: 18px;
    }
  }

  @media only screen and (min-width: 1200px) {
    #mobile-menu-icon {
      display: none;
    }

    .container {
      padding-left: 15px;
      padding-right: 15px;
    }

    .banners {
      margin-left: 13px;
      margin-right: 13px;
    }

  }

  @media (max-width: 767px) {
    #mobile-menu-icon {
      z-index: 1;
    }

  }

  @media (max-width: 992px) {
    #mobile-menu-icon {
      z-index: 1;
    }
  }

  /* new design */
  .flex {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .flex2 {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
  }

  .founder-div {
    padding: 50px;
    align-items: center;
    text-align: justify;
    width: 100%;
  }

  #founder-div1 {
    align-items: center;
    text-align: center;
  }

  .founder-div img {
    box-shadow: 0px 0px 10px black;
    border-radius: 20px;
    height: 400px;
    width: 400px;
  }

  .card {
    box-shadow: 0px 0px 10px black;
    display:flex;
    /* justify-content:space-around; */
    flex-direction:column;
    align-items:center;
    border-radius: 10px;
    border: 2px solid black;
    height: 600px;
    width: 400px ;
    transition: all 0.3s ease;
  }
  .card:hover {
    transform: scale(1.02);
  }
  .card p {
    padding:20px;
    text-align:justify;
  }
  .card h2 {
    text-align:center;
  }
  .bg {
    border-radius: 10px;
    height:300px;
    width: 100%;
  }
  .fbg1 {
    background-color: greenyellow;
  }
  .fbg{
    margin-bottom: 50px;
    background-image: linear-gradient(to right bottom, #ffaf00, #ffb800, #ffc000, #ffc900, #ffd200); }
  #bg1 {
    background:no-repeat center center/cover url(./images/businessman_vision_lightbulb.jpg);
  }
  #bg2 {
    
    background:no-repeat center center/cover url(./images/458.jpg);
  }
  #bg3 {
    background:no-repeat center center/cover url(./images/3569284.jpg);

  }
  h2 {
    text-align: center;
  }
  .p {
    text-align: justify;
    padding: 50px;
  }
</style>
<title>About Us</title>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php $head = $this->common_model->get_cat_all();
  foreach ($head as $h) {
    $sub = $this->common_model->get_subcategory($h['cid']);
  ?>
    <li class="nav-item dropdown" style="list-style:none;font-size:17px;">
      <?php if (sizeof($sub) > 0) {  ?>
        <a href="<?php echo base_url('products/' . $h['cat_id']); ?>" style="font-size:17px;"><?php echo $h['cat_name']; ?></a>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" style="font-size:17px;margin-top: -36px;margin-left: 185px;visibility: visible;opacity: 1;"> <i class="fa fa-plus" id="pluses<?php echo $h['cid']; ?>" onclick="return myFunction(<?php echo $h['cid']; ?>)" style="color:black;"></i>
          <i class="fa fa-minus" id="minus<?php echo $h['cid']; ?>" onclick="return myFunction1(<?php echo $h['cid']; ?>)" style="display:none;color:black;"></i>
        </a>
        <div class="dropdown-menu" id="menudrop<?php echo $h['cid']; ?>" aria-labelledby="navbarDropdown" style="min-width: 250px;display:none;">
          <?php foreach ($sub as $s) { ?>
            <a class="dropdown-item" href="<?php echo base_url('allproduct/' . $s['cat_sub_id']); ?>" style="font-size:17px;"><?php echo $s['sub_cat_name']; ?></a>
          <?php } ?>
        </div>
      <?php } else { ?>
        <a href="<?php echo base_url('products/' . $h['cat_id']); ?>" style="font-size:17px;"><?php echo $h['cat_name']; ?>
        </a>
      <?php } ?>
    </li>
  <?php } ?>
</div>
<div id="mobile-menu-icon"><span style="font-size:30px;cursor:pointer;color:black;z-index:1" onclick="openNav()">&#9776;</span>

  <script>
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
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>image/resize-164310701455515656KWBpngtransparent1.png" style="width:20px;height:20px;"></a></li>
    <li>About Us</li>
  </ul>
</div>


<!-- new design for about us -->
<section class="flex">
  <div id="founder-div1" class="founder-div">
    <img src="./images/banner1.jpg" alt="" srcset="">
  </div>
  <div class="founder-div fbg1">
    <h1>About Us</h1>
    <p>Kaju Wale Bhaiya was founded for providing the best quality dry fruits, pickles, and masala powder. We travel the world to find the finest quality nuts and dry fruits. So, we can process these in our processing plants and deliver them to our customers.

      Our team keeps finding top-quality almonds, cashews, pistachios, and other dry fruits. We have one of the largest processing plants and packaging teams. They all do excellent work to produce a massive volume of processed dry fruits and nuts by maintaining 100% hygiene standards.

      Not only this, but our branded products are also the favorite of Indian moms. They get top-class chili, coriander, garam masala, and other processed masala powders. Our brand also produces the best quality pickles that your friends and family love to have with dinner.

      You also know moms always try their best to find top-quality masala powder, dry fruits, and pickles. So, they can provide healthy and hygienic food to their family.
    </p>
  </div>
</section>
<section class="flex  fbg">
  <div class="founder-div">
    <h1>About Us</h1>
    <p>Kaju Wale Bhaiya was founded for providing the best quality dry fruits, pickles, and masala powder. We travel the world to find the finest quality nuts and dry fruits. So, we can process these in our processing plants and deliver them to our customers.

      Our team keeps finding top-quality almonds, cashews, pistachios, and other dry fruits. We have one of the largest processing plants and packaging teams. They all do excellent work to produce a massive volume of processed dry fruits and nuts by maintaining 100% hygiene standards.

      Not only this, but our branded products are also the favorite of Indian moms. They get top-class chili, coriander, garam masala, and other processed masala powders. Our brand also produces the best quality pickles that your friends and family love to have with dinner.

      You also know moms always try their best to find top-quality masala powder, dry fruits, and pickles. So, they can provide healthy and hygienic food to their family.
    </p>
  </div>
  <div id="founder-div1" class="founder-div">
    <img src="./image/logoss.png" alt="" srcset="">
  </div>
</section>
<section class="flex2">
<div class="card">
  <div id="bg1" class="bg">  </div>
  <h2>Our Vision</h2>
  <p>The Kaju Wale Bhaiya team has a beautiful vision to provide high-quality products to our customers. Nowadays, many junk and inferior dry fruits are available in the market. And all these are causing health problems for the people who use these. But now, you do not need to buy inferior quality dry fruits, pickles, and masala powders. Because we have top-notch solutions for the same in the budget-friendly segment.  </p>
</div>
<div class="card">
  <div id="bg2" class="bg">  </div>
  <h2>Our Mission</h2>
  <p>One of our team's major priorities is to help others overcome unhealthy habits. And provide healthy and tasty nuts and masala powder to every Indian kitchen. So, more and more people can benefit themselves by getting 100% quality and healthy products. </p>
</div>
<div class="card">
  <div id="bg3" class="bg">  </div>
  <h2>Our Goal</h2>
  <p>Kaju Wale Bhaiya aims to make people aware, including school students and working professionals. And help them choose the best diets rich with original taste and nourishment. Our team's crucial goal is to help those who get the wrong diets and face health issues. And we decided to help all these people with our 100% natural products. </p>
</div>
</section>
<h2>Preferable Choice of Dietician</h2>
<p class="p">Many expert dieticians prefer our branded and top-quality walnuts, cashew, and other dry fruits. Because we bring all our products from the best places and process them hygienically. So, if you are also willing to purchase top-quality walnuts, cashew, and other types of dry fruits. You must make sure you check out our store and find the best match for your needs. You can even buy all types of masala powder and pickles for your home use. </p>
<script>
  function myFunction(id) {
    $('#minus' + id).show();
    $('#pluses' + id).hide();
    $('#menudrop' + id).show();
  }

  function myFunction1(id) {
    $('#minus' + id).hide();
    $('#pluses' + id).show();
    $('#menudrop' + id).hide();
  }
</script>

<?php include("include/footer.php") ?>