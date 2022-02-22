<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" media="screen" />
<title>Invoice</title>

<style>
     .body-main {
     background: #ffffff;
     border-top: 15px solid #1E1F23;
     margin-top: 30px;
     margin-bottom: 30px;
     padding: 40px 30px !important;
     position: relative;
     box-shadow: 0 1px 21px #808080;
     font-size: 10px
 }

 .main thead {
     background: #1E1F23;
     color: #fff
 }

 .img {
     height: 100px
 }

 h1 {
     text-align: center
 }
 .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: none;
}

</style>
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 body-main">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4"> <img src="<?php echo base_url();?>image/resize-164310701455515656KWBpngtransparent1.png" title="Kajuwalebhaiya" alt="Kajuwalebhaiya" class="img"  /> </div>
                        <div class="col-md-8 text-right">
      
    	<a href="<?php echo base_url('my-orders'); ?>"><button id="home" class="btn btn-md btn-success">Back</button> </a>
      <input type="button" id="btnprint" class="btn btn-md" value="Print" onclick="print_page()" />
    
    
                        </div>
                    </div> <br />
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>INVOICE</h2>
                            <h5>Order Id: <?php echo $orders['order_id']; ?></h5>
                        </div>
                    </div> <br />
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <h5>Description</h5>
                                    </th>
                                    <th>
                                        <h5>Qty</h5>
                                    </th>
                                    <th>
                                        <h5>Weight</h5>
                                    </th>
                                    <th>
                                        <h5>Amount</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-md-6"><?php echo $orders['product_name']; ?></td>
                                    <td class="col-md-2"><?php echo $orders['quantity']; ?></td>
                                    <td class="col-md-2"><?php echo $orders['weight']; ?> </td>
                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo $orders['amount']; ?></td>
                                </tr>
                        
                                <tr style="color: #F81D2D;">
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h4 style="text-align: right;"><strong>Total:</strong></h4>
                                    </td>
                                    <td class="text-left" style="border:none;">
                                        <h4><strong><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo $orders['amount']; ?> </strong></h4>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        
                    </div>
                    <div>
                        <div class="col-md-12">
                            <p><b>Date :</b> <?php
                            $date=date_create($orders['creation_date']);
                            echo date_format($date,"d M, Y"); ?></p> <br />
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
  <script type="text/javascript">
        function print_page() {
            var ButtonControl = document.getElementById("btnprint");
            ButtonControl.style.visibility = "hidden";
             var Home = document.getElementById("home");
            Home.style.visibility = "hidden";
            window.print();
        }
    </script>