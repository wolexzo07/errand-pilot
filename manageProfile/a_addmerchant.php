<?php
include_once("adminpagevalidator.php");
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
	<span class="badge badge-light p-3"><i class="fa fa-plus-circle"></i> &nbsp;&nbsp;SET - UP NEW  MERCHANT</span>
	<button class="btn btn-info pull-right" onclick="load('a_addmerchant')">
		<i class="fa fa-cog"></i> Refresh
	</button>
</div>
<div class="card-body">

<form id="setup-business" autocomplete="off" method="POST" enctype="multipart/form-data">

<button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> ADD MERCHANT </button>

<input type="hidden" name="_token" value="<?php echo sha1(uniqid()).sha1(rand(200,1000000));?>"/>

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
	<div style="margin-left:13pt;" id="gallery"></div>
	
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
			<p class="txtlabel">Owner's Name</p>
			<input type="text" placeholder="Enter Business owner's name" id="owner" required class="form-control " name="owner"/>
		</div>
		
		<div class="col-lg-6 col-md-6 col-12">
			<p class="txtlabel">Contact Person</p>
			<input type="text" placeholder="Enter Business contact person" id="contactperson" required class="form-control " name="contactperson"/>
		</div>
		
		<div class="col-lg-6 col-md-6 col-12">
			<p class="txtlabel">Business login</p>
			<input type="text" placeholder="Enter username" id="username" required class="form-control " name="username"/>
		</div>
		
		<div class="col-lg-6 col-md-6 col-12">
			<p class="txtlabel">Business password</p>
			<input type="password" placeholder="Enter login password" id="passkey" class="form-control" required name="passkey"/>
		</div>
	
	<div class="col-lg-6 col-md-6 col-12">
		<p class="txtlabel">Business Email</p>
		<input type="text" placeholder="Enter email address" id="email" required  class="form-control" name="email"/>
	</div>
	
	
	
	<div class="col-lg-6 col-md-6 col-12">
		<p class="txtlabel">Business Mobile</p>
		<input type="text" placeholder="Enter mobile number" id="mobile" required class="form-control " name="mobile"/>
	</div>
	
	<div class="col-lg-12 col-md-12 col-12">
		<p class="txtlabel">Business Hours</p>
		<input type="text" placeholder="Enter operating Hours" id="hour" required  class="form-control" name="hour"/>
	</div>
	
		<div class="col-lg-6 col-md-6 col-12">
		<p class="txtlabel">Country</p>
				 <select name="country" id="country"  required="" class="form-control" onchange="print_state('state',this.selectedIndex);" data-trigger="focus" data-location="top-left" data-title="Please select your country"></select>
			
			</div>
			
			<div class="col-lg-6 col-md-6 col-12">
				<p class="txtlabel">State / Provinces</p>	
				<select name="state" id="state" required="required"  class="form-control" data-trigger="focus" data-location="top-left" data-title="Please select your state of origin"></select>
		
			</div>
			
			<div class="col-lg-12 col-md-12 col-12">
				<p class="txtlabel">Business Branch</p>	
				<input type="text" placeholder="Enter Business Branch" id="branch" required class="form-control " name="branch"/>
			</div>

	
	<div class="col-lg-6 col-md-6 col-12">

	<p class="txtlabel">Business Description</p>
<textarea class="form-control  styletextarea" required id="describ" name="des" placeholder="Description"></textarea>

	</div>
	<div class="col-lg-6 col-md-6 col-12">

	<p class="txtlabel">Business Address</p>
<textarea class="form-control  styletextarea" required id="addr" name="addr" placeholder="Address"></textarea>

	</div>
</div>


<script type="text/javascript" src="js/loadimages.js"></script>
<div class="row">
<div class="col-lg-6 col-md-6 col-12">
<p class="txtlabel">Business Logo</p>
<input type="file" onchange="readURL(this,1)" id="uploadimg" class="form-control uploadimg" required name="upload1"/>


</div>

<div class="col-lg-6 col-md-6 col-12">
<p class="txtlabel">Cover photo</p>
<input type="file" onchange="readURL(this,2)" id="uploadimg" class="form-control uploadimg" required name="upload2"/>

</div>

	<div class="col-lg-6 col-md-6 col-12">
		<p class="txtlabel">Twitter Handle</p>
		<input type="text" placeholder="Enter Twitter Handle" id="twitter"  class="form-control" name="twitter"/>
	</div>
	
	
	
	<div class="col-lg-6 col-md-6 col-12">
		<p class="txtlabel">Facebook Handle</p>
		<input type="text" placeholder="Enter Facebook Handle" id="facebook"  class="form-control " name="facebook"/>
	</div>
	
	<div class="col-lg-6 col-md-6 col-12">
		<p class="txtlabel">Instagram Handle</p>
		<input type="text" placeholder="Enter Instagram Hanlde" id="instagram"  class="form-control " name="instagram"/>
	</div>
	
	<div class="col-lg-6 col-md-6 col-12">
		<p class="txtlabel">TikTok Handle</p>
		<input type="text" placeholder="Enter TikTok Handle" id="tiktok"  class="form-control " name="tiktok"/>
	</div>

</div>

</form>


</div>
</div>

</div>
<div class="col-lg-2 col-md-2 col-12 mt-3">

<div class="list-group text-center">
	<div id="shrinker" class="list-group-item"><img src="../image/avatar.png" id="img_prev1" class="imglog"/></div>
	<div class="list-group-item"><span class="badge badge-primary">Business Logo</span></div>
	<div class="list-group-item"><img src="../image/avatar.png" id="img_prev2" class="imglog"/></div>
	<div class="list-group-item"><span class="badge badge-success">Cover Photo</span></div>
	<!---<div class="list-group-item"><img src="../image/avatar.png" id="img_prev3" class="imglog"/></div>
	<div class="list-group-item"><span class="badge badge-primary">Stock Photo 3</span></div>
	<div class="list-group-item"><img src="../image/avatar.png" id="img_prev4" class="imglog"/></div>
	<div class="list-group-item"><span class="badge badge-success">Stock Photo 4</span></div>--->
</div>

</div>
<div class="col-lg-1 col-md-1 col-12"></div>

</div>

<script type="text/javascript" src="../ApplicationData/js/countries.js"></script>
<script language="javascript">print_country("country");</script> 