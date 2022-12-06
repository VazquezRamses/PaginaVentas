<?php
	require "../Administradores/header.php";		
	require "Funciones/coneccion.php";  
	$conexion = conecta();
?>

<html>
	<head>
		<title> Lista de Pedidos </title>
		<link rel="stylesheet"  href="Tabla.css">
		<script src= "JS/jquery-3.3.1.min.js"> </script>
	</head>
	<script>			
		function RedireccionVer(idVer) {
			 window.location.href="pedidos_detalle.php?id="+idVer;
		}
		
		
	</script>
	
	<body>
		<div class="main_div">
			<div class="Titulo"> <h3>LISTADO DE PEDIDOS</h3> </div>
			<table class="Tabla">
				<thead class="Fila_Campos">
					<tr align="center">
						<th class="Campo_Seccion"> ID </th>
						<th> Fecha </th>
						<th> Usuario </th>
						<th> </th>
					</tr>
				</thead>
				
			<?php
				$sql = "SELECT * FROM pedidos
				WHERE status = 1";

				$resultado = mysqli_query($conexion, $sql);
		
				while($mostrar = $resultado->fetch_array()) {
					$id = $mostrar["ID"];
					$nombre = $mostrar["usuario"];
					$fecha = $mostrar["Fecha"];

		
			?>

				<tr id="fila<?php echo $id; ?>" class='Fila' align="center">
					<td><?php echo "$id" ?></td>
					<td><?php echo "$fecha" ?></td>
					<td><?php echo "$nombre"?></td>
					<td><?php echo "<button onClick='RedireccionVer($id)'>VER DETALLE</button>" ?></td>
				</tr>

			<?php
				}
			?>
			</table>
			<div id="mensaje" style="color:#F00;font-size:16px;"> </div>
		</div>
	</body>
</html>