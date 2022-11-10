				<?php
					include("../validatePage.php");
				?>
				<script src="https://js.paystack.co/v1/inline.js"></script>
				<script src="https://checkout.flutterwave.com/v3.js"></script>
				<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 paymentList">
							
							<div id="alert-msg"></div>
							 <script src="js/cartProcessor.js" type="text/javascript"></script>
							<form id="payModalProcessor">
								<ul class="list-group">
									<li class="list-group-item"><i class="fa fa-credit-card"></i> &nbsp;&nbsp;ADD <b>FUNDS</b>
									
									</li>
									
									<li class="list-group-item">
									
									<div class="row">
										<div class="col-12">
										<button style="padding:10px;margin-top:-30px;margin-right:5px;" class="btn btn-primary btn-sm pull-right" id="payButton"><i class="fa fa-cc-mastercard"></i> &nbsp;  PAY</button>
										</div>
									</div>
									
									
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 t-amts">
										<?php
										if(x_count("top_uplimit","status='1'") > 0){
												foreach(x_select("0","top_uplimit","status='1'","1","id") as $amtchange){
													$min = $amtchange["min_amount"];
													$max = $amtchange["max_amount"];
												?>
										<p class="txt-top mt-3">ENTER AMOUNT:</p>
										<input type="number" min="<?php echo $min;?>" max="<?php echo $max;?>" required class="form-control mb-3 w-100" placeholder="Amount" name="amount" id="top-upAmt"/>
												<?php	
											}
										}	
										?>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 t-dates">
										<p class="txt-top mt-3">CHOOSE DATE:</p>
										<input type="date" class="form-control mb-3 w-100" placeholder="Date of payment" name="date" id="top-upDate"/>
										</div>
									</div>
									
									
									<div class="row t-details">
										<div class="col-12">
										<p class="txt-top mt-3">TRANSACTIONS DETAILS:</p>
											<textarea id="top-descrip" class="form-control" style="resize:none;" name="tdetails" placeholder="Transfer Bank / Description"></textarea>
										</div>
									</div>
									
									
									</li>
									
									<li class="list-group-item">
									<p class="txt-top mt-3">PAYMENT OPTIONS</p>
									
										<?php
											if(x_count("payment_types","status='1'") > 0){
												$countPay=0;
												foreach(x_select("0","payment_types","status='1'","5","id") as $banks){
													$countPay++;
													$company = $banks["company"];
													$cvalue = $banks["cvalues"];
													$clogo = $banks["logo"];
													?>
													<input required id="payOptions<?php echo $countPay;?>" type="radio" value="<?php echo $cvalue;?>" name="banks"/>&nbsp;&nbsp; <?php echo $company;?><br/><br/>
													<?php
												}
											}
										?>
										
										<?php
										if(x_count("company_accounts","status='1'") > 0){
											?>
											<div class="listBanks">
											<ul class="list-group">
											<?php
												foreach(x_select("0","company_accounts","status='1'","5","id") as $banks){
														$account_name = $banks["account_name"];
														$account_number = $banks["account_number"];
														$bank_name = $banks["bank_name"];
														$id = $banks["id"];
														?>
														<li class="list-group-item">
															<p class="bank_name">
															<input class="blists" type="radio" value="<?php echo $id;?>" name="bank_details"/>
															<?php echo $bank_name;?> - <?php echo $account_number;?></p>
															<p class="acct_name"><?php echo $account_name;?></p>
															
														</li>
														<?php
												}
											?>
											</ul>
										</div>
											<?php
										}
										?>
											
									</li>
									<!---<li class="list-group-item"></li>--->
								</ul>
							</form>
							
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
					</div>