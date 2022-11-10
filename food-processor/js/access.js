function load_all(){
var xmlhttp;
if(window.XMLHttpRequest){
xmlhttp = new XMLHttpRequest();
}
else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
document.getElementById("come").style.display="block";
document.getElementById("come").innerHTML=xmlhttp.responseText;
document.getElementById("come").style.border="0px";
}
}
var url = "checkmeout";
xmlhttp.open("GET",url ,true);
xmlhttp.send();
}

function getitallnow(){
var xmlhttp;
if(window.XMLHttpRequest){
xmlhttp = new XMLHttpRequest();
}
else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
document.getElementById("pageitnow").style.display="block";
document.getElementById("pageitnow").innerHTML=xmlhttp.responseText;
document.getElementById("pageitnow").style.border="0px";
}
}
var url = "loadednow";
xmlhttp.open("GET",url ,true);
xmlhttp.send();
}

function onlyonenow(){
var xmlhttp;
if(window.XMLHttpRequest){
xmlhttp = new XMLHttpRequest();
}
else{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
document.getElementById("pageitnow").style.display="block";
document.getElementById("pageitnow").innerHTML=xmlhttp.responseText;
document.getElementById("pageitnow").style.border="0px";
}
}
var url = "loadindivdual";
xmlhttp.open("GET",url ,true);
xmlhttp.send();
}

//getitallnow();
onlyonenow();
