
document.addEventListener("deviceready", onDeviceReady, false);
function onDeviceReady() {
    window.open = cordova.InAppBrowser.open;
}

function openBrowser() {
   var url = 'http://www.xelowgc.com.ng';
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


function dol(urll){
	var url = urll;
	var target = '_self';
   var options = "location=no,toolbar=0,menubar=0,scrollbars=no";
   window.open(url, target, options);
	
	}


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
	   
	   //window.plugins.toast.showLongBottom("No internet connection!");
	   //navigator.app.exitApp();
	     function alertDismissed() {
			navigator.app.exitApp();
		}

	navigator.notification.alert(
    'Please check internet connection !',  // message
    alertDismissed,         // callback
    'No internet',            // title
    'Close'                  // buttonName
		);
	   }
	   else{
		   
		      var url = tur;
   var target = '_self';
   var options = "location=no,toolbar=0,menubar=0,scrollbars=no,allowInlineMediaPlayback=yes,mediaPlaybackRequiresUserAction=no,shouldPauseOnSuspend=yes";
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

function loadfile(tur) {
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
	   
	
	   //window.plugins.toast.showLongBottom("No internet connection!");
	   //navigator.app.exitApp();
	  function alertDismissed() {
			navigator.app.exitApp();
		}

	navigator.notification.alert(
    'Please check internet connection !',  // message
    alertDismissed,         // callback
    'No internet',            // title
    'Close'                  // buttonName
);
	   
	   }
	   else{
		   
		   window.location = tur;
		   }
	

}

function pagenow(){
	return loadfile("index.html");
}

function fpage(){
	return loadfile("finger.html");
}

function pager(){
	window.location="main.html";
}

document.addEventListener("exitButton",function(){ 

    navigator.notification.confirm(
           'Do you want to quit', 
           onConfirmQuit, 
           'QUIT TITLE', 
           'OK,Cancel'  
    );

}, true);

function onConfirmQuit(button){
   if(button == "1"){
     navigator.app.exitApp(); 
   }
}
