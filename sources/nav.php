<?php 

include'../autoload.php';

$session =  new Session();
$session->validity();

$opcion     = $_REQUEST['op'];
$funciones  = new Funciones();

$conexion   =  new Conexion();
$conexion   =  $conexion->get_conexion();

$userCreate = $_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.APELLIDOS];
$iduser     = $_SESSION[KEY.ID];
$dateCreate = date('Y-m-d H:i:s');


switch ($opcion) {
	case 1:
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
s.item

FROM (

SELECT id,descripcion,url,item,icon,id_menu,'submenu' tipo  FROM submenu WHERE flagDelete=0

UNION 

SELECT m.id,descripcion,url,item,icon,id_menu,tipo FROM (SELECT id,descripcion,''url,item,icon,id id_menu,'menu'tipo FROM menu WHERE flagDelete=0) m 
INNER JOIN (SELECT  m.id FROM submenu s INNER JOIN menu m ON s.id_menu=m.id
INNER JOIN permiso_submenu p ON s.id=p.id_submenu WHERE p.id_usuario=:iduser AND estado=1
GROUP BY m.id) e ON m.id=e.id


) s LEFT  JOIN permiso_submenu p ON s.id=p.id_submenu  AND p.id_usuario=:iduser 
ORDER BY s.item";

$statement  = $conexion->prepare($query);
$statement->bindParam(':iduser',$iduser);
$statement->execute();
$result     = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);


		break;
	
	default:
    echo "opción no disponible";
		break;
}




 ?>