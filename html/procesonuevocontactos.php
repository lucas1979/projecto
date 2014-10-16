<?php 

require_once 'seguridad.php';

if(!$_POST){
	header('Location: nuevoscontactos.php');
	exit;
}

$sBus = trim($_POST['buscar']);
$aErrores = array();

if(strlen($sBus) == 0) $aErrores[] = 1;
if(strlen($sBus) < 2) $aErrores[] = 2;
if(strlen($sBus) > 60) $aErrores[] = 3;
if(!strstr($sBus, '@') || !strstr($sBus, '.')) $aErrores[] = 4;

if (count($aErrores) != 0) {
	$aErroresseri = serialize($aErrores);
	header('Location: nuevoscontactos.php?errores=' . $aErroresseri);
	exit;
} else {
	header('Location: nuevoscontactos.php?buscar=' . $sBus);
	exit;
}


 ?>