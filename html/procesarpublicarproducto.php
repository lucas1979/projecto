<?php

require_once 'seguridad.php';				

$max_size = 2097152;
$sImgProduct = '';	
if ($_FILES['archivo']['size'] < $max_size) {

	$origen = $_FILES['archivo']['tmp_name'];
	$destino = "../img/" .  time() . trim($_FILES['archivo']['name']);
		
	move_uploaded_file($origen,$destino);   

	$conexion = mysql_connect('localhost', 'root', '');
	mysql_select_db('basededatosproyectophp',$conexion);

	
	$sSQL = "UPDATE productos SET img_producto1 = '$destino' WHERE id_usuarios = " . $_SESSION['usuarioMail'];
	mysql_query($sSQL,$conexion)or die(mysql_error());
	
header("Location: publicarproducto.php?nuevo=1");
exit();
		
}	
		?>