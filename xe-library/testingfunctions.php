<?php
function x_strexplode($str , $separator , $index){
	if(($str == "") || ($index == "") || !is_numeric($index)){
		$result = "One argument not supplied:: x_strexplode(string , separator ,arrayindex)";
		if(isset($index)){
			$range = range(0,100); // array list of number 1-100
			if(!in_array($index,$range) || !is_numeric($range)){
				$result = "index argument must be a number:: x_strexplode(string , separator ,arrayindex)";
			}
		}
		
		if(isset($str) && ($str == "")){
			$result = "string argument not supplied:: x_strexplode(string , separator ,arrayindex)";
		}
		
	}elseif(($str == "") && ($index == "")){
		$result = "All arguments are missing :: x_strexplode(string , separator ,arrayindex)";
	}elseif($separator == ""){
		$result = "separator arguments is missing :: x_strexplode(string , separator ,arrayindex)";
	}else{
		$splitname = explode($separator,$str);
		$counter = count($splitname);
		if($index < $counter){
			$result = $splitname[$index];
		}else{
			$result = "invalid index in use";
		}
	}
	return $result;
}
?>