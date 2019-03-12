<?php 

include'../autoload.php';

$opcion     = $_REQUEST['op'];
$funciones  = new Funciones();

$conexion   =  new Conexion();
$conexion   =  $conexion->get_conexion();




switch ($opcion) {
	case 1:

 $query = "SELECT  * FROM Empresa";
 $result= $funciones->query($query);

 echo json_encode($result);


		break;
	
	default:
echo "no hay opción disponible";
		break;
}





 ?>