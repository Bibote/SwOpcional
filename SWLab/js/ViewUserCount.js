$(document).ready(
function showUserCount() {
    XMLHttp= new XMLHttpRequest();
    XMLHttp.onreadystatechange = function() {
        if (XMLHttp.readyState==4 && XMLHttp.status==200){
            document.getElementById("usuarios").innerHTML=XMLHttp.responseText;
        }
    }
XMLHttp.open("GET","ShowUsers.php", true)
XMLHttp.send();
    
})