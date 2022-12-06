<?php
	require "../Administradores/header.php";		
	require "Funciones/coneccion.php";  
	$conexion = conecta();
	$id = $_REQUEST['id'];
?>

<html>
	<head>
		<title> DETALLE PEDIDO </title>
		<link rel="stylesheet"  href="Tabla.css">
		<script src= "JS/jquery-3.3.1.min.js"> </script>
	</head>

	
	<body>
		<div class="main_div">
			<div class="Titulo"> <h3>DETALLE PEDIDO #<?php echo "$id" ?></h3> </div>
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
				$sql = "SELECT productos.nombre, pedidos_productos.cantidad, productos.costo FROM pedidos_productos 
							JOIN productos ON pedidos_productos.id_producto = productos.ID 
							WHERE pedidos_productos.id_pedido = '$id'";

				$resultado = mysqli_query($conexion, $sql);
		
				while($mostrar = $resultado->fetch_array()) {
					$nombre= $mostrar["nombre"];
					$cantidad = $mostrar["cantidad"];
					$costo = $mostrar["costo"];
					$subtotal = $cantidad * $costo;
					$total = $total + $subtotal;
		
			?>

				<tr id="fila<?php echo $id; ?>" class='Fila' align="center">
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
				</tr>
			</table>
			<div id="mensaje" style="color:#F00;font-size:16px;"> </div>
		</div>
		
		<a href="pedidos_lista.php"><img src = "./Imagenes/Regresar.png" width = "170" height = "90" 
				alt = "Regresar al listado de administradores"/></a>
	</body>
</html>