<?php
	// administradores_elimina.php
	require "Funciones/coneccion.php";
	
	$con = conecta();
	//RECIBE VARIABLES
	$Ban = 0;
	$id = $_REQUEST['id'];
	
	if($id > 0) {
		// $sql = "DELETE FROM administradores WHERE id = $id";		
		$sql = "UPDATE administradores SET eliminado = 1 WHERE ID = $id";		
		$res = $con->query($sql);
		$Ban = 1;
	}

	echo $Ban;
	//header("Location: administradores_lista.php"); //REDIRECCIONA A LA PAGINA
?>