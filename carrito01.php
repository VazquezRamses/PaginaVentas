<?php
	require "header.php";		
	require "Funciones/coneccion.php"; 
	$conexion = conecta();
	
	session_start();
	$id_pedido = $_SESSION['pedido'];
	$continuar = $_SESSION['pedido_abierto'];
	
	if($continuar == 1)
	{
		header("Location: carrito02.php");
	}
	
?>

<html>
	<head>
		<title>CARRITO</title>
		<script src="JS/jquery-3.3.1.min.js" type="text/javascript"></script>   
		<link rel="stylesheet"  href="inicio.css">
		
		<script>
		
			function Elimina_Registro(id) {
				var resultado = confirm("Desea [ELIMINAR] el producto ?");
				if(resultado == true)
				{
					window.location.href="Productos_elimina.php?id="+id;
				}				
			}
			
			
			function ContinuarPedido() {
						$.ajax({
								url		: 'cerrar_pedido.php?id='+<?php echo "$id_pedido"; ?>,
								type	: 'post',
								dataType: 'text',
								success	: function(res) {
											if(res == 1) {
												window.location.href="carrito02.php";
											} 
										},
									error	: function() {
											alert('[ERROR] Archivo no encontrado...');
										}
								});
						
											
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
						<th>  </th>
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
					<td> <button onClick='Elimina_Registro(<?php echo "$id" ?>)'>ELIMINAR </button></td>
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
		<div class="botonC"> <button onClick='ContinuarPedido()'>CONTINUAR</button> </div>
		
	</body>
	
		
<?php
		require "footer.php";		
?>

</html>

