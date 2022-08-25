<form >
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" onclick="payWithPaystack()"> Pay </button>
</form>

<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
    currency: 'NGN',
      key: 'pk_live_69574fbd53f2ac0a27f4fd272d919ecf30ba40c9',
      email: 'customer@email.com',
      amount: 100000000,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
		  window.location="paymentverify.php?reference="+response.reference
      },
      onClose: function(){
          
      }
    });
    handler.openIframe();
  }
</script>
