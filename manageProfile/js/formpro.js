$(document).ready(function(){
	adminFormProcessor("#uploadstock","#gallery","uploadstocks");
	adminFormProcessor("#setup-business","#gallery","setup-business");
});

function adminFormProcessor(formid,resultid,cmd){
	$(formid).on('submit',(function(e) {
			$(resultid).show();
			$(resultid).html("<img src='img/ajax-loader.gif' class='img-responsive'/>");
			e.preventDefault();
			$.ajax({
	        	url: "../manageProfile/a_uploadstock?cmd="+cmd,
				type: "POST",
				data:  new FormData(this),
				contentType: false,
	    	    cache: false,
				processData:false,
				success: function(data){
				
				$(resultid).html(data);
					setTimeout(function(){
						$(resultid).hide();
						if(cmd == "uploadstocks"){
							load("a_stocks_uploader");
						}
						if(cmd == "setup-business"){
							//load("a_addmerchant");
						}
						
					},3000);
				},
					
			  	error: function(){}
		   });
		}));
}

function xreset(){
	$(":text").val("");
	$(":password").val("");
	$(":radio").val("");
	$(":checkbox").val("");
	$(":file").val("");
}
