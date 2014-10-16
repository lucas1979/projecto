<?php 
require_once 'seguridad.php';
require_once 'header.php';
 ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UI - perfil</title>
	<link rel="StyleSheet" href="../css/estilos.css" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>

</head>
<body>
 
<div class="general"> 
	<h3 id="h3perftitulo"></h3>
		<div class="cuerpoperfil">
			<div id="boxinfoperfil">
				<div class="imgperfil1" style="background-image: url(../img/
					<?php       

				$conexion = mysql_connect('localhost', 'root', '');
				mysql_select_db('basededatosproyectophp',$conexion);

				$sSQL = "SELECT imagen_avatar FROM usuarios WHERE id = " . $_SESSION['usuarioMail'];
				$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());

				while ($aArray = mysql_fetch_assoc($resultados)) {
					$sAvatar = $aArray['imagen_avatar'];
					echo "$sAvatar";
					}

				 ?>)">

				</div>

				<p>NOMBRE</p>

				<div class="vernombre">	
				<?php 
				
				$conexion = mysql_connect('localhost', 'root', '');
				mysql_select_db('basededatosproyectophp',$conexion);

				$sSQL = "SELECT nombre FROM usuarios WHERE id = " . $_SESSION['usuarioMail'];
				$resultados = mysql_query($sSQL,$conexion)or die(mysql_error()); 

				while ($Array = mysql_fetch_assoc($resultados)) {
					$sNombre = $Array['nombre'];
					echo "<p id='textPerfil'>$sNombre</p>";

				}
				 ?>		
				</div>
				<br>
				<p>E-MAIL</p>
				<div class="vermail">
				<?php
				
				$conexion = mysql_connect('localhost', 'root', '');
				mysql_select_db('basededatosproyectophp',$conexion);

				$sSQL = "SELECT mail FROM usuarios WHERE id = " . $_SESSION['usuarioMail'];
				$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());


				while ($Array = mysql_fetch_assoc($resultados)) {
					$sMail = $Array['mail'];
					echo "<p id='textPerfil'>$sMail</p>";
				}


				 ?>		
				</div>
				<br>
				<br>
				<br>
				<br>
				<br>

				<h3 id="h3perf">Imagen del producto publicado</h3> 
				
					<div class="imgproducto1" style="background-image: url(<?php       

				$conexion = mysql_connect('localhost', 'root', '');
				mysql_select_db('basededatosproyectophp',$conexion);

				$sSQL = "SELECT img_producto1 FROM productos WHERE id_usuarios = " . $_SESSION['usuarioMail'];
				$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());

				while ($aArray = mysql_fetch_assoc($resultados)) {
					$sAvatar = $aArray['img_producto1'];
					echo "$sAvatar";
					}

				 ?>)">
										
				</div>
				<br>
				<h3><strong>Descripcion del producto:</strong></h3> 
				
				<div class="verdescripcion">	
				<?php 

				$conexion = mysql_connect('localhost', 'root', '');
				mysql_select_db('basededatosproyectophp',$conexion);

				$sSQL = "SELECT descripcion_del_producto1 FROM productos WHERE id_usuarios = " . $_SESSION['usuarioMail'];
				$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());		

				while ($Array = mysql_fetch_assoc($resultados)) {
					$sDescripcion = $Array['descripcion_del_producto1'];
					echo "$sDescripcion";
				}

				 ?>	
				 </div> 	
				 <br>
				 <br>
		</div>

	</div>
</div>

<?php 
require_once 'footer.php';
 ?>
			
</body>
</html>