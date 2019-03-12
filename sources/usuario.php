<?php 

include'../autoload.php';

$session =  new Session();
$session->validity();

$opcion     = $_REQUEST['op'];
$funciones  = new Funciones();

$conexion   =  new Conexion();
$conexion   =  $conexion->get_conexion();

$userCreate = $_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.APELLIDOS];
$dateCreate = date('Y-m-d H:i:s');

switch ($opcion) {
case 1:
header("Content-type: application/json; charset=utf-8");

$query =  "
SELECT  
 id, Nombre, Usuario, Pass, Email, Telefono, Movil, userCreate, dateCreate, userUpdate, dateUpdate, idPuntoVenta, idEstado, idLicencia, idGrupo, Empresa
 
FROM Usuarios";
$statement = $conexion->query($query);
$statement->execute();
$result      = $statement->fetchAll(PDO::FETCH_ASSOC);


$results = ["sEcho" => 1,
          "iTotalRecords" => count($result),
          "iTotalDisplayRecords" => count($result),
          "aaData" => $result 
           ];
echo json_encode($results);


break;

case 2:

$id     = trim($_REQUEST['id']);
$pass   = trim($_REQUEST['pass']);

try {
	
$query =  "UPDATE Usuarios SET Pass=:pass WHERE id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->bindParam(':pass',$pass);
$statement->execute();
echo "ok";

} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

break;

case  3:

$id  =  $_REQUEST['id'];

$query  = "SELECT * FROM Usuarios WHERE id=".$id;
$result = $funciones->query($query)[0];

echo json_encode($result);

break;

case 4:

$nombres    = $funciones->validar_xss($_REQUEST['nombres']);
$correo     = $funciones->validar_xss($_REQUEST['correo']);
$celular    = $funciones->validar_xss($_REQUEST['celular']);
$user       = $funciones->validar_xss($_REQUEST['user']);
$telefono   = $funciones->validar_xss($_REQUEST['telefono']);

if($_REQUEST['type']=='agregar')
{

try {
	
$query =  "INSERT INTO usuario(nombres,apellidos,correo,celular,user,tipo)
VALUES (:nombres,:apellidos,:correo,:celular,:user,:tipo)";
$statement = $conexion->prepare($query);
$statement->bindParam(':nombres',$nombres);
$statement->bindParam(':apellidos',$apellidos);
$statement->bindParam(':correo',$correo);
$statement->bindParam(':correo',$correo);
$statement->bindParam(':celular',$celular);
$statement->bindParam(':user',$user);
$statement->bindParam(':tipo',$tipo);
$statement->execute();

$funciones->message('Buen Trabajo','Registro Agregado','success');

} catch (Exception $e) {
	
$funciones->message('Error',$e->getMessage(),'error');


}



}
else
{

$id       = $funciones->validar_xss($_REQUEST['id']);

try {
	
$query =  "UPDATE  Usuarios SET

 Nombre=:nombres,
 Email=:correo,
 Movil=:celular,
 Usuario=:user,
 Telefono=:telefono

 WHERE id=:id ";
$statement = $conexion->prepare($query);
$statement->bindParam(':nombres',$nombres);
$statement->bindParam(':correo',$correo);
$statement->bindParam(':celular',$celular);
$statement->bindParam(':user',$user);
$statement->bindParam(':telefono',$telefono);
$statement->bindParam(':id',$id);
$statement->execute();

$funciones->message('Buen Trabajo','Registro Actualizado','success');

} catch (Exception $e) {
	
$funciones->message('Error',$e->getMessage(),'error');


}







}


break;

case  5:

$iduser  = $_REQUEST['id'];

header("Content-type: application/json; charset=utf-8");
$query  =  " 
SELECT 

s.id,
s.descripcion,
s.url,
s.icon,
s.id_menu,
s.tipo,
IFNULL(p.estado,0)estado,
item,
CASE  IFNULL(p.estado,'')
WHEN 1 THEN 'checked'
END checked

FROM (

SELECT id,descripcion,url,item,icon,id_menu,'submenu' tipo  FROM submenu WHERE flagDelete=0

UNION 

SELECT id,descripcion,''url,item,icon,id id_menu,'menu'tipo FROM menu WHERE flagDelete=0


) s LEFT  JOIN permiso_submenu p ON s.id=p.id_submenu AND  p.id_usuario=:iduser order by  tipo,item";

$statement  = $conexion->prepare($query);
$statement->bindParam(':iduser',$iduser);
$statement->execute();
$result     = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);

break;

case  6:

$id_usuario  =  $_REQUEST['user'];
$estado      =  $_REQUEST['estado'];
$id_submenu  =  $_REQUEST['id'];

try {
	
$query =  "SELECT  * FROM permiso_submenu WHERE id_usuario=:id_usuario
 AND id_submenu=:id_submenu";
$statement = $conexion->prepare($query);
$statement->bindParam(':id_submenu',$id_submenu);
$statement->bindParam(':id_usuario',$id_usuario);
$statement->execute();
$result    = $statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)>0)
{

$query =  "UPDATE permiso_submenu SET 
estado=:estado 
WHERE id_usuario=:id_usuario
 AND id_submenu=:id_submenu";
$statement = $conexion->prepare($query);
$statement->bindParam(':id_submenu',$id_submenu);
$statement->bindParam(':id_usuario',$id_usuario);
$statement->bindParam(':estado',$estado);
$statement->execute();
echo "update";

}
else
{

$query =  "INSERT INTO permiso_submenu
(id_submenu,id_usuario,estado) VALUES
(:id_submenu,:id_usuario,:estado)";
$statement = $conexion->prepare($query);
$statement->bindParam(':id_submenu',$id_submenu);
$statement->bindParam(':id_usuario',$id_usuario);
$statement->bindParam(':estado',$estado);
$statement->execute();
echo "insert";



}




} catch (Exception $e) {
	
echo $e->getMessage();

}



break;


default:
echo "opción no disponible";
break;
}




 ?>