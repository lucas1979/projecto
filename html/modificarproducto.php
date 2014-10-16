<?php

require_once 'seguridad.php';
require_once 'header.php';

$iId = 'id';
$sNombre = '';
$sMail = '';

$sDescripcion = '';

 ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagina Editar perfil</title>
	<link rel="StyleSheet" href="../css/estilos.css" type="text/css">
	
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
		<div class="general"> 
			<h3 id="h3tituloEditarPro"></h3> 
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
										
									<?php

							if(isset($_GET['nuevo'])) {
								echo '<p id="Proguardado">Se ha guardado con exito!</p>';
							}

	?>
						<form action="procesarmodificarproducto2.php" method="post">
						<br>
							<strong>Producto publicado</strong>
							<br>
									<input  type="text" maxlenght="100" id="descripcionproducto" name="descripcion" value="<?php 

									$conexion = mysql_connect('localhost', 'root', '');
									mysql_select_db('basededatosproyectophp',$conexion);
/*  input descrip producto  */ 
									$sSQL = "SELECT descripcion_del_producto1 FROM productos WHERE id_usuarios = " . $_SESSION['usuarioMail'];
									$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());		

									while ($Array = mysql_fetch_assoc($resultados)) {
										$sDescripcion = $Array['descripcion_del_producto1'];

										echo "$sDescripcion";
									}


									 ?>" required>
								
							<br>		
		   					<input type="submit" name="enviar" onclick="validaform()" value="EDITAR" id="botonguardarproducto"> 
		   					<br>
							<br>
							<br>

						</form>	

<script>
	function validaform() {

						var descripcion = document.getElementById('descripcionproducto');
								
						var bError = false;
						
							if(descripcion.value.length == 0){
								bError = true;
								alert('Debes rellenar el campo PRODUCTO');
							}	

							if(descripcion.value.length > 100){
								bError = true;
								alert('El campo PRODUCTO no debe superar los 100 caracteres.');
							}

</script>

	<?php 

					if(isset($_GET['error'])){
						echo '<div class="alertaeditarproduc"><ul id="alertalieditproduc"> ';
						
						$aErrores = unserialize($_GET['error']);     

						foreach($aErrores as $key => $value) {     
								
							switch ($value) {
							
								case 1:
									echo '<li>El campo PRODUCTO no debe superar los 100 caracteres.</li><br>';
									break;
							}	
						}
						echo '</ul></div> ';  
					}
?>

<!--  FORMULARIO 3 -  IMG PRODUCTO -  -->	
						<h3>Editar imagen del producto publicado</h3>
							<form action="procesarmodificarproducto.php" method="post" enctype="multipart/form-data">
								<div class="imgproductopublicado" style="background-image: url(<?php       

										$conexion = mysql_connect('localhost', 'root', '');
										mysql_select_db('basededatosproyectophp',$conexion);

										$sSQL = "SELECT img_producto1 FROM productos WHERE id_usuarios = " . $_SESSION['usuarioMail'];
										$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());

										while ($aArray = mysql_fetch_assoc($resultados)) {
											$sImgProduc = $aArray['img_producto1'];
											echo "$sImgProduc";
											}

										 ?>)">
								</div>
								<div class="divbotonexaminarmodifi">
									<input type="file" id="archivo" name="archivo" /><br>
									<input type="submit" value="EDITAR" id="botonguardar">
								</div>

							</form>	
				</div>
			</div>
		</div>

<?php    require_once 'footer.php';   ?>		
		
</body>
</html>