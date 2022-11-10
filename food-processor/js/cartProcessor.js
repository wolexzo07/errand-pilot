function finalize_carting()
		{
			$.ajax({
			url:"final_carting",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
				$('.loadcartvalue').text(data.total_item);
				$('#cart_details').html(data.cart_details);
				$('.total_price').text(data.total_price);
				$('.badgeboss').text(data.total_item);
			
				
			}
			});	
		}
function load_cart_data()
		{
			$.ajax({
			url:"fetch_data_stored",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
				$('.loadcartvalue').text(data.total_item);
				$('#cart_details').html(data.cart_details);
				$('.total_price').text(data.total_price);
				$('.badgeboss').text(data.total_item);
				
				
			}
			});	
		}
		
	$(document).on('click', '.add_to_cart', function(){
		var product_id = $(this).attr("id");
		var product_name = $('#stockname'+product_id+'').val();
		var product_price = $('#sellingprice'+product_id+'').val();
		//var product_quantity = 1;
		var product_quantity = $('#quantity'+product_id+'').val();
		var product_image = $('#product_image'+product_id+'').val();
		var alertme = $('#msgnow'+product_id+'');
		
		var action = "add";
		if(product_quantity > 0)
		{
			$.ajax({
				url:"processaddtocart",
				method:"POST",
				data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity,product_image:product_image, actionboss:action},
				success:function(data)
				{
					load_cart_data();
					$(".logmsg").html(data);
					$('#quantity'+product_id+'').val("");
					if(product_quantity > 1)
						{
						$(alertme).text("Added "+ product_quantity +" items to cart");
						}else{
						$(alertme).text("Added "+ product_quantity +" item to cart");
						}
						setTimeout(function(){
							$(alertme).text("");
						},4000);
					}
			});
		}
		else
		{
			alert("Please enter quantity");
		}
	});
	
	// Handling removal of product
	
		$(document).on('click', '.deletemenow', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
		if(confirm("Are you sure you want to remove this product?"))
		{
			$.ajax({
				url:"processaddtocart",
				method:"POST",
				data:{product_id:product_id, actionboss:action},
				success:function(data)
				{
					load_cart_data();
					//alert("Select item was removed from the cart");
					window.location="incartpage";
					
				}
			})
		}
		else
		{
			return false;
		}
	});
	
	// Handling clearing of the cart 
	
		$(document).on('click', '#clear_cart', function(){
		var action = 'empty';
		if(confirm("Are you sure you want clear cart?"))
		{
		$.ajax({
			url:"processaddtocart",
			method:"POST",
			data:{actionboss:action},
			success:function(data)
			{
				load_cart_data();
				//alert("Your Cart has been clear");
				window.location="incartpage";
			}
		});
		}
	});
	
	// Updating cart items
	// update the plus Button
	
	$(document).on('click', '.plus-change', function(){
		var product_id = $(this).attr("id");
		var product_name = $('#stockname'+product_id+'').val();
		var product_price = $('#sellingprice'+product_id+'').val();
		var product_quantity = 1;
		var product_image = $('#product_image'+product_id+'').val();
		var alertme = $('#msgnow'+product_id+'');
		
		var action = "update-plus";
		if(product_quantity > 0)
		{
			$.ajax({
				url:"processaddtocart",
				method:"POST",
				data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity,product_image:product_image, actionboss:action},
				success:function(data)
				{
					load_cart_data();
					$(".logmsg").html(data);
					$('#quantity'+product_id+'').val("");
					if(product_quantity > 1)
						{
						$(alertme).text("Added "+ product_quantity +" items to cart");
						}else{
						$(alertme).text("Added "+ product_quantity +" item to cart");
						}
						setTimeout(function(){
							$(alertme).text("");
						},4000);
					}
			});
		}
		else
		{
			alert("Please enter quantity");
		}
	});


// update the subtract Button

	$(document).on('click', '.minus-change', function(){
		var product_id = $(this).attr("id");
		var product_name = $('#stockname'+product_id+'').val();
		var product_price = $('#sellingprice'+product_id+'').val();
		var product_quantity = 1;
		var product_image = $('#product_image'+product_id+'').val();
		var alertme = $('#msgnow'+product_id+'');
		
		var action = "update-minus";
		if(product_quantity > 0)
		{
			$.ajax({
				url:"processaddtocart",
				method:"POST",
				data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity,product_image:product_image, actionboss:action},
				success:function(data)
				{
					load_cart_data();
					$(".logmsg").html(data);
					$('#quantity'+product_id+'').val("");
					if(product_quantity > 1)
						{
						$(alertme).text("Added "+ product_quantity +" items to cart");
						}else{
						$(alertme).text("Added "+ product_quantity +" item to cart");
						}
						setTimeout(function(){
							$(alertme).text("");
						},4000);
					}
			});
		}
		else
		{
			alert("Please enter quantity");
		}
	});
	
	// processing top-up
	
	$("#payModalProcessor").on('submit',(function(e) {
		$("#alert-msg").show();
		$("#alert-msg").html("<img src='../image/ajax-loader.gif'/>");
		
		e.preventDefault();
		$.ajax({
        	url: "processTopUp",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
			$("#alert-msg").html(data);
			setTimeout(function(){
				$("#alert-msg").hide(1000);
			},5000);
		    },
		  	error: function(){} 	        
	   });
	}));