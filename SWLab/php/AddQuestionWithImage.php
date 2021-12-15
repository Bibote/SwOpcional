<?php

$errores = '';

      $regexA = '/^[a-zA-Z]+[0-9]{3}@ikasle\.ehu\.((eus)|(es))$/i';
      $regexP = '/^[a-zA-Z][\.[a-zA-Z]+]*@ehu\.((eus)|(es))$/i';
     
      $post = (isset($_POST['respuesta2']) && !empty($_POST['respuesta2'])) &&
              (isset($_POST['respuesta3']) && !empty($_POST['respuesta3'])) &&
              (isset($_POST['respuesta4']) && !empty($_POST['respuesta4'])) &&
              (isset($_POST['tema']) && !empty($_POST['tema']));

      
      $email = $_POST['email'];
      $ePregunta = $_POST['ePregunta'];
      
      $foto =addslashes(file_get_contents($_FILES['foto']['tmp_name']));
      
  
      if ($post) {
        $respuestaC = $_POST['respuestaC'];
        $respuesta2 = $_POST['respuesta2'];
        $respuesta3 = $_POST['respuesta3'];
        $respuesta4 = $_POST['respuesta4'];
        $complejidad = $_POST['complejidad'];
        $tema = $_POST['tema'];
      }else{
        $errores = "El servidor dice que hay campos vacios";
      }
      if (strlen($ePregunta)<10){
        $errores = "El servidor dice que el enunciado debe tener por lo menos 10 caracteres";
      }
      if ((preg_match($regexA, $email) || preg_match($regexP, $email))!=1) {
        $errores = "El servidor dice que el email es incorrecto";
      }
?>

<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
    <div>
   
    <?php
    if ($errores == ''){
      
      $xml = simplexml_load_file('../xml/Questions.xml');
      $assessmentItem = $xml->addChild('assessmentItem');
      $assessmentItem->addAttribute('subject',$tema);
      $assessmentItem->addAttribute('author',$email);

      $itemBody = $assessmentItem->addChild('itemBody');
      $itemBody->addChild('p',$ePregunta);
      
      $correctResponse = $assessmentItem->addChild('correctResponse');
      $correctResponse->addChild('response',$respuestaC);

      $incorrectResponses = $assessmentItem->addChild('incorrectResponses');
      $incorrectResponses->addChild('response',$respuesta2);
      $incorrectResponses->addChild('response',$respuesta3);
      $incorrectResponses->addChild('response',$respuesta4);

      echo $xml->asXML('../xml/Questions.xml');


      $data = file_get_contents("../json/Questions.json");
      $array=json_decode($data);
      $pregunta = new stdClass(); 
      $pregunta->subject=$tema;
      $pregunta->author=$email;
      $pregunta->itemBody = new stdClass();
      $pregunta->itemBody->p = $ePregunta;
      $pregunta->correctResponse = new stdClass();
      $pregunta->correctResponse->value = $respuestaC;
      $pregunta->incorrectResponses = new stdClass();
      $pregunta->incorrectResponses->value[0] = $respuesta2;
      $pregunta->incorrectResponses->value[1] = $respuesta3;
      $pregunta->incorrectResponses->value[2] = $respuesta4;
      $preguntaarray[0] = $pregunta;
      array_Push($array->assessmentItems, $preguntaarray[0]);
      $jsonData = json_encode($array);
      $jsonData = str_replace('{', '{'.PHP_EOL, $jsonData);
      $jsonData = str_replace(',', ','.PHP_EOL, $jsonData); 
      $jsonData = str_replace('}', PHP_EOL.'}', $jsonData);
      file_put_contents("../json/Questions.json",$jsonData);


            $link = mysqli_connect ($server, $user, $pass, $basededatos);

              $sql="INSERT INTO Preguntas
              (ID,email,ePregunta,respuestaC,respuesta2,respuesta3,respuesta4,complejidad,tema,foto) VALUES ('0','$email','$ePregunta','$respuestaC','$respuesta2','$respuesta3','$respuesta4','$complejidad','$tema','$foto')";
              
              if (!mysqli_query($link, $sql))
              {
                mysqli_close($link);
                echo "<span style='color:red'>Se ha producido algun error, vuelve a intentarlo</span>";
                echo "<a href='javascript:history.back();'>Atrás</a>";
              }else{
                mysqli_close($link);
                echo "<span style='color:blue'>Pregunta almacenada</span>";
                echo "<a href='ShowQuestionsWithImage.php?email=$email'>Ver preguntas de la BD</a>";
              }

      
              
    } else {
      ?>
      <span style='color:red'><?php echo $errores?></span>
      <a href='javascript:history.back();'>Atrás</a>
      <?php 
    }
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>