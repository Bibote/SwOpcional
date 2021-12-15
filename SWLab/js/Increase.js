function addUser() {
    alert("burno");
    XMLHttp= new XMLHttpRequest();
    XMLHttp.onreadystatechange = function() {

    }
XMLHttp.open("GET","IncreaseGlobalCounter.php", true)
XMLHttp.send();  
}