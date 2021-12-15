<?php

   $soapclient = new SoapClient('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl');
   $result=$soapclient-> comprobar(($_GET['email']));

    //echo "<h1>$result</h1>";
    if($result=='SI'){
        echo "<h3 style='color:#0000FF'>El email es valido</h1>";
    }
    else {
        echo "<h3 style='color:#FF0000'>El email no se encuentra matriculado</h1>";
    }
?>

