<?php 

require_once 'seguridad.php';
require_once 'header.php';

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagina CONTACTO</title>
	<link rel="StyleSheet" href="../css/estilos.css" type="text/css">

</head>
<body>
		
	<div class="generalcontacto"> 
		<h3 id="h3Contacto"></h3> 
			<div class="formulariocontacto">
		         <form action="formulariocontacto.php" method="post">
		     		<label for="nombre">Ingrese su nombre:</label>
					<input type="text" name="nombre" size="35" alt="ingrese su nombre" id="inputnombrecontac" >
		   			<br>
	             	<label for="mail">Ingrese su Mail:</label>
		    	 	<input type="text" name="mail" alt="mail" id="inputmailcontac" size="35" >
					<br>
		     		<label>Ingrese su Comentario:</label>
					<textarea type="text" id="inputcomentarioscontac" maxlength="150" name="comentarios" ></textarea>
					<br>
		        	<input type="submit" onclick="validaform()" value="Enviar" id="botonenviarcontac">
					<br>
					<input type="reset" name="resetear" value="Restaurar" id="botonresetearcontac">
				</form>	


						<script>

						function validaform() {

						var nombre = document.getElementById('inputnombrecontac');
						var mail = 	document.getElementById('inputmailcontac');
						var comentario = document.getElementById('inputcomentarioscontac');

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
						
												
							if(comentario.value.length == 0){
								bError = true;
								alert('Debes rellenar el campo Comentario');	
							}	
							
							if(comentario.value.length > comentarioLeng){
								bError = true;
								alert('El campo Comentario no debe superar los 200 caracteres');
							}
						
						}

						</script>
		</div>	

			<?php 
					if(isset($_GET['errores'])){
						echo '<div class="alerta"><ul id="alertalist"> ';
						
						$aErrores = unserialize($_GET['errores']);     

						foreach($aErrores as $key => $value) {     
								
							switch ($value) {
								case 1:
									echo '<li>El campo NOMBRE no debe estar vacio. <li>';
									break;
								case 2:
									echo '<li>El campo NOMBRE no debe llevar caracteres numericos.</li>';
									break;
								case 3:
									echo '<li>El campo NOMBRE debe llevar mas de 2 caracteres.</li> ';
									break;
								case 4: 
									echo "<li>El campo NOMBRE no debe superar los 50 caracteres.</li>";
									break;
								case 5:
									echo '<li>En el campo NOMBRE no debe llevar Mail.</li>';
									break;
								case 6:
									echo '<li>El campo MAIL no es correcto.</li>';
									break;
								case 7:
									echo '<li>El campo MAIL no debe estar vacio.</li>';
									break;
								case 8:
									echo '<li>El campo COMENTARIO no debe estar vacio.</li>';
									break;
								case 9:
									echo '<li>El campo COMENTARIO no debe superar los 200 caracteres.</li>';
									break;

							}	
						}
						echo '</ul></div> ';  
					}
					 ?>	


		<div class="mapa">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d98647.1178777426!2d-0.36151130000000004!3d39.407785249999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604f4cf0efb06f%3A0xb4a351011f7f1d39!2sValencia!5e0!3m2!1ses!2ses!4v1402221311346" width="960" height="350" frameborder="0" style="border:0">
			</iframe>	
		</div>
				
			<div class="direccionformulariocontac">Informacion de contacto. Avenida de la Senyera 20 pta 7, Museros, Valencia. <br>
				Telefono de contacto: 627532488 . E-Mail:sanzlucas@yahoo.com.
			</div>
					
	</div>	
<?php 			require_once 'footer.php';    ?>
</body>
</html>