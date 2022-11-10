<?php
include("../finishit.php");
xstart(0);
if(x_validateget("query") && x_validatesession("PAGE_TOKEN")){
	$q = xg("query");
	$getlimit = x_getsingle("SELECT value FROM limit_query_result WHERE status='1'","limit_query_result WHERE status='1'","value");
	if(x_count("sub_service","category_id='$q' AND status='1'") > 0){
		?>
			<p class="txtlabel">Sub-Service</p>
	<select class="form-control" required name="subcategory">
				 <?php
					 foreach(x_select("0","sub_service","category_id='$q' AND status='1'","$getlimit","id") as $slist){
						 $id = $slist["id"];
						 $sid = $slist["subservice_id"];
						 $subser = $slist["subservice"];
						 ?>
						 <option value="<?php echo $sid;?>"><?php echo $subser;?></option>
						 <?php
					 }
				 ?>
		</select>
		<?php
	}else{
		?>
	<p class="txtlabel">Sub-Service</p>
	<select class="form-control" required name="subcategory">
				 <option value="">No result found!</option>
		</select>
		<?php
	}
}
?>