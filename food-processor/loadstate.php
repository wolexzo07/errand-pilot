<?php
include_once("finishit.php");
if(x_validateget("countryid")){
	
	$id = xg("countryid");
	
	if(x_count("states","country_id='$id'") > 0){
		?>
	<p class="mb-3 mt-3">Choose state:</p>	
	<select name="state" onchange="return loadcities(this.value)" class="form-control">
	<?php
	echo '<option value="">Choose state...</option>';
		
		foreach(x_select("id,name","states","country_id='$id'","0","name") as $key){
			$id = $key["id"];$name = stripslashes($key["name"]);
			echo "<option value='$id'>$name</option>";
		}
		?></select><?php
	}else{
		//echo "<option value=''>No state for country...</option>";
	}
	
}else{
	//echo "Invalid parameter";
}
?>