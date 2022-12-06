<?php
	//valida_correo.php
	require "Funciones/coneccion.php";
	session_start(); 
	
	$con = conecta();
	$dia = date('d');
	$mes = date('m');
	$year = date('Y');
	$fecha = $year."-".$mes."-".$dia;
	$Ban = 1;
	
	$sqlCarrito = "SELECT * FROM pedidos WHERE ID =(SELECT max(ID) FROM pedidos) AND status = 0";
	$res = mysqli_query($con,$sqlCarrito);
	$pedido_abierto = mysqli_num_rows($res); //PARA SABER SI EXISTE ALGUN PEDIDO					
	$mostrar = $res->fetch_array();	 //PARA OBTENER LA INFORMACION SI EXISTE
	
	
	if($pedido_abierto == 1)
	{
		$id = $mostrar["ID"];		
		$_SESSION['pedido'] = $id;
		$_SESSION['pedido_abierto'] = 0;
	}
	else
	{
		$sql_pedido = "INSERT INTO pedidos
		(fecha, usuario)
		VALUES ('$fecha', ' ')";
		$res = $con->query($sql_pedido);
		
		$res = mysqli_query($con,$sqlCarrito);
		$mostrar = $res->fetch_array();
		$id = $mostrar["ID"];		
		$_SESSION['pedido'] = $id;
		$_SESSION['pedido_abierto'] = 0;
	}
	
	header("Location: index.php");
?>
