<?php
	require "Funciones/coneccion.php";
	session_start(); 
	
	$con = conecta();
	$id = $_REQUEST['id'];
	$ban = 0;
	
	if($id > 0) {
		
		$sql = "UPDATE pedidos SET status = 1 WHERE ID = $id";		
		$res = $con->query($sql);
		$ban = 1;
		$_SESSION['pedido_abierto'] = 1;
	}
	
	echo $ban;
?>