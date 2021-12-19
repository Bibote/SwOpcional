<?php include '../php/DbConfig.php' ?>
  <?php
  session_start();
  $tipo='';

  echo "<div id='page-wrap'>";
  if (isset($_SESSION['sesion'])){
    $usuario=($_SESSION['sesion']);
    $tipo=$_SESSION['tipo'];
    if($_SESSION['foto']!=null) {
      $foto= "data:image/jpeg;base64,".base64_encode ($_SESSION['foto'])."";
    }
    else {
      $foto='../images/anonimo.jpeg';
    }
  }
  
  echo "<header class='main' id='h1'>";
      if (!isset($_SESSION['sesion'])){
        echo "<span class='right' style=display:inline><a href='SignUp.php'>Registro</a></span>
        <span class='right' style=display:inline><a href='LogIn.php'>Login</a></span>";
      }else{
        echo "<span class='right' style=display:inline;><a>$usuario</a></span>
        <img src='$foto' height='100' width='100' style=display:inline;/>
        <span class='right' style=display:inline;><a href='LogOut.php'>Logout</a></span>";

      }
      echo "
      </header>
      <nav class='main' id='n1' role='navigation'>
        <span><a href='Layout.php'>Inicio</a></span>
        ";
        if ($tipo=='alumno' || $tipo=='profesor'){
          echo "<span style=display:block><a href='HandlingQuizesAjax.php'>Gestionar preguntas Ajax</a></span>";
        }
        if ($tipo=='profesor'){
          echo "<span style=display:block><a href='AddVip.php'> Añadir usuario como VIP</a></span>
          <span style=display:block><a href='DeleteVIP.php'> Eliminar VIP</a></span>
          <span style=display:block><a href='ShowVips.php'>Listado VIPs</a></span>
          <span style=display:block><a href='IsVip.php'>Usuario es VIP?</a></span>";
        }
        if ($tipo=='admin'){
          echo "<span style=display:block><a href='HandlingAccounts.php'>Gestionar usuarios</a></span>";
        }
        echo "<span><a href='Credits.php'>Creditos</a></span>
      </nav>";
?>