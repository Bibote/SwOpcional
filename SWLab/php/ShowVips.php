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
    <h1>Cliente REST para listar los usuarios VIPS</h1>
    <h2>Usuarios VIP</h2>
    <?php
        $curl = curl_init();
        $url = "https://sw.ikasten.io/~G14/SWVIPS/VipUsers/";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $str = curl_exec($curl);
        echo $str;
    ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>

