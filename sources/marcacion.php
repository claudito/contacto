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

  $dni       =  trim($_REQUEST['dni']);

	try {

	$query     =  "INSERT INTO marcacion(dni,fecha_marcacion)VALUES(:dni,:dateCreate)";
	$statement =  $conexion->prepare($query);
	$statement->bindParam(':dni',$dni);
	$statement->bindParam(':dateCreate',$dateCreate);
	$statement->execute();
	$funciones->message('Marcación Registrada','...','success');

	} catch (Exception $e) {

	$funciones->message('Error',$e->getMessage(),'error');

	}
  	
	break;


	case  2:

    
    header("Content-type: application/json; charset=utf-8");

$query =  "

SELECT 

t.nombres, 
t.apellidos, 
t.cargo, 
t.dni, 
UPPER(e.alias) empresa,
DATE_FORMAT(m.fecha_marcacion,'%H:%i')hora,
DATE_FORMAT(m.fecha_marcacion,'%d/%m/%Y')fecha

FROM Trabajadores t  INNER JOIN Empresa e ON t.id_empresa=e.id

INNER JOIN marcacion m ON t.dni=m.dni

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
	
	default:
	echo "opción no disponible";
		break;
}





 ?>