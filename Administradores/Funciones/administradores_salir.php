<?php
	session_start(); 
	session_destroy();
	
	header("Location: ../index.php"); //REDIRECCIONA A LA PAGINA
?>