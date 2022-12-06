<?php
	require "../Administradores/header.php";	
	require "../Administradores/Funciones/coneccion.php";  
	$con = conecta();
	$id = $_REQUEST['id'];
	
	$sql = "SELECT * FROM banners WHERE id = $id";
	
	$res = $con->query($sql);
	$row = $res->fetch_assoc();
			
	$nombre = $row['nombre'];		
	$status = $row['status'];
	if($status == 1) { $status = "Activo"; }
		else { $status = "Inactivo"; }	
	$imagen = $row['archivo'];
?>

<html>
	<head>
		<title> ADMINISTRADOR A DETALLE </title>
		<link rel="stylesheet"  href="Tabla.css">
		<script src= "JS/jquery-3.3.1.min.js"> </script>
		
		<style>
			
			.MostrarDatos {
					background-color: #12BD36;
					display: inline-block;
					border: 1px solid #000;
					height: auto;
					width: 350px;
					text-align: center;
					font-size: 30px;
			}
			
			.DivPricipal {
				height: 400px;
				width: 100%;
				text-align: center;
				background-image: url("./Imagenes/Fondo2.jpg");
				display: inline-block;
			}
			
			 .ImagenDiv {
				 height: auto;
				 width: auto;
				 border: 10px solid #0FAF3A;
			 }
			 
			 .InfoDiv {
				 height: 25%;
			 }
			 
 
			.Mostrar {
				display: inline-block;
					border: 1px solid #000;
					height: auto;
					width: 200px;
					background-color: #3B8A60;
					text-align: center;
					font-size: 30px;
			}
			
			.Titulo3 {
			background-color: #3B8A60;
            height: auto;
            min-height: 25px;
            width: 100%;
            border: 1px solid #000;
			text-align: center;
			font-size: 30px;
			margin: 5px 0px;
			display: inline-block;
		}
			
		</style>
	</head>
	
	<body>
		<div class="Titulo3"> ADMINISTRADOR A DETALLE </div>
		<br>
		<div class="DivPricipal"> <br>
			<img class="ImagenDiv" src='Archivos/<?php echo "$imagen"?>'>  <br><br>
			<div class="InfoDiv">
				<div class="Mostrar">NOMBRE </div>
				<div class ="MostrarDatos"><?php echo "$nombre" ?> </div><br>
				<div class="Mostrar">STATUS </div>
				<div class ="MostrarDatos"><?php echo "$status" ?> </div><br>
			</div>
		</div>
		<br>
		<a href="banners_lista.php"><img src = "./Imagenes/Regresar.png" width = "170" height = "90" 
				alt = "Regresar al listado de administradores"/></a>
	</body>

</html>

