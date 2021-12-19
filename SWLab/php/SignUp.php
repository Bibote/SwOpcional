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
    <form id='signUp' name='signUp' method='POST' enctype="multipart/form-data">
        <label for="alumno">Alumno</label>
        <input type="radio" id="alumno" name="select" value="alumno" checked>
        <label for="profesor">Profesor</label>
        <input type="radio" id="profesor" name="select" value="profesor" > </br>
        <label for="email">Email*:</label> 
        <input type="text" id="email" name="email" onfocusout="verifyEnrollment()"><br>
        <label for="nombre">Nombre*:</label> 
        <input type="text" id="nombre" name="nombre" ><br> 
        <label for="apellido">Apellidos*:</label> 
        <input type="text" id="apellido" name="apellido" ><br>
        <label for="password1">Contraseña*:</label> 
        <input type="password" id="password1" name="password1" ><br>
        <label for="password2">Repetir contraseña*:</label> 
        <input type="password" id="password2" name="password2" ><br>
        <label for="foto">Foto</label>
        <input type="file" accept="image/*" name="foto">
      <br>
      <input type="submit" id="enviar" name="enviar"><br>



      <?php
      
      
        if(isset($_POST['enviar'])) {
         $errores = '';
         $soapclient = new SoapClient('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl');
      $result=$soapclient-> comprobar(($_POST['email']));
        if($result=='NO'){
          $errores = 'El email no es valido';
        }
          $regexA = '/^[a-zA-Z]+[0-9]{3}@ikasle\.ehu\.((eus)|(es))$/i';
         $regexP = '/^[a-zA-Z][\.[a-zA-Z]+]*@ehu\.((eus)|(es))$/i';
     
         $post = (isset($_POST['email']) && !empty($_POST['email'])) &&
              (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
              (isset($_POST['apellido']) && !empty($_POST['apellido']))&&
              (isset($_POST['password1']) && !empty($_POST['password1']))&&
              (isset($_POST['password2']) && !empty($_POST['password2']));

          $select = $_POST['select']; 
          $email = $_POST['email'];
          $password1 = $_POST['password1'];
          $encriptada = crypt($password1);
          $password2 = $_POST['password2'];
         $foto =addslashes(file_get_contents($_FILES['foto']['tmp_name']));
          if ($post) {  
           $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];


          }else{
           $errores = "Hay campos obligatorios sin rellenar";
         }
         if (strlen($password1)<8){
            $errores = "La contraseña debe tener al menos 8 caracteres";
          }
          if ($password1!=$password2){
            $errores = "Las contraseñas no coinciden";
          }
          if ($select=='alumno') {
           if(!preg_match($regexA, $email)){

              $errores = "El email es incorrecto";
           }
          }
          if($select=='profesor') {
           if(!preg_match($regexP, $email)) {

              $errores = "El email es incorrecto";
          }

          }
        
          if(!$errores=='') {
            print($errores);
         }
          else {
            $link = mysqli_connect ($server, $user, $pass, $basededatos);
            $sql1="SELECT email FROM Preguntas WHERE email='$email' ";
            $result=null;
             $result = mysqli_query($link,$sql1);
            if(isset($result)) {
               $sql2="INSERT INTO Usuarios
                  (tipo,email,nombre,apellidos,contraseña,foto,estado) VALUES ('$select','$email','$nombre','$apellido','$encriptada','$foto','Activada')";
               if (!mysqli_query($link, $sql2)){
                 mysqli_close($link);
                 echo "<span style='color:red'>Se ha producido algun error, vuelve a intentarlo</span>";
                echo "<a href='javascript:history.back();'>Atrás</a>";
              }else{
                mysqli_close($link);
                 echo "<span style='color:blue'>Usuario creado</span>";
               }
             }
              else{
                $dbh = null;
                echo "<span style='color:red'>Este usuario ya existe</span>";

               }  
          }
       }
      
      ?>
      
    </div>
    <div id="existe">
    
    
  </section>
  <script src="../js/ClientEnrollment.js"></script>
  <?php include '../html/Footer.html' ?>
  

</body>
</html>
