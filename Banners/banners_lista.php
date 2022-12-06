<?php
	require "../Administradores/header.php";		
	require "../Administradores/Funciones/coneccion.php";  
	$conexion = conecta();
?>

<html>
	<head>
		<title> Lista de Banners </title>
		<link rel="stylesheet"  href="Tabla.css">
		<script src= "JS/jquery-3.3.1.min.js"> </script>
	</head>
	<script>
		function Elimina_Registro(id) {
			var resultado = confirm("Desea [ELIMINAR] el banner con id: "+id+"?");
			if(resultado == true)
			{
				$.ajax({
							url		: 'banners_elimina.php?id='+id,
							type	: 'post',
							dataType: 'text',
							success	: function(res) {
									if(res == 1) {
										$('#mensaje').html('banner Eliminado :D');
										//setTimeout("location.reload();", 500);
										$("#fila"+id).hide(200);
										setTimeout("$('#mensaje').html('');", 3000);
									} else {
										$('#mensaje').html('[ERROR] en la eliminacion D:');
									}
								},
							error	: function() {
									alert('[ERROR] Archivo no encontrado...');
								}
						});
			}
							
			
		}
		
		function RedireccionEditar(idEditar) {
			 window.location.href="banners_editar.php?id="+idEditar;
		}
		
		function RedireccionVer(idVer) {
			 window.location.href="banners_detalle.php?id="+idVer;
		}
		
		
	</script>
	
	<body>
		<div class="main_div">
			<div class="Titulo"> <h3>LISTADO DE BANNERS </h3> </div>
			<table class="Tabla">
				<thead class="Fila_Campos">
					<tr align="center">
						<th class="Campo_Seccion"> ID </th>
						<th> Nombre </th>
						<th colspan="3"> <a href="banners_alta.php"> Nuevo Banner</a> </th>
					</tr>
				</thead>
				
			<?php
				$sql = "SELECT * FROM banners
				WHERE status = 1 AND eliminado = 0";

				$resultado = mysqli_query($conexion, $sql);
		
				while($mostrar = $resultado->fetch_array()) {
					$id = $mostrar["ID"];
					$nombre = $mostrar["nombre"];	

			?>

				<tr id="fila<?php echo $id; ?>" class='Fila' align="center">
					<td><?php echo "$id" ?></td>
					<td><?php echo "$nombre" ?></td>
					<td><?php echo "<button onClick='Elimina_Registro($id)'>ELIMINAR</button>" ?></td>
					<td><?php echo "<button onClick='RedireccionVer($id)'>VER DETALLE</button>" ?></td>
					<td><?php echo "<button onClick='RedireccionEditar($id)'>EDITAR</button>" ?></td>
				</tr>

			<?php
				}
			?>
			</table>
			<div id="mensaje" style="color:#F00;font-size:16px;"> </div>
		</div>
	</body>
</html>