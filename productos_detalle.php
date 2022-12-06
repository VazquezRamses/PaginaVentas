<?php
	require "header.php";		
	require "Funciones/coneccion.php"; 		
	$con = conecta();
	
	$id = $_REQUEST['id'];
	
	$sql = "SELECT * FROM productos WHERE id = $id";
	
	$res = $con->query($sql);
	$row = $res->fetch_assoc();
	
	$id_producto = $row["ID"];	
	$nombre = $row["nombre"];
	$codigo = $row["codigo"];
	$descripcion = $row["descripcion"];
	$costo = $row["costo"];			
	$stock = $row["stock"];	
	$imagen = $row['archivo_n'];
?>

<html>
	<head>
		<title>DETALLE PRODUCTOS</title>
		<script src="JS/jquery-3.3.1.min.js" type="text/javascript"></script>   
		<link rel="stylesheet"  href="inicio.css">
	</head>
		
	<body>
		<div class="container2">
			<div class="Detalle">
				<form action="Agregar_Carrito.php" method="POST">
					<div class="imagen"><img src="Productos/Archivos/<?php echo "$imagen"; ?>" alt="Imagen del producto"></div>
					<h1><?php echo "$nombre"; ?> </h1>
					<input type="hidden" name="productoID" id="productoID" value="<?php echo "$id_producto"; ?>">
					<p> <b>Codigo:</b> <?php echo "$codigo"; ?> </p>
					<p> <b>Precio:</b> <?php echo "$costo"; ?>&nbsp; &nbsp; <b>Stock:</b> <?php echo "$stock"; ?></p>
					<input type="hidden" name="costo_p" id="costo_p" value="<?php echo "$costo"; ?>">
					<p> <b>DESCRIPCION:</b> </label><p>
					<div class="Descripcion"> <?php echo "$descripcion"; ?></div>
					<p><b>CANTIDAD:</b></p>
					<input class="Cantidad" type="number" name="cantidad" id="cantidad" value="1" min="1" max="<?php echo "$stock" ?>"><br><br>
					<p> <input type="submit" value="Comprar"></p>
				</form>
			</div>
		</div>
	</body>
	
		
<?php
		require "footer.php";		
?>

</html>

