<!DOCTYPE html>
<html lang="en">
<?php include ("include/header.php") ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Product</title>

  <!-- Google Font: Source Sans Pro -->
                  <?php 
 
if ($get_last_record) {
   $get_last_record=$get_last_record[0]; 
$product_idd= $get_last_record->product_id;
} else {
   $product_idd= '89675712017101';
}
?>
</head>
<body>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="card card-primary">
            <div class="card-body">
            	<form role="form" action="<?php echo base_url('Admin/Product/edit_submit/'.$product['pid']); ?>" method="post" id="vendorFormVal" enctype="multipart/form-data">
            	         <div class="row">
      	<div class="col-md-6">
      		<div class="form-group">
                <label for="inputDescription">Select Product Category</label>
                <select type="text" name="product_cat" id="product_cat" required  onchange="return getsub($(this).val())" class="form-control" >
				<option value=''>Select</option>
				<?php foreach($category as $c){?>
				<option value='<?php echo $c['cid'];?>' <?php if($product['product_cat']==$c['cid']){ echo "selected"; } ?> ><?php echo $c['cat_name'];?></option>
				<?php } ?>
			</select>
			<span style="color: red;"><?php echo form_error('product_cat'); ?>  </span>
              </div>
      	</div>
      	  <div class="col-md-6">
      		<div class="form-group">
                <label for="inputDescription">Select Sub Category</label>
                <select type="text" name="product_sub_cat" id="product_sub_cat"   class="form-control" >
				<option value=''>Select</option>
				<?php foreach($sub as $s){?>
				<option value='<?php echo $s['sid'];?>' <?php if($product['product_sub_cat']==$s['sid']){ echo "selected"; } ?> ><?php echo $s['sub_cat_name'];?></option>
				<?php } ?>
			
			</select>
              </div>
      	</div>
      

      </div>
      <div class="row">
           	<div class="col-md-6">
      		<div class="form-group">
                <label for="inputDescription">Product Id</label>
                <input type="text" id="product_id" name="product_id" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" required value="<?php echo $product['product_id']; ?>">
                <span style="color: red;">(Last product id is : <?php echo $product_idd; ?>)</span></span>
                <span style="color: red;"><?php echo form_error('product_id'); ?>  </span>
              </div>
      	</div>
      	<div class="col-md-6">
      		<div class="form-group">
                <label for="inputName">Product Name</label>
                <input type="text" id="p_name" name="p_name" class="form-control" required value="<?php echo $product['p_name']; ?>">
                <span style="color: red;"><?php echo form_error('p_name'); ?>  </span>
              </div>
      	</div>
     
      </div>
       <?php if($price){ ?><div class="row">
      		
      	 
      	     		<div class="col-md-3">
      		<div class="form-group">
                <a href="javascript:void(0);" class="btn btn-primary" onclick="add_more();">Add more  </a>
              </div>
      	</div>
      </div>
      <?php foreach($price as $p){ ?>
            <div class="dele<?php echo $p['p_id']; ?>">
            <div class="row">
               
      		<div class="col-md-3">
      		<div class="form-group">
                <label for="inputName">Weight in gms/kg</label>
                <input type="text" id="p_weight" name="p_weight[]" placeholder="Example: 100 gms" required  class="form-control" value="<?php echo $p['weight']; ?>">
              </div>
      	</div>
      	 <div class="col-md-3">
      		<div class="form-group">
                <label for="inputName">Price </label>
                <input type="text" id="p_price" name="p_price[]" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Product price" required value="<?php echo $p['price']; ?>" class="form-control">
              </div>
      	</div>
      	
      	<div class="col-md-3">
      	    <div class="form-group">
      	    <button type="button" class="btn btn-danger delbtn" name="remove" style="margin-top: 31px;" onclick="return deleteprice(<?php echo $p['p_id']; ?>);">X</button>
      	      
      	        </div>
      	        </div>
            </div>

      </div>
      <?php }} else { ?>
      <div class="row">
      		<div class="col-md-3">
      		<div class="form-group">
                <label for="inputName">Weight in gms/kg</label>
                <input type="text" id="p_weight" name="p_weight[]" placeholder="Example: 100 gms" required  class="form-control">
              </div>
      	</div>
      	 <div class="col-md-3">
      		<div class="form-group">
                <label for="inputName">Price </label>
                <input type="text" id="p_price" name="p_price[]" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Product price" required class="form-control">
              </div>
      	</div>
      	     		<div class="col-md-3">
      		<div class="form-group">
                <a href="javascript:void(0);" class="btn btn-primary" onclick="add_more();" style="margin-top:31px;">Add more  </a>
              </div>
      	</div>
      </div>
       <div class="input-append">
		    <div id="field1">
			</div>
		</div>
      <?php } ?>
      
      
      
       
             <div class="row">
    
      	<div class="col-md-6">
      		<div class="form-group">
                <label for="inputName">Product Thumbnail Image(225*225)</label>
                <input type="file" name="thumbnail_image" class="form-control" <?php if($product['p_image']==''){ ?> required <?php } ?> accept=".png, .jpg, .jpeg">
              </div>
              <div class="gg">
              	<?php if($product['p_image']!=''){ ?>
				<img src="<?php echo base_url(); ?>thumbnail/<?php echo $product['p_image']; ?>" style="vertical-align:middle; margin-top: 11px;" width="80" height="80" > 
				<span class="btn btn-danger btn-sm" style="cursor:pointer;" onclick="image(<?php echo $product['pid']; ?>)">X</span>
				<?php } ?>
			  </div>
      		
      	</div>
      	      	<div class="col-md-6">
      		<div class="form-group">
                <label for="inputName">Product Multiple Image(1200*1600)</label>
                <input type="file" id="id_valuee" class="form-control" name="files[]" accept=".png, .jpg, .jpeg"  multiple="multiple">
				<span style="color: blue">(Maximum 5 image upload)</span>
              </div>
              <?php
              if($product['product_multi_img']!='')
              {
			     $image_arr = explode(",", $product['product_multi_img']); 
			     $i=0;
			     $imga=array_filter($image_arr);
			      foreach($imga as $image_name)  
				  {
					$i++;
			     ?>
			      <tr class="imagelocationnea<?php echo $i; ?>" style="margin-top: 22px;">
			      	
			      	<td colspan="2" align="center">
					    
					<img src="<?php echo base_url(); ?>thumbnail/multi/<?php echo $image_name; ?>" id="ff<?php echo $i; ?>" style="vertical-align:middle;" width="80" height="80"  class="mr-1 mt-3">
					<span class="btn btn-danger btn-sm" id="ffd<?php echo $i; ?>" style="cursor:pointer;" onclick="deletemulti(<?php echo $i; ?>,'<?php echo $image_name; ?>',<?php echo $product['pid']; ?>)">X</span>
				
					</td>
				
					</tr>

					<?php } } ?>
      	</div>
      </div> 
