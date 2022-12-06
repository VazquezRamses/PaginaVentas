<?php
	require "../Administradores/header.php";
	require "Funciones/coneccion.php";
	$con = conecta();
	$id = $_REQUEST['id'];
	
	$sql = "SELECT * FROM productos WHERE id = $id";
	
	$res = $con->query($sql);
	$row = $res->fetch_assoc();
			
	$nombre = $row["nombre"];
	$codigo = $row["codigo"];
	$descripcion = $row["descripcion"];
	$costo = $row["costo"];			
	$stock = $row["stock"];	
	$imagen = $row['archivo_n'];
?>

<html>
	<head>
		<title> PRODUCTO A DETALLE </title>
		<link rel="stylesheet"  href="Tabla.css">
		<script src= "JS/jquery-3.3.1.min.js"> </script>
		
		<style>
			
			.MostrarDatos {
					background: #4FC46D;
					display: inline-block;
					border: 2px solid #1C5F2D;	
					height: auto;
					width: 350px;
					text-align: center;
					font-size: 30px;
					border-radius: 50px;
					margin: 5px 10px;
			}
			
			.DivPricipal {
				height: 700px;
				width: 100%;
				text-align: center;
				background-image: url("./Imagenes/Fondo2.jpg");
				display: block;
				
			}
			
			.inner_div {
				width: 100%;
				heigth: 100%;
				display: flex;
				margin: 0 auto;
				justify-content: center;
				align-items: center;
				margin:auto;
			}
			.divdivimagen {
				width: 30%;
			}
			
			 .ImagenDiv {
				 height: 500px;
				 width: 450px;
				 border: 10px solid #1C5F2D;	
				 display: inline-block;
				 float: left;
				 margin: 0px 10px;
			 }
			 
			 .InfoDiv {
				 height: auto;
				 display: inline-block;
				 float: right;
				 margin: 20px 80px;
			 }
			 
			 .DESCRIPCION {
				 height: auto;
				 display: flex;
				 
			 }
			
			.DESCRIPCION2 {
				
				border: 3px solid #000;
				width: 230px;
				background-color: #3B8A60;
				text-align: center;
				font-size: 30px;
				
				text-align: middle;
				vertical-align: middle;
				margin: auto;
				
			}
			
			.DESCRIPCION3
			{
				background: #4FC46D;
				display: inline-block;
				border: 2px solid #1C5F2D;					
				text-align: middle;
				height: auto;
				width: 350px;
				text-align: center;
				font-size: 30px;
				flex: right;
				margin:auto;
				border-radius: 50px;
			}
			
			.Mostrar {
				display: inline-block;
					border: 3px solid #000;
					height: auto;
					width: 230px;
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
		<div class="Titulo3"> PRODUCTO A DETALLE </div>
		<br>
		<div class="DivPricipal"> <br>
			<div class="inner_div"> 
				<img class="ImagenDiv" src='Archivos/<?php echo "$imagen"?>'>  <br><br>
				<div class="InfoDiv">
					<div class="Mostrar">NOMBRE </div>
					<div class ="MostrarDatos"><?php echo "$nombre" ?> </div><br>
					<div class="Mostrar">CODIGO </div>
					<div class ="MostrarDatos"><?php echo "$codigo" ?> </div><br>					
					<div class="Mostrar">COSTO </div>
					<div class ="MostrarDatos"><?php echo "$costo" ?> </div><br>
					<div class="Mostrar">STOCK </div>
					<div class ="MostrarDatos"><?php echo "$stock" ?> </div><br><br>
					<div class="DESCRIPCION">
						<div class="DESCRIPCION2">DESCRIPCION</div>
						<div class ="DESCRIPCION3"><?php echo "$descripcion" ?> </div><br>
					</div>
				</div>
			</div>
		</div>
		<br>
		<a href="Productos_lista.php"><img src = "./Imagenes/Regresar.png" width = "170" height = "90" 
				alt = "Regresar al listado de administradores"/></a>
	</body>

</html>

