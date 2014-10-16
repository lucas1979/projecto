<?php 

if (!$_POST) {
	header('Location: registrarse.php');
	exit;
}

$sNombre =  trim($_POST['nombre']);
$sMail = trim($_POST['mail']);

$sPassword = trim($_POST['password']);
$sPasswordConfi = trim($_POST['confirpassword']);


$sProfile = '../img/no-picture.png';
$sImgProduct = '../img/no-picture.png';
$aAdmin = "admin";
$legal = $_POST["legal"];

$aErrores = array();


if(strlen($sNombre) == 0) $aErrores[] = 1;
if(is_numeric($sNombre)) $aErrores[] = 2;
if(strstr($sNombre,"admin")) $aErrores[] = 3;
if(strstr($sNombre," ")) $aErrores[] = 4;
if(strlen($sNombre) > 30) $aErrores[] = 5;

if(strlen($sMail) == 0) $aErrores[] = 6;
if(strstr($sMail," ")) $aErrores[] = 7;
if(strlen($sMail) > 30) $aErrores[] = 8;
if(!strstr($sMail,'@') || !strstr($sMail,'.')) $aErrores[] = 9;

if(strlen($sPassword) == 0) $aErrores[] = 10;
if(strlen($sPassword) > 12) $aErrores[] = 11;
if(strstr($sPassword," ")) $aErrores[] = 12;


if($sPasswordConfi != $sPassword) $aErrores[] = 13;
if(strlen($sPassword) < 4) $aErrores[] = 14;

if($legal != 1) $aErrores[] = 15;


$conexion = mysql_connect("localhost", "root", "");
mysql_select_db('basededatosproyectophp', $conexion);

$sSQL = "SELECT mail FROM usuarios";
$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());

while ($Array = mysql_fetch_assoc($resultados)) {
	if ($Array['mail'] == $sMail) $aErrores[] = 16; 
	 
	 } 

if(count($aErrores) != 0){
	$aSerializeErrores = serialize($aErrores);
	header('location: registrarse.php?errores=' . $aSerializeErrores);
	exit;
}	

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('basededatosproyectophp', $conexion);

$sSQL = "INSERT INTO usuarios VALUES (NULL, '$sPassword', '$sProfile', '$sNombre', '$sMail');";
mysql_query($sSQL,$conexion)or die(mysql_error());

header('Location: ../index.php?nuevo=');				//  poner en index un get de bienvenida
exit;


 ?>