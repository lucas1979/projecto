<?php

require_once 'seguridad.php';
require_once 'header.php';
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UI - Editar perfil</title>
	<link rel="StyleSheet" href="../css/estilos.css" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

</head>
<body>
	<div class="general"> 
		<h3 id="h3tituloPubliPro"></h3> 
			<div class="cuerpoproducto"> 
<!--  FORMULARIO 1 -   IMAGEN AVATAR -->
				<div class="imgpublicar" style="background-image: url(<?php       

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
	
			<div class="formulariopublicarproducto">

				<form action="procesarproductopublicado2.php" method="post" >
							
					<br>
					<strong>Descripcion del producto a Publicar</strong>
					<br>
					<input  type="text" id="descripcionproducto" name="descripcion" value="<?php 

									$conexion = mysql_connect('localhost', 'root', '');
									mysql_select_db('basededatosproyectophp',$conexion);
/*  input descrip producto  */ 
									$sSQL = "SELECT descripcion_del_producto1 FROM productos WHERE id_usuarios = " . $_SESSION['usuarioMail'];
									$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());		
										
									while ($Array = mysql_fetch_assoc($resultados)) {
										$sDescripcion = $Array['descripcion_del_producto1'];

										echo "$sDescripcion";
									}

								 ?>"required>
			
					<br>	
		   			<input type="submit" value="GUARDAR" onclick="validaform()" id="botonguardarproducto"> <br> 
<script>

						function validaform() {

						var elementBoton = document.getElementById('boton');
							elementBoton.setAttribute('disabled', 'disabled'); 
		
						var producto = document.getElementById('descripcionproducto');
							
						var bError = false;
						
							if(nombre.value.length == 0){
								bError = true;
								alert('Debes rellenar este campo.');
							}	
							if(nombre.value.length > 100){
								bError = true;
								alert('Este campo no debe superar los 100 caracteres.');
							}
</script>

<?php  
	if(isset($_GET['nuevo'])) {
		echo '<span id="cambguard">El articulo se ha guardado con exito !</span>';
	}
?>							<br>
							<br>
		   					<br>
		   					<?php

/* notificacion  */		if(isset($_GET['error'])) {
								
							echo '<div class="alertapublicprod"><ul id="alertalispubliproduc"> ';

								switch ($_GET['error']) {
									case 1:
										echo 'El campo nombre no debe superar los 100 caracteres';
										break;
								}
								echo '</div>';			
							}	
							?>

				</form>		

<!--  FORMULARIO 3 -  IMG PRODUCTO -  -->	
							<h3>Insertar imagen del producto publicado</h3>

							<form action="procesarpublicarproducto.php" method="post" enctype="multipart/form-data">

									<div class="imgproductopublicado" style="background-image: url(<?php       

											$conexion = mysql_connect('localhost', 'root', '');
											mysql_select_db('basededatosproyectophp',$conexion);

											$sSQL = "SELECT img_producto1 FROM productos WHERE id_usuarios = " . $_SESSION['usuarioMail'];
											$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());

											while ($aArray = mysql_fetch_assoc($resultados)) {
												$sImgProduc = $aArray['img_producto1'];
												echo "$sImgProduc";
												}

											 ?>)" width="auto" height="auto">
									</div>

									<div class="divbotonexaminareditarproduct">

										<input type="file" id="archivo" name="archivo" />
										<input type="submit" value="GUARDAR" id="botonguardar">
										<?php
											if(isset($_GET['error'])) {

												switch ($_GET['error']) {
													case 1:
														echo "error de carga archivo grande";
														break;
													default:
														echo "<p id='spannotificacion'>Se ha guardado con exito!</p>";
														break;
												}
												echo "<p id='alertapublicprod'>Lo siento, es demasiado grande (max. 2 Mb)</p>";
											}
												?>	
									</div>
			  				</form>	
				</div>	
			</div>

		</div>

<?php 		require_once 'footer.php';   ?>
</body>
</html>