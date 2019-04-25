<?php 

include'../autoload.php';
include'../vendor/autoload.php';

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

$archivo   = $_FILES['archivo']['name'];
$tipo      = $_FILES['archivo']['type'];
$destino   = "bak_" . $archivo;

if (copy($_FILES['archivo']['tmp_name'], $destino))
{
echo "Archivo Cargado Con Éxito";
}
else
{
echo "Error Al Cargar el Archivo";
}


if(file_exists("bak_" . $archivo))
{

// Cargando la hoja de cálculo
$objReader = new PHPExcel_Reader_Excel2007();
$objPHPExcel = $objReader->load("bak_" . $archivo);
$objFecha = new PHPExcel_Shared_Date();
// Asignar hoja de excel activa
$objPHPExcel->getSheetByName('Hoja 1');

for ($i = 2; $i <= 10; $i++)
{

$_DATOS_EXCEL[$i]['a'] = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['b'] = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['c'] = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['d'] = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['e'] = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['f'] = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['g'] = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();

}



}
else
{
echo "Necesitas primero importar el archivo";

}

var_dump($_DATOS_EXCEL);

	
unlink($destino);

		break;
	
	default:
	
    echo "opción no disponible";

		break;
}



 ?>