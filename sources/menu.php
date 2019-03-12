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
SELECT  * FROM menu WHERE flagDelete=0";
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

$query =  "SELECT * FROM menu WHERE id=".$id;
$result = $funciones->query($query)[0];

echo json_encode($result);

break;

case 3:

$descripcion = $funciones->validar_xss($_REQUEST['descripcion']);
$item        = $funciones->validar_xss($_REQUEST['item']);
$icono       = $funciones->validar_xss($_REQUEST['icono']);

if($_REQUEST['tipo']=='agregar')
{

//Agregar
try {
	
$query  =  "SELECT  * FROM menu WHERE descripcion=:descripcion";
$statement = $conexion->prepare($query);
$statement->bindParam(':descripcion',$descripcion);
$statement->execute();
$result  = $statement->fetchAll(PDO::FETCH_ASSOC);
if(count($result)>0)
{

echo json_encode(array('title'=>'Registro Duplicado','type'=>'warning','text'=>'El nombre ya esta registrado'));

}
else
{

$query  =  "INSERT INTO  menu(descripcion,item,icon)
VALUES(:descripcion,:item,:icon)";
$statement = $conexion->prepare($query);
$statement->bindParam(':descripcion',$descripcion);
$statement->bindParam(':item',$item);
$statement->bindParam(':icon',$icono);
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

$query  =  "SELECT  * FROM menu WHERE id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result  = $statement->fetch(PDO::FETCH_ASSOC);

if($result['descripcion']==$descripcion)
{

try {
	
$query  =  "UPDATE   menu SET 
descripcion=:descripcion,
item=:item,
icon=:icon WHERE id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':descripcion',$descripcion);
$statement->bindParam(':item',$item);
$statement->bindParam(':icon',$icono);
$statement->bindParam(':id',$id);
$statement->execute();
echo json_encode(array('title'=>'Buen Trabajo','type'=>'success','text'=>'Registro Actualizado'));


} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}


}
else
{

$query  =  "SELECT  * FROM menu WHERE descripcion=:descripcion";
$statement = $conexion->prepare($query);
$statement->bindParam(':descripcion',$descripcion);
$statement->execute();
$result  = $statement->fetchAll(PDO::FETCH_ASSOC);
if(count($result)>0)
{

echo json_encode(array('title'=>'Registro Duplicado','type'=>'warning','text'=>'El nombre ya esta registrado'));


}
else
{

try {
	
$query  =  "UPDATE   menu SET 
descripcion=:descripcion,
item=:item,
icon=:icon WHERE id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':descripcion',$descripcion);
$statement->bindParam(':item',$item);
$statement->bindParam(':icon',$icono);
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