<div class="row">
        <div class="col-md-6">
      		<div class="form-group">
                <label for="inputName">Discount</label>
                <input type="text" id="p_discount" name="p_discount" placeholder="Product discount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $product['p_discount']; ?>">
              </div>
              
      	</div>
      	<div class="col-md-6">
      	<div class="form-group">
                <label for="inputName">Total Quantity</label>
                <input type="text" id="p_quantity" name="p_quantity" placeholder="Quantity of Product" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="<?php echo $product['p_quantity']; ?>">
              </div>
      	</div>

      </div>
            <div class="row">
        <div class="col-md-6">
      		<div class="form-group">
                <label for="inputName">Product Brand</label>
                <input type="text" id="p_brand" name="p_brand" placeholder="Product brand" class="form-control" value="<?php echo $product['p_brand']; ?>">
              </div>
              
      	</div>
      	<div class="col-md-6">
      	<div class="form-group">
                <label for="inputName">Packaging Weight</label>
                <input type="text" id="p_package_wt" name="p_package_wt" placeholder="Example: 1 kg" class="form-control" value="<?php echo $product['p_package_wt']; ?>">
              </div>
      	</div>

      </div>
        <div class="row">
        <div class="col-md-6">
      		<div class="form-group">
                <label for="inputName">Speciality</label>
                <select type="text" name="p_speciality" id="p_speciality" required class="form-control" >
				<option value=''>Select</option>
				<option value='vegan' <?php if($product['p_speciality']=='vegan'){  echo "selected"; } ?>>Vegan</option>
				<option value='nvegan' <?php if($product['p_speciality']=='nvegan'){  echo "selected"; } ?>>Non-Vegan</option>
			</select>
              </div>
              
      	</div>
      	<div class="col-md-6">
      	<div class="form-group">
                <label for="inputName">Country of Origin</label>
                <input type="text" id="p_origin" name="p_origin" placeholder="Example: India" class="form-control" value="<?php echo $product['p_origin']; ?>">
              </div>
      	</div>

      </div>
      	<div class="row">
                  	<div class="col-md-12">
      		<div class="form-group">
                <label for="inputName">Description of the product</label>
                <textarea class="form-control" name="p_description" rows="6" id="p_description"><?php echo $product['p_description']; ?></textarea>
              </div>
      	</div>
      </div>
      <div class="row">
                  	<div class="col-md-12">
      		<div class="form-group">
                <label for="inputName">About product</label>
                <textarea class="form-control" name="p_about" rows="6" id="p_about"><?php echo $product['p_about']; ?></textarea>
              </div>
      	</div>
      </div>
      <div class="row">
      	<div class="col-md-4">
      		<div class="form-group">
                <label for="inputProjectLeader">Status</label>
                <input type="checkbox" name="p_status" <?php if($product['p_status']==1){ ?>checked <?php } ?> value="1" id="p_status">
              </div>
      	</div>
      	<div class="col-md-4">
      		<div class="form-group">
                <label for="inputProjectLeader">Top Selling</label>
                <input type="checkbox" name="top_sell" value="1" <?php if($product['top_sell']==1){ ?>checked <?php } ?> id="top_sell">
              </div>
      	</div>
      	<div class="col-md-4">
      		<div class="form-group">
                <label for="inputProjectLeader">Popular Searches</label>
                <input type="checkbox" name="popular" value="1" <?php if($product['popular']==1){ ?>checked <?php } ?> id="popular">
              </div>
      	</div>
      </div>
      <div class="form-group">
                
              </div>
                            <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url('products') ?>" class="btn btn-secondary float-right">Cancel</a>
          <input type="submit" value="Update" class="btn btn-success float-right" style="margin-right: 8px;">
        </div>
      </div>
  </form>
  </div>
