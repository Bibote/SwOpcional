<?php
  session_start();
  if ($_SESSION['tipo']!='alumno' && $_SESSION['tipo']!='profesor'){
    header("Location: Layout.php");
    exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
  <script>setInterval (showUserCount(), 10000); </script>
    <div id=usuarios>
    </div>
    <div>
    <?php
      $usuario=($_SESSION['sesion']);
      ?>
      <form id='fquestion' name='fquestion' action='AddQuestion.php' method='POST' enctype='multipart/form-data'>
      <label for="email">Email*:</label> 
      <?php
      echo "<input type='text' id='email' name='email' value='$usuario'><br>";
      ?>
      <label for="ePregunta">Enunciado de la pregunta:*:</label> 
      <input type="text" id="ePregunta" name="ePregunta" ><br>
      <label for="respuestaC">Respuesta correcta:*:</label> 
      <input type="text" id="respuestaC" name="respuestaC" ><br>
      <label for="respuesta2">Respuesta incorrecta 1:*:</label> 
      <input type="text" id="respuesta2" name="respuesta2" ><br>
      <label for="respuesta3">Respuesta incorrecta 2:*:</label> 
      <input type="text" id="respuesta3" name="respuesta3" ><br>
      <label for="respuesta4">Respuesta incorrecta 3:*:</label> 
      <input type="text" id="respuesta4" name="respuesta4" ><br>
      <label for="complejidad">Complejidad de la pregunta:*:</label>
      <select name="complejidad" onchange="salta(this.form)" >
      <option value="1">Baja
      <option value="2">Media
      <option value="3">Alta
      </select>
      <br>
      <label for="tema">Tema de la pregunta:*:</label> 
      <input type="text" id="tema" name="tema"  ><br>
      <input type="button" id="enviar" value="enviar"><br>
      <input type="button" id="verPreguntas" value="verPreguntas" onclick="showQuestions()"><br>

    </form>
    </div>
    <div id="exito" style="display:none">
            La pregunta se ha guardado correctamente.
    </div>
    <div id="verTabla">
  </section>
  <?php include '../html/Footer.html' ?>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="../js/AddQuestionsAjax.js"></script>
  <script src="../js/ViewQuestionsAjax.js"></script>
  <script src="../js/ViewUserCount.js"></script>

</body>
</html>