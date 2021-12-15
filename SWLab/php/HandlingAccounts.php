<?php
  session_start();
  if ($_SESSION['tipo']!='admin'){
    header("Location: Layout.php");
    exit();
  }
?>
<!DOCTYPE html>
<html>
<head>
<?php include '../html/Head.html'?>

<title> mostrar usuarios</title>
</head>
<body>  
<?php include '../php/DbConfig.php' ?>
<?php include '../php/Menus.php' ?>

<section class="main" id="s1">
<div>
<?php




$conn = mysqli_connect($server, $user, $pass, $basededatos);


if (!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Usuarios";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
  echo "<center><table border='2' bgcolor='AFEEEE'>
    <tr>
      <td>Email</td>
      <td>Contraseña</td>
      <td>Foto</td>
      <td>Cambiar estado</td>
      <td>Eliminar usuario</td>
    </tr>";

  while ($row = mysqli_fetch_assoc($result))
  {
    if($row["email"]!='admin@ehu.es') {
    if($row['Estado']=='Activada') {
        echo"<tr bgcolor='AFEEEE'>";
      }
      else {
        echo"<tr bgcolor='EEAFEE'>";
      }
    $mail=$row["email"];
    echo "<script type='text/javascript'>
      var mail=$mail;
      </script>";
    echo"
      <td>" , $mail , "</td>
      <td>" , $row["contraseña"] , "</td>";
      if($row['foto']==null) {
        echo "<td>" , null , "</td>";
      } else{ 
      echo"<td>" , '<img src="data:image/jpeg;base64,'.base64_encode ($row['foto']).'" height="100" width="100"/>', "</td>";
      }
      if($row['Estado']=='Activada') {
        ?>
      
        
      <td><center><input type='button' value='Bloquear' onclick="cambiar('<?php echo $mail?>')"> </td>
      <?php
      }
      else {
        echo"<td>"; 
        ?>
        <center><input type='button' value='Activar' onclick="cambiar('<?php echo $mail?>')">
        <?php
        echo" </td>";
      }
      ?>
      <td> <center><input type='button' value='Eliminar' onclick="eliminar('<?php echo $mail?>')"> </td>
      </tr>
      <?php
    }
  }
  echo"</table>";
}
else
{
  echo "0 results";
}
mysqli_close($conn);
?>



</div>
</section>
<script src="../js/ChangeUserState.js"></script>
<?php include '../html/Footer.html' ?>
</body>
</html>



