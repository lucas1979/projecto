
<?php 
require_once 'seguridad.php';					
require_once 'header.php';
 ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UI - Editar Perfil</title>
	<link rel="StyleSheet" href="../css/estilos.css" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

</head>
<body>
	
<div class="generaleditar"> 
	<h3 id="h3editperf"></h3> 

<!--  FORMULARIO 1 -   IMAGEN AVATAR -->
		<form action="procesareditarperfil2.php" method="post" enctype="multipart/form-data">	   

			<div class="imgeditarperfil" style="background-image: url(<?php       

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
													
			<div class="divbotonexaminar">
				<p id="h2">Seleccionar Imagen</p>
				<br>
				<span id="botonarchivoeditarperfil">	
					<input type="file" id="archivo" name="archivo" /> 
					<input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
				</span>
				<br> 
				<input type="submit" value="GUARDAR" id="botonguardareditar" >
				<?php 
				 if(isset($_GET['error'])) {
						echo "<p id='alertapublicprod'>Lo siento, es demasiado grande (max. 2 Mb)</p>"; 
					}	
					?>
			</div>
		</form>

<!--  FORMULARIO 2 -  NOMBRE - MAIL  - -->
		<div class="formularioeditarperfil">
			<form action="procesareditarperfil.php" method="post" enctype="multipart/form-data">	
				<label for="nombre" id="text">Nombre: </label><br>
				<input type="text" id="inputnombre" name="nombre" value="<?php 
					
				$sSQL = "SELECT nombre FROM usuarios WHERE id = " . $_SESSION['usuarioMail'];
				$resultado = mysql_query($sSQL,$conexion)or die(mysql_error());						

				while ($Array = mysql_fetch_assoc($resultado)){	
		 				$sNombre = $Array['nombre'];

					echo "$sNombre";					
				}

							 ?>" required>
						
				<br>
				<br>
				 <label for="mail" id="text">E-mail: </label><br>
				
				<input type="text" id="inputmail" name="mail" value="<?php 

									$sSQL = "SELECT mail FROM usuarios WHERE id = " . $_SESSION['usuarioMail'];
									$resultado = mysql_query($sSQL,$conexion)or die(mysql_error());							
/*  input mail  */ 
									while ($ArrayMail = mysql_fetch_assoc($resultado)){							
									$sMail = $ArrayMail['mail'];								
										echo "$sMail";	
										}				
									 ?>"required>


<script>

						function validaform() {

						var nombre = document.getElementById('inputmail');
						var mail = 	document.getElementById('inputnombre');
		
						var bError = false;
						var comentarioLeng = 200;
						var simbolos = false;

							if(nombre.value.length == 0){
								bError = true;
								alert('Debes rellenar el campo Nombre');
							}	

							if(!isNaN(nombre.value)){
								bError = true;
								alert ('El campo Nombre no lleva numeros');
							}

							if(nombre.value.length > 40){
								bError = true;
								alert('El campo Nombre no debe superar los 50 caracteres.');
							}
						
							if(nombre.value.search(' ') != -1){
								bError = true;
								alert('El campo Nombre no debe llevar espacios');
							}
						
														
							if(nombre.value.length < 2)	{
								bError = true;
								alert('El campo Nombre debe tener m de 2 caracteres');
							}
								
							if(mail.value.length == 0){
								bError = true;
								alert('Debes rellenar el campo Mail');
							}
						
							if(mail.value.length > 40){
								bError = true;
								alert('El campo Mail no debe superar los 40 caracteres.');
							}

							if(mail.value.search(' ') != -1){
								bError = true;
								alert('El campo Mail no necesita llevar espacios');
							}

							if(mail.value.search('@') == -1 || nombre.value.search('.') == -1 ){
								bError = true;
								alert('El campo Mail no es correcto');
							}

							if(mail.value.length < 8){
								bError = true;
								alert('El campo Mail debe tener mas de 8 caracteres');
							}
						
						}

						</script>
	
					<div>
						<br>
						<input type="submit" onclick="validaform()" name="enviar" value="GUARDAR" id="botonenviareditarperfil"> 
						<br>

<?php 

					if(isset($_GET['errores'])){
						echo '<div class="alertaeditarperf"><ul id="alertalist"> ';
						
						$aErrores = unserialize($_GET['errores']);     

						foreach($aErrores as $key => $value) {     
								
							switch ($value) {
								case 1:
									echo '<li>El campo NOMBRE no debe estar vacio. <li><br>';
									break;
								case 2:
									echo '<li>El campo NOMBRE no debe llevar caracteres numericos.</li><br>';
									break;
								case 3:
									echo '<li>El campo NOMBRE debe llevar mas de 2 caracteres.</li><br> ';
									break;
								case 4: 
									echo "<li>El campo NOMBRE no debe superar los 50 caracteres.</li><br>";
									break;
								case 5:
									echo '<li>En el campo NOMBRE no debe llevar Mail.</li><br>';
									break;
								case 6:
									echo '<li>El campo MAIL no es correcto.</li>';
									break;
								case 7:
									echo '<li>El campo MAIL no debe estar vacio.</li>';
									break;
								case 8:
									echo '<li>El campo MAIL no debe superar los 50 caracteres.</li>';
									break;
							}	
							
						}
						echo '</ul></div> ';  
					}

					 ?>		
									<?php

	if(isset($_GET['nuevo'])) {
		echo '<span id="cambguard">Los cambios se ha guardado con exito !</span>';
	}
	?>					</div>
		   			</form>	
			</div>  <!--<div class="formularioeditarperfil"> -->
	
</div>

<?php 		require_once 'footer.php';    ?>

</body>
</html>