$(document).ready(function(e){
	
	$("#uploadstock").on('submit',(function(e) {
			$("#gallery").show("slow");
			e.preventDefault();
			$.ajax({
	        	url: "uploadstock",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
	    	    cache: false,
				processData:false,
				success: function(data){
				$("#gallery").html(data);
				$(".imglog").attr("src","imager/avatar.png");
				$(".uploadimg").val("");
				$("#stockname").val("");
				$("#stockprice").val("");
				$("#stockquantity").val("");
				$("#stockdes").val("");

			    },
			  	error: function(){}
		   });
		}));
	
	
})
	