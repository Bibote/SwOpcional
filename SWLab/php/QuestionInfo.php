<?php
session_start();
$data = file_get_contents('../json/Questions.json');
$array=json_decode($data);

$tot=0;
$us=0;
foreach($array->assessmentItems as $pregunta)
{
    $tot=$tot+1;
    $email = $pregunta->author;
    if($email==$_SESSION['sesion']){
        $us=$us+1;
    }
   
}


 
  echo"<h4>Usted ha realizado $us/$tot preguntas</h4>";



?>