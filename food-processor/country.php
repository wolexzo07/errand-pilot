<?php include_once("headtopper.php");?>
<title>Mercy City Online Shopping Platform - Place order for all your spiritual Items and get it delivered to your doorstep in any country around the Globe</title>
 <?php include_once("headerbase.php");?>

<div class="container">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">

<h3 class="mt-4">World List Data Dropdown</h3>

<form class="mt-4" method="">
<script src="loadworld.js"></script>
<p class="mb-3 mt-3">Choose country:</p>
<select name="country" onchange="return loadstate(this.value)" class="form-control">
<?php
if(x_count("countries","01") > 0){
	echo '<option value="">Choose country...</option>';
	foreach(x_select("id,name","countries","0","0","name") as $key){
		$id = $key["id"];$name = $key["name"];
		echo "<option value='$id'>$name</option>";
	}
}else{
	echo "<option value=''>No country in db...</option>";
}
?>
</select>

<div id="stateload"></div>
<div id="cityload"></div>

<button class="btn btn-success btn-sm ml-0 mt-3 btn-block"><i class="fa fa-send"></i> Process </button>

</form>

</div>
<div class="col-md-2"></div>
</div>
</div>



  <?php
  include_once("footscript.php");
  ?>
