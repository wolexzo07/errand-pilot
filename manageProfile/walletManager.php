<?php
include_once("../finishit.php");
include("onTopValidation.php");
?>
<div class="row">

<div class="col-12 b-shift"> 

 <div class="card carder">
	<ul class="list-group">
		<li class="list-group-item">
			<h6><i class="fa fa-pie-chart"></i> &nbsp;Approved Payments Overview</h6>
              <!---<p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">24%</span> this month
              </p>--->
		</li>
		<li class="list-group-item">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-12 mt-1">Manual Payments
					<br/><span id="mapay" class="badge bg-primary justquote">NGN 5,000.00</span>
				</div>
				<div class="col-lg-3 col-md-3 col-12 mt-1">Flutters
				<br/><span id="fpay" class="badge bg-success justquote">NGN 5,000.00</span>
				</div>
				<div class="col-lg-3 col-md-3 col-12 mt-1">Paystack
				<br/><span id="ppay" class="badge bg-primary justquote">NGN 5,000.00</span>
				</div>
				<div class="col-lg-3 col-md-3 col-12 mt-1">Wallet Deductions
				<br/><span id="wdpay" class="badge bg-success justquote">NGN 5,000.00</span>
				</div>
			</div>
		</li>
	</ul>
  </div>
		    
</div>

<div class="col-lg-6 col-md-6 col-12 b-shift"> 
	 <div class="card carder">
		   <div id="walletRex"></div>	
	 </div>	    
</div>
        
<div class="col-lg-6 col-md-6 col-12 b-shift"> 
	 <div class="card carder">
			 <div id="walletDex"></div>
	 </div>	  
</div>



<!---<div class="col-12 b-shift"> 

 <div class="card carder">
            <div class="card-header">
              <h6><i class="fa fa-link"></i> &nbsp;Referral Link</h6>
              
            </div>
            <div class="card-body p-3">
              
            </div>
          </div>
		  
		  
</div>--->
</div>

<script>
	 $(document).ready(function(){
		 x_manageWallet("#walletRex","walletTopups");
		 x_manageWallet("#walletDex","walletdeduction");
		 // manage payment overview
		 x_manageWallet("#mapay","sumManual");
		 x_manageWallet("#walletDex","sumFlutter");
		 x_manageWallet("#walletDex","sumPaystack");
		 x_manageWallet("#walletDex","sumWallet"); // deduction
	 });
	function x_manageWallet(resultid,cmd){
		$(resultid).html("<img src='img/ajax-loader.gif'/> Loading");
		$.ajax({
			url:"fetchPaymentTopUps?cmd="+cmd,
			method:"GET",
			success:function(response){
				$(resultid).html(response);
			},
			error:function(){}
		});
	}
</script>
<style>
.justquote{color:white;padding:10px;margin-top:10px;}
</style>