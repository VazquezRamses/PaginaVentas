<?php
	// administradores_elimina.php
	require "Funciones/coneccion.php";
	session_start(); 
	$id_pedido = $_SESSION['pedido'];
	
	$con = conecta();
	//RECIBE VARIABLES
	$id = $_REQUEST['id'];
	
	$sql = "DELETE FROM pedidos_productos WHERE ID = '$id' ";		
	$res = $con->query($sql);
	
	header("Location: carrito01.php"); //REDIRECCIONA A LA PAGINA
?>