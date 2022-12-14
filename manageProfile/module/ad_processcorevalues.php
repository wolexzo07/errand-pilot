<?php
include("../../finishit.php");
if(x_validatepost("title") && x_validatepost("content")){
	
	$title = x_clean(x_post("title"));
	$content = x_clean(x_post("content"));

	$create = x_dbtab("corevalues","
	title VARCHAR(255) NOT NULL,
	content TEXT NOT NULL,
	status ENUM('0','1') NOT NULL
	","innodb");
	
	if($create){
		if(x_count("corevalues","title='$title' LIMIT 1") > 0){
			echo "<p class='alert-txt'>Core value <b>$title</b> already exist!</p>";
		}else{
			x_insert("title,content,status","corevalues","'$title','$content','1'","<p class='alert-txt'>Core value added successfully</p>","<p class='alert-txt'>Failed to insert</p>");
		}
	}
}
?>