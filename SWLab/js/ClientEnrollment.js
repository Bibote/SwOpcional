function verifyEnrollment() {
    var email = document.getElementById("email").value;
    XMLHttp= new XMLHttpRequest();
    XMLHttp.onreadystatechange = function() {
        if (XMLHttp.readyState==4 && XMLHttp.status==200){
            document.getElementById("existe").innerHTML=XMLHttp.responseText;
        }
    }
XMLHttp.open("GET","ClientVerifyEnrollment.php?email="+email, true);
XMLHttp.send();
}
