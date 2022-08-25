	function proform(formid,url_link,showid,extra){
$(formid).on('submit',(function(e) {
		$(showid).show("slow");
		e.preventDefault();
		$.ajax({
        	url: url_link,
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$(showid).html(data);
				extra;
		    },
		  	error: function(){}
	   });
	}));
	}

$(document).ready(function(e){
	$("#sendalert").on('submit',(function(e) {
			$("#gallery").show("slow");
			e.preventDefault();
			$.ajax({
	        	url: "alertme",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
	    	    cache: false,
				processData:false,
				success: function(data){
				$("#gallery").html(data);

				$("#acctname").val("");
				$("#transferdate").val("");
				$("#amountmet").val("");
				$("#bankid").val("");

			    },
			  	error: function(){}
		   });
		}));


$("#contactme").on('submit',(function(e) {
	$("#gallery").show("slow");
	e.preventDefault();
	$.ajax({
		url: "feedbak",
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		success: function(data){
		$("#gallery").html(data);
		document.getElementById("title").value='';
		document.getElementById("pdes").value='';
		document.getElementById("pin").value='';
		},
		error: function(){}
   });
}));

$("#withdraw").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "withdrawme",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			document.getElementById("amount").value='';
		    },
		  	error: function(){}
	   });
	}));

	$("#gameplay").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "gamepro",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			document.getElementById("amount").value='';
		    },
		  	error: function(){}
	   });
	}));


	$("#gameplayer").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "gamedemopro",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			document.getElementById("amount").value='';
		    },
		  	error: function(){}
	   });
	}));


		$("#topitup").on('submit',(function(e) {
		$("#galleryy").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "topitup.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#galleryy").html(data);

			document.getElementById("amount").value='';
			document.getElementById("pin").value='';
		    },
		  	error: function(){}
	   });
	}));

		$("#testifynow").on('submit',(function(e) {
		$("#gallery").show("slow");
		e.preventDefault();
		$.ajax({
        	url: "textus",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").html(data);
			document.getElementById("pdes").value='';
			document.getElementById("pin").value='';
		    },
		  	error: function(){}
	   });
	}));

		$("#updatenow").on('submit',(function(e) {
		$("#gallery").show("slow");
		$("#gallery").fadeIn(400).html('<center><img src="../image/load.gif" /></center>');
		e.preventDefault();
		$.ajax({
        	url: "completeprofile",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#gallery").fadeIn(400).html(data);
		    },
		  	error: function(){}
	   });
	}));
});
