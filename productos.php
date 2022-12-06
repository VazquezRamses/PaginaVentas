<?php
	require "header.php";		
	require "Funciones/coneccion.php"; 		
	$con = conecta();
?>

<html>
	<head>
		<title>PRODUCTOS</title>
		<script src="JS/jquery-3.3.1.min.js" type="text/javascript"></script>   
		<link rel="stylesheet"  href="inicio.css">
	</head>
		
	<body>
		<div class="container">
		
			<?php
				$sql = "SELECT * FROM productos WHERE status = 1 AND eliminado = 0";

				$resultado = mysqli_query($con, $sql);
		
				while($mostrar = $resultado->fetch_array()) {
					$id = $mostrar["ID"];
					$nombre = $mostrar["nombre"];
					$codigo = $mostrar["codigo"];
					$costo = $mostrar["costo"];
					$stock = $mostrar["stock"];
					$archivo = $mostrar["archivo_n"];
			?>
			
			<div class="card">
				<img src="Productos/Archivos/<?php echo "$archivo"; ?>" alt="Imagen del producto">
				<h3><?php echo "$nombre"; ?></h3>
				<p> Codigo: <?php echo "$codigo"; ?></p>
				<p> Precio: <?php echo "$costo"; ?></p>
				<p> Stock: <?php echo "$stock"; ?></p>
				<p> <a href="productos_detalle.php?id=<?php echo "$id"?>" > COMPRAR </a> </p>
			</div>
			
			<?php
				}
			?>
		</div>
	</body>
	
		
<?php
		require "footer.php";		
?>

</html>

