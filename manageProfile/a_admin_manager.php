<?php
session_start();
include_once("../finishit.php");
?>

<div class="row">

	<div class="col-12">
		<?php include_once("a_menubar.php");?>
	</div>
	
	<div class="col-12">
		
		<div class="row">
		
			<div class="col-lg-4 col-md-4 col-12 mt-4">
				<div class="card">
					<div class="card-header bg-warning"><span class="stystatistics">TODAY PENDING ORDERS</span></div>
					<div class="card-body text-center">
						<span class="dashstatistics">10000</span>
					</div>
				</div>
			</div>
			
			
			<div class="col-lg-4 col-md-4 col-12 mt-4">
				<div class="card">
					<div class="card-header bg-info"><span class="stystatistics">TODAY APPROVED ORDERS</span></div>
					<div class="card-body text-center">
						<span class="dashstatistics">10000</span>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-4 col-12 mt-4">
				<div class="card">
					<div class="card-header bg-warning"><span class="stystatistics">TODAY DELIVERED ORDERS</span></div>
					<div class="card-body text-center">
						<span class="dashstatistics">10000</span>
					</div>
				</div>
			</div>
			
			
			<div class="col-lg-4 col-md-4 col-12 mt-4">
				<div class="card">
					<div class="card-header bg-warning"><span class="stystatistics">TODAY CANCELLED ORDERS</span></div>
					<div class="card-body text-center">
						<span class="dashstatistics">10000</span>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-4 col-12 mt-4">
				<div class="card">
					<div class="card-header bg-info"><span class="stystatistics">TODAY PENDING PAYMENTS</span></div>
					<div class="card-body text-center">
						<span class="dashstatistics">NGN 10,000,000</span>
					</div>
				</div>
			</div>
			
			
			<div class="col-lg-4 col-md-4 col-12 mt-4">
				<div class="card">
					<div class="card-header bg-warning"><span class="stystatistics">TODAY APPROVED PAYMENTS</span></div>
					<div class="card-body text-center">
						<span class="dashstatistics">NGN 50,000,000</span>
					</div>
				</div>
			</div>

			
		</div>
		
	</div>
	
</div>