<?php

require_once 'seguridad.php';					

$max_size = 2097152;				
$bError = 0;
						// ahi que poner en FILE['archivo']  el nombre del   name: que viene del formulario
if ($_FILES['archivo']['size'] < $max_size) {

	$origen = $_FILES['archivo']['tmp_name'];
	$destino = "../img/" .  time() . trim($_FILES['archivo']['name']);
		
	move_uploaded_file($origen,$destino);      

	$conexion = mysql_connect('localhost', 'root', '');
	mysql_select_db('basededatosproyectophp',$conexion);

	$sSQL = "UPDATE usuarios SET imagen_avatar = '$destino' WHERE id = " . $_SESSION['usuarioMail'];
	mysql_query($sSQL,$conexion)or die(mysql_error());

	header('Location: editarperfil.php?nuevo=1');
	exit;	
}
	else{
		 $bError = 1;

		if($bError != 0){
			$bErrores = $bError; 
			header("Location: editarperfil.php?error=1" . $bErrores);
			exit;
		}
	}

					?>
