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
s.id,
s.descripcion,
s.item,
s.icon,
s.url,
s.id_menu,
m.descripcion menu
FROM submenu s 
INNER JOIN menu m ON s.id_menu=m.id WHERE s.flagDelete=0
";
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

$id = $_REQUEST['id'];

$query =  "SELECT 
s.id,
s.descripcion,
s.item,
s.icon,
s.url,
s.id_menu,
m.descripcion menu
FROM submenu s 
INNER JOIN menu m ON s.id_menu=m.id  WHERE s.id=".$id;
$result = $funciones->query($query)[0];

echo json_encode($result);

break;


case 3:

$query =  "SELECT * FROM menu";
$result = $funciones->query($query);

echo json_encode($result);

break;


case 4:

$descripcion = $funciones->validar_xss($_REQUEST['descripcion']);
$menu   = $funciones->validar_xss($_REQUEST['menu']);
$item   = $funciones->validar_xss($_REQUEST['item']);
$url    = $funciones->validar_xss($_REQUEST['url']);

if($_REQUEST['tipo']=='agregar')
{

//Agregar
try {
	
$query  =  "SELECT  * FROM submenu WHERE url=:url";
$statement = $conexion->prepare($query);
$statement->bindParam(':url',$url);
$statement->execute();
$result  = $statement->fetchAll(PDO::FETCH_ASSOC);
if(count($result)>0)
{

echo json_encode(array('title'=>'URL Duplicada','type'=>'warning','text'=>'La URL ya esta registrada'));

}
else
{

$query  =  "INSERT INTO  submenu(descripcion,item,url,id_menu)
VALUES(:descripcion,:item,:url,:id_menu)";
$statement = $conexion->prepare($query);
$statement->bindParam(':descripcion',$descripcion);
$statement->bindParam(':item',$item);
$statement->bindParam(':url',$url);
$statement->bindParam(':id_menu',$menu);
$statement->execute();
echo json_encode(array('title'=>'Buen Trabajo','type'=>'success','text'=>'Registro Agregado'));


}


} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}



}
else
{

//Actualizar
$id     = $_REQUEST['id'];

$query  =  "SELECT  * FROM submenu WHERE id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result  = $statement->fetch(PDO::FETCH_ASSOC);

if($result['url']==$url)
{

try {
	
$query  =  "UPDATE   submenu SET 
descripcion=:descripcion,
item=:item,
url=:url,
id_menu=:id_menu
WHERE id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':descripcion',$descripcion);
$statement->bindParam(':item',$item);
$statement->bindParam(':url',$url);
$statement->bindParam(':id_menu',$menu);
$statement->bindParam(':id',$id);
$statement->execute();
echo json_encode(array('title'=>'Buen Trabajo','type'=>'success','text'=>'Registro Actualizado'));


} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}
else
{

$query  =  "SELECT  * FROM submenu WHERE url=:url";
$statement = $conexion->prepare($query);
$statement->bindParam(':url',$url);
$statement->execute();
$result  = $statement->fetchAll(PDO::FETCH_ASSOC);
if(count($result)>0)
{

echo json_encode(array('title'=>'URL Duplicada','type'=>'warning','text'=>'La URL ya esta registrada'));


}
else
{

try {
	
$query  =  "UPDATE   submenu SET 
descripcion=:descripcion,
item=:item,
url=:url,
id_menu=:id_menu
WHERE id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':descripcion',$descripcion);
$statement->bindParam(':item',$item);
$statement->bindParam(':url',$url);
$statement->bindParam(':id_menu',$menu);
$statement->bindParam(':id',$id);
$statement->execute();
echo json_encode(array('title'=>'Buen Trabajo','type'=>'success','text'=>'Registro Actualizado'));


} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}




}


}



}


break;

default:
echo "opción no disponible";
break;
}




 ?>