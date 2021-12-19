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
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
    <div>
    <form id='logIn' name='logIn' method='POST' enctype="multipart/form-data">
        <label for="email">Email*:</label> 
        <input type="text" id="email" name="email" ><br>
        <label for="password">Contraseña*:</label> 
        <input type="password" id="password" name="password" ><br>
      <br>
      <input type="submit" id="enviar" name="enviar"><br>

      <?php
      
      if(isset($_POST['enviar'])) {
        $errores = '';
     
        $post = (isset($_POST['email']) && !empty($_POST['email'])) &&
              (isset($_POST['password']) && !empty($_POST['password']));


        if ($post) {  
            $email = $_POST['email'];
            $password = $_POST['password'];
            

        }else{
          $errores = "Hay campos sin rellenar";
        }
        
        if(!$errores=='') {
          print($errores);
        }
        else {
          $link = mysqli_connect ($server, $user, $pass, $basededatos);
          $sql2="SELECT contraseña FROM Usuarios WHERE email='$email'";
          $result=null;
          $result = mysqli_query($link,$sql2);
          if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $encriptada=$row['contraseña'];
          }
          $desencriptada = crypt($password,$encriptada);
          $sql1="SELECT * FROM Usuarios WHERE email='$email' AND contraseña='$desencriptada'";
          $result=null;
          $result = mysqli_query($link,$sql1);
          mysqli_close($link);
          if(mysqli_num_rows($result) > 0) {
            $usuario=mysqli_fetch_assoc($result);
            if($usuario['Estado']=='Activada') {
            $_SESSION['sesion']=$email;
            $_SESSION['tipo']=$usuario['tipo'];

            if($usuario['foto']==null) {
      
              $foto=null;
             }
            else {
              $_SESSION['foto']=$usuario['foto'];
            }

            echo" 
            <script languaje='javascript'> 
              alert('Bienvenido $email');
              location.href='Layout.php';
            </script>
            ";
            }
            else {
              echo" 
            <script languaje='javascript'> 
              alert('El $email se encuentra bloqueado');
              location.href='Layout.php';
            </script>
            ";
            }
          }
          else{
            echo ("Par&aacute;metros de login incorrectos ");
          }  
        }
      }
      ?>
      
    </div>
  </section>
  <script src="../js/Increase.js"></script>
  <?php include '../html/Footer.html' ?>


</body>
</html>
