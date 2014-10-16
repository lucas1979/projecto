<?php 

require_once 'seguridad.php';

if(!$_POST){
	header('Location: buscarproductos.php');
	exit;
}

$sBus = trim($_POST['buscar']);
$aErrores = array();


if(strlen($sBus) == 0) $aErrores[] = 1;
if(is_numeric($sBus)) $aErrores[] = 2;
if(strlen($sBus) < 2) $aErrores[] = 3;
if(strlen($sBus) > 50) $aErrores[] = 4;

if (count($aErrores) != 0) {
	$aErroresseri = serialize($aErrores);
	header('Location: buscarproductos.php?errores=' . $aErroresseri);
	exit;
} else {
	header('Location: buscarproductos.php?buscar=' . $sBus);
	exit;
}


 ?>