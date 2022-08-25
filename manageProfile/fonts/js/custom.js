function load_comment_status(){
var xmlhttp;
if(window.XMLHttpRequest){

xmlhttp = new XMLHttpRequest();

}
else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

document.getElementById("commentme").style.display="block";
document.getElementById("commentme").innerHTML=xmlhttp.responseText;
document.getElementById("commentme").style.border="0px";

}



}
var url = "https://iqgames.app/omotoradio/check_comment_status?token=timbossisoknowsodonotdisturbhimhaters";

xmlhttp.open("GET",url ,true);
xmlhttp.send();

}

function stream_status(){
var xmlhttp;
if(window.XMLHttpRequest){

xmlhttp = new XMLHttpRequest();

}
else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

document.getElementById("streamstatus").style.display="block";
document.getElementById("streamstatus").innerHTML=xmlhttp.responseText;
document.getElementById("streamstatus").style.border="0px";

}



}
var url = "https://iqgames.app/omotoradio/check_stream?token=timbossisoknowsodonotdisturbhimhaters";

xmlhttp.open("GET",url ,true);
xmlhttp.send();

}

setInterval(function () {load_comment_status()}, 10000);
setInterval(function () {stream_status()}, 10000);