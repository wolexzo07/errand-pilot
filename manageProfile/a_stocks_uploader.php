<?php
session_start();
include_once("../finishit.php");
?>
<style>
#slisting{
	display:none;
}

</style>
<div class="row">
<div class="col-lg-1 col-md-1 col-12"></div>
<div class="col-lg-8 col-md-8 col-12">

<script type="text/javascript" src="js/formpro.js"></script>

<div class="card formloader">
<div class="card-heading bg-default p-3">
	<span class="badge badge-light p-3"><i class="fa fa-plus-circle"></i> NEW STOCKS ITEMS</span>
	<button class="btn btn-info pull-right" onclick="load('a_stocks_uploader')">
		<i class="fa fa-cog"></i> Refresh
	</button>
</div>
<div class="card-body">

<form id="uploadstock" method="POST" enctype="multipart/form-data">

<button class="btn btn-success btn-sm"><i class="fa fa-cloud-upload"></i> UPLOAD </button>

<input type="hidden" name="_token" value="<?php echo sha1(uniqid()).sha1(rand(200,100000000));?>"/>

<div class="row">
	<script>
	function fetchlist(str){
	if (str.length==0) { 
		//document.getElementById("slisting").innerHTML="";
		return;
	}else{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				$("#slisting").show();
				document.getElementById("slisting").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","fetch_subservice?query="+str,true);
		xmlhttp.send();
	}    
	}
	</script>
	<div style="margin-left:13pt;" id="gallery"><img src="../image/ajax-loader.gif" class="img-responsive"/></div>
	
	<div class="col-12"></div>
	
	<div class="col-lg-6 col-md-6 col-12">
		<p class="txtlabel">Service Category</p>
		<select onchange="fetchlist(this.value)" class="form-control" required name="category">
		<option value="">---------</option>
				 <?php
				 if(x_count("categories","status='1' LIMIT 500") > 0){
					 foreach(x_select("0","categories","status='1'","500","id") as $slist){
						 $id = $slist["id"];
						 $did = $slist["dept_id"];
						 $list = $slist["department"];
						 ?>
						 <option value="<?php echo $did;?>"><?php echo $list;?></option>
						 <?php
					 }
				 }
				 ?>
		</select>
	</div>
	
	<div class="col-lg-6 col-md-6 col-12">
		
		<div id="slisting"><img src="img/ajax-loader.gif"/></div>
	
	</div>
	
	<div class="col-lg-6 col-md-6 col-12">
		<p class="txtlabel">Stock name</p>
		<input type="text" placeholder="Enter Stock name" id="stockname"  class="form-control " name="stockname"/>
	</div>
	
	<div class="col-lg-6 col-md-6 col-12">
		<p class="txtlabel">Stock number</p>
		<input type="text" placeholder="Enter Stock number" id="stocknumber"  class="form-control " name="stocknumber"/>
	</div>
	
	<div class="col-lg-6 col-md-6 col-12">

	<p class="txtlabel">Selling Price</p>
	<input type="number" placeholder="Enter Selling Price" id="stockprice" class="form-control " name="stockprice"/>

	</div>
	<div class="col-lg-6 col-md-6 col-12">

	<p class="txtlabel">Initial Quantity</p>
	<input type="number" class="form-control " id="stockquantity" placeholder="Enter initial Quantity" name="stockquantity"/>

	</div>
</div>

<p class="txtlabel">Stock Description</p>
<textarea class="form-control  styletextarea" id="stockdes" name="stockdes" placeholder="Enter product description"></textarea>
<script type="text/javascript" src="js/loadimages.js"></script>
<div class="row">
<div class="col-lg-6 col-md-6 col-12">

<input type="file" onchange="readURL(this,1)" id="uploadimg" class="form-control uploadimg" required name="upload1"/>


</div>

<div class="col-lg-6 col-md-6 col-12">

<input type="file" onchange="readURL(this,2)" id="uploadimg" class="form-control uploadimg" required name="upload2"/>

</div>

<div class="col-lg-6 col-md-6 col-12">

<input type="file" onchange="readURL(this,3)" id="uploadimg" class="form-control uploadimg" required name="upload3"/>
</div>

<div class="col-lg-6 col-md-6 col-12">

<input type="file" onchange="readURL(this,4)" id="uploadimg" class="form-control uploadimg" required name="upload4"/>
</div>

</div>

</form>


</div>
</div>

</div>
<div class="col-lg-2 col-md-2 col-12 mt-3">

<div class="list-group text-center">
	<div id="shrinker" class="list-group-item"><img src="../image/avatar.png" id="img_prev1" class="imglog"/></div>
	<div class="list-group-item"><span class="badge badge-primary">Stock Photo 1</span></div>
	<div class="list-group-item"><img src="../image/avatar.png" id="img_prev2" class="imglog"/></div>
	<div class="list-group-item"><span class="badge badge-success">Stock Photo 2</span></div>
	<div class="list-group-item"><img src="../image/avatar.png" id="img_prev3" class="imglog"/></div>
	<div class="list-group-item"><span class="badge badge-primary">Stock Photo 3</span></div>
	<div class="list-group-item"><img src="../image/avatar.png" id="img_prev4" class="imglog"/></div>
	<div class="list-group-item"><span class="badge badge-success">Stock Photo 4</span></div>
</div>

</div>
<div class="col-lg-1 col-md-1 col-12"></div>

</div>