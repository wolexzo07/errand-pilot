function readURL(input,dire){
	
	var file_size = input.files[0].size / (1024 * 1024);
	
	if(file_size > 3){
		
		alert("File exceeded 4mb!");
		
		}else{

				if(input.files && input.files[0]){
					
				var reader = new FileReader();
				
				reader.onload = function (e) {
					
				$('#img_prev'+dire).attr('src' , e.target.result);

				};
				
				reader.readAsDataURL(input.files[0]);

				}
			}
}


function validatesize(file){
	var file_size = file.files[0].size / 1024;
	if(file_size > 200){
		
		alert("File size exceeds 200kb!");
		
	}else{
		
	}
	
}