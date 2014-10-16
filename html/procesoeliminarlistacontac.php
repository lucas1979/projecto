<?php 

require_once 'seguridad.php';

if(!$_GET){
	header('Location: listacontactos.php');
	exit;
}

$iId = $_GET['id'];

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('basededatosproyectophp',$conexion);

$sSQL = "DELETE FROM contactos WHERE id_amigo = $iId;"; 
mysql_query($sSQL,$conexion)or die(mysql_error());

header('Location: listacontactos.php?eliminado=1');
exit;


 ?>