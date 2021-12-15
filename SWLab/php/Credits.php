<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

      <h2>Unai Pinedo Molina</h2>
      <h2>Millán Sáez Ezquerro</h2>
      <h3>Ingeniería del Software</h3>
      <img src="../images/sw.jpg" width="300" height="200" />

    </div>
    <div>
      <?php

      $datos = json_decode( file_get_contents('http://ip-api.com/json/'.$_SERVER['REMOTE_ADDR'].'?fields=status,message,country,regionName,city'), true );
      if(($datos['status'])=='success') {
        $pais=$datos['country'];
        $region=$datos['regionName'];
        $ciudad=$datos['city'];
        echo "<h2>Localización cliente</h2><br>
          <center><table border='1' bgcolor='AFEEEE'>
              <tr>
                <td>Pais</td>
                <td>Region</td>
                <td>Ciudad</td>
              </tr>
              <tr>
                <td> $pais </td>
                <td> $region </td>
                <td> $ciudad </td>
              </tr>
              </table>";
              
      }
      else {
        print_r($datos["message"]);
      }

      $datos = json_decode( file_get_contents('http://ip-api.com/json/'.$_SERVER['SERVER_ADDR'].'?fields=status,message,country,regionName,city'), true );
      if(($datos['status'])=='success') {
        $pais=$datos['country'];
        $region=$datos['regionName'];
        $ciudad=$datos['city'];
        echo "<br><h2>Localización Servidor</h2><br>
              <center><table border='1' bgcolor='EEAFEE'>
              <tr>
                <td>Pais</td>
                <td>Region</td>
                <td>Ciudad</td>
              </tr>
              <tr>
                <td> $pais </td>
                <td> $region </td>
                <td> $ciudad </td>
              </tr>
              </table>";
              
      }
      else {
        print_r($datos["message"]);
      }
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
