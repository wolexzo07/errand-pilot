$(document).ready(function(e){
	
	$("#uploadstock").on('submit',(function(e) {
			$("#gallery").show("fast");
			e.preventDefault();
			$.ajax({
	        	url: "../manageProfile/a_uploadstock",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
	    	    cache: false,
				processData:false,
				success: function(data){
				$("#gallery").html(data);
				$(".imglog").attr("src","../image/avatar.png");
				$(".uploadimg").val("");
				$("#stockname").val("");
				$("#stocknumber").val("");
				$("#stockprice").val("");
				$("#stockquantity").val("");
				$("#stockdes").val("");
				
				setTimeout(function(){$("#gallery").hide()},5000);
			    },
			  	error: function(){}
		   });
		}));
		
		
	
	
})
	