</div>
          
    </section>
    <!-- /.content -->
  </div>
 </body>
</html>


<script type="text/javascript">

$(document).ready(function() {
$("input#id_valuee[type='file']").change(function(){
        var $fileUpload = $("input#id_valuee[type='file']");
        if (parseInt($fileUpload.get(0).files.length)>5){
         alert("You can only upload a maximum of 5 files");
     return true;
        }
    });

    });
        function getsub(val)
    {
	$.ajax({
			url:base_url+'Admin/Product/get_sub',
			type:"POST",
			dataType:'json',
			data:{'val':val},
			success:function(datas)
			{
			
		   $('#product_sub_cat').html(datas.sub);
	
				return false;
			}
	});
	return false;
	
}
  function image(pid)
  {
	var answer = confirm ("Are you sure you want to delete from this image?");
	if (answer)
	{
	        $.ajax({
	                type: "POST",
	               
	                url: "<?php echo base_url('Admin/Product/deleteimage/')?>"+pid,
	                data: {pid: pid},
	                success: function (response) {

	                  if (response == 1) {
	                    $(".gg").remove(".gg");
	                   }
	                  
	                }
	            });
	        return false;
	      }
	}
	function deletemulti(i, image_name, pid)
	{
	    var answer = confirm ("Are you sure you want to delete from this post?");
		if (answer)
		{
		    $.ajax({
                type: "POST",
               
               url: "<?php echo base_url('Admin/Product/deletecmultiimageea/')?>"+pid,
                data: {image : image_name ,pid:pid},
                success: function (response) {
                if (response == 1) {
                    

                     $("#ff"+i).remove();
                     $("#ffd"+i).remove();
                  }
                  
                }
            });
            return false;
		    }
	}
	function deleteprice(id) {
    var answer = confirm ("Are you sure?");
		if (answer)
		{
		    $.ajax({
                type: "POST",
               
               url: "<?php echo base_url('Admin/Product/deleteprice/')?>"+id,
                data: {id:id},
                success: function (response) {
                if (response == 1) {
                    

                     $(".dele"+id).remove();
                  }
                  
                }
            });
            return false;
		    }
}

</script>
<script>
      var next = 100;
  function add_more() {
  next = next + 1;
  $(".input-append").append('<div id="field'+next+'"><div class="row"><div class="col-md-3"><div class="form-group"><label for="inputName">Weight in gms/kg</label><input type="text" id="p_weight" required name="p_weight[]" placeholder="Product weight" class="form-control"></div></div><div class="col-md-3"><div class="form-group"><label for="inputName">Product price</label><input type="text" required id="p_price" onkeypress="return isNumber(event);" name="p_price[]" placeholder="Product price" class="form-control"></div></div><div class="col-md-3"><div class="form-group"><button class="btn btn-danger" onclick="removeadd('+next+')" type="button" style="margin-top: 31px;">X</button></div></div></div></div>');

}

function removeadd(id) {
  $("#field"+id).remove();
}
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>

