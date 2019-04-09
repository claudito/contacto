<?php 

include'../vendor/autoload.php';
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
	

switch ($_REQUEST['tipo']) {
	case 'clientes':
	
    $query  =  "SELECT  id, Nombre, Contacto, Direccion, Poblacion, CP, Provincia, CIF, Telefono, Fax, Email, NombreCorto, CuentaBanco, Creado, txtCategoria, CodigoCliente, idFPago, FPago, Segmento, TipoDocumento, Nacionalidad ,

CONCAT(UPPER(Nombre),' - ',CIF) name

FROM Clientes WHERE CONCAT(Nombre,CIF) LIKE '%".$name."%'";
$result  = $funciones->query($query);

echo json_encode($result);

		break;

    case 'estado':

$query  =  "SELECT id, Nombre FROM EstadosOperaciones WHERE Nombre LIKE '%".$name."%'";
$result  = $funciones->query($query);

echo json_encode($result);

    break;


    case  'modelo':

$query  =  "SELECT id, Modelo Nombre,CopiaDe FROM Terminales WHERE Modelo LIKE '%".$name."%'";
$result  = $funciones->query($query);

echo json_encode($result);


    break;



    case  'accesorio':

$query  =  "SELECT id, Descripcion Nombre FROM Articulos WHERE NombreFamilia='ACCESORIOS'AND Descripcion LIKE '%".$name."%'";
$result  = $funciones->query($query);

echo json_encode($result);


    break;

       case  'operacion':

$query  =  "SELECT id, Nombre FROM TipoOperacion WHERE Nombre LIKE '%".$name."%'";
$result  = $funciones->query($query);

echo json_encode($result);


    break;


        case  'contrato':

$query  =  "SELECT id, Nombre FROM Contrato WHERE Nombre LIKE '%".$name."%'";
$result  = $funciones->query($query);

echo json_encode($result);


    break;
	
	default:
echo "opcion no disponible";
		break;
}



} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}


break;


case  3:


$nombres      =  $funciones->validar_xss($_REQUEST['nombres']);
$tipo_doc     =  $funciones->validar_xss($_REQUEST['tipo_doc']);
$cif          =  $funciones->validar_xss($_REQUEST['documento']);

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
$statement->bindParam(':nombre',$nombres);
$statement->bindParam(':cif',$cif);
$statement->bindParam(':tipo_doc',$tipo_doc);
$statement->execute();

$funciones->message("Buen Trabajo","Cliente Agregado","success");

	
}

	
} catch (Exception $e) {

$funciones->message("Error",$e->getMessage(),"error");

	
}

break;



case  4:

$numero  =  trim($_REQUEST['numero']);
$tipo    =  trim($_REQUEST['tipo']);

try {

$company = new \Sunat\Sunat( true, true );

	//$numero = "10467942820";
	
	$ruc = ( isset($numero))? $numero : false;
	$search1 = $company->search( $ruc );
	
	echo $search1->json();

	
} catch (Exception $e) {

echo "Error: ".$e->getMessage();

	
 }


break;

default:
echo "opción no disponible";
break;
}




 ?>