shortcut.add("Alt+L",function() {
var answer = window.confirm("Are you sure you want to logout?");
if(answer){
window.location = "../logout";
return true;
}else{
return false;
}

})

shortcut.add("Alt+P",function() {
var answer = window.confirm("Do you want to play game now?");
if(answer){
load('playgames');
return true;
}else{
return false;
}

})


shortcut.add("Alt+W",function() {
var answer = window.confirm("Do you want to fund wallet?");
if(answer){
load('walletfunder');
return true;
}else{
return false;
}

})

shortcut.add("Alt+1",function() {
var answer = window.confirm("Do you want to add bank details?");
if(answer){
load('bankd');
return true;
}else{
return false;
}
})

shortcut.add("Alt+2",function() {

var answer = window.confirm("Do you want to open the dashboard?");
if(answer){
window.location="./manpag";
return true;
}else{
return false;
}

})

shortcut.add("Alt+M",function() {

var answer = window.confirm("Do you want to manage wallet?");
if(answer){
load('wallet_manager');
return true;
}else{
return false;
}

})


shortcut.add("Alt+S",function() {

var answer = window.confirm("Do you want to open settings?");
if(answer){
load('profileman');
return true;
}else{
return false;
}

})

shortcut.add("Alt+T",function() {

var answer = window.confirm("Do you want to check transaction details?");
if(answer){
load('track_details');
return true;
}else{
return false;
}

})





document.onkeydown = function (e) {
	        if(e.which == "65"){
				
			
					$(":radio.a").attr("checked","checked");
					result("a");
					
	

	        }
	        else if(e.which == "66"){
				
					$(":radio.b").attr("checked","checked");
					result("b");
					
				
				}
				else if(e.which == "67"){
				
					$(":radio.c").attr("checked","checked");
					result("c");
				
					
					}
					
					else if(e.which == "68"){
				
					$(":radio.d").attr("checked","checked");
					
					result("d");
					
		
						
						}
						else{
							return true;
							
							}
	}
