<?php
	session_start(); 
	$id = $_SESSION['ID_adimn'];
	
	if(!isset($id))
	{
		header("Location: index.php");
	}
	
	$correo = $_SESSION['correo_admin']; 
	$nombre = $_SESSION['name_adimn'];
	$apellidos = $_SESSION['apellidos_adimn'];
				
?>

<html>
	<head>
		
		<script src="JS/jquery-3.3.1.min.js" type="text/javascript"></script>   
		
		<style>
			*{
				margin: 0;
				padding: 0;
				list-style: none;
				text-decoration: none;
			}
			
			.header {
				width: 100%;
				heigth: 80px;
				background-color: #60956B;
				display: block;
				overflow:hidden;
			}
			
			.inner_header {
				width: 1200px;
				heigth: 100%;
				display: flex;
				margin: 0 auto;
			}
			
			.logo_container {
				width: 40%;
				heigth: 100%;
				text-align: middle;
				float: left;
				display: table;
			}
			
			.logo_container h1{
				color: black;
				display: table-cell;
				vertical-align: middle;
				heigth: 100%;
				text-align: middle;
				font-family: Consolas; 
				font-size: 28px;
				
			}
			
			.navigation {
				heigth: 100%;
				text-align: middle;
				float: right;
				display: table;
			}
			
			.navigation a {
				heigth: 100%;
				padding: 8px 20px;
				line-heigth: 200px;
			}
	
			.navigation a {
				display: inline-block;
				border: 2px solid #1C5F2D;	
				vertical-align: middle;
				heigth: 100%;
				color: white;
				font-weight:bold;
				font-size: 15px;
				line-heigth:normal;
				font-family: "Segoe UI";
				margin: 10px auto;
				border-radius: 50px;
				text-align:center;
				-webkit-transition:all 500ms ease;
				-o-transition:all 500ms ease;
				transition:all 500ms ease;
			}
			
			.navigation a:hover{
					background: #4FC46D ;
			}
			
			
		</style>
	</head>
		
	<body>
		<div class="header"> 
			<div class="inner_header"> 
				<div class="logo_container">
					<h1>SISTEMA DE ADMINISTRACION</h1>
				</div>
				<div class="navigation">
					<a href="../Administradores/administradores_inicio.php"><li>Inicio</li></a>
					<a href="../Administradores/administradores_lista.php">Administradores</a>
					<a href="../Productos/Productos_lista.php">Productos</a>
					<a href="../Banners/banners_lista.php">Banners</a>
					<a href="../Pedidos/pedidos_lista.php">Pedidos</a>
					<a href="../Administradores/Funciones/administradores_salir.php"><li>Cerrar Sesion</li></a>
				</div>
			</div>
		</div>
		
	</body>
	
</html>