 <?php include("../validatePage.php");?>
 
 
 <div class="menuTag">
	<ul class="list-group">
		<li onclick="load('homedash')" class="list-group-item"><i class="fa fa-dashboard"></i>&nbsp;&nbsp; Dashboard 
		<span class="pull-right badge" style="background:lightgray;color:white;"></span>
		</li>
		
		<li onclick="load('justme')" class="list-group-item"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Admin Manager 
		<span class="pull-right badge" style="background:lightgray;color:white;"></span>
		</li>
			
		<li onclick="load('add-bank')" class="list-group-item"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add Bank Details 
		<span class="pull-right badge" style="background:lightgray;color:white;"></span>
		</li>
		<li onclick="load('btcConverter')" class="list-group-item"><i class="fa fa-calculator"></i>&nbsp;&nbsp; Bitcoin Calculator
		<span class="pull-right badge" style="background:lightgray;color:white;"></span>
		</li>
		
		<li onclick="load('settings-base')" class="list-group-item"><i class="fa fa-cog"></i> &nbsp;&nbsp;Settings
		<span class="pull-right badge" style="background:lightgray;color:white;"></span>
		</li>
		<li onclick="parent.location='../logout'" class="list-group-item"><i class="fa fa-sign-out"></i>&nbsp;&nbsp; Logout 
		<span class="pull-right badge" style="background:lightgray;color:white;"></span>
		</li>
	
	</ul>
 
 </div>       

 
<div class="mobilemenu">
	<div class="container-fluid">
	
	<div class="row">

		<div onclick="load('top-up')" class="col-3 text-left">
				<span class="btn btn-updated"><i class="fa fa-credit-card"></i><br/> Fund wallet</span>
		</div>
		
		<div class="col-3 text-left">
				<span onclick="load('buy-btc')" class="btn btn-updated"><i class="fa fa-shopping-cart"></i><br/>Place order</span>
		</div>
		
		<div class="col-3 text-left">
				<span onclick="load('sell-btc')" class="btn btn-updated"><i class="fa fa-money"></i><br/>History</span>
		</div>
		<div class="col-3 text-left">
				<span id="menuGist" class="btn btn-updated">
				<i class="fa fa-align-left"></i><br/>Menu</span>
		</div>
			
	</div>
	
	</div>
	
</div>	
 