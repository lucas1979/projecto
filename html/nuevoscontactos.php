<?php 

require_once 'seguridad.php';
require_once 'header.php';

$sHTML = '';
if (isset($_GET['buscar'])) {

	$sBuscar = $_GET['buscar'];
	
	$conexion = mysql_connect('localhost', 'root', '');
	mysql_select_db('basededatosproyectophp',$conexion);

	$sSQL = "SELECT nombre,mail,imagen_avatar, id FROM usuarios WHERE mail LIKE '%$sBuscar%'";
	$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());

	while ($Array = mysql_fetch_assoc($resultados)) {
		
	$sHTML .= '<tr id="divcontacto">
				<td id="divcontactotdimg"><img src="' . $Array['imagen_avatar'] . '" id="imgcontacto"></td>
				<td id="divcontactotdcentro">Nombre: ' . $Array['nombre'] . '<br><br>Mail: ' . $Array['mail'] . '</td>
				 <td id="divcontactotdboton"><a href="procesonuevocontactos2.php?id=' . $Array['id'] . '"><button type="button" id="agregar"><img src="../img/Imgperfilagregar.png" alt="agregar">Añadir contacto</button></a></td></tr>';
	}
 }
																
 ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ui - Añadir contactos</title>
	<link rel="StyleSheet" href="../css/estilos.css" type="text/css">

</head>
<body>
			
	<div class="general">  
		<div class="cuerponuevocontacto">	
			<div class="dicenvuelveinputyboton">
				<form action="procesonuevocontactos.php" method="post">	
						<input type="text"  name="buscar" id="inputbuscadornuevoscontactos" placeholder="Busca contactos por Mail ">
						<input type="submit" onclick="validaform()" id="botonbuscarnuevos" value="">
				</form>
			</div>

<script>
						function validaform() {
						var buscar = document.getElementById('inputbuscadornuevoscontactos');
						var bError = false;
					
							if(buscar.value.length == 0){
								bError = true;
								alert('Debes rellenar este campo');
							}	

							if(buscar.value.length > 40){
								bError = true;
								alert('Este campo no debe superar los 60 caracteres.');
							}
																				
							if(buscar.value.length < 2)	{
								bError = true;
								alert('El campo  debe tener mas de 2 caracteres');
							}
								
							if(buscar.value.search(' ') != -1){
								bError = true;
								alert('El campo Nombre no debe llevar espacios');
							}

							if(buscar.value.search('@') == -1 || buscar.value.search('.') == -1 ){
								bError = true;
								alert('El campo Mail no es correcto');
							}

						}

						</script>
	
							<?php 

					if(isset($_GET['errores'])){
						echo '<div class="alertabuscacontac"><ul id="alertabuscacontaclI"> ';
						
						$aErrores = unserialize($_GET['errores']);     //convertimos el serialize en array 

						foreach($aErrores as $key => $value) {     //recorremos el array
								
							switch ($value) {
								case 1:
									echo '<li>El campo BUSCAR no debe estar vacio. <li>';
									break;
								case 2:
									echo '<li>El campo BUSCAR debe llevar mas de 2 caracteres.</li> ';
									break;
								case 3: 
									echo "<li>El campo BUSCAR no debe superar los 60 caracteres.</li>";
									break;
								case 4:
									echo '<li>Debes buscar por Mail.</li>';
									break;
								}	
						}
						echo '</ul></div> ';  
					}


					 ?>	
					<br>
						<table id="divgrandecontactos">
								<tr>
								<td><?php  echo $sHTML;		 ?></td>
								</tr>
						</table>
					<br>
		</div>
	</div>
	
<?php 
require_once 'footer.php';
 ?>	

</body>
</html>