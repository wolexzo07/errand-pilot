<?php
include_once("finishit.php");
if(x_count("questions","01") > 0){
		function hashans($value){
		$salt = "AdvsagssnahaamywuwtyGtHuKiOLk415262540983?@#$%";
		return md5(sha1($value).$salt).md5($value);
	}
	$cat = "General";
	$options = array("a","b","c","d","e");
	$counter = 0;
	$time= x_curtime(0,1);
	foreach(x_select("0","questions","0","0","id") as $key){
		$counter++;
		$q = $key["question"];$a = $key["f_option"];$b = $key["s_option"];
		$c = $key["t_option"];$d = $key["ft_option"]; $e = "none";
		$ans=$key["answer"];
		
		if(!in_array($ans,$options)){
			echo "Invalid option @# $counter";
		}else{
			$by = "timbaba";$correct = hashans($ans);
			
			x_insert("category,question,option_a,option_b,option_c,option_d,option_e,correct_option,status,timer,posted_by","questionbank","'$cat','$q','$a','$b','$c','$d','$e','$correct','0','$time','$by'","","Failed @# $counter");
			
		}
		
	}
}else{
	
}

?>