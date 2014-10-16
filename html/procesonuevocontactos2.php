<?php 

require_once 'seguridad.php';

if(!$_GET['id']){
	header('Location: nuevoscontactos.php');
	exit;
}

$iId = $_GET['id'];

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('basededatosproyectophp',$conexion);

$sSQL = "INSERT INTO contactos VALUES (" . $_SESSION['usuarioMail'] . ",$iId)";
mysql_query($sSQL,$conexion)or die(mysql_error());

header('Location:listacontactos.php?nuevo=1');
exit;


?>


