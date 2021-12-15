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
    <h1>Cliente REST para saber si el usuario dado es VIP</h1>
        <form id='IsVip' name='IsVip' method='POST' enctype="multipart/form-data">
        <label for="vip">Es VIP?</label> 
        <input type="text" id="email" name="email" ><br>
      <br>
      <input type="submit" id="enviar" name="enviar" value="Es vip?"><br>

    <?php
      if(isset($_POST['enviar'])) {
        if (isset($_POST['email']) && !empty($_POST['email'])){
            $email = $_POST['email'];
            $curl = curl_init();
            $url = "https://sw.ikasten.io/~G14/SWVIPS/VipUsers/$email";
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $str = curl_exec($curl);
            echo $str;
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

