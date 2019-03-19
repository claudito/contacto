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

t.id, 
t.nombres, 
t.apellidos, 
t.cargo, 
t.dni, 
t.id_empresa,
UPPER(e.alias) empresa


FROM Trabajadores t  INNER JOIN Empresa e ON t.id_empresa=e.id

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

case  2:

$id  =  $_REQUEST['id'];

$query  = "SELECT * FROM Trabajadores WHERE id=".$id;
$result = $funciones->query($query)[0];

echo json_encode($result);

break;

case 3:

$nombres     = $funciones->validar_xss($_REQUEST['nombres']);
$apellidos   = $funciones->validar_xss($_REQUEST['apellidos']);
$cargo       = $funciones->validar_xss($_REQUEST['cargo']);
$dni         = $funciones->validar_xss($_REQUEST['dni']);
$empresa     = $funciones->validar_xss($_REQUEST['empresa']);


if($_REQUEST['type']=='agregar')
{

try {
	

$query     = "SELECT  * FROM Trabajadores WHERE dni=:dni";
$statement = $conexion->prepare($query);
$statement->bindParam(':dni',$dni);
$statement->execute();
$result    = $statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)>0)
{

$funciones->message('Dni Duplicado','El DNI ya esta registrado','warning');


}
else
{

$query =  "INSERT INTO Trabajadores(nombres,apellidos,cargo,dni,id_empresa)
VALUES (:nombres,:apellidos,:cargo,:dni,:id_empresa)";
$statement = $conexion->prepare($query);
$statement->bindParam(':nombres',$nombres);
$statement->bindParam(':apellidos',$apellidos);
$statement->bindParam(':cargo',$cargo);
$statement->bindParam(':dni',$dni);
$statement->bindParam(':id_empresa',$empresa);
$statement->execute();

$funciones->message('Buen Trabajo','Registro Agregado','success');


}




} catch (Exception $e) {
	
$funciones->message('Error',$e->getMessage(),'error');


}



}
else
{

$id       = $funciones->validar_xss($_REQUEST['id']);

try {
	
$query =  "UPDATE  Trabajadores SET

 nombres=:nombres,
 apellidos=:apellidos,
 cargo=:cargo,
 dni=:dni,
 id_empresa=:empresa

 WHERE id=:id ";
$statement = $conexion->prepare($query);
$statement->bindParam(':nombres',$nombres);
$statement->bindParam(':apellidos',$apellidos);
$statement->bindParam(':cargo',$cargo);
$statement->bindParam(':dni',$dni);
$statement->bindParam(':empresa',$empresa);
$statement->bindParam(':id',$id);
$statement->execute();

$funciones->message('Buen Trabajo','Registro Actualizado','success');

} catch (Exception $e) {
	
$funciones->message('Error',$e->getMessage(),'error');


}


}


break;

case  4:

$query  = "SELECT * FROM Empresa";
$result = $funciones->query($query);

echo json_encode($result);

break;


default:
echo "opción no disponible";
break;
}




 ?>