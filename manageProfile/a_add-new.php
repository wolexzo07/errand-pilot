<?php
include("../finishit.php");
if(x_validatepost("add-new") && x_validatepost("cmd")){
	$cmd = x_post("cmd");
	$service = x_clean(x_post("service"));
	$hash = md5(sha1($service));
	
	if($cmd == "add-service"){
		
	$create = x_dbtab("categories","
	department TEXT NOT NULL,
	dept_id TEXT NOT NULL,
	status ENUM('0','1') NOT NULL
	","MYISAM");
	
	if($create){
		
		if(x_count("categories","department='$service' LIMIT 1") > 0){
			print "<div class='alert alert-danger' role='alert'>Service was added already!</div>";
		}else{
			$success = "<div class='alert alert-success' role='alert'>Service was added successfully!</div>";
			$failed = "<div class='alert alert-danger' role='alert'>Failed to add service!</div>";
			x_insert("department,dept_id,status","categories","'$service','$hash','1'","$success","$failed");
		}
		
	}else{
		print "<div class='alert alert-danger' role='alert'>Failed to create table!</div>";
	}
		
	}elseif($cmd == "add-service-sub"){
		
		$service = x_clean(x_post("service"));
		$subservice = x_clean(x_post("sub-service"));
		$subservice_id = md5(uniqid().$subservice);
		
		$create = x_dbtab("sub_service","
		category_id TEXT NOT NULL,
		subservice TEXT NOT NULL,
		subservice_id TEXT NOT NULL,
		status ENUM('0','1') NOT NULL
		","MYISAM");
		
		if($create){
			
			if(x_count("sub_service","category_id='$service' AND subservice='$subservice' LIMIT 1") > 0){
				print "<div class='alert alert-warning' role='alert'>Sub Service was added already!</div>";
			}else{
			$success = "<div class='alert alert-success' role='alert'>Sub Service was added successfully!</div>";
			$failed = "<div class='alert alert-danger' role='alert'>Failed to add Sub service!</div>";
			x_insert("category_id,subservice,subservice_id,status","sub_service","'$service','$subservice','$subservice_id','1'","$success","$failed");
			}
			
		}else{
			print "<div class='alert alert-danger' role='alert'>Failed to create table!</div>";
		}
		
	}else{
		print "<div class='alert alert-warning' role='alert'>No command was received!</div>";
	}
	

}
?>

<p class="s-header">ADD SERVICE OFFERED</p>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
<input type="text" class="form-control" name="service" placeholder="Enter new service"/>
<input type="hidden" name="add-new" value="<?php echo sha1(uniqid());?>" />
<input type="hidden" name="cmd" value="add-service" />
<button class="btn btn-success"><i class="fa fa-send"></i> Add</button>
</form>



<p class="s-header">ADD SERVICE SUB-CATEGORY</p>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
<select autocomplete="off" required class="form-control selected-fr" name="service">
				 <option value="">PLEASE CHOOSE YOUR SERVICE</option>
				 <?php
				 if(x_count("categories","status='1' LIMIT 500") > 0){
					 foreach(x_select("0","categories","status='1'","500","department desc") as $slist){
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
<input type="text" class="form-control" name="sub-service" placeholder="Enter new service"/>
<input type="hidden" name="add-new" value="<?php echo sha1(uniqid());?>" />
<input type="hidden" name="cmd" value="add-service-sub" />
<button class="btn btn-success"><i class="fa fa-send"></i> Add</button>
</form>