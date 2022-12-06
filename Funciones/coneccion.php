<?php
	// ./Funciones/conecta.php
	define("HOST", 'localhost');
	define("BD", 'cliente01');
	define("USER_BD", 'root');
	define("PASS_BD", 'root');
	
	
	function conecta () {
		$con = new mysqli(HOST, USER_BD, PASS_BD, BD);
		return $con;
	}

?>    