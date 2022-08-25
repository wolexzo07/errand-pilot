$(document).ready(function(e){
	
$("#listedServices").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "processOrder",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			$("#full").val("");
			$("#mobile").val("");
			$("#email").val("");
			$("#pass").val("");
		    },
		  	error: function(){} 	        
	   });
	}));

$("#regHandler").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "regHandler",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			$("#full").val("");
			$("#mobile").val("");
			$("#email").val("");
			$("#pass").val("");
		    },
		  	error: function(){} 	        
	   });
	}));


$("#logHandler").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "logHandler",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			$("#pass").val("");
			$("#email").val("");
		    },
		  	error: function(){} 	        
	   });
	}));


		$("#bankForm").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "bankpro",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			document.getElementById("acname").value='';
			document.getElementById("acnumb").value='';
			document.getElementById("pin").value='';
		    },
		  	error: function(){} 	        
	   });
	}));
	
});

