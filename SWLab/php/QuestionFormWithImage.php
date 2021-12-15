<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <?php
      $usuario =$_SESSION['sesion'];
      ?>
      <form id='fquestion' name='fquestion' action='AddQuestionWithImage.php' method='POST' enctype='multipart/form-data'>

      <label for='email'>Email*:</label> 
      <?php
      echo "<input type='text' id='email' name='email' value=$usuario><br>";
      ?>
      <label for='ePregunta'>Enunciado de la pregunta:*:</label> 
      <input type='text' id='ePregunta' name='ePregunta' ><br>
      <label for='respuestaC'>Respuesta correcta:*:</label> 
      <input type='text' id='respuestaC' name='respuestaC' ><br>
      <label for='respuesta2'>Respuesta incorrecta 1:*:</label> 
      <input type='text' id='respuesta2' name='respuesta2' ><br>
      <label for='respuesta3'>Respuesta incorrecta 2:*:</label> 
      <input type='text' id='respuesta3' name='respuesta3' ><br>
      <label for='respuesta4'>Respuesta incorrecta 3:*:</label> 
      <input type='text' id='respuesta4' name='respuesta4' ><br>
      <label for='complejidad'>Complejidad de la pregunta:*:</label>
      <select name='complejidad' onchange='salta(this.form)' >
      <option value="1">Baja
      <option value="2">Media
      <option value="3">Alta
      </select>
      <br>
      <label for='tema'>Tema de la pregunta:*:</label> 
      <input type='text' id='tema' name='tema'  ><br>


      <input type='file' accept='image/*' name='foto' onchange='loadFile(event)'>
      
      <script>
      var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
        }
      };
      </script>
      <br>
      <input type='submit' id='enviar'><br>
      <img id='output'/><br>
    </form>
    
    
    </div>
  </section>
  <?php include '../html/Footer.html' ?>

</body>
</html>
