<!DOCTYPE html>
<html>
<head>
<?php include '../html/Head.html'?>
<title> mostrar tabla</title>
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

$sql = "SELECT * FROM Preguntas";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
  echo "<center><table border='2' bgcolor='AFEEEE'>
    <tr>
      <td>AUTOR</td>
      <td>ENUNCIADO</td>
      <td>RESPUESTA CORRECTA</td>
    </tr>";

  while ($row = mysqli_fetch_assoc($result))
  {
    echo"<tr>
      <td>" , $row["email"] , "</td>
      <td>" , $row["ePregunta"] , "</td>
      <td>" , $row["respuestaC"] , "</td>
    </tr>";
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
<?php include '../html/Footer.html' ?>
</body>
</html>
