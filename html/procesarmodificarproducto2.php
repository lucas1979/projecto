<?php 

require_once 'seguridad.php';					

if(!$_POST['descripcion']){
	header('Location: modificarproducto.php');
	exit;
}

$iId = trim($_POST['id']);
$sDescripcion = trim($_POST['descripcion']);

$aErrores = array();    // creamos un array para guardar los errores

if(strlen($sDescripcion) > 100) $aErrores[] = 1;
 
if (count($aErrores) != 0) {
	$aSerializeErrores = serialize($aErrores);
	header('Location: modificarproducto.php?error=' . $aSerializeErrores);
	exit;
}

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('basededatosproyectophp', $conexion);
																					
$sSQL = "UPDATE productos SET descripcion_del_producto1 = '$sDescripcion' WHERE id_usuarios = " . $_SESSION['usuarioMail'];	
mysql_query($sSQL,$conexion)or die(mysql_error());

	header('Location: modificarproducto.php?modificado=1');
	exit;		

					?>


