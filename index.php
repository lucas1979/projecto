<!DOCTYPE HTML>
<html>

	<head>
		<title>UI - Principal</title>
		<link rel="StyleSheet" href="css/estilos.css" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

	</head>
	<body class="bodyIndexREg">

		 <div class="cabeceraindex"> 
		
				<div class="textobienvenido">
		<?php 
			if(isset($_GET['nuevo'])) {
					echo "<h1>Bienv e n i d  o !</h1><p id='textobienvenido2'> Ya puedes ingresar y difrutar de UI</p>";
		    }	
			 ?>
				</div>

		</div> 

		<div class="cuerpoindex">
			<div class="general">  
				<div class="indexdivtextoexplic">
							
					<h1 id="h1index">Que es Ui ?</h1>

						<p id="parrafo"><strong>Ui</strong> es una Red de contactos que sirve explusivamente para promover entre los contactos de uno mismo productos de interes, por ejemplo: si necesita vender una bicicleta, un coche o un televisor que ya no utiliza lo publica y entre los contactos podran buscar y contactarse para disponer dicho producto.
						<br>
						<br>
						Si en alguna ocacion le ha pasado de no confiar en algun desconocido para disponer o comprar productos y/o articulos, en esta ocacion con <strong>Ui</strong> conseguira mayor garantias para esos articulo, y a la vez podra exponer y publicar y obtendra un mejor resultado, ademas dicha garantia tambien le serviran a sus contactos!
						</p>

				</div>
				<div class="formularioseccion"> 
					<div class="divinicioseccion">
					       <form action="procesar.php" method="get">
							
							<label for="usuarioMail" id="labelusuario">Mail</label>
							<input type="text" name="usuarioMail" id="usuarioMail" ><br><br>

							<label for="password" id="labelpassword">Password</label>						
							<input type="password" name="password" id="password" required> <br><br>

							<input type="submit"  onclick="validaformJava()" value="Entrar" id="botonenviarseccion">
							</form>
					</div>

	<script>

						function validaformJava() {

						var mail = document.getElementById('usuarioMail');
						var password1 = document.getElementById('password');

						var bError = false;
						var simbolos = false;					
						var lengPass = 12;
						var lengMail = 60;

							if(mail.value.length == 0){
								bError = true;
								alert('Debes rellenar el campo Mail');
							}	

							
							if(mail.value.length > lengMail){
								bError = true;
								alert('El campo Mail no debe superar los 60 caracteres.');
							}
						

							if(mail.value.search('@') == -1 || nombre.value.search('.') == -1 ){
								bError = true;
								alert('El campo Mail no es correcto');
							}


							if(password1.value.length > lengPass) {
								bError = true;
								alert('El Password no debe superar los 12 caracteres.');
							}
						

						}

		</script>


											
							<?php 

					if(isset($_GET['errores'])){
						echo '<div class="alertaindex"><ul id="alertaindexTd"> ';
						
						$aErrores = unserialize($_GET['errores']);     

						foreach($aErrores as $key => $value) {     
								
							switch ($value) {
								case 1:
									echo '<li>Debes rellenar este campo<li>';
									break;
								case 2:
									echo '<li>El Mail no debe superar los 60 caracteres</li>';
									break;
								case 3:
									echo '<li>EL Mail no es correcto</li> ';
									break;
								case 4:	
									echo '<li>Debes rellenar el Password</li>';
									break;
								case 5:
									echo '<li>El password debe tener Maximo 12 caracteres</li> ';
									break;
								case 6:
									echo '<li>El password debe tener minimo 4 caracteres</li>';
									break;
							}	

						}
						echo '</ul></div> ';  
					}

				 if(isset($_GET['error1'])){
					 echo '<div class="alertaindex2"><ul id="alertaindexTd2"> ';

						 switch ($_GET['error1']) {
									case 1:
										echo '<li>No existe este usuario<li>';
										break;
									case 2:
										echo '<li>Password incorrecto<li>';
										break;

						 }
					echo '</ul></div> '; 	 
					}	


					 ?>	

				 	 <div class="divregistro">
						<br>Si aun no eres usuario entra y registrate gratis.<br>
						<a href="html/registrarse.php"><button class="botonregistro">Registrarse</button></a>			
						</div>

					</div>
			</div>
		</div>

					
		
	</body>
</html>