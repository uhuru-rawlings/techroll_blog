var textdata = [];
textdata[0] = "HTML";
textdata[1] = "JavaScript";
textdata[2] = "Bootstrap";
textdata[3] = "CSS";
textdata[4] = "React js";
var i = 0;
// alert(textdata.length);
const gettext = () => {
    document.getElementById('getstyle').innerHTML = textdata[i];
if(i < textdata.length - 1){
    i++;
}else{
    i =0;
}

setTimeout("gettext()", 2000);
}
window.onload = gettext;
const closemenu = () =>{
    document.getElementById("listitems").style.display = "none";
    document.getElementById("closebtn").style.display = "none";
    document.getElementById("menubtn").style.display = "block";
}
const openmenu = () =>{
    document.getElementById("listitems").style.display = "block";
    document.getElementById("closebtn").style.display = "block";
    document.getElementById("menubtn").style.display = "none";
}