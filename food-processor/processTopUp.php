<?php
include_once("../finishit.php");
xstart("0");
if(x_validatesession("XCAPE_HACKS") && x_validatesession("ER_ID_2022_VI") && x_validatepost("banks")){
	
	$amount = x_clean(x_post("amount")); // Top-up Amount
	$banks = x_clean(x_post("banks")); // Transaction Options
	
	// current logged in user details
	$userid = x_clean($_SESSION["ER_ID_2022_VI"]); // User ID
	$email = x_clean($_SESSION["ER_EMAIL_2022_VI"]); // Email
	$name = x_clean($_SESSION["ER_NAME_2022_VI"]); // Name
	
	$orderid = x_clean($_SESSION["XELOW_COMMERCE_ORDER_ID"]); // order unique id
	
	if($banks == "mbt"){ // Manual transfer
	
		$date = x_clean(x_post("date")); // transaction date
		$tdetail = x_clean(x_post("tdetails")); // Transaction description
		$banks_acct = x_clean(x_post("bank_details")); // Company bank account ID
		
	}elseif($banks == "ps"){ // Paystack company
	
		$pkey = x_getsingle("SELECT publickey FROM paymentkeys WHERE company='paystack' AND status='1' LIMIT 1","paymentkeys WHERE company='paystack' AND status='1' LIMIT 1","publickey"); // Getting public key
		
		$skey = x_getsingle("SELECT secretkey FROM paymentkeys WHERE company='paystack' AND status='1' LIMIT 1","paymentkeys WHERE company='paystack' AND status='1' LIMIT 1","secretkey"); // Getting secret key
		
		?>

<script type="text/javascript">
function payWithPaystack(){
        var handler = PaystackPop.setup({
		  currency: 'NGN', //This can only be either NGN or USD
          key: '<?php echo $pkey;?>',
          email: "<?php echo $email;?>",
          amount: <?php echo $amount*100;?>, 
          ref: "<?php echo $orderid;?>",
          metadata: {
             custom_fields: [
                {
                    display_name: "<?php echo $name;?>",
                    variable_name: "<?php echo $email;?>",
                    value: "<?php echo $email;?>"
                }
             ]
          },
          callback: function(response){
    		  var ref = response.reference;
			    $.ajax({
					url: 'payment_verify_pstk?reference='+ ref,
					method: 'GET',
					success: function (response) {
					// the transaction status is in response.data.status
					},
					error: function(){} 

				});
          },
          onClose: function(){

          }
        });
        handler.openIframe();
      }
	  payWithPaystack();
</script>
		<?php
	
	}elseif($banks == "fw"){ // Flutter waves company
	
		$fpkey = x_getsingle("SELECT publickey FROM paymentkeys WHERE company='flutters' AND status='1' LIMIT 1","paymentkeys WHERE company='flutters' AND status='1' LIMIT 1","publickey"); // Getting public key
		
		$fskey = x_getsingle("SELECT secretkey FROM paymentkeys WHERE company='flutters' AND status='1' LIMIT 1","paymentkeys WHERE company='flutters' AND status='1' LIMIT 1","secretkey"); // Getting secret key
		
		?>
		<script>

		  function flutterwavePayment() {
			const modal = FlutterwaveCheckout({
			  public_key: "<?php echo $fpkey;?>",
			  tx_ref: "<?php echo $orderid;?>",
			  amount: <?php echo $amount;?>,
			  currency: "NGN",
			  payment_options: "card, banktransfer, ussd",
			  //redirect_url: "verify_flutters",
			  meta: {
				consumer_id: <?php echo $userid;?>,
				consumer_mac: "<?php echo $orderid;?>",
			  },
			  customer: {
				email: "<?php echo $email;?>",
				phone_number: "",
				name: "<?php echo $name;?>",
			  },
			  customizations: {
				title: "Errand Pilot",
				description: "No.1 Online errand platform",
				logo: "",
			  },
			  callback: function(payment) {
			   // Send AJAX verification request to backend
			   //verifyTransactionOnBackend(payment.id);
			   modal.close();
			 },
			   onclose: function(incomplete) {
				  if (incomplete === true) {
					// Record event in analytics
				  }
				},
			});
		  }
		  flutterwavePayment();
		</script>
		<?php
		
	}else{
		x_print("Out of scope!");
		exit();
	}
}

?>