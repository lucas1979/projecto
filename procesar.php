<?php 


if(!isset($_GET['usuarioMail']) || !isset($_GET['password'])) {
	header("Location: index.php");
	exit;
}

	
$sUsuarioMail = trim($_GET['usuarioMail']);
$sPassword = trim($_GET['password']);

$iId = 0;


$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('basededatosproyectophp', $conexion);

$sSQL = "SELECT id FROM usuarios WHERE mail = '$sUsuarioMail' and password ='$sPassword';";
$resultados = mysql_query($sSQL, $conexion) or die(mysql_error());

while($row = mysql_fetch_assoc($resultados)) {
	$iId = $row['id'];						
}


if($iId != 0 ){
	session_start();
		$_SESSION['usuarioMail'] = $iId;
		header('Location: html/perfil.php');
		exit;
} 


$aErrores = array();

if(strlen($sUsuarioMail) == 0) $aErrores[] = 1;
if(strlen($sUsuarioMail) > 60) $aErrores[] = 2;
if(!strstr($sUsuarioMail, '@') || !strstr($sUsuarioMail, '.')) $aErrores[] = 3;

if(strlen($sPassword) == 0) $aErrores[] = 4;
if(strlen($sPassword) > 12) $aErrores[] = 5;
if(strlen($sPassword) < 4) $aErrores[] = 6;


if(count($aErrores) != 0){
	$aSerializeErrores = serialize($aErrores);
	header("Location: index.php?errores=" . $aSerializeErrores);
	exit;
}


$iError = 0;

$conexion = mysql_connect("localhost", "root", "");
mysql_select_db('basededatosproyectophp', $conexion);


$sSQL = "SELECT mail FROM usuarios ";
$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());

while ($Array = mysql_fetch_assoc($resultados)) {
	if ($Array['mail'] != $sUsuarioMail) $iError = 1; 
	 } 

$sSQL = "SELECT password FROM usuarios WHERE mail = '$sUsuarioMail' and password !='$sPassword';";
$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());

while ($aRow = mysql_fetch_assoc($resultados)) {
	if ($aRow['password'] != $sPassword) $iError = 2;


	 header("Location: index.php?error1=" . $iError);
	 exit;
	 } 


 ?>