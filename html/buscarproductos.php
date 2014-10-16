<?php 
require_once 'seguridad.php';
require_once 'header.php';
 ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UI - Buscar productos</title>
	<link rel="StyleSheet" href="../css/estilos.css" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
		
<div class="general">  
	<div class="cuerpobuscarproducto">	
		<div class="divconbotones">
				<form action="procesarbuscarproductos.php" method="post" enctype="multipart/form-data"> 
					<input type="text"  name="buscar" id="inputbuscador" placeholder="Busca aqui cuaquier productos" >
					<input type="submit" onclick="validaform()" value="" id="botonbuscar1" required><br>
		    	</form>
		</div>

<script>
						function validaform() {

						var buscar = document.getElementById('buscar');
						var bError = false;
						
							if(buscar.value.length == 0){
								bError = true;
								alert('Debes rellenar este campo');
							}	

							if(buscar.value.length > 40){
								bError = true;
								alert('Este campo no debe superar los 50 caracteres.');
							}
																				
							if(buscar.value.length < 2)	{
								bError = true;
								alert('El campo  debe tener mas de 2 caracteres');
							}
								
							if(nombre.value.search(' ') != -1){
								bError = true;
								alert('El campo Nombre no debe llevar espacios');
							}

							if(mail.value.search('@') == -1 || nombre.value.search('.') == -1 ){
								bError = true;
								alert('El campo Mail no es correcto');
							}
						}
						</script>
	

<?php 
					if(isset($_GET['errores'])){
						echo '<div class="alertabuscproduc"> <ul id="alertabuspro"> ';
						
						$aErrores = unserialize($_GET['errores']);     

						foreach($aErrores as $key => $value) {     
								
							switch ($value) {
								case 1:
									echo '<li>El campo BUSCAR no debe estar vacio. <li><br>';
									break;
								case 2:
									echo '<li>El campo BUSCAR no debe llevar caracteres numericos.</li><br>';
									break;
								case 3:
									echo '<li>El campo BUSCAR debe llevar mas de 2 caracteres.</li><br> ';
									break;
								case 4: 
									echo "<li>El campo BUSCAR no debe superar los 50 caracteres.</li><br>";
									break;
								}					
						}
						echo '</ul></div> ';  
					}
					 ?>		
				<div class="resultadoproductos">  
					 <table class="tabresultadobusqueda">
						
<?php 
		
$sResultadobusqProduc = '';
$sHTML = '';

if (isset($_GET['buscar'])) {
$sBuscar = trim($_GET['buscar']);
	
	$conexion = mysql_connect('localhost', 'root', '');
	mysql_select_db('basededatosproyectophp',$conexion);

	$sSQL = "SELECT nombre,mail,imagen_avatar, id FROM usuarios WHERE id in (SELECT id_usuarios FROM productos WHERE descripcion_del_producto1 LIKE 
		'%$sBuscar%' AND id != " . $_SESSION['usuarioMail']. ") AND id in (select id_amigo from contactos where id_usuario = " . $_SESSION['usuarioMail']. ")";
	
	$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());
	while ($Array = mysql_fetch_assoc($resultados)) {
		
		$sHTML .= '<tr id="divcontacto">
					<td id="divcontactotdimg"><img src="' . $Array['imagen_avatar'] . '" id="imgcontacto"></td>

					<td id="divcontactotdcentrobuscpro">Nombre: ' . $Array['nombre'] . '<br><br>Mail: ' . $Array['mail'] . '

					<br><br><strong>Producto Publicado:</strong><p id="spanproduct">' . recogerProductos($Array['id'], $sBuscar)  . '</p></td>

					 <td id="divcontactotdboton"><a ref="procesonuevocontactos.php?id=$iId"><button type="button" id="agregarpro">contactar</button></a></td>
				  </tr>';
	}	
}				 	 

function recogerProductos($iniId, $insBus) {
	$conexion = mysql_connect('localhost', 'root', '');
				mysql_select_db('basededatosproyectophp', $conexion);					

				$sSQL = "SELECT descripcion_del_producto1 FROM productos WHERE id_usuarios = $iniId AND  descripcion_del_producto1 LIKE '%$insBus%' ";

				$resultados = mysql_query($sSQL,$conexion)or die(mysql_error());

				$Array = mysql_fetch_assoc($resultados);
				 return $Array['descripcion_del_producto1'];
				   
}

				    echo  $sResultadobusqProduc;
					echo $sHTML; 

							 ?>
						  
			   		 </table>
			</div>  						
		</div>	
</div>   

<?php 
require_once 'footer.php';
 ?>	
</body>
</html>