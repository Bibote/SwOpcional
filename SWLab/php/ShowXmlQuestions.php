<!DOCTYPE html>
<html>
<head>
<?php include '../html/Head.html'?>
<title> mostrar tabla xml</title>
</head>
<body>  
<?php include '../php/DbConfig.php' ?>
<?php include '../php/Menus.php' ?>

<section class="main" id="s1">
<div>
<?php

$xml = simplexml_load_file('../xml/Questions.xml');
?>
<center><table border='2' bgcolor='AFEEEE'>
<tr>
      <td>AUTOR</td>
      <td>ENUNCIADO</td>
      <td>RESPUESTA CORRECTA</td>
    </tr>
<?php
foreach($xml->children() as $assessmentItem){
    $autor = $assessmentItem->attributes();
    foreach($assessmentItem->children() as $child){
        if ($child->getName()=='itemBody'){
            $enunciado=$child->p;
        }
        if($child->getName()=='correctResponse'){
            $res=$child->response;
        }
    }    
    ?>
<tr>
    <td><?php echo $autor['author'];?></td> 
    <td><?php echo $enunciado;?></td> 
    <td><?php echo $res;?></td>
</tr>
<?php } ?>
</table>

</div>
</section>
<?php include '../html/Footer.html' ?>
</body>
</html>
