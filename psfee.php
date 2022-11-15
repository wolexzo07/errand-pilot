<?php
include_once("finishit.php");
$amount = 250000;
$fee = x_pstkfees($amount);
echo $fee;
?>