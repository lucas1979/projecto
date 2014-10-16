<?php 

require_once 'seguridad.php';					// seguridad  tiene que estr empezada la seccion

if(!$_POST){
	header('Location: editarperfil.php');
	exit;
}

$sNombre = trim($_POST['nombre']);
$sMail = trim($_POST['mail']);

$aErrores = array();

if(strlen($sNombre) == 0) $aErrores[] = 1;
if(is_numeric($sNombre)) $aErrores[] = 2;
if(strlen($sNombre) < 2) $aErrores[] = 3;
if(strlen($sNombre) > 50) $aErrores[] = 4;
if(strstr($sNombre, '@') || strstr($sNombre, '.')) $aErrores[] = 5;

if(!strstr($sMail, '@') || !strstr($sMail, '.')) $aErrores[] = 6;
if(strlen($sMail) == 0) $aErrores[] = 7;
if(strlen($sMail) > 50) $aErrores[] = 8;

if (count($aErrores) != 0) {
	$aErroresseri = serialize($aErrores);
	header('Location: editarperfil.php?errores=' . $aErroresseri);
	exit;
} 

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('basededatosproyectophp', $conexion);
																	//WHERE id = 1";	
$sSQL = "UPDATE usuarios SET nombre = '$sNombre', mail = '$sMail' WHERE id = " . $_SESSION['usuarioMail'];	
mysql_query($sSQL,$conexion)or die(mysql_error());

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('basededatosproyectophp', $conexion);

$sSQL = "UPDATE productos SET descripcion_del_producto1 = '$sDescripcion' WHERE id = " . $_SESSION['usuarioMail'];	
mysql_query($sSQL,$conexion)or die(mysql_error());

	header('Location: editarperfil.php?nuevo=1');
	exit;		


					?>


