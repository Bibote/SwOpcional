<?php
// Constantes para el acceso a datos...
//phpinfo();
DEFINE("_HOST_", "localhost:3306");
DEFINE("_PORT_", "3306");
DEFINE("_USERNAME_", "G14");
DEFINE("_DATABASE_", "db_G14");
DEFINE("_PASSWORD_", "msSQkFaUwXpW7");

require_once 'database.php';
$method = $_SERVER['REQUEST_METHOD'];
$resource = $_SERVER['REQUEST_URI'];

    $cnx = Database::Conectar();
    switch ($method) {
        case 'GET':
			if(isset($_GET['id']))
			{
            $datos = "";
            $id = $_GET['id'];
			$sql = "SELECT * FROM vips WHERE email='$id'";
            $data=Database::EjecutarConsulta($cnx, $sql);
			if (isset($data[0])){echo "<br><br><b>ENHORABUENA ".$id." ES VIP</b>";break;}
			else {echo "<br><br><b>LO SIENTO ".$id." NO ES VIP</b>";
			break;}
			}
			else
			{
            $datos = "";
            $sql = "SELECT * FROM vips";
            $data=Database::EjecutarConsulta($cnx, $sql);
            if (isset($data[0])){echo "<br><br>$data";break;}
			}
			break;
        case 'POST':
            $arguments = $_POST;
            $result = 0;
            $id= $arguments['id'];
            $sql = "INSERT INTO vips (email) VALUES ('$id');";
            $num=Database::EjecutarNoConsulta($cnx, $sql);
            if ($num==0){echo json_encode(array('Ya es VIP' => $id));}
            Else {echo json_encode(array('CreadoVIP' => $id));}
            break;
        case 'PUT':
            // Este no hay que implementar
        case 'DELETE':
            $arguments = $_REQUEST;
            $id=$arguments['id'];
            $sql = "DELETE FROM vips WHERE email = '$id';";
            $result = Database::EjecutarNoConsulta($cnx, $sql);
            if ($result == 0)
            {echo json_encode(array('No existe el email' => $id)) ;}
            else
            {echo json_encode(array('Deleted row' => $id));};
            break;
		}
    Database::Desconectar($cnx);

?>
