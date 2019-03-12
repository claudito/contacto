<?php 

class Session extends Conexion
{

function conexion()
{
  return $this->get_conexion();
}

function validity()
{

session_start();

if (!isset($_SESSION[KEY.ID])) 
{

 header('Location: '.URL.'');

} 

}


function acceso()
{

try {

$usuario = $_SESSION[KEY.ID];

$url = substr($_SERVER['REQUEST_URI'], strlen(FOLDER));
//$url = substr($_SERVER['REQUEST_URI'], 1);
$conexion =  $this->conexion();
$query =  "SELECT  url,estado  FROM submenu s INNER JOIN permiso_submenu p ON
s.id=p.id_submenu WHERE s.url=:url AND id_usuario=:id_usuario";
$statement = $conexion->prepare($query);
$statement->bindParam(':url',$url);
$statement->bindParam(':id_usuario',$usuario);
$statement->execute();
$result    = $statement->fetch();

if ($result['estado']==0)
{
  
  header('Location: '.URL.'');
	
}

//echo URL;
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

}


}





 ?>