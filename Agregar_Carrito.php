<?php
	require "Funciones/coneccion.php";
	session_start(); 
	$con = conecta();
	
	//VARIABLES DEL PRODUCTO
	$id_producto = $_POST['productoID'];
	$costo = $_POST['costo_p'];
	$cantidad = $_POST['cantidad'];
	
	if($cantidad == 0)
	{
		header("Location: productos.php");
	}
	
	//VARIABLE DEL PEDIDO
	$id_pedido = $_SESSION['pedido'];
	$continuar = $_SESSION['pedido_abierto'];
	
	if($continuar == 0)
	{
	
		//PARA SABER SI EXISTE UN PRODUCTO, PARA ACTUALIZAR O AGREGAR
		$sql_productos = "SELECT productos.nombre, pedidos_productos.cantidad, productos.costo FROM pedidos_productos 
			JOIN productos ON pedidos_productos.id_producto = productos.ID 
			WHERE pedidos_productos.id_pedido = '$id_pedido' AND pedidos_productos.id_producto = '$id_producto'";
		
		$res = mysqli_query($con,$sql_productos);
		$numero_productos = mysqli_num_rows($res);			
		
		if($numero_productos > 0)
		{ //SI EXISTE UN PRODUCTO
			$res = $con->query($sql_productos);
			$row = $res->fetch_assoc();
			$cantidad_pedido = $row["cantidad"];//OBTENEMOS LA CANTIDAD QUE HAY EN EL PEDIDO	
			$nueva_cantidad = $cantidad_pedido + $cantidad; //Y AÑADIMOS CON LA QUE ENVIAMOS
			//ACTUALIZAMOS EN LA BASE DE DATOS
			$sql_pedido = "UPDATE pedidos_productos SET cantidad = '$nueva_cantidad' WHERE id_producto = '$id_producto'";
		}
		else
		{
			//DE LO CONTRARIO SE INSERTA UN NUEVO REGISTRO
			$sql_pedido = "INSERT INTO pedidos_productos
				(id_pedido, id_producto, cantidad, precio)
				VALUES ('$id_pedido', '$id_producto', '$cantidad', '$costo')";	
		}
		
		//ACTUALIZAMOS LA CANTIDAD DEL STOCK DEL PRODUCTO
		$sql_producto = "SELECT * FROM productos WHERE id = '$id_producto'";
		
		$res_prod = $con->query($sql_producto);
		$row = $res_prod->fetch_assoc();
		$stock = $row["stock"];	
		$nuevo_stock = $stock - $cantidad;
			
		$sql_actualizar = "UPDATE productos SET stock = '$nuevo_stock' WHERE id='$id_producto'";
		$res_prod = $con->query($sql_actualizar);	
			
		$res = $con->query($sql_pedido);	
		
		header("Location: carrito01.php");
	}
	else
	{
		header("Location: carrito01.php");
	}
?>
