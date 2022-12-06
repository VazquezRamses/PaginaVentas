<?php
	require "header.php";		
	require "Funciones/coneccion.php"; 
	$conexion = conecta();
	
	session_start();
	$id_pedido = $_SESSION['pedido'];
	$continuar = $_SESSION['pedido_abierto'];
	
?>

<html>
	<head>
		<title>CARRITO</title>
		<script src="JS/jquery-3.3.1.min.js" type="text/javascript"></script>   
		<link rel="stylesheet"  href="inicio.css">
		
		<script>
			
			function Finalizar_Pedido() {	
						window.location.href="finalizar_pedido.php";			
					}
		</script>
	</head>
		
	<body>
			<div class="Carrito">
			<table class="Tabla">
				<thead class="Fila_Campos">
					<tr align="center">
						<th> Producto  </th>
						<th> Cantidad </th>
						<th> Costo unitario</th>
						<th> Subtotal</th>
					</tr>
				</thead>
				
			<?php
			
				$sql = "SELECT pedidos_productos.ID, productos.nombre, pedidos_productos.cantidad, productos.costo FROM pedidos_productos 
							JOIN productos ON pedidos_productos.id_producto = productos.ID 
							WHERE pedidos_productos.id_pedido = '$id_pedido'";

				$resultado = mysqli_query($conexion, $sql);
		
				while($mostrar = $resultado->fetch_array()) {
					$id = $mostrar["ID"];
					$nombre= $mostrar["nombre"];
					$cantidad = $mostrar["cantidad"];
					$costo = $mostrar["costo"];
					$subtotal = $cantidad * $costo;
					$total = $total + $subtotal;
		
			?>

				<tr id="fila<?php echo "$id"; ?>" class='Fila' align="center">
					<td><?php echo "$nombre" ?></td>
					<td><?php echo "$cantidad" ?></td>
					<td><?php echo "$costo"?></td>
					<td><?php echo "$subtotal"?></td>
				</tr>

			<?php
				}
			?>
				<tr class='Fila' align="center">
					<td> Total </td>
					<td></td>
					<td></td>
					<td><?php echo "$total"?></td>
					<td></td>
				</tr>
			</table>
		</div>
		<div class="botonC"> <button onClick='Finalizar_Pedido();'>FINALIZAR</button> </div>
		
	</body>
	
		
<?php
		require "footer.php";		
?>

</html>

