<!DOCTYPE html>
<html>
<head>
<?php include '../html/Head.html'?>
<title> mostrar tabla</title>
</head>
<body>  
<?php include '../php/DbConfig.php' ?>
<?php include '../php/Menus.php' ?>

<section class="main" id="s1">
<div>
<?php
$data = file_get_contents('../json/Questions.json');
$array=json_decode($data);



  echo "<center><table border='2' bgcolor='AFEEEE'>
    <tr>
      <td>AUTOR</td>
      <td>ENUNCIADO</td>
      <td>RESPUESTA CORRECTA</td>
    </tr>"; 

    foreach($array->assessmentItems as $pregunta)
{
$email = $pregunta->author;
$enunciado=$pregunta->itemBody->p;
$respuesta=$pregunta->correctResponse->value;
echo '<tr>
<td>' . $email . '</td>
<td>' . $enunciado . '</td>
<td>' . $respuesta . '</td>
</tr>';
}


 
  echo"</table>";



?>


</div>
</section>
<?php include '../html/Footer.html' ?>
</body>
</html>
