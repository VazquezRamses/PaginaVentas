<?php
	require "header.php";		
	require "Funciones/coneccion.php"; 				
	session_start(); 
	
	$id = $_SESSION['pedido'];
	
	if(!isset($id))
	{
		header("Location: Iniciar_pedido.php");
	}
	
	$con = conecta();
	
	$sql = "SELECT * FROM banners WHERE status = 1 AND eliminado = 0 ORDER BY rand()";
	$resultado = mysqli_query($con, $sql);
	$mostrar = $resultado->fetch_array();
	$imagen = $mostrar['archivo'];	
	
	
?>

<html>
	<head>
		<title>Inicio</title>
		<script src="JS/jquery-3.3.1.min.js" type="text/javascript"></script>   
		<link rel="stylesheet"  href="inicio.css">
		<script>
			
		</script>
	</head>
	
	<body>
		<div class="cont1"> <img src='Banners/Archivos/<?php echo "$imagen"; ?>'> </div> 
		<div class="container">
		
			<?php
				$sql = "SELECT * FROM productos WHERE status = 1 AND eliminado = 0 ORDER BY rand() LIMIT 6";

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
				<p> <b>Codigo:</b> <?php echo "$codigo"; ?></p>
				<p> <b>Precio:</b> <?php echo "$costo"; ?></p>
				<p> <b>Stock:</b> <?php echo "$stock"; ?></p>
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

