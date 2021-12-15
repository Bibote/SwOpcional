<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
  <form id='fquestion' name='fquestion' action='AddQuestionWithImage.php'>
      <label for="email">Email*:</label> 
      <input type="email" id="email" name="email" pattern="([a-zA-Z]+[0-9]{3}@ikasle\.ehu\.((eus)|(es)))|([a-zA-Z][\.[a-zA-Z]+]{0,1}@ehu\.((eus)|(es)))"  required><br>
      <label for="ePregunta">Enunciado de la pregunta:*:</label> 
      <input type="text" id="ePregunta" name="ePregunta" minlength="10" required ><br>
      <label for="respuestaC">Respuesta correcta:*:</label> 
      <input type="text" id="respuestaC" name="respuestaC" require ><br>
      <label for="respuesta2">Respuesta incorrecta 1:*:</label> 
      <input type="text" id="respuesta2" name="respuesta2" required><br>
      <label for="respuesta3">Respuesta incorrecta 2:*:</label> 
      <input type="text" id="respuesta3" name="respuesta3"required ><br>
      <label for="respuesta4">Respuesta incorrecta 3:*:</label> 
      <input type="text" id="respuesta4" name="respuesta4" required><br>
      <label for="complejidad">Complejidad de la pregunta:*:</label>
      <select name="complejidad" onchange="salta(this.form)"required >
      <option value="1">Baja
      <option value="2">Media
      <option value="3">Alta
      </select>
      <br>
      <label for="tema">Tema de la pregunta:*:</label> 
      <input type="text" id="tema" name="tema" required ><br>


      <input type="file" accept="image/*" onchange="loadFile(event)">
      
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
      <input type="submit" id="enviar"><br>
      <img id="output"/><br>
    </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
