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
<td><xmp>' . $email . '</xmp></td>
<td><xmp>' . $enunciado . '</xmp></td>
<td><xmp>' . $respuesta . '</xmp></td>
</tr>';
}
  echo"</table>";

?>