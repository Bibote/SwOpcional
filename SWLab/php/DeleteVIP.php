<?php
  session_start();
  if ($_SESSION['tipo']!='profesor'){
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
    <div>
    <h1>Cliente REST para borrar un email de la lista de usuarios VIP</h1>
        <form id='AddVip' name='AddVip' method='POST' enctype="multipart/form-data">
        <label for="vip">Email</label> 
        <input type="text" id="email" name="email" ><br>
      <br>
      <input type="submit" id="enviar" name="enviar" value="Eliminar VIP"><br>

    <?php
      if(isset($_POST['enviar'])) {
        if (isset($_POST['email']) && !empty($_POST['email'])){
            $email = $_POST['email'];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://sw.ikasten.io/~G14/SWVIPS/VipUsers/$email");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            $output = curl_exec($ch);
            echo $output;
            curl_close($ch);
        }else{
            echo "El campo email es vacio";
        }
      }

    ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

