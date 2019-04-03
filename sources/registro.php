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
SELECT id, Fecha, Operacion, Promocion, Contrato, Modelo, idModelo, IMEI, Telefono, PVP, Codigo, Nombre, NIF, Puntos, Observaciones, idUsuario, Usuario, idCliente, Cliente, ZonaAzul, idPuntoVenta, PuntoVenta, NumFactura, Servicio, idFormaPago, FormaPago, NumAbono, ICC, CodPromocion, IMEIAccesorio1, NombreAccesorio1, CodigoFija, FechaAbono, FechaFactura, Boletin, FechaActivacion, Estado, idSegmento, NombreSegmento, OperadorDonante, TamañoPrevisto, NombreComercial, idComercial, Compromiso FROM Operaciones 

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


$name =  trim($_REQUEST['name']);

try {
	
$query  =  "SELECT  id, Nombre, Contacto, Direccion, Poblacion, CP, Provincia, CIF, Telefono, Fax, Email, NombreCorto, CuentaBanco, Creado, txtCategoria, CodigoCliente, idFPago, FPago, Segmento, TipoDocumento, Nacionalidad ,

CONCAT(UPPER(Nombre),' - ',CIF) name

FROM Clientes WHERE CONCAT(Nombre,CIF) LIKE '%".$name."%'";
$statement = $conexion->prepare($query);
$statement->execute();
$result  = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);



} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}


break;


case  3:


$nombre      =  $funciones->validar_xss($_REQUEST['nombre']);
$tipo_doc    =  $funciones->validar_xss($_REQUEST['tipo_doc']);
$cif         =  $funciones->validar_xss($_REQUEST['cif']);

try {


$query     =  "SELECT  * FROM Clientes WHERE CIF=:cif";
$statement =  $conexion->prepare($query);
$statement->bindParam(':cif',$cif);
$statement->execute();
$result    = $statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)>0)
{

$funciones->message("Cliente","Ya Registrado","warning");

}
else
{

$query = "INSERT INTO Clientes(Nombre,CIF,TipoDocumento)VALUES
(:nombre,:cif,:tipo_doc)";
$statement = $conexion->prepare($query);
$statement->bindParam(':nombre',$nombre);
$statement->bindParam(':cif',$cif);
$statement->bindParam(':tipo_doc',$tipo_doc);
$statement->execute();

$funciones->message("Buen Trabajo","Cliente Agregado","success");

	
}

	
} catch (Exception $e) {

$funciones->message("Error",$e->getMessage(),"error");

	
}

break;

default:
echo "opción no disponible";
break;
}




 ?>