function showQuestions() {
    XMLHttp= new XMLHttpRequest();
    XMLHttp.onreadystatechange = function() {
        if (XMLHttp.readyState==4 && XMLHttp.status==200){
            document.getElementById("verTabla").innerHTML=XMLHttp.responseText;
        }
    }
XMLHttp.open("GET","VerPreguntasAjax.php", true)
XMLHttp.send();  
}