<?php 
class Acceso extends Conexion
{

private   $user;
private   $pass;
private   $empresa;
protected $latitude;
protected $longitude;


function __construct($user='',$pass='',$empresa='',$latitude='',$longitude='')
{

$this->user      = addslashes($user);
$this->pass      = addslashes($pass);
$this->empresa   = addslashes($empresa);
$this->latitude  = $latitude;
$this->longitude = $longitude;

}

function conexion()
{
  return $this->get_conexion();
}


function login()
{

try {

$conexion  = $this->get_conexion();
$query     = "SELECT * FROM Usuarios WHERE  UPPER(Usuario)=UPPER(:user) AND Pass=:pass 
AND Empresa=:empresa";
$statement = $conexion->prepare($query);
$statement->bindParam(':user',$this->user);
$statement->bindParam(':pass',$this->pass);
$statement->bindParam(':empresa',$this->empresa);
$statement->execute();
$result    = $statement->fetchAll();
if (count($result)>0) 
{
  
$dato   =  $result[0];
#Creación de Sesiones
session_start();
$_SESSION[KEY.ID]        = $dato['id'];
$_SESSION[KEY.NOMBRES]   = $dato['Nombre'];
$_SESSION[KEY.APELLIDOS] = '';

//Auditoria
$auditoria   = new Auditoria();
$funciones   = new Funciones();  
$dispositivo = $_SERVER['HTTP_USER_AGENT'];
$navegador   = $funciones->getBrowser($dispositivo);
$ip          = $funciones->get_ip();
$auditoria->acceso($_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.APELLIDOS],'login',$ip,$dispositivo,$navegador,$this->latitude,$this->longitude);

return "true";

} 
else 
{
  return false;
}



} catch (Exception $e) {
	
	 echo "Error: ".$e->getMessage();
}



}


function logout()
{
//Auditoria
$auditoria   = new Auditoria();
$funciones   = new Funciones();  

$dispositivo = $_SERVER['HTTP_USER_AGENT'];
$navegador   = $funciones->getBrowser($dispositivo);
$ip          = $funciones->get_ip();
$auditoria->acceso($_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.APELLIDOS],'logout',$ip,$dispositivo,$navegador);

   unset($_SESSION[KEY.ID]);
   unset($_SESSION[KEY.NOMBRES]);
   unset($_SESSION[KEY.APELLIDOS]);


}




}



 ?>