function loadstate(str){
	if(str == ""){
		alert("No valid state detected");
	}else{
var xmlhttp;
if(window.XMLHttpRequest){
xmlhttp = new XMLHttpRequest();
}
else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}
xmlhttp.onreadystatechange=function(){

	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	document.getElementById("stateload").style.display="block";
	$("#stateload").html("");
	$("#cityload").html("");
	document.getElementById("stateload").innerHTML=xmlhttp.responseText;
	document.getElementById("stateload").style.border="0px";
	}
}
var url = "loadstate?countryid="+str;
xmlhttp.open("GET",url ,true);
xmlhttp.send();
	}

}



function loadcities(str){
	if(str == ""){
		alert("No valid state detected");
	}else{
var xmlhttp;
if(window.XMLHttpRequest){
xmlhttp = new XMLHttpRequest();
}
else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}
xmlhttp.onreadystatechange=function(){

	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	
	//document.getElementById("cityload").value="";
	document.getElementById("cityload").style.display="block";
	$("#cityload").val("");
	document.getElementById("cityload").innerHTML=xmlhttp.responseText;
	document.getElementById("cityload").style.border="0px";
	}
}
var url = "loadcities?stateid="+str;
xmlhttp.open("GET",url ,true);
xmlhttp.send();
	}

}
