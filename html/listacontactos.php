<?php 
require_once 'seguridad.php';
require_once 'header.php';
 ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UI - listado de contactos</title>
	<link rel="StyleSheet" href="../css/estilos.css" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

</head>
<body>
		
<div class="general">  
	<div class="cuerpolistadocontacto">	
				<div class="dicenvuelveinputyboton1">
				</div>

<?php  
	$sResultadobusqProduc = '';
	$sHTML = '';
				
	$conexion = mysql_connect('localhost', 'root', '');
	mysql_select_db('basededatosproyectophp',$conexion);

	$sSQL = "SELECT nombre,mail,imagen_avatar, id FROM usuarios WHERE id in (SELECT id_amigo FROM contactos WHERE id_usuario = " . $_SESSION['usuarioMail']. ")";

	$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());
	while ($Array = mysql_fetch_assoc($resultados)) {
		
		$sHTML .= '<tr id="divcontacto">
					<td id="divcontactotdimg"><img src="' . $Array['imagen_avatar'] . '" id="imgcontacto"></td>
					<td id="divcontactotdcentro1">Nombre: ' . $Array['nombre'] . '<br><br>Mail: ' . $Array['mail'] . '</td>
					<td id="divcontactotdbotonlist"><a href="procesoeliminarlistacontac.php?id=' . $Array['id'] . '">
					<button type="button" id="eliminar">Eliminar</button></a></td>

					</tr>';
	}		 	 
							 
?>
			<table id="tablagrandecontactos">
				<tr>
				<td><?php  echo $sHTML; ?></td>
				</tr>
			</table>
		</div>	
</div>    

	<?php    require_once 'footer.php'; ?>

</body>
</html>