function x_btcajax(elementid, urlElement, ElementValue){
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		
		if(ElementValue.length > 0){
			document.getElementById(elementid).style.display="block";
			document.getElementById(elementid).innerHTML=xmlhttp.responseText;
		}else{
			document.getElementById(elementid).style.display="block";
			document.getElementById(elementid).innerHTML="";
		}
		
	}}
	var url = urlElement+"?Valu="+ElementValue;
	xmlhttp.open("GET",url ,true);
	xmlhttp.send();
}

function x_btcajax2(elementid, urlElement, ElementValue){
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		
		if(ElementValue.length > 0){
			document.getElementById(elementid).style.display="block";
			document.getElementById(elementid).value=xmlhttp.responseText;
			//document.getElementById("conversion").value=xmlhttp.responseText;
		}else{
			document.getElementById(elementid).style.display="block";
			document.getElementById(elementid).innerHTML="";
			//document.getElementById("conversion").innerHTML="";
		}
		
	}}
	var url = urlElement+"?Valu="+ElementValue;
	xmlhttp.open("GET",url ,true);
	xmlhttp.send();
}