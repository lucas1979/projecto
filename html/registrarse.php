<!DOCTYPE HTML>
<html>

	<head>
		<title>UI - Registro</title>
		<link rel="StyleSheet" href="../css/estilos.css" type="text/css">
	</head>
	<body class="bodyIndexREg">
		 <div class="cabeceraindex"> 
		</div> 	
			<a href="../index.php" id="botonvolver"><button alt="boton volver al inicio" title="Volver pagina principal"></button></a>								
<div id="cuerporegistro">
	<div class="general">  
		<form action="formularioregistro.php" method="post" class="formularioregistro" enctype="multipart/form-data">
	
			<br>
			<label for="nombre">* Nombre :</label><br>
			<input type="text" id="inputnombreregistro" name="nombre" required>
			<br>
			<label for="mail">* Ingrese un e-mail:</label><br>
			<input type="text" id="inputmailregistro" name="mail" required>
			<br>
			<br>
			<br>
			<label for="password">* Ingrese un Password:</label>(de 4 a 12 caracteres)<br>
			<input type="text" id="PassWord1" name="password" required>
					<br>
			<label for="confirpassword">* Confirme su Password:</label><br>
			<input type="text" id="PassWord2" name="confirpassword" required>  
			<br>
			<br>	
				
			<label for="legal">Acepto las condiciones de uso</label>
			<input type="checkbox" id="legal" name="legal" value="1" />

			<input type="button" id="botonlegal" value="Leer condiciones" onclick="botonAjax()">
			<br>
			-Los campos con * son necesarios. 
			<br>Rellene dichos campo porfavor.
			<br>
			<input type="submit" name="enviar" onclick="validaformJava()" value="GUARDAR" id="botonenviarregistro"> 
				<br>
				
							<?php  
					if(isset($_GET['errores'])){
						echo '<div class="alertaregistro"><ul id="alertalistregistro"> ';
						
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
									echo '<li>El campo NOMBRE no puede tener la palabra ADMIN.</li><br> ';
									break;
								case 4:
									echo '<li>El campo NOMBRE debe llevar espacios.</li><br> ';
									break;	
								case 5:
									echo '<li>El campo NOMBRE debe llevar mas de 30 caracteres.</li><br> ';
									break;
								case 6:
									echo '<li>El campo MAIL debe debe estar vacio.</li><br> ';
									break;	
								case 7:
									echo '<li>El campo MAIL debe llevar espacios.</li><br> ';
									break;	
								case 8:
									echo '<li>El campo MAIL debe llevar mas de 30 caracteres.</li><br> ';
									break;		
								case 9:
									echo '<li>El campo MAIL no es correcto.</li><br> ';
									break;
								case 10: 
									echo "<li>El campo PASSWORD no debe estar vacio.</li><br>";
									break;
								case 11:
									echo '<li>En el campo PASSWORD no debe superar los 12 caracteres.</li><br>';
									break;
								case 12:
									echo '<li>El campo PASSWORD no debe tener espacios.</li>';
									break;
								case 13:
									echo '<li>El PASSWORD no coinciden.</li>';
									break;
								case 14:
									echo '<li>En el campo PASSWORD se requiere minimo 4 caracteres.</li><br>';
									break;
								case 15:
									echo '<li>DEBES ACEPTAR LAS CONDICIONES LEGALES.</li>';
									break;
								case 16:
									echo '<li>Ya existe un usuario con este Mail</li>';
									break;
							}	
						}
						echo '</ul></div> ';  
					}
?>  			<div id="divTextolegal"></div>
				</form>	

<script>

						function validaformJava() {

						var nombre = document.getElementById('inputnombreregistro');
						var mail = 	document.getElementById('inputmailregistro');
						var elemPassWord1 = document.getElementById('PassWord1');
						var elemPassWord2 = document.getElementById('PassWord2');

						var bError = false;
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
								alert('El campo Nombre debe tener menos de 2 caracteres');
							}
						
							if(mail.value.length == 0){
								bError = true;
								alert('Debes rellenar el campo Mail');
							}
							if(mail.value.length > 30){
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
							if(elemPass1.value != elemPass2.value){
								elemPass1.focus();
								alert('los password deben coicidir');
								bError = true;

							}
						}
						</script>
	
	</div>
</div>

<script>

  function leerDatos(){
    if (oXML.readyState  == 4) {                   
       document.getElementById("divTextolegal").innerHTML = oXML.responseText
    }
  } 
  function AJAXCrearObjeto(){
    var obj;
    if(window.XMLHttpRequest) {               // no es IE
      obj = new XMLHttpRequest()
    } else {                                // Es IE o no tiene el objeto
       try {
         obj = new ActiveXObject("Microsoft.XMLHTTP");
      }  catch (e) {
        alert('El navegador utilizado no está soportado');
      }
    }
    return obj
  } 
  
  function botonAjax() {           
    oXML = AJAXCrearObjeto()
    oXML.open('GET', 'condicioneslegales1.txt')
    oXML.onreadystatechange = leerDatos
    oXML.send('')
  }

  </script>

</body>
</html>

