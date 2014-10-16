<?php 

session_start();
if(!isset($_SESSION['usuarioMail'])) {
	header('Location: ../index.php');
	exit;	
}

 ?>