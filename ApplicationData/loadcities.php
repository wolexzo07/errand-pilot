<?php
include_once("finishit.php");
if(x_validateget("stateid")){
	
	$id = xg("stateid");
	
	if(x_count("cities","state_id='$id'") > 0){
		?>
	<p class="mb-3 mt-3">Choose city:</p>
	<select name="city" class="form-control">
		<?php
	echo '<option value="">Choose city...</option>';
		
		foreach(x_select("id,name","cities","state_id='$id'","0","name") as $key){
			$id = $key["id"];$name = stripslashes($key["name"]);
			echo "<option value='$id'>$name</option>";
		}
		?></select><?php
	}else{
		//echo "<option value=''>No city for state...</option>";
	}
	
}else{
	//echo "Invalid parameter";
}
?>