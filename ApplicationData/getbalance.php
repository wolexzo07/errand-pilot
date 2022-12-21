<?php
	include_once("../finishit.php");
	xstart("0");
	if(x_validatesession("ER_ID_2022_VI")){
		$token = x_clean($_SESSION["ER_TOKEN_2022_VI"]);
		$opt = "w";
		echo "NGN ".number_format(epbal($token,$opt),0);
	}else{
		?>
		<style>
			#x_get_balance{display:none;}
		</style>
		<?php
	}
?>