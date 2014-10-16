<?php 

require_once 'seguridad.php';

if(!$_POST){
	header('Location: contacto.php');
	exit;
}

$sNombre = trim($_POST['nombre']);
$sMail = trim($_POST['mail']);
$sComent = trim($_POST['comentarios']);
$sAsunto = '';
$aErrores = array();

if(strlen($sNombre) == 0) $aErrores[] = 1;
if(is_numeric($sNombre)) $aErrores[] = 2;
if(strlen($sNombre) < 2) $aErrores[] = 3;
if(strlen($sNombre) > 50) $aErrores[] = 4;
if(strstr($sNombre, '@') || strstr($sNombre, '.')) $aErrores[] = 5;
if(!strstr($sMail, '@') || !strstr($sMail, '.')) $aErrores[] = 6;
if(strlen($sMail) == 0) $aErrores[] = 7;
if(strlen($sComent) == 0) $aErrores[] = 8;
if(strlen($sComent) > 200) $aErrores[] = 9;

if (count($aErrores) != 0) {
	$aErroresseri = serialize($aErrores);
	header('Location: contacto.php?errores=' . $aErroresseri);
	exit;
}

//con esto recibiriamos en el mensaje "  -nombre: pepito    mail: pepito@.com   asunto:me interesa contactar   "
$stextoDelMensaje = 'Nombre:' . $sNombre . 'E-mail: ' . $sMail . $sComent;


// pero no recibiriamos nada ya que necesitamos un servidor para que se envie.

// enviar por mail 
$bMail = mail('sanzlucas@yahoo.com', $sAsunto, $stextoDelMensaje);  //las variables $sAsunto y $stextoDelMensaje viene de arriba q a la vez vienen del formula

if($bMail){
	echo 'mensaje enviado';
} else {
	echo 'Error al enviar';
}




 ?>