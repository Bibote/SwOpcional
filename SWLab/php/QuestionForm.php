<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    <form id='fquestion' name='fquestion' action='AddQuestion.php' method='POST'>
      <label for="email">Email*:</label> 
      <input type="text" id="email" name="email" ><br>
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
      <br>
      <input type="submit" id="enviar"><br>
      <img id="output"/><br>
    </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/jquery.validate.min.js"></script>
  

</body>
</html>