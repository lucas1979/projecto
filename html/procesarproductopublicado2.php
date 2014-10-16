<?php 

require_once 'seguridad.php';				

if(!$_POST){
	header('Location: publicarproducto.php');
	exit;
}

$sDescripcion = trim($_POST['descripcion']);
$iError = 0; 

if(strlen($sDescripcion) > 100) $iError = 1;

if ($iError != 0) {
	$iErrores = $iError;
	header('Location: publicarproducto.php?error=' . $iErrores);
	exit;
}	else{
		$conexion = mysql_connect('localhost', 'root', '');
		mysql_select_db('basededatosproyectophp',$conexion);

		$sSQL = "INSERT INTO productos VALUES(NULL,'','x','$sDescripcion','x', " . $_SESSION['usuarioMail'] . ")";
		mysql_query($sSQL,$conexion)or die(mysql_error());

		header('Location: publicarproducto.php?nuevo=1');
		exit;		
}		

					?>


