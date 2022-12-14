<?php
	include("finishit.php");
	xstart(0);
	if(x_validateget("hashkey") && x_validateget("cmd")){
		
		if(xg("hashkey") != $_SESSION["XCAPE_HACKS"]){
			echo "<p class='alert-txt'>Missing loading Parameter!</p>";
			exit();
		}
		
		$cmd = xg("cmd");
		
		if($cmd == "corevalue"){ // fetching core values
			
			if(x_count("corevalues","status='1' LIMIT 1") > 0){
				foreach(x_select("0","corevalues","status='1'","8","id") as $corevalues){
					$title = $corevalues["title"];
					$content = $corevalues["content"];
					$icon = $corevalues["icons"];
					?>
					<div class="card col-12 col-md-6 col-lg-3">
						<div class="card-wrapper">
							<div class="card-box align-center">
								<div class="iconfont-wrapper">
									<span class="<?php echo $icon;?>"></span>
								</div>
								<h5 class="card-title mbr-fonts-style display-7">
								<strong><?php echo $title?></strong></h5>
								<p class="card-text mbr-fonts-style display-7"><?php echo $content;?></p>
							</div>
						</div>
					</div>
					<?php
				}
			  }
		}elseif($cmd == "testimonials"){ // Handling testimonials
		
			if(x_count("testimonials","status='1'") > 0){
				foreach(x_select("0","testimonials","status='1'","4","id") as $testimony){
					$user_id = $testimony["user_id"];
					$message = $testimony["message"];
					
					$name = x_getsingleupdate("manageaccount","name","id='$user_id'");
					$photo = x_getsingleupdate("manageaccount","user_photo","id='$user_id'");
					?>
					<div class="card col-12 col-md-6">
                <p class="mbr-text mbr-fonts-style mb-4 display-7"><?php echo $message;?></p>
                <div class="d-flex mb-md-0 mb-4">
                    <div class="image-wrapper">
                        <img src="<?php
						if($photo == ""){
							echo "image/avatar.png";
						}else{
							if(file_exists("manageProfile/$photo")){
								echo "manageProfile/$photo";
							}else{
								echo "image/avatar.png";
							}
						}
						?>" alt="<?php echo $name;?>">
                    </div>
                    <div class="text-wrapper">
                        <p class="name mbr-fonts-style mb-1 display-4">
                            <strong><?php echo $name;?></strong>
                        </p>
                        <p class="position mbr-fonts-style display-4">
                            <strong style="color:green;">Customer</strong>
                        </p>
                    </div>
                </div>
            </div>
					<?php
				}
			}

		}else{}
		
	
	}else{echo "Nothing is happening!!";}
	
?>

		    
	