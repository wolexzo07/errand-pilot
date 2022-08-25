
function gotop(tur) {
	var networkState = navigator.connection.type;
   var states = {};
	
   states[Connection.UNKNOWN]  = 'Unknown connection';
   states[Connection.ETHERNET] = 'Ethernet connection';
   states[Connection.WIFI]     = 'WiFi connection';
   states[Connection.CELL_2G]  = 'Cell 2G connection';
   states[Connection.CELL_3G]  = 'Cell 3G connection';
   states[Connection.CELL_4G]  = 'Cell 4G connection';
   states[Connection.CELL]     = 'Cell generic connection';
   states[Connection.NONE]     = 'No network connection';

   
   
   if(states[networkState] == 'No network connection'){
	   
	   alert("No internet connect!");
	   }
	   else{
		   
		      var url = tur;
   var target = '_self';
   var options = "location=no,toolbar=0,menubar=0,scrollbars=no";
   var ref = cordova.InAppBrowser.open(url, target, options);

   ref.addEventListener('loadstart', loadstartCallback);
   ref.addEventListener('loadstop', loadstopCallback);
   ref.addEventListener('loadloaderror', loaderrorCallback);
   ref.addEventListener('exit', exitCallback);

   function loadstartCallback(event) {
      console.log('Loading started: '  + event.url)
   }

   function loadstopCallback(event) {
      console.log('Loading finished: ' + event.url)
   }

   function loaderrorCallback(error) {
      console.log('Loading error: ' + error.message)
   }

   function exitCallback() {
      console.log('Browser is closed...')
   }
		   
		   
		   }
	

}





function processme(){
	
	var name = document.getElementById("name").value;
	var pos = document.getElementById("pos").value;
	var email = document.getElementById("email").value;
	var passkey = document.getElementById("passkey").value;
	var pin = document.getElementById("pin").value;
	var result = document.getElementById("result");
	var regx = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
	if(name == ""){
		result.innerHTML = "Please enter name!";
		focus();
		return false;
		}else if(!email.match(regx)){
		result.innerHTML = "Please enter a valid email!";
		focus();
		return false;
			}
	else if(pos == ""){
	result.innerHTML = "Please select a role!";
		focus();
		return false;
			}
			else if(passkey == ""){
		result.innerHTML = "Please enter a password!";
		focus();
		return false;
			
			}else if(pin == ""){
		result.innerHTML = "Please enter a pin!";
		focus();
		return false;
			}
			else{
 var code = "BiobakuOluwoleTimothyisTheDeveloperOfProJectBase";
 var url = "https://projectbase.app/android/android_registerbase?blessme="+ escape(code) + "&full=" + escape(name) + "&email=" + escape(email) + "&pos=" + escape(pos) + "&pass=" + escape(passkey) + "&pin=" + escape(pin);
	gotop(url);
		return false;							
	   }
}


function logmein(){
	var email = document.getElementById("email").value;
	var passkey = document.getElementById("passkey").value;
	var result = document.getElementById("result");
	var regx = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
	if(!email.match(regx)){
		result.innerHTML = "Please enter a valid email!";
		focus();
		return false;
			}
			else if(passkey == ""){
		result.innerHTML = "Please enter a password!";
		focus();
		return false;
			
			}
			else{

 var code = "BiobakuOluwoleTimothyisTheDeveloperOfProJectBase";
 var url = "https://projectbase.app/android/android_loginbase?blessme="+ escape(code) + "&email=" + escape(email) + "&pass=" + escape(passkey);
	gotop(url);
		return false;							
	   }
	}


function resetmein(){
	var email = document.getElementById("email").value;
	var passkey = document.getElementById("opt").value;
	var result = document.getElementById("result");
	var regx = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
	if(!email.match(regx)){
		result.innerHTML = "Please enter a valid email!";
		focus();
		return false;
			}
			else if(passkey == ""){
		result.innerHTML = "Please select an option!";
		focus();
		return false;
			
			}
			else{

 var code = "BiobakuOluwoleTimothyisTheDeveloperOfProJectBase";
 var url = "https://projectbase.app/android/android_reset?blessme="+ escape(code) + "&email=" + escape(email) + "&opt=" + escape(passkey);
	gotop(url);
		return false;							
	   }
